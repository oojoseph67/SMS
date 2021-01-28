<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Subject;
use App\User;
use App\Assign;
use App\Invoice;
use App\Material;
use App\Exam;
use App\ExamQuestion;
use App\Assignment;
use App\AssignmentQuestion;

class TeacherPageController extends Controller
{
    public function index(){
        
    }

    public function yourStudent()
    {
        $fullname = Auth::user()->fullname;

        $info = DB::table('assigns')->where(
            'teacher', $fullname
        )->get();

        return view('teacher.subjectStudent', [
            'info' => $info
        ]);

    }

    public function yourStudentProcess(Request $request)
    {
        $details = DB::table('users')->where(
            'role', 'student'
        )->where(
            'school_fees_payment', 'PAID'
        )->where(
            'reg_payment', 'PAID'
        )->where(
            'current_class', $request->input('class')
        )->get();

        return $details;
    }

    public function management()
    {
        $fullname = Auth::user()->fullname;
        $details = DB::table('assigns')->where('teacher', $fullname)->get();
        return view('teacher.management', [
            'details' => $details
        ]);
    }

    public function courseLesson($subject_name, $class)
    {   
        $fullname = Auth::user()->fullname;
        $info = DB::table('assigns')->where(
            'subject_name' , $subject_name
        )->where(
            'classes', $class
        )->where(
            'teacher', $fullname
        )->get();

        $details = DB::table('materials')->where(['subject_name' => $subject_name], ['teacher' => $fullname])->distinct()->get();

        return view('teacher.courseLesson', [
            'info' => $info,
            'details' => $details,
            'subject_name' => $subject_name
        ]);
    }

    public function courseLessonPost(Request $request)
    {
        $course_post = new Material;

        $course_post->subject_name = $request->input('subject_name');
        $course_post->class = $request->input('class');
        $course_post->teacher = $request->input('teacher');
        $course_post->lesson_title = $request->input('title');
        $course_post->lesson_number = $request->input('number');
        $course_post->lesson_note = $request->input('note');

        $course_post->save();

        return back()->withStatus(__('Subject Lesson'. $request->input('title') .'Created'));
    }

    public function courseLessonUpdate(Request $request)
    {
        $course_post = new Material;

        $id = $request->input('id');
        $subject_name = $course_post->subject_name = $request->input('subject_name');
        $class = $course_post->class = $request->input('class');
        $teacher = $course_post->teacher = $request->input('teacher');
        $title = $course_post->lesson_title = $request->input('title');
        $number = $course_post->lesson_number = $request->input('number');
        $note = $course_post->lesson_note = $request->input('note');

        $course_post = DB::table('materials')->where('id', $id)->update(
            [ 'lesson_title' => $title ],
            [ 'lesson_number' => $number ],
            [ 'lesson_note' => $note ],
        );

        return back()->withMessage(__('Update Successfully'));
    }

    public function courseLessonDelete(Request $request)
    {
        $course_material = new Material;

        $id = $request->input('id');
        $subject_name = $request->input('subject_name');
        DB::table('materials')->where('id', $id)->delete();
        return back()->withLesson(__('Lesson'. $request->input('title'). 'Removed Successfully'));
    }

    public function courseMaterial($subject_name, $class)
    {
        $fullname = Auth::user()->fullname;
        $info = DB::table('assigns')->where(
            'subject_name', $subject_name
        )->where(
            'classes', $class
        )->where(
            'teacher', $fullname
        )->get();
        $details = DB::table('materials')->where(['subject_name' => $subject_name], ['teacher' => $fullname])->distinct()->get();
        $data = DB::table('materials')->select('lesson_title', 'lesson_material')->distinct()->get();
        $data3 = DB::table('materials')->where(['subject_name' => $subject_name], ['teacher' => $fullname])->distinct()->get();
        
        return view('teacher.courseMaterial', [
            'details' => $details,
            'info' => $info,
            'data' => $data,
            'data3' => $data3,
            'subject_name' => $subject_name
        ]);
    }

    public function courseMaterialDelete(Request $request)
    {
        $course_material = new Material;

        $id = $request->input('id');
        $subject_name = $request->input('subject_name');
        DB::table('materials')->where('id', $id)->update(['lesson_material' => '']);
        return back()->withMaterial(__('Lesson Material Removed Successfully'));
    }

