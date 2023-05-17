<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AssignClassTeacherController;
use App\Http\Controllers\ClassTimeTableController;
use App\Http\Controllers\ExaminationController;
use App\Http\Controllers\CalendarController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

// Route::get('/login', function () {
//     return view('Register.login');
// });



Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'Authlogin']);

Route::get('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'Logout']);
Route::get('/forgot-password', [AuthController::class, 'forgetpwd']);
Route::post('/forgot-password', [AuthController::class, 'Postforgetpwd']);
Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset/{token}', [AuthController::class, 'PostReset']);



// // classUrl
// Route::get('admin/class', [ClassController::class, 'AdminClass']);
// Route::get('admin/class/add', [ClassController::class, 'AdminAddClass']);
// Route::post('admin/class/add', [ClassController::class, 'InsertNewClass']);
// Route::get('admin/class/edit/{id}', [ClassController::class, 'AdminEditClass']);
// Route::post('admin/class/edit/{id}', [ClassController::class, 'AdminUpdateClass']);
// Route::post('admin/class/delete/{id}', [ClassController::class, 'AdminUpdateClass']);


// // SubjectsUrl
// Route::get('admin/subject', [SubjectController::class, 'AdminSubject']);
// Route::get('admin/subject/add', [SubjectController::class, 'AdminAddSubject']);
// Route::post('admin/subject/add', [SubjectController::class, 'InsertNewSubject']);
// Route::get('admin/subject/edit/{id}', [SubjectController::class, 'AdminEditSubject']);
// Route::post('admin/subject/edit/{id}', [SubjectController::class, 'AdminUpdateSubject']);
// Route::get('admin/subject/delete/{id}', [SubjectController::class, 'AdminDeleteSubject']);

// // assign_subject
// Route::get('admin/assign_subject', [ClassSubjectController::class, 'AdminAssignSubject']);
// Route::get('admin/assign_subject/add', [ClassSubjectController::class, 'AdminAssignAddSubject']);
// Route::post('admin/assign_subject/add', [ClassSubjectController::class, 'InsertNewAssignSubject']);
// Route::get('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'AdminEditAssignSubject']);
// Route::post('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'AdminUpdateAssignSubject']);
// Route::get('admin/assign_subject/edit-single/{id}', [ClassSubjectController::class, 'AdminEditSingleAssignSubject']);
// Route::post('admin/assign_subject/edit-single/{id}', [ClassSubjectController::class, 'AdminUpdateSingleAssignSubject']);
// Route::get('admin/assign_subject/delete/{id}', [ClassSubjectController::class, 'AdminDeleteAssignSubject']);


Route::group(['middleware' => 'Admin'], function () {
    Route::get('admin/dashboard', [dashboardController::class, 'dashboard']);
    Route::get('admin-list', [AdminController::class, 'AdminList']);
    Route::get('admin-add', [AdminController::class, 'AdminAdd']);
    Route::post('admin-add', [AdminController::class, 'InsertNewAdmin']);
    Route::get('admin-edit/{id}', [AdminController::class, 'AdminEdit']);
    Route::post('admin-edit/{id}', [AdminController::class, 'AdminUpdate']);
    Route::get('admin/myaccount', [UserController::class, 'MyAccount']);
    Route::post('admin/myaccount', [UserController::class, 'UpdateAdminAccount']);

    
// classUrl
    Route::get('admin/class', [ClassController::class, 'AdminClass']);
    Route::get('admin/class/add', [ClassController::class, 'AdminAddClass']);
    Route::post('admin/class/add', [ClassController::class, 'InsertNewClass']);
    Route::get('admin/class/edit/{id}', [ClassController::class, 'AdminEditClass']);
    Route::post('admin/class/edit/{id}', [ClassController::class, 'AdminUpdateClass']);
    Route::post('admin/class/delete/{id}', [ClassController::class, 'AdminUpdateClass']);


// SubjectsUrl
    Route::get('admin/subject', [SubjectController::class, 'AdminSubject']);
    Route::get('admin/subject/add', [SubjectController::class, 'AdminAddSubject']);
    Route::post('admin/subject/add', [SubjectController::class, 'InsertNewSubject']);
    Route::get('admin/subject/edit/{id}', [SubjectController::class, 'AdminEditSubject']);
    Route::post('admin/subject/edit/{id}', [SubjectController::class, 'AdminUpdateSubject']);
    Route::get('admin/subject/delete/{id}', [SubjectController::class, 'AdminDeleteSubject']);

// assign_subject
    Route::get('admin/assign_subject', [ClassSubjectController::class, 'AdminAssignSubject']);
    Route::get('admin/assign_subject/add', [ClassSubjectController::class, 'AdminAssignAddSubject']);
    Route::post('admin/assign_subject/add', [ClassSubjectController::class, 'InsertNewAssignSubject']);
    Route::get('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'AdminEditAssignSubject']);
    Route::post('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'AdminUpdateAssignSubject']);
    Route::get('admin/assign_subject/edit-single/{id}', [ClassSubjectController::class, 'AdminEditSingleAssignSubject']);
    Route::post('admin/assign_subject/edit-single/{id}', [ClassSubjectController::class, 'AdminUpdateSingleAssignSubject']);
    Route::get('admin/assign_subject/delete/{id}', [ClassSubjectController::class, 'AdminDeleteAssignSubject']);


// Assign Teacher

    Route::get('admin/assign_teachers', [AssignClassTeacherController::class, 'AssignClassTeacher']);
    Route::get('admin/assign_teachers/add', [AssignClassTeacherController::class, 'AdminAssignAddClassTeacher']);
    Route::post('admin/assign_teachers/add', [AssignClassTeacherController::class, 'AdminInsertAssignAddClassTeacher']);
    Route::get('admin/assign_teachers/edit/{id}', [AssignClassTeacherController::class, 'AdminEditAssignTeacher']);
    Route::post('admin/assign_teachers/edit/{id}', [AssignClassTeacherController::class, 'AdminUpdateAssignTeacher']);
    Route::get('admin/assign_teachers/edit-single/{id}', [AssignClassTeacherController::class, 'AdminEditSingleAssignTeacher']);
    Route::post('admin/assign_teachers/edit-single/{id}', [AssignClassTeacherController::class, 'AdminUpdateSingleAssignTeacher']);
    Route::get('admin/assign_teachers/delete/{id}', [AssignClassTeacherController::class, 'AdminDeleteAssignTeacher']);

// 


// Pwd
    Route::get('admin/change_password', [UserController::class, 'changePassword']);
    Route::post('admin/change_password', [UserController::class, 'updatePwd']);


// Student
    Route::get('admin/students', [StudentController::class, 'AdminStudentList']);
    Route::get('admin/students/add', [StudentController::class, 'AdminAddStudent']);
    Route::post('admin/students/add', [StudentController::class, 'InsertNewStudent']);
    Route::get('admin/students/edit/{id}', [StudentController::class, 'EditNewStudent']);
    Route::post('admin/students/edit/{id}', [StudentController::class, 'UpdateNewStudent']);
    Route::get('admin/students/delete/{id}', [StudentController::class, 'DeleteNewStudent']);


    // Teachers
    Route::get('admin/Teachers', [TeacherController::class, 'AdminTeacherList']);
    Route::get('admin/Teachers/add', [TeacherController::class, 'AdminAddTeacher']);
    Route::post('admin/Teachers/add', [TeacherController::class, 'InsertNewTeacher']);
    Route::get('admin/Teachers/edit/{id}', [TeacherController::class, 'EditNewTeacher']);
    Route::post('admin/Teachers/edit/{id}', [TeacherController::class, 'UpdateNewTeacher']);
    Route::get('admin/Teachers/delete/{id}', [TeacherController::class, 'DeleteNewTeacher']);


//Parents
    Route::get('admin/Parents', [ParentController::class, 'AdminParentList']);
    Route::get('admin/Parents/add', [ParentController::class, 'AdminAddParent']);
    Route::post('admin/Parents/add', [ParentController::class, 'InsertNewParent']);
    Route::get('admin/Parents/edit/{id}', [ParentController::class, 'EditNewParent']);
    Route::post('admin/Parents/edit/{id}', [ParentController::class, 'UpdateNewParent']);
    Route::get('admin/Parents/delete/{id}', [ParentController::class, 'DeleteNewParent']);
    Route::get('admin/Parents/my-student/{id}', [ParentController::class, 'MyStudents']);
    Route::get('admin/Parents/assign_student_parent/{student_id}/{parent_id}', [ParentController::class, 'Assign_Student_Parent']);
    Route::get('admin/Parents/assign_student_parent_delete/{student_id}', [ParentController::class, 'Assign_Student_Parent_Delete']);




// Timetable
Route::get('admin/class_time_table', [ClassTimeTableController::class, 'TimeTable']);
Route::get('admin/class_time_table/getSubject', [ClassTimeTableController::class, 'getSubject']);
Route::post('admin/class_time_table/add', [ClassTimeTableController::class, 'AddTimeTable']);


// Examinations


Route::get('admin/Examination/exam', [ExaminationController::class, 'Examination']);
Route::get('admin/Examination/exam/add', [ExaminationController::class, 'AdminAddExam']);
Route::post('admin/Examination/exam/add', [ExaminationController::class, 'InsertNewExam']);
Route::get('admin/Examination/exam/{id}', [ExaminationController::class, 'AdminEditExam']);
Route::post('admin/Examination/exam/{id}', [ExaminationController::class, 'AdminUpdateExam']);
Route::get('admin/Examination/exam/{id}', [ExaminationController::class, 'AdminDeleteExam']);


Route::get('admin/Examination/exam_schedule', [ExaminationController::class, 'AdminExamSchedule']);
Route::post('admin/Examination/exam_schedule/insert', [ExaminationController::class, 'AdminExamScheduleInsert']);
Route::get('admin/marks_register', [ExaminationController::class, 'MarksRegister']);




});

Route::group(['middleware' => 'Teachers'], function () {
    Route::get('Teachers/dashboard', [dashboardController::class, 'dashboard']);
    Route::get('Teachers/my_class_subjects', [AssignClassTeacherController::class, 'MyClassSubjects']);
    Route::get('Teachers/my_class_subjects/class_timeTable/{class_id}/{subject_id}', [ClassTimeTableController::class, 'MyClassSubjectsTimeTableTeacher']);
    Route::get('Teachers/my_students', [StudentController::class, 'MyStudents']);
    Route::get('Teachers/my_teacher_exam_time_table', [ExaminationController::class, 'TeacherExamTimeTable']);
    
    Route::get('Teachers/change_password', [UserController::class, 'changePassword']);
    Route::post('Teachers/change_password', [UserController::class, 'updatePwd']);
    Route::get('Teachers/myaccount', [UserController::class, 'MyAccount']);
    Route::post('Teachers/myaccount', [UserController::class, 'UpdateTeacherAccount']);
    Route::get('Teachers/my_Calendar', [CalendarController::class, 'TeachersCalendar']);

});

Route::group(['middleware' => 'Students'], function () {
    Route::get('Students/dashboard', [dashboardController::class, 'dashboard']);

    Route::get('Students/change_password', [UserController::class, 'changePassword']);
    Route::post('Students/change_password', [UserController::class, 'updatePwd']);
    Route::get('Students/myaccount', [UserController::class, 'MyAccount']);
    Route::post('Students/myaccount', [UserController::class, 'UpdateStudentAccount']);
    Route::get('Students/mysubjects', [SubjectController::class, 'MySubjects']);
    Route::get('Students/time_table', [ClassTimeTableController::class, 'MyTimeTable']);
    Route::get('Students/my_exam_time_table', [ExaminationController::class, 'MyStudentExamTimeTable']);
    Route::get('Students/my_Calendar', [CalendarController::class, 'MyCalendar']);
    
});
Route::group(['middleware' => 'Parents'], function () {
    Route::get('Parents/dashboard', [dashboardController::class, 'dashboard']);
    Route::get('Parents/my_student/subject/class_timeTable/{class_id}/{subject_id}/{student_id}', [ClassTimeTableController::class, 'ParentsTimeTable']);
    Route::get('Parents/my_student/my_calendar/{student_id}', [CalendarController::class, 'ParentsCalendar']);
    Route::get('Parents/my_student/subject/{id}', [SubjectController::class, 'ParentsStudentsSubjects']);
    Route::get('Parents/mystudents', [ParentController::class, 'MyStudentsParent']);
    Route::get('Parents/myaccount', [UserController::class, 'MyAccount']);
    Route::post('Parents/myaccount', [UserController::class, 'UpdateParentAccount']);
    Route::get('Parents/change_password', [UserController::class, 'changePassword']);
    Route::post('Parents/change_password', [UserController::class, 'updatePwd']);
});


