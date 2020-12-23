<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();


// Route::group(['middleware' => ['auth'], 'prefix' => '/'], function () {
//     Route::get('{first}/{second}/{third}', 'RoutingController@thirdLevel')->name('third');
//     Route::get('{first}/{second}', 'RoutingController@secondLevel')->name('second');
//     Route::get('{any}', 'RoutingController@root')->name('any');
//     Route::get('unpaid', 'TestPageController@index')->name('unpaid');
// });

// landing
Route::get('', 'RoutingController@index')->name('index');

Route::get('/unpaid', 'TestPageController@unpaid')->name('unpaid');


Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
	Route::view('/', 'admin.home')->name('admin.home');
	Route::get('/admission', 'AdminPageController@admission')->name('admission.give');
	Route::get('/admission/accept', 'AdminPageController@admissionAccept')->name('admission.accept');
	Route::get('/admission/reject', 'AdminPageController@admissionReject')->name('admission.reject');	
	Route::get('/viewStudents', 'AdminPageController@viewStudents')->name('view.students');
	Route::get('/view/subjects', 'AdminPageController@viewSubjects')->name('view.subjects');
	Route::get('/viewTeachers', 'AdminPageController@viewTeachers')->name('view.teachers');
	Route::view('/createPage', 'admin.createSubject')->name('createPage');
	Route::get('/createSubject', 'AdminPageController@createSubject')->name('create.subject');
	Route::get('/single/{id}', 'AdminPageController@singleStudent')->name('single.student');
	Route::post('/update/student', 'AdminPageController@update')->name('update.student');
	Route::post('/update/teacher', 'AdminPageController@updateTeacher')->name('update.teacher');
	Route::get('/single/teacher/{id}', 'AdminPageController@singleTeacher')->name('single.teacher');
	Route::get('/delete/{id}', 'AdminPageController@destroy')->name('destroy');
	Route::get('/delete/subject/{id}', 'AdminPageController@destroySubject')->name('destroy.subject');
	Route::get('/delete/assign/{id}', 'AdminPageController@destroyAssign')->name('destroy.assign');
	Route::get('/assign', 'AdminPageController@assign')->name('assign');
	Route::get('/assignteacher', 'AdminPageController@assignTeacher')->name('assignteacher');
	Route::get('/assign/teacher', 'AdminPageController@teacherAssignView')->name('teacher.assign');
	Route::get('/view/schoolfees', 'AdminPageController@viewSchoolFees')->name('view.schoolfees');
    Route::get('/view/ptafees', 'AdminPageController@viewPtaFees')->name('view.ptafees');
	Route::get('/schoolfees/paid', 'AdminPageController@viewPaidSchoolFee')->name('view.paidSchoolFee');
	Route::get('/schoolfees/unpaid', 'AdminPageController@viewUnpaidSchoolFee')->name('view.unpaidSchoolFee');
	Route::get('/ptafees/paid', 'AdminPageController@viewPaidPtaFee')->name('view.paidPtaFee');
	Route::get('/ptafees/unpaid', 'AdminPageController@viewUnpaidPtaFee')->name('view.unpaidPtaFee');
	Route::get('/lessonfees/paid', 'AdminPageController@viewPaidLessonFee')->name('view.paidLessonFee');
	Route::get('/lessonfees/unpaid', 'AdminPageController@viewUnpaidLessonFee')->name('view.unpaidLessonFee');
	Route::get('/regfees/paid', 'AdminPageController@viewPaidRegFee')->name('view.paidRegFee');
	Route::get('/regfees/unpaid', 'AdminPageController@viewUnpaidRegFee')->name('view.unpaidRegFee');
	Route::get('/invoice/print/school/{fullname}', 'AdminPageController@invoicePrintSchool');	
	Route::get('/invoice/print/pta/{fullname}', 'AdminPageController@invoicePrintPTA');	
	Route::get('/invoice/print/reg/{fullname}', 'AdminPageController@invoicePrintReg');	
	Route::get('/invoice/print/lesson/{fullname}', 'AdminPageController@invoicePrintLesson');	
	Route::get('/result', 'AdminPageController@result')->name('result');
	Route::view('/result/calculator', 'admin.resultCalculator')->name('result.calculator');
	Route::get('/result/calculate', 'AdminPageController@resultCalculate')->name('calculate.result');
	Route::get('/check/result', 'AdminPageController@checkResult')->name('check.result');
	Route::get('/result/single/{fullname}', 'AdminPageController@resultSingle')->name('result.single');
	Route::view('/calender', 'admin.calender')->name('calender');
	Route::view('/calender/update/term', 'admin.calenderUpdateTerm')->name('calender.updateTerm');
	Route::get('/calender/update', 'AdminPageController@calenderUpdateTermAction')->name('calender.updateTermAction');
	Route::get('/calender/update/section', 'AdminPageController@calenderUpdateSection')->name('calender.updateSection');
	Route::get('/update/calender', 'AdminPageController@updateCalender')->name('update.calender');
	Route::get('/promote/jss1', 'AdminPageController@promoteJSS1')->name('promote.jss1');
	Route::get('/promote/jss2', 'AdminPageController@promoteJSS2')->name('promote.jss2');
	Route::get('/promote/jss3', 'AdminPageController@promoteJSS3')->name('promote.jss3');
	Route::get('/promote/ss1', 'AdminPageController@promoteSS1')->name('promote.ss1');
	Route::get('/promote/ss2', 'AdminPageController@promoteSS2')->name('promote.ss2');
	Route::get('/promote/ss3', 'AdminPageController@promoteSS3')->name('promote.ss3');
	Route::get('/timetable', 'AdminPageController@timetable')->name('timetable');
	Route::get('/timetable/edit', 'AdminPageController@timetableEdit')->name('timetable.edit');
});