    public function courseMaterialPost(Request $request)
    {
        $this->validate($request, [
            'material' => ['required', 'mimes:pdf,doc,txt,docx', 'max:10024']
        ]);

        $material = $request->file('material');
        $material_new_name = rand().".".$material->getClientOriginalExtension();
        $material->move(public_path("img/course material"), $material_new_name);

        $course_post = new Material;

        $subject_name = $course_post->subject_name = $request->input('subject_name');
        $class = $course_post->class = $request->input('class');
        $teacher = $course_post->teacher = $request->input('teacher');
        $title = $course_post->lesson_title = $request->input('title');
        $material = $course_post->lesson_material = $material_new_name;
        $material_real_name = $course_post->lesson_material = $request->file('material');

        $course_post = DB::table('materials')->where('lesson_title', $title)->update(
            [ 'lesson_material' => $material ],
            [ 'lesson_material_real_name' => $material_real_name ]
        );
        
        return back()->withStatus(__('Lesson Material Added'));
    }

    public function exam()
    {
        $teacher = Auth::user()->fullname;
        $details = DB::table('assigns')->where('teacher', $teacher)->get();
            
        return view('teacher.exam', [
            'details' => $details,
        ]);
    }

    public function examSetViewPage($subject_name)
    {
        $info = DB::table('assigns')->where('subject_name', $subject_name)->get();
        return view('teacher.examChooseType',[
            'subject_name' => $subject_name,
            'info' => $info
        ]);
    }

    public function examSetViewPageTheory($subject_name)
    {
        $info = DB::table('assigns')->where('subject_name', $subject_name)->get();
        return view('teacher.examSetView',[
            'subject_name' => $subject_name,
            'info' => $info
        ]);
    }

    public function examSetViewPageBoth($subject_name)
    {
        $info = DB::table('assigns')->where('subject_name', $subject_name)->get();
        return view('teacher.examSetViewBoth',[
            'subject_name' => $subject_name,
            'info' => $info
        ]);
    }

    public function examChoose(Request $request)
    {
        $choose = new Exam;

        $type = $request->input('type');
        $subject_name = $request->input('subject_name');
        $teacher = $request->input('teacher');
        $class = $request->input('class');
        $info = DB::table('assigns')->where('subject_name', $subject_name)->get();

        if ($type == 'Obj') {
            return view('teacher.examSetViewObj',[
                'type' => 'Obj',
                'subject_name' => $subject_name,
                'teacher' => $teacher,
                'class' => $class,
                'info' => $info
            ]);
        }
        elseif ($type == 'Theory') {
            return view('teacher.examSetViewTheory',[
                'type' => 'Theory',
                'subject_name' => $subject_name,
                'teacher' => $teacher,
                'class' => $class,
                'info' => $info
            ]);
        }
        elseif ($type == 'Both') {
            return view('teacher.examSetViewBoth',[
                'type' => 'Both',
                'subject_name' => $subject_name,
                'teacher' => $teacher,
                'class' => $class,
                'info' => $info
            ]);
        }

    }

    public function examCreate(Request $request)
    {
        $question = new Exam;

        $subject_name = $question->subject_name = $request->input('subject_name');
        $class = $question->class = $request->input('class');
        $teacher = $question->teacher = $request->input('teacher');
        $type = $question->exam_type = $request->input('type');
        $date = $question->date = $request->input('date');
        $time =  $question->start = $request->input('time_of_exam');
        $length = $question->end = $request->input('length_of_exam');
        $question_right = $question->question_right_mark = $request->input('mark_right');
        $question_wrong = $question->question_wrong_mark = $request->input('mark_wrong'); 


        $question->save();

        $assign = new Assign;

        DB::table('assigns')->where(['subject_name' => $subject_name], ['class' => $class])->update(['exam_status' => 'CREATED']);

        // return view('teacher.examSet',[
        //     'subject_name' => $name,
        // ]);

        if($type == 'Obj')
        {
            return redirect()->route('set.examObj', $subject_name);
        }
        elseif($type == 'Theory')
        {
            return redirect()->route('set.examTheory', $subject_name);
        }
        
    }


