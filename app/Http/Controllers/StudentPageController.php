<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Admin;
use App\Subject;
use App\User;
use App\Assign;
use App\Invoice;
use App\Material;
use App\Exam;
use App\ExamScore;
use App\ExamQuestion;
use App\ExamSaveState;
use App\ExamWrittenStatus;
use PDF;


class StudentPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function profilePasswordUpdate(Request $request)
    {
      $this->validate($request,[
         'password' => ['required', 'string', 'min:5', 'confirmed']
      ]);

      auth()->user()->update(['password' => Hash::make($request->get('password'))]);   

      return back()->withPasswordStatus(__('Password Successfully Updated'));
    }

    public function profileDetailsUpdate(Request $request)
    {
        $email = $request->input('email');
        $guardian_email = $request->input('guardian_email');
        $guardian_phoneNumber = $request->input('guardian_phoneNumber');

        auth()->user()->update(
            ['email' => $email],
            ['guardian_email' => $guardian_email],
            ['guardian_phoneNumber' => $guardian_phoneNumber]
        );

        return back()->withProfileStatus(__('Profile Successfully Updated'));
    }

    public function listSubject()
    {
        $class = Auth::user()->current_class;
        $data = DB::table('assigns')->where('classes', $class)->get();

        return view('user.listSubject',[
            'data' => $data,
        ]);
        
       
    }

    public function payment()
    {
        $user = Auth::user()->fullname;
        $section = Auth::user()->section;
        $term = Auth::user()->term;

        
        $details = DB::table('invoices')->where(['fullname' => $user], ['section' => $section], ['term' => $term])->orderBy('id', 'desc')->get();
        return view('user.payment',[
            'details' => $details
        ]);
    }

    public function invoicePta($id)
    {
        $user = Auth::user()->fullname;
        $section = Auth::user()->section;
        $term = Auth::user()->term;

        
        $details = DB::table('invoices')->where(['id' => $id], ['fullname' => $user])->where(['section' => $section], ['term' => $term])->get();
        return view('user.invoicePTA',[
            'details' => $details,
        ]);
    }

    public function invoiceSchool($id)
    {
        $user = Auth::user()->fullname;
        $section = Auth::user()->section;
        $term = Auth::user()->term;

        
        $details = DB::table('invoices')->where(['id' => $id], ['fullname' => $user])->where(['section' => $section], ['term' => $term])->get();
        return view('user.invoiceSchool',[
            'details' => $details,
            'id' => $id
        ]);
    }

    public function invoiceReg($id)
    {
        $user = Auth::user()->fullname;
        $section = Auth::user()->section;
        $term = Auth::user()->term;

        
        $details = DB::table('invoices')->where(['id' => $id], ['fullname' => $user])->where(['section' => $section], ['term' => $term])->get();
        return view('user.invoiceReg',[
            'details' => $details
        ]);
    }
    
    public function exam()
    {
        $section = Auth::user()->section;
        $term = Auth::user()->term;
        $class = Auth::user()->current_class;

        $details = DB::table('exams')->where('class', $class)->get();
        $info = DB::table('exam_written_statuses')->select('subject_name', 'status')->where(['section' => $section], ['term' => $term], ['fullname' => Auth::user()->fullname])->where(['class' => $class])->get()->toArray();
      
        // $count = count($info);
        // $i =1;
        // while($i < $count)
        // {
            return view('user.exam', [
            'details' => $details,
            'info' =>  $info
            ]);    
        // }
        
        
    }

    public function examStartObj($subject_name)
    {
        $section = Auth::user()->section;
        $term = Auth::user()->term;
        $class = Auth::user()->current_class;

        $details = DB::table('exam_questions')->where(['section' => $section], ['term' => $term], ['subject_name' => $subject_name])->where(['exam_type' => 'Obj'], ['class' => $class],)->get();
        $info = DB::table('exam_questions')->where(['section' => $section], ['term' => $term], ['subject_name' => $subject_name])->where(['exam_type' => 'Obj'], ['class' => $class],)->get();
        
        return view('user.examStartObj', [
            'subject_name' => $subject_name,
            'details' => $details,
            'info' => $info,
        ]);
    }

    public function examStartTheory($subject_name)
    {
        $section = Auth::user()->section;
        $term = Auth::user()->term;
        $class = Auth::user()->current_class;

        $details = DB::table('exam_questions')->where(['section' => $section], ['term' => $term], ['subject_name' => $subject_name])->where(['exam_type' => 'Theory'], ['class' => $class])->get();
        $info = DB::table('exam_questions')->where(['section' => $section], ['term' => $term], ['subject_name' => $subject_name])->where(['exam_type' => 'Theory'], ['class' => $class])->get();
        
        return view('user.examStartTheory', [
            'subject_name' => $subject_name,
            'details' => $details,
            'info' => $info,
        ]);
    }

    public function examStartBoth($subject_name)
    {
        $section = Auth::user()->section;
        $term = Auth::user()->term;
        $class = Auth::user()->current_class;

        
        $details = DB::table('exam_questions')->where(['section' => $section], ['term' => $term], ['subject_name' => $subject_name])->where(['exam_type' => 'Both'], ['class' => $class])->get();
        $info = DB::table('exam_questions')->where(['section' => $section], ['term' => $term], ['subject_name' => $subject_name])->where(['exam_type' => 'Both'], ['class' => $class])->get();
        
        return view('user.examStartBoth', [
            'subject_name' => $subject_name,
            'details' => $details,
            'info' => $info,
        ]);
    }

    public function examSubmitObj(Request $request)
    {
        // $user_answer = $request->input('user_answer');
        // $correct_answer = $request->input('correct_answer');
        // $question = $request->input('question');
        $mark_correct = $request->input('mark_correct');
        $subject_name = $request->input('subject_name');
        $fullname = Auth::user()->fullname;
        $class = Auth::user()->current_class;
        $section = Auth::user()->section;
        $term = Auth::user()->term;
        
        $option1 = $request->input('option1');
        $option2 = $request->input('option2');
        $option3 = $request->input('option3');
        $option4 = $request->input('option4');

        // $dataSet = [];
        
        // foreach($question as $question)
        // {           
        //     $dataSet[] = [
        //         'fullname' => $fullname,
        //         'subject_name' => $subject_name,
        //         'class' => $class,
        //         'section' => $section,
        //         'term' => $term,
        //         'question' => $question
        //     ];  
        // } 
        // DB::table('exam_save_states')->insert($dataSet);
        
        $input = $request->all();
        $i = 1;
        $count = count($input['question']);
        while($i < $count)
        {
            if($input['correct_answer'][$i] == $input['user_answer'][$i])
            {
                $status = 'CORRECT';
            }
            else{
                $status = 'WRONG ';
            }
            $data[] = array(
                'fullname' => $fullname,
                'subject_name' => $subject_name,
                'class' => $class,
                'section' => $section,
                'term' => $term,
                'question' => $input['question'][$i],
                'correct_answer' => $input['correct_answer'][$i],
                'user_answer' => $input['user_answer'][$i],
                'option1' => $option1[$i],
                'option2' => $option2[$i],
                'option3' => $option3[$i],
                'option4' => $option4[$i],
                'status' => $status,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            );
            $i++;
        }
        DB::table('exam_save_states')->insert($data);

        $score = DB::table('exam_save_states')->select('status')->where(            
            ['subject_name' => $subject_name], 
        )
        ->where(
            ['status' => 'CORRECT'],
            ['fullname' => $fullname],           
        )->where(
                ['class' => $class],
                ['section' => $section],
                ['term' => $term],
        )->count();

        $score = $score * $mark_correct;
        

        $exam_score = new ExamScore;

        $exam_score->fullname = $fullname;
        $exam_score->subject_name = $subject_name;
        $exam_score->class = $class;
        $exam_score->section = $section;
        $exam_score->term = $term;
        $exam_score->score = $score;

        $exam_score->save();

        $exam_status = new ExamWrittenStatus;

        $exam_status->fullname = $fullname;
        $exam_status->subject_name = $subject_name;
        $exam_status->class = $class;
        $exam_status->section = $section;
        $exam_status->term = $term;
        $exam_status->status = 'WRITTEN';

        $exam_status->save();
        
        //return 'done';
        return redirect()->route('exam.finishObj', ['subject_name' => $subject_name]);
    }

    public function examSubmitTheory(Request $request)
    {
        $mark_correct = $request->input('mark_correct');
        $subject_name = $request->input('subject_name');
        $fullname = Auth::user()->fullname;
        $class = Auth::user()->current_class;
        $section = Auth::user()->section;
        $term = Auth::user()->term;

        $input = $request->all();
        $i = 1;
        $count = count($input['question']);
        while($i < $count)
        {
            similar_text($input['correct_answer'][$i], $input['user_answer'][$i], $prec);

            if($prec >= 50 )
            {
                $status = 'CORRECT';
            }
            else{
                $status = 'WRONG ';
            }
           
            $data[] = array(
                'fullname' => $fullname,
                'subject_name' => $subject_name,
                'class' => $class,
                'section' => $section,
                'term' => $term,
                'question' => $input['question'][$i],
                'correct_answer' => $input['correct_answer'][$i],
                'user_answer' => $input['user_answer'][$i],
                'status' => $status,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            );            

           // $sim = similar_text($input['correct_answer'][$i], $input['user_answer'][$i], $prec);

            $i++;
        }

        DB::table('exam_save_states')->insert($data);

        //return "similarity: .$sim($prec %)\n";

        $score = DB::table('exam_save_states')->select('subject_name', 'status')->where(            
            ['subject_name' => $subject_name], 
        )
        ->where(
            ['status' => 'CORRECT'],
            ['fullname' => $fullname],           
        )->where(
                ['class' => $class],
                ['section' => $section],
                ['term' => $term],
        )->count();

        $score = $score * $mark_correct;
        

        $exam_score = new ExamScore;

        $exam_score->fullname = $fullname;
        $exam_score->subject_name = $subject_name;
        $exam_score->class = $class;
        $exam_score->section = $section;
        $exam_score->term = $term;
        $exam_score->score = $score;

        $exam_score->save();

        // $exam_status = new ExamWrittenStatus;

        // $exam_status->fullname = $fullname;
        // $exam_status->subject_name = $subject_name;
        // $exam_status->class = $class;
        // $exam_status->section = $section;
        // $exam_status->term = $term;
        // $exam_status->status = 'WRITTEN';

        // $exam_status->save();

        return redirect()->route('exam.finishTheory', ['subject_name' => $subject_name]);
    }

    public function examSubmitBoth(Request $request)
    {
        $mark_correct_obj = $request->input('mark_correct');
        $mark_correct_theory = $request->input('mark_correct_theory');
        $subject_name = $request->input('subject_name');
        $fullname = Auth::user()->fullname;
        $class = Auth::user()->current_class;
        $section = Auth::user()->section;
        $term = Auth::user()->term;

        $option1 = $request->input('option1');
        $option2 = $request->input('option2');
        $option3 = $request->input('option3');
        $option4 = $request->input('option4');

        $input = $request->all();
        $i = 1;
        $count = count($input['question']);
        while($i < $count)
        {
            similar_text($input['correct_answer_theory'][$i], $input['user_answer_theory'][$i], $prec);

            if($prec >= 50 )
            {
                $status = 'CORRECT';
            }
            else{
                $status = 'WRONG ';
            }

           
            $data[] = array(
                'fullname' => $fullname,
                'subject_name' => $subject_name,
                'class' => $class,
                'section' => $section,
                'term' => $term,
                'type_both' => 'Theory',
                'question' => $input['question_theory'][$i],
                'correct_answer' => $input['correct_answer_theory'][$i],
                'user_answer' => $input['user_answer_theory'][$i],
                'status' => $status,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            );

            $i++;
        }

        DB::table('exam_save_states')->insert($data);

        $q = 1;
        $countt = count($input['question']);
        while($q < $countt)
        {
            
            if($input['correct_answer'][$i] == $input['user_answer'][$i])
            {
                $status = 'CORRECT';
            }
            else{
                $status = 'WRONG ';
            }
            $data2[] = array(
                'fullname' => $fullname,
                'subject_name' => $subject_name,
                'class' => $class,
                'section' => $section,
                'term' => $term,
                'type_both' => 'Obj',
                'question' => $input['question'][$i],
                'correct_answer' => $input['correct_answer'][$i],
                'user_answer' => $input['user_answer'][$i],
                'option1' => $option1[$i],
                'option2' => $option2[$i],
                'option3' => $option3[$i],
                'option4' => $option4[$i],
                'status' => $status,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            );

            $q++;
        }        

        DB::table('exam_save_states')->insert($data2);

        $score_obj = DB::table('exam_save_states')->select('subject_name', 'status')->where(            
            ['subject_name' => $subject_name], 
        )
        ->where(
            ['status' => 'CORRECT'],
            ['fullname' => $fullname],           
        )->where(
                ['class' => $class],
                ['section' => $section],
                ['term' => $term],
        )->where(
                ['type_both' => 'Obj']
        )->count();

        $score_obj = $score_obj * $mark_correct_obj;
        
        $score_theory = DB::table('exam_save_states')->select('subject_name', 'status')->where(            
            ['subject_name' => $subject_name], 
        )
        ->where(
            ['status' => 'CORRECT'],
            ['fullname' => $fullname],           
        )->where(
                ['class' => $class],
                ['section' => $section],
                ['term' => $term],
        )->where(
                ['type_both' => 'Theory']
        )->count();

        $score_theory = $score_theory * $mark_correct_theory;     
        
        $real_score = $score_obj + $score_theory;

        $exam_score = new ExamScore;

        $exam_score->fullname = $fullname;
        $exam_score->subject_name = $subject_name;
        $exam_score->class = $class;
        $exam_score->section = $section;
        $exam_score->term = $term;
        $exam_score->score = $real_score;

        $exam_score->save();

        // return 'done';

        return redirect()->route('exam.finishBoth', ['subject_name' => $subject_name]);
    }

    
    public function examFinishObj($subject_name)
    {
        $data = DB::table('exam_save_states')->where(
            ['fullname' => Auth::user()->fullname],
            ['section' => Auth::user()->section]
        )->where(
            ['term' => Auth::user()->term],
            ['class' => Auth::user()->current_class]
        )->where(
            ['subject_name' => $subject_name]
        )->get();

        $result_score = DB::table('exam_scores')->select('score')
        ->where(
            ['fullname' => Auth::user()->fullname],
            ['section' => Auth::user()->section]
        )->where(
            ['term' => Auth::user()->term],
            ['class' => Auth::user()->current_class]
        )->where(
            ['subject_name' => $subject_name]
        )->get();

        return view('user.examFinishObj',[
            'subject_name' => $subject_name,
            'data' => $data,
            'result_score' => $result_score
        ]);
    }


    public function examFinishTheory($subject_name)
    {
        $data = DB::table('exam_save_states')->where(
            ['fullname' => Auth::user()->fullname],
            ['section' => Auth::user()->section]
        )->where(
            ['term' => Auth::user()->term],
            ['class' => Auth::user()->current_class]
        )->where(
            ['subject_name' => $subject_name]
        )->get();

        $result_score = DB::table('exam_scores')->select('score')
        ->where(
            ['fullname' => Auth::user()->fullname],
            ['section' => Auth::user()->section]
        )->where(
            ['term' => Auth::user()->term],
            ['class' => Auth::user()->current_class]
        )->where(
            ['subject_name' => $subject_name]
        )->get();

        return view('user.examFinishTheory', [
            'subject_name' => $subject_name,
            'data' => $data,
            'result_score' => $result_score
        ]);
    }


    public function examFinishBoth($subject_name)
    {
        $data = DB::table('exam_save_states')->where(
            ['fullname' => Auth::user()->fullname],
            ['section' => Auth::user()->section]
        )->where(
            ['term' => Auth::user()->term],
            ['class' => Auth::user()->current_class]
        )->where(
            ['subject_name' => $subject_name]
        )->get();

        $result_score = DB::table('exam_scores')->select('score')
        ->where(
            ['fullname' => Auth::user()->fullname],
            ['section' => Auth::user()->section]
        )->where(
            ['term' => Auth::user()->term],
            ['class' => Auth::user()->current_class]
        )->where(
            ['subject_name' => $subject_name]
        )->get();

        return view('user.examFinishBoth', [
            'subject_name' => $subject_name,
            'data' => $data,
            'result_score' => $result_score
        ]);
    }

    public function resultChecker()
    {
        $section = DB::table('results')->select('section')->distinct()->get();
        $term = DB::table('results')->select('term')->distinct()->get();

        return view('user.resultChecker', [
            'section' => $section,
            'term' => $term
        ]);
    }

    public function resultCheckerView(Request $request)
    {
        $fullname = Auth::user()->fullname;
        $class = Auth::user()->current_class;
        $section = $request->input('section');
        $term = $request->input('term');

        $details = DB::table('results')->where(
            ['fullname' => $fullname],
        )->where(
            ['section' => $section],
        )->where(            
            ['class' => $class]
        )->where(            
            ['term' => $term]
        )->get();

        return view('user.resultCheckerView', [
            'details' => $details
        ]);
    }

    public function assignment()
    {
        $assignment = DB::table('assignment_questions')->where(
            'class', Auth::user()->current_class 
        )->get();

        return view ('user.assignment', [
            'assignment' => $assignment
        ]);
    }

    
}
