<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use App\Subject;
use App\User;
use App\Assign;
use App\Invoice;
use App\Result;
use App\TestScore;
use App\AssignmentScore;
use App\ExamScore;
use App\ResultAverage;
use App\TimeTable;

class AdminPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }

    public function admission()
    {
        $details = DB::table('users')->where(
            ['admission_status' => 'NOTGIVEN'],
            ['role' => 'STUDENT']
        )->get();
        return view('admin.admission',[
            'details' => $details
        ]);
    }

    public function admissionAccept(Request $request)
    {
        $id = $request->input('id');
        $student_id = $request->input('student_id');
        $fullname = $request->input('fullname');
        $section = $request->input('section');
        $term = $request->input('term');

        DB::table('users')->where(['id' => $id], ['fullname' => $fullname])->update(
            ['section' => $section,
            'term' => $term,
            'admission_status' => 'GIVEN']
        );

        return back()->withStatus(__('Admission given to '. $fullname. ' with student id '. $student_id));
    }

    public function admissionReject(Request $request)
    {
        $id = $request->input('id');
        $fullname = $request->input('fullname');

        DB::table('users')->where('id', $id)->delete();
        return back()->withStatus(__('Admission rejected for '. $fullname. ' and therefore profile has been deleted'));
    }

    public function viewStudents()
    {
        $viewStudents = DB::table('users')->where('role', 'STUDENT')->get();
        return view('admin.viewStudents',[
            'students' => $viewStudents,          
        ]);
    }

    public function viewTeachers()
    {
        $viewTeachers = DB::table('users')->where('role', 'TEACHER')->get();
        return view('admin.viewTeachers',[
            'teachers' => $viewTeachers,          
        ]);
    }


    public function viewSubjects()
    {
        $viewSubjects = DB::table('subjects')->get();
        return view('admin.viewSubjects',[
            'subjects' => $viewSubjects,          
        ]);
    }



    public function createSubject(Request $request){

        // $this->validate($request,[
        //     'subject_name' => ['required'],
        //     'class' => ['required']
        // ]); 

        $subject_name_input = $request->input('subject_name');
        $class_input = $request->input('class');

        $status = DB::table('subjects')->select('subject_name')->where('subject_name', $subject_name_input)->get();
        $status_class = DB::table('subjects')->select('class')->where('class', $class_input)->get();

        //return $status.$status_class;

       
        if ($status == $subject_name_input && $status_class == $class_input) {
            return back()->withExsist(__('Subject With The Same Class Already Exsist'));
        }
        else {
            
            $subject = new Subject; // a create valuable and the name of the model linking to that particaler table
            $subject->subject_name = $subject_name_input;
            $subject->class = $class_input;

            $subject->save();

            return back()->withStatus(__('Subject Created'));
        }          
    }    

    public function singleStudent($id){
        $single = DB::table('users')->where('id', $id)->first();
        return view('admin.singleStudent', [
            'info' =>$single
        ]);
    }

    public function singleTeacher($id){
        $single = DB::table('users')->where('id', $id)->first();
        return view('admin.singleTeacher', [
            'info' =>$single
        ]);
    }

    public function assign()
    {
        $viewSubjects = DB::table('subjects')->get();
        $viewTeachers = DB::table('users')->where('role', 'TEACHER')->get();
        return view('admin.assign',[
            'teachers' => $viewTeachers,   
            'subjects' => $viewSubjects,       
        ]);
    }

    
    public function assignTeacher(Request $request)
    {
        $this->validate($request,[
            'subject' => ['required'],
            'class' => ['required'],
            'teacher' => ['required']
        ]);

        $assign = new Assign;
        $assign->subject_name = $request->input('subject');
        $assign->classes = $request->input('class');
        $assign->teacher = $request->input('teacher');

        $assign->save();

        return back()->withStatus(__('Assigment Done'));
    }


    public function teacherAssignView()
    {
        $teacher_assign = DB::table('assigns')->get();
        return view('admin.assignView', [
            'assign' => $teacher_assign
        ]);
    }

    public function invoicePrintSchool($fullname)
    {
        $section = Auth::user()->section;
        $term = Auth::user()->term;

        $invoice = DB::table('invoices')->where(['fullname' => $fullname], ['section' => $section], ['term' => $term])->where(['fee_type' => 'SCHOOLFEES'])->get();
        return view('admin.invoiceSchool', [
            'invoice' => $invoice,
        ]);
    }


    public function invoicePrintPTA($fullname)
    {
        $section = Auth::user()->section;
        $term = Auth::user()->term;

        $invoice = DB::table('invoices')->where(['fullname' => $fullname], ['section' => $section], ['term' => $term])->where(['fee_type' => 'PTAFEES'])->get();
        return view('admin.invoicePTA', [
            'invoice' => $invoice,
        ]);
    }
    
    public function invoicePrintReg($fullname)
    {
        $section = Auth::user()->section;
        $term = Auth::user()->term;

        $invoice = DB::table('invoices')->where(['fullname' => $fullname], ['section' => $section], ['term' => $term])->where(['fee_type' => 'REGFEES'])->get();
        return view('admin.invoiceReg', [
            'invoice' => $invoice,
        ]);
    }

    public function invoicePrintLesson($fullname)
    {
        $section = Auth::user()->section;
        $term = Auth::user()->term;

        $invoice = DB::table('invoices')->where(['fullname' => $fullname], ['section' => $section], ['term' => $term])->where(['fee_type' => 'LESSONFEES'])->get();
        return view('admin.invoiceLesson', [
            'invoice' => $invoice,
        ]);
    }

    public function viewPaidFee()
    {
        $status = DB::table('users')->get()->where('school_fees_payment', 'PAID')->where('role', 'STUDENT');
        return view('admin.viewFee', [
            'status' => $status
        ]);
    }

    public function viewUnpaidFee()
    {
        $status = DB::table('users')->get()->where('school_fees_payment', 'NOTPAID')->where('role', 'STUDENT');
        return view('admin.viewFeeUnpaid', [
            'status' => $status
        ]);
    }

    public function viewPaidPtaFee()
    {
        $status = DB::table('users')->get()->where('pta_fees_payment', 'PAID')->where('role', 'STUDENT');
        return view('admin.viewPtaFee', [
            'status' => $status
        ]);
    }

    public function viewUnpaidPtaFee()
    {
        $status = DB::table('users')->get()->where('pta_fees_payment', 'NOTPAID')->where('role', 'STUDENT');
        return view('admin.viewPtaFeeUnpaid', [
            'status' => $status
        ]);
    }

    public function viewPaidLessonFee()
    {
        $status = DB::table('users')->get()->where('lesson_fees_payment', 'PAID')->where('role', 'STUDENT');
        return view('admin.viewLessonFee', [
            'status' => $status
        ]);
    }

    public function viewUnpaidLessonFee()
    {
        $status = DB::table('users')->get()->where('lesson_fees_payment', 'NOTPAID')->where('role', 'STUDENT');
        return view('admin.viewLessonFeeUnpaid', [
            'status' => $status
        ]);
    }

    public function viewPaidRegFee()
    {
        $status = DB::table('users')->get()->where('reg_payment', 'PAID')->where('role', 'STUDENT');
        return view('admin.viewRegFee', [
            'status' => $status
        ]);
    }

    public function viewUnpaidRegFee()
    {
        $status = DB::table('users')->get()->where('reg_payment', 'NOTPAID')->where('role', 'STUDENT');
        return view('admin.viewRegFeeUnpaid', [
            'status' => $status
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $fullname = $request->input('fullname');
        $email = $request->input('email');
        $dob = $request->input('dob');
        $gender = $request->input('gender');
        $guardian_name = $request->input('guardian_name');
        $guardian_email = $request->input('guardian_email');
        $guardian_phoneNumber = $request->input('guardian_phoneNumber');

        $passport = $request->file('passport');
        $passport_new_name = rand().".".$passport->getClientOriginalExtension();
        $passport->move(public_path("img/profile_pic"), $passport_new_name);

        $update = User::find($id);
        DB::table('users')->where('id', $id)->update(
            [
                'fullname' => $fullname,
                'email' => $email,
                'dob' => $dob,
                'gender' => $gender,
                'guardian_name' => $guardian_name,
                'guardian_email' => $guardian_email,
                'guardian_phoneNumber' => $guardian_phoneNumber,
                'profile_pic' => $passport_new_name,
            ]
        );
        return back()->withStatus(__('Profile successfully updated.'));
    }


    public function updateTeacher(Request $request)
    {
        $id = $request->input('id');
        $fullname = $request->input('fullname');
        $email = $request->input('email');
        $dob = $request->input('dob');
        $gender = $request->input('gender');
        $guardian_name = $request->input('guardian_name');
        $guardian_email = $request->input('guardian_email');
        $guardian_phoneNumber = $request->input('guardian_phoneNumber');

        $passport = $request->file('passport');
        $passport_new_name = rand().".".$passport->getClientOriginalExtension();
        $passport->move(public_path("img/profile_pic"), $passport_new_name);

        $update = User::find($id);
        DB::table('users')->where('id', $id)->update(
            [
                'fullname' => $fullname,
                'email' => $email,
                'dob' => $dob,
                'gender' => $gender,
                'guardian_name' => $guardian_name,
                'guardian_email' => $guardian_email,
                'guardian_phoneNumber' => $guardian_phoneNumber,
                'profile_pic' => $passport_new_name,
            ]
        );
        return back()->withStatus(__('Profile successfully updated.'));
    }
    

    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return back()->withStatus(__('Profile successfully deleted.'));
    }


    public function destroySubject($id)
    {
        DB::table('subjects')->delete(['id' => $id]);
        return back()->withStatus(__('Subject successfully deleted.'));
    }


    public function destroyAssign($id)
    {
        DB::table('assigns')->delete(['id' => $id]);
        return back()->withStatus(__('Tab successfully deleted.'));
    }

    public function result()
    {   
        
        // $data = DB::table('subjects')->select('section')->distinct()->get();
        // $data2 = DB::table('subjects')->select('term')->distinct()->get();
        // $data3 = DB::table('subjects')->select('class')->distinct()->get();
        
        $data = DB::table('results')->select('section')->distinct()->get();
        $data2 = DB::table('results')->select('term')->distinct()->get();
        $data3 = DB::table('results')->select('class')->distinct()->get();

        return view('admin.result',[
            'data' => $data,
            'data2' => $data2,
            'data3' => $data3
        ]);
    }

    public function resultCalculate(Request $request)
    {
        $section = $request->input('section');
        $term = $request->input('term');

        $exam = DB::table('exam_scores')->where(['section' => $section], ['term' => $term])->get();
        foreach($exam as $exam){
            
            $result = new Result;

            $student = $exam->fullname;
            $subject = $exam->subject_name;
            $class = $exam->class;
            $section = $exam->section;
            $term = $exam->term;
            $exam_score = $exam->score;

            $result->fullname = $student;
            $result->subject_name = $subject;
            $result->class = $class;
            $result->section = $section;
            $result->term = $term;
            $result->exam_score = $exam_score;

            $result->save();

            $test = DB::table('test_scores')->where(['fullname' => $student], ['section' => $section], ['term' => $term])->get();
            foreach($test as $test)
            {
                $result = new Result;

                $student = $test->fullname;
                $subject = $test->subject_name;
                $class = $test->class;
                $section = $test->section;
                $term = $test->term;
                $test_score = $test->score;

                // $result->fullname = $student;
                // $result->subject = $subject;
                // $result->class = $class;
                // $result->section = $section;
                // $result->term = $term;
                // $result->term_score = $term_score;

                DB::table('results')->where(['fullname' => $student], ['section' => $section], ['term' => $term])->update(
                    ['test_score' => $test_score],
                );

                $assignment = DB::table('assignment_scores')->where(['fullname' => $student], ['section' => $section], ['term' => $term])->get();
                foreach($assignment as $assignment)
                {
                    $result = new Result;

                    $student = $assignment->fullname;
                    $subject = $assignment->subject_name;
                    $class = $assignment->class;
                    $section = $assignment->section;
                    $term = $assignment->term;
                    $assignment_score = $assignment->score;

                    // $result->fullname = $student;
                    // $result->subject = $subject;
                    // $result->class = $class;
                    // $result->section = $section;
                    // $result->term = $term;
                    // $result->assignment_score = $assignment_score;

                    DB::table('results')->where(['fullname' => $student], ['section' => $section], ['term' => $term])->update(
                        ['assignment_score' => $assignment_score],
                    );

                    //FOR ATTENDANCE CALCULATOR

                    // $attendance = DB::table('attendances')->where(['fullname' => $student], ['section' => $section], ['term' => $term])->get();
                    // foreach($attendance as $attendance){
                    //     $result = new Result;

                    //     $student = $attendance->fullname;
                    //     $subject = $attendance->subject_name;
                    //     $class = $attendance->class;
                    //     $section = $attendance->section;
                    //     $term = $attendance->term;
                    //     $status = $attendance->status;
                    //     $day = $attendance->day;

                    //     DB::table('results')->where(['fullname' => $student], ['section' => $section], ['term' => $term])->update(
                    //         ['attendance_score' => $something],
                    //     );
                    // }
                }

            }
        }

        $section = $request->input('section');
        $term = $request->input('term');

        $calculate = DB::table('results')->where(['section' => $section], ['term' => $term])->get();
        foreach($calculate as $calculate){
            $result = new Result;

            $student = $calculate->fullname;
            $subject = $calculate->subject_name;
            $class = $calculate->class;
            $section = $calculate->section;
            $term = $calculate->term;
            $exam_score = $calculate->exam_score;
            $test_score = $calculate->test_score;
            $assignment_score = $calculate->assignment_score;

            $total_score = $exam_score + $test_score + $assignment_score;
            
            DB::table('results')->where(['fullname' => $student], ['section' => $section], ['term' => $term])->update(
                ['total_score' => $total_score],
            );

           
            
            // $input = new ResultAverage;

            // $input->fullname = $student;
            // $input->section = $section;
            // $input->term = $term;
            // $input->average = $average;
            // $input->save();
            
        }


        $average = DB::table('results')->select('total_score')->where(['fullname' => $student], ['section' => $section], ['term' => $term])->avg('total_score');
        // return $average;
    
        return back()->withStatus(__('Result for '. $section .' and '. $term.' term has been created'));

    }

    public function checkResult(Request $request)
    {
        $class = $request->input('class');
        $section = $request->input('section');
        $term = $request->input('term');

        $result = DB::table('users')->where(
            'current_class', $class
        )->where(
            'section' , $section 
        )->where(
            'term' , $term
        )->distinct(
            'section'
        )->get();
        return view('admin.resultView',[
            'result' => $result
        ]);
    }

    public function resultSingle($fullname){

        $section = Auth::user()->section;
        $term = Auth::user()->user;
        
        
        $details = DB::table('results')->where(
           'fullname' , $fullname
        )->where(
            'section' , $section
        )->get();

        return view('admin.resultShow',[
            'details' => $details,
            'fullname' => $fullname
        ]);
    }

    public function calenderUpdateTermAction(Request $request)
    {
        $input_password = $request->input('password');
        $user_password = auth()->user()->password;

        if(Hash::check($input_password, $user_password))
        {

            $term = $request->input('term');
            $section = Auth::user()->section;
            DB::table('users')->where('section', $section)->update(
                ['term' => $term,
                 'school_fees_payment' => 'NOTPAID',
                 'pta_fees_payment' => 'NOTPAID',
                 'lesson_fees_payment' => 'NOTPAID',
                ]
            );

            return back()->withTerm(__('The new term for '.$section.' section is '.$term));
        }
        else{
            return back()->withPassword(__('Update failed.... Not Admin[wrong password]'));
        }
    }

    public function calenderUpdateSection()
    {
        $section = Auth::user()->section;
        $jss1 = DB::table('promotions')->where(['class' => 'JSS1'])->where(['section' => $section])->get();
        $jss2 = DB::table('promotions')->where(['class' => 'JSS2'])->where(['section' => $section])->get();
        $jss3 = DB::table('promotions')->where(['class' => 'JSS3'])->where(['section' => $section])->get();
        $ss1 = DB::table('promotions')->where(['class' => 'SS1'])->where(['section' => $section])->get();
        $ss2 = DB::table('promotions')->where(['class' => 'SS2'])->where(['section' => $section])->get();
        $ss3 = DB::table('promotions')->where(['class' => 'SS3'])->where(['section' => $section])->get();
       // $done = DB::table('promotions')->where(['promotion_status' => 'DONE'])->where(['section' => $section])->exisit(all());
        return view('admin.calenderUpdate',[
            'jss1' => $jss1,
            'jss2' => $jss2,
            'jss3' => $jss3,
            'ss1' => $ss1,
            'ss2' => $ss2,
            'ss3' => $ss3,
           // 'done' => $done,
        ]);
    }

    public function updateCalender(Request $request)
    {
        $current_section = Auth::user()->section;
        $current_term = Auth::user()->term;
        

        $input_password = $request->input('password');
        $user_password = auth()->user()->password;

        if(Hash::check($input_password, $user_password))
        {                
            $section = $request->input('section');

            if($current_section == $section)
            {
                return back()->withSection(__('section already exisit'));
            }
            else{

                DB::table('users')->update(
                    ['section' => $section,
                    'term' => '1st',
                    'school_fees_payment' => 'NOTPAID',
                    'pta_fees_payment' => 'NOTPAID',
                    'lesson_fees_payment' => 'NOTPAID',
                    ]
                );    
                DB::table('promotions')->update(
                    ['section' => $section,
                    'promotion_status' => 'NOTYET'
                    ]
                );     

                return back()->withStatus(__('Now that we are done with section update... promote the student'));
            }
            
        }
        else{
            return back()->withPassword(__('Update failed.... Not Admin[wrong password]'));
        }
        
    }


    public function promoteJSS1(Request $request)
    {
                DB::table('users')->where('current_class', 'JSS1')->update(
                    ['current_class' => 'JSS2',
                     'promotion_class' => 'JSS2'
                    ]
                );
           
        DB::table('promotions')->where('class', 'JSS1')->update(
            ['promotion_status' => 'DONE']
        );

       

        return back()->withJssone(__('The promotion for jss1 was successfully'));
       
    }

    public function promoteJSS2(Request $request)
    {
                DB::table('users')->where('current_class', 'JSS2')->update(
                    ['current_class' => 'JSS3',
                     'promotion_class' => 'JSS3'
                    ]
                );


        DB::table('promotions')->where('class', 'JSS2')->update(
            ['promotion_status' => 'DONE']
        );

       

        return back()->withJssone(__('The promotion for jss2 was successfully'));
       
    }


    public function promoteJSS3(Request $request)
    {
                DB::table('users')->where('current_class', 'JSS3')->update(
                    ['current_class' => 'SS1',
                     'promotion_class' => 'SS1'
                    ]
                );
          

        DB::table('promotions')->where('class', 'JSS3')->update(
            ['promotion_status' => 'DONE']
        );

       

        return back()->withJssone(__('The promotion for jss3 was successfully'));
       
    }


    public function promoteSS1(Request $request)
    {
       
                DB::table('users')->where('current_class', 'SS1')->update(
                    ['current_class' => 'SS2',
                     'promotion_class' => 'SS2'
                    ]
                );
          

        DB::table('promotions')->where('class', 'SS1')->update(
            ['promotion_status' => 'DONE']
        );

       

        return back()->withJssone(__('The promotion for SS1 was successfully'));
       
    }


    public function promoteSS2(Request $request)
    {
        
                DB::table('users')->where('current_class', 'SS2')->update(
                    ['current_class' => 'SS3',
                     'promotion_class' => 'SS3'
                    ]
                );
         

        DB::table('promotions')->where('class', 'SS2')->update(
            ['promotion_status' => 'DONE']
        );

       

        return back()->withJssone(__('The promotion for ss2 was successfully'));
       
    }


    public function promoteSS3(Request $request)
    {
                DB::table('users')->where('current_class', 'SS3')->update(
                    ['current_class' => 'FINISH',
                     'promotion_class' => 'FINISH'
                    ]
                );                

        DB::table('promotions')->where('class', 'SS3')->update(
            ['promotion_status' => 'DONE']
        );

       

        return back()->withJssone(__('The promotion for ss3 was successfully'));
       
    }

    public function timetable()
    {
        $sectio = Auth::user()->section;
        $term = Auth::user()->term;
        $class = Auth::user()->current_class;

        $info = DB::table('assigns')->get();

        $data = DB::table('time_tables')->get();

        return view('admin.timetable',[
            'data' => $data,
            'info' => $info,
        ]);
    }

    public function timetableEdit(Request $request)
    {
        $class = $request->input('class');

        $first = $request->input('first');
        $second = $request->input('second');
        $third = $request->input('third');
        $four = $request->input('four');
        $five = $request->input('five');
        $six = $request->input('six');
        $seven = $request->input('seven');
        $eight = $request->input('eight');

        DB::table('time_tables')->where(
            'class' , $class
        )->update(
            [
                'first_period' => $first,
                'second_period' => $second,
                'third_period' => $third,
                'fourth_period' => $four,
                'fifth_period' => $five,
                'sixth_period' => $six,
                'seventh_period' => $seven,
                'eight_period' => $eight
            ]
            );

        return back()->withStatus(__('Timetable for '.$class.' was successfully updated'));
    }
    

}
// auth()->user()->update($request->all());

// return back()->withStatus(__('Profile successfully updated.'));


//      $section = $request->input('section');
        //     DB::table('users')->update(
        //         ['section' => $section,
        //          'term' => '1st'
        //         ]
        //     );