    public function examCreateBoth(Request $request)
    {
        $question = new Exam;

        $subject_name = $question->subject_name = $request->input('subject_name');
        $class = $question->class = $request->input('class');
        $teacher = $question->teacher = $request->input('teacher');
        $type = $question->exam_type = $request->input('type');
        $date = $question->date = $request->input('date');
        $time =  $question->start = $request->input('time_of_exam');
        $length = $question->end = $request->input('length_of_exam');
        $question_right_obj = $question->question_right_mark_obj = $request->input('mark_right_obj');
        $question_right_obj_theory = $question->question_right_mark_theory = $request->input('mark_right_theory');


        $question->save();
        

        $assign = new Assign;

        DB::table('assigns')->where(['subject_name' => $subject_name], ['class' => $class])->update(['exam_status' => 'CREATED'], ['exam_type' => 'Both']);

        // return view('teacher.examSet',[
        //     'subject_name' => $name,
        // ]);

        return redirect()->route('set.examBoth', $subject_name);
    }



    public function examSetObj($subject_name)
    {
        $data = DB::table('exams')->where('subject_name', $subject_name)->get();
        $data2 = DB::table('exam_questions')->where('subject_name', $subject_name)->get();
        $data3 = DB::table('exam_questions')->where('subject_name', $subject_name)->get();
        $data4 = DB::table('exam_questions')->where('subject_name', $subject_name)->get();
        return view('teacher.examSet',[
            'subject_name' => $subject_name,
            'data' => $data,
            'data2' => $data2,
            'data3' => $data3,
            'data4' => $data4
        ]);
    }

    public function examSetTheory($subject_name)
    {
        $data = DB::table('exams')->where('subject_name', $subject_name)->get();
        $data2 = DB::table('exam_questions')->where('subject_name', $subject_name)->get();
        $data3 = DB::table('exam_questions')->where('subject_name', $subject_name)->get();
        $data4 = DB::table('exam_questions')->where('subject_name', $subject_name)->get();
        return view('teacher.examSetTheory',[
            'subject_name' => $subject_name,
            'data' => $data,
            'data2' => $data2,
            'data3' => $data3,
            'data4' => $data4
        ]);
    }

    public function examSetBoth($subject_name)
    {
        $data = DB::table('exams')->where('subject_name', $subject_name)->get();
        $exam_details = DB::table('exams')->where('subject_name', $subject_name)->get();
        $data2 = DB::table('exam_questions')->where(['subject_name' => $subject_name])->get();
        $data3 = DB::table('exam_questions')->where('subject_name', $subject_name)->get();
        $data4 = DB::table('exam_questions')->where('subject_name', $subject_name)->get();
        $data5 = DB::table('exam_questions')->where(['subject_name' => $subject_name], ['type_both' => 'Theory'])->get();
        return view('teacher.examSetBoth',[
            'subject_name' => $subject_name,
            'data' => $data,
            'data2' => $data2,
            'data3' => $data3,
            'data4' => $data4,
            'data5' => $data5,
            'exam_details' => $exam_details
        ]);
    }

    public function examView($subject_name)
    {
        $data = DB::table('exams')->where('subject_name', $subject_name)->get();
        $data2 = DB::table('exam_questions')->where('subject_name', $subject_name)->get();
        $data3 = DB::table('exam_questions')->where('subject_name', $subject_name)->get();
        $data4 = DB::table('exam_questions')->where('subject_name', $subject_name)->get();
        return view('teacher.examSet',[
            'subject_name' => $subject_name,
            'data' => $data,
            'data2' => $data2,
            'data3' => $data3,
            'data4' => $data4
        ]);
    }

    public function examViewTheory($subject_name)
    {
        $data = DB::table('exams')->where('subject_name', $subject_name)->get();
        $data2 = DB::table('exam_questions')->where('subject_name', $subject_name)->get();
        $data3 = DB::table('exam_questions')->where('subject_name', $subject_name)->get();
        $data4 = DB::table('exam_questions')->where('subject_name', $subject_name)->get();
        return view('teacher.examSetTheory',[
            'subject_name' => $subject_name,
            'data' => $data,
            'data2' => $data2,
            'data3' => $data3,
            'data4' => $data4
        ]);
    }