Route::group(['middleware' => ['auth', 'teacher'], 'prefix' => '/teacher'], function (){
	Route::view('/', 'teacher.home')->name('teacher.home');
	Route::get('/management', 'TeacherPageController@management')->name('course.management');
	Route::get('/courselesson/{subject_name}', 'TeacherPageController@courseLesson')->name('course.lesson');
	Route::get('/coursematerial/{subject_name}', 'TeacherPageController@courseMaterial')->name('course.material');
	Route::post('/courselesson/post', 'TeacherPageController@courseLessonPost')->name('create.courseLesson');
	Route::post('/courselesson/update', 'TeacherPageController@courseLessonUpdate')->name('update.courseLesson');
	Route::post('/coursematerial/post', 'TeacherPageController@courseMaterialPost')->name('create.courseMaterial');
	Route::get('/course/delete', 'TeacherPageController@courseMaterialDelete')->name('course.delete');
	Route::get('/lesson/delete', 'TeacherPageController@courseLessonDelete')->name('courselesson.delete');
	Route::get('/exam', 'TeacherPageController@exam')->name('exam');
	Route::get('/examset/{subject_name}', 'TeacherPageController@examSetViewPage')->name('set.examViewPage');
	// Route::get('/examset/theory/{subject_name}', 'TeacherPageController@examSetViewPageTheory')->name('set.examViewPageTheory');
	// Route::get('/examset/both/{subject_name}', 'TeacherPageController@examSetViewPageBoth')->name('set.examViewPageBoth');
	Route::get('/examview/{subject_name}', 'TeacherPageController@examView')->name('exam.view');
	Route::get('/examview/theory/{subject_name}', 'TeacherPageController@examViewTheory')->name('exam.viewTheory');
	Route::get('/examview/both/{subject_name}', 'TeacherPageController@examViewBoth')->name('exam.viewBoth');
	Route::get('/exam/choose', 'TeacherPageController@examChoose')->name('exam.choose');
	Route::get('/exam/create', 'TeacherPageController@examCreate')->name('exam.create');
	Route::get('/exam/create/both', 'TeacherPageController@examCreateBoth')->name('exam.createBoth');
	Route::get('/exam/set/obj/{subject_name}', 'TeacherPageController@examSetObj')->name('set.examObj');
	Route::get('/exam/set/theory/{subject_name}', 'TeacherPageController@examSetTheory')->name('set.examTheory');
	Route::get('/exam/set/both/{subject_name}', 'TeacherPageController@examSetBoth')->name('set.examBoth');                      
	Route::get('/examaction', 'TeacherPageController@examAction')->name('exam.action');
	Route::get('/examaction/theory', 'TeacherPageController@examActionTheory')->name('exam.actionTheory');
	Route::get('/examaction/both', 'TeacherPageController@examActionBoth')->name('exam.actionBoth');
	Route::get('/examupdate', 'TeacherPageController@examUpdate')->name('exam.update');
	Route::get('/examupdate/theory', 'TeacherPageController@examUpdate')->name('exam.updateTheory');
	Route::get('/examdelete', 'TeacherPageController@examDelete')->name('exam.delete');
	Route::get('/examdelete/theory', 'TeacherPageController@examDeleteTheory')->name('exam.deleteTheory');
	Route::view('/profile', 'teacher.profile')->name('teacher.profile');
	Route::get('/password/update', 'TeacherPageController@profilePasswordUpdate')->name('profile.teacherPasswordUpdate');
	Route::get('/details/update', 'TeacherPageController@profileDetailsUpdate')->name('profile.teacherDetailsUpdate');
	Route::get('/assignment', 'TeacherPageController@assignment')->name('assignment');
	Route::get('/assignment/create/view/{subject_name}', 'TeacherPageController@assignmentCreateView')->name('create.assignment');
	Route::get('/assignment/view/{subject_name}', 'TeacherPageController@assignmentView')->name('view.assignment');
	Route::get('/assignment/make', 'TeacherPageController@assignmentCreate')->name('assignment.create');
	Route::post('/create/assignment', 'TeacherPageController@assignmentMake')->name('create.assignment');
	Route::get('/assignment/delete', 'TeacherPageController@assignmentDelete')->name('assignment.delete');
	Route::get('/assignment/update', 'TeacherPageController@assignmentEdit')->name('update');
});