    public function examViewBoth($subject_name)
    {
        $data = DB::table('exams')->where('subject_name', $subject_name)->get();
        $exam_details = DB::table('exams')->where('subject_name', $subject_name)->get();
        $data2 = DB::table('exam_questions')->where('subject_name', $subject_name)->get();
        $data3 = DB::table('exam_questions')->where('subject_name', $subject_name)->get();
        $data4 = DB::table('exam_questions')->where('subject_name', $subject_name)->get();
        $data5 = DB::table('exam_questions')->where('subject_name', $subject_name)->get();
        return view('teacher.examSetBoth',[
            'subject_name' => $subject_name,
            'data' => $data,
            'data2' => $data2,
            'data3' => $data3,
            'data4' => $data4,
            'data5' => $data5,
            'exam_details' => $exam_details
        ]);
    }

    public function examAction(Request $request)
    {
        
        $question = new ExamQuestion;

        $question->subject_name = $request->input('subject_name');
        $question->class = $request->input('class');
        $question->teacher = $request->input('teacher');
        $question->exam_type = $request->input('type');
        $question->date = $request->input('date');
        $question->start = $request->input('time_of_exam');
        $question->end = $request->input('length_of_exam');
        $question->question_right_mark = $request->input('mark_right');
        $question->question_wrong_mark = $request->input('mark_wrong'); 

        $question->question = $request->input('question');
        $question->option1 = $request->input('option1');
        $question->option2 = $request->input('option2');
        $question->option3 = $request->input('option3');
        $question->option4 = $request->input('option4');
        $question->answer = $request->input('answer');

        $question->section = Auth::user()->section;
        $question->term = Auth::user()->term;

        $question->save();

        return back()->withStatus(__('Exam Question Add'));
    }


    public function examActionTheory(Request $request)
    {
        
        $question = new ExamQuestion;

        $question->subject_name = $request->input('subject_name');
        $question->class = $request->input('class');
        $question->teacher = $request->input('teacher');
        $question->exam_type = $request->input('type');
        $question->date = $request->input('date');
        $question->start = $request->input('time_of_exam');
        $question->end = $request->input('length_of_exam');
        $question->question_right_mark = $request->input('mark_right');
        $question->question_wrong_mark = $request->input('mark_wrong'); 

        $question->question = $request->input('question');
        $question->answer = $request->input('answer');

        $question->section = Auth::user()->section;
        $question->term = Auth::user()->term;

        $question->save();

        return back()->withStatus(__('Exam Question Add'));
    }

    public function examActionBoth(Request $request)
    {

        $question = new ExamQuestion;

        $question->subject_name = $request->input('subject_name');
        $question->class = $request->input('class');
        $question->teacher = $request->input('teacher');
        $question->exam_type = $request->input('type');
        $question->type_both = $request->input('both_type');
        $question->date = $request->input('date');
        $question->start = $request->input('time_of_exam');
        $question->end = $request->input('length_of_exam');
        $question->question_right_mark_obj = $request->input('mark_right_obj');
        $question->question_wrong_mark_obj = $request->input('mark_wrong_obj'); 
        $question->question_right_mark_theory = $request->input('mark_right_theory');
        $question->question_wrong_mark_theory = $request->input('mark_wrong_theory'); 

        $question->question = $request->input('question');
        $question->option1 = $request->input('option1');
        $question->option2 = $request->input('option2');
        $question->option3 = $request->input('option3');
        $question->option4 = $request->input('option4');
        $question->answer = $request->input('answer');

        $question->section = Auth::user()->section;
        $question->term = Auth::user()->term;

        $question->save();

        return back()->withStatus(__('Exam Question Add'));
    }

    public function examUpdate(Request $request)
    {
        $question = new ExamQuestion;

        $id = $request->input('id');

        // $question->subject_name = $request->input('subject_name');
        // $question->class = $request->input('class');
        // $question->teacher = $request->input('teacher');
        // $question->exam_type = $request->input('type');
        // $question->date = $request->input('date');
        // $question->start = $request->input('time_of_exam');
        // $question->end = $request->input('length_of_exam');
        // $question->question_right_mark = $request->input('mark_right');
        // $question->question_wrong_mark = $request->input('mark_wrong'); 

        $question_input = $question->question = $request->input('question');
        $option1 = $question->option1 = $request->input('option1');
        $option2 = $question->option2 = $request->input('option2');
        $option3 = $question->option3 = $request->input('option3');
        $option4 = $question->option4 = $request->input('option4');
        $answer = $question->answer = $request->input('answer');

        $question = DB::table('exam_questions')->where('id', $id)->update(
            ['question' => $question_input,
             'option1' => $option1,
             'option2' => $option2,
             'option3' => $option3,
             'option4' => $option4,
             'answer' => $answer,
            ]
        );

        return back()->withUpdate(__('Question Updated Successfully'));
    }

    public function examDelete(Request $request)
    {
        $details = new ExamQuestion;

        $id = $request->input('id');
        DB::table('exam_questions')->where('id', $id)->delete();
        return back()->withSuccess(__('Question Deleted Successfully'));
    }

    public function examDeleteTheory(Request $request)
    {
        $details = new ExamQuestion;

        $id = $request->input('id');
        DB::table('exam_questions')->where('id', $id)->delete();
        return back()->withSuccess(__('Question Deleted Successfully'));
    }

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

    public function assignment()
    {
        $fullname = Auth::user()->fullname;
        $details = DB::table('assigns')->where('teacher', $fullname)->get();
        return view('teacher.assignment',[
            'details' => $details
        ]);
    }

    public function assignmentCreateView($subject_name)
    {
        $info = DB::table('assigns')->where('subject_name', $subject_name)->get();

        return view('teacher.assignmentCreate',[
            'subject_name' => $subject_name,
            'info' => $info
        ]);
    }

    public function assignmentCreate(Request $request)
    {
        $assignment = new Assignment;

        $subject_name = $assignment->subject_name = $request->input('subject_name');
        $assignment->teacher = $request->input('teacher');
        $assignment->class = $request->input('class');
        $assignment->date = $request->input('date');

        $assignment->save();

        $info = DB::table('assigns')->where('subject_name', $subject_name)->get();
        $details = DB::table('assignment_questions')->where('subject_name', $subject_name)->get();
        // return view('teacher.assignmentView',[
        //     'details' => $details,
        //     'info' => $info,
        //     'subject_name' => $subject_name
        // ]);
        DB::table('assigns')->where(['subject_name' => $subject_name], ['class' => $$request->input('class')])->update(['assignment_status' => 'CREATED']);

        return route('/assignment/view/{{$subject_name}}');

    }

    public function assignmentView($subject_name, $class)
    {
        $fullname = Auth::user()->fullname;

        $info = DB::table('assigns')->where(
            'subject_name', $subject_name
        )->where(
            'classes', $class
        )->where(
            'teacher', $fullname
        )->get();

        $details = DB::table('assignment_questions')->where('subject_name', $subject_name)->get();
        
        return view('teacher.assignmentView',[
            'details' => $details,
            'info' => $info,
            'subject_name' => $subject_name
        ]);
    }

    public function assignmentMake(Request $request)
    {
        $question = new AssignmentQuestion;

        $subject_name = $question->subject_name = $request->input('subject_name');
        $class = $question->class = $request->input('class');
        $question->question = $request->input('question');
        $question->answer = $request->input('answer');
        $teacher = $question->teacher = $request->input('teacher');       

        $question->save();

        return back()->withAssignment(__('Assignment created'));
    }

    public function assignmentDelete(Request $request)
    {
        $details = new AssignmentQuestion;

        $id = $request->input('id');
        DB::table('assignment_questions')->where('id', $id)->delete();
        return back()->withSuccess(__('Question Deleted Successfully'));
    }

    public function assignmentEdit(Request $request)
    {
        $question = new AssignmentQuestion;

        $id = $request->input('id');

        // $question->subject_name = $request->input('subject_name');
        // $question->class = $request->input('class');
        // $question->teacher = $request->input('teacher');
        // $question->exam_type = $request->input('type');
        // $question->date = $request->input('date');
        // $question->start = $request->input('time_of_exam');
        // $question->end = $request->input('length_of_exam');
        // $question->question_right_mark = $request->input('mark_right');
        // $question->question_wrong_mark = $request->input('mark_wrong'); 

        $question_input = $question->question = $request->input('question');
        $answer = $question->answer = $request->input('answer');

        $question = DB::table('assignment_questions')->where('id', $id)->update(
            ['question' => $question_input,
             'answer' => $answer,
            ]
        );

        return back()->withUpdate(__('Question Updated Successfully'));
    }

    public function resultCalculator()
    {
        return view('teacher.resultCalculator',[
            
        ]);
    }

}