Route::group(['middleware' => ['auth', 'student', 'payment_verification'], 'prefix' => '/student'], function(){
    Route::view('/', 'user.index')->name('home');
    Route::view('/unpaid', 'user.unpaid');
	Route::view('/celebration', 'user.paymentsuccess')->name('paymentsuccess');
	Route::view('/profile', 'user.profile')->name('profile');
	Route::get('/details/update', 'StudentPageController@profileDetailsUpdate')->name('profile.detailsUpdate');
	Route::get('/password/update', 'StudentPageController@profilePasswordUpdate')->name('profile.passwordUpdate');
	Route::get('/list/subject', 'StudentPageController@listSubject')->name('list.subject');
	Route::get('/payment', 'StudentPageController@payment')->name('payment');
	Route::get('/invoice/pta/{id}', 'StudentPageController@invoicePta')->name('invoice.pta');
	Route::get('/invoice/school/{id}', 'StudentPageController@invoiceSchool')->name('invoice.school');
	Route::get('/invoice/reg/{id}', 'StudentPageController@invoiceReg')->name('invoice.reg');
	Route::get('/exam', 'StudentPageController@exam')->name('exam');
	Route::get('/exam/start/obj/{subject_name}', 'StudentPageController@examStartObj')->name('exam.startObj');
	Route::get('/exam/start/theory/{subject_name}', 'StudentPageController@examStartTheory')->name('exam.startTheory');
	Route::get('/exam/start/both/{subject_name}', 'StudentPageController@examStartBoth')->name('exam.startBoth');
	Route::get('/exam/submit/obj', 'StudentPageController@examSubmitObj')->name('exam.submitObj');
	Route::get('/exam/submit/theory', 'StudentPageController@examSubmitTheory')->name('exam.submitTheory');
	Route::get('/exam/submit/both', 'StudentPageController@examSubmitBoth')->name('exam.submitBoth');
	Route::get('/exam/finish/obj/{subject_name}', 'StudentPageController@examFinishObj')->name('exam.finishObj');	
	Route::get('/exam/finish/theory/{subject_name}', 'StudentPageController@examFinishTheory')->name('exam.finishTheory');	
	Route::get('/exam/finish/both/{subject_name}', 'StudentPageController@examFinishBoth')->name('exam.finishBoth');
	Route::get('/result/check', 'StudentPageController@resultChecker')->name('result.checker');
	Route::get('/result/checker', 'StudentPageController@resultCheckerView')->name('result.checkerProcess');
});

Route::get('/choose', 'ChoosePageController@index');

Route::view('/admission', 'user.admission')->name('admission');

Route::view('/unpaid', 'user.unpaid')->name('unpaid');

Route::view('/unpaid/reg', 'user.unpaidReg')->name('unpaid.reg');

Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');

Route::get('/payment/callback', 'PaymentController@handleGatewayCallback')->name('callback');

Route::get('/payment/callback/pta', 'PaymentController@handleGatewayCallbackPta')->name('callback.pta');

Route::get('/payment/callback/reg', 'PaymentController@handleGatewayCallbackReg')->name('callback.reg');

Route::get('/payment/callback/lesson', 'PaymentController@handleGatewayCallbackLesson')->name('callback.lesson');

Route::get('/regPage', 'StudentPage@regPayment')->name('reg.payment.page');

Route::view('/teacher-reg', 'teacher.reg')->name('teacher.reg');

Route::post('/teacher-reg-process', 'RegisterIntoSMS@staff')->name('register.teacher');

