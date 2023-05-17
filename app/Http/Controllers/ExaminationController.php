<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExamModel;
use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\ExamScheduleModel;
use App\Models\AssignClassTeacherModel;
use App\Models\User;
use Auth;


class ExaminationController extends Controller
{
    public function Examination()
    {

        $data['getRecord'] = ExamModel::getRecord();
        $data['header_title'] = 'Examination List';
        return view('admin.Examination.list', $data);
    }

    public function AdminAddExam()
    {

        $data['header_title'] = 'Add Examination';
        return view('admin.Examination.add', $data);
    }
    public function InsertNewExam(Request $request)
    {
        // dd($request->all());

        $exam = new ExamModel;
        $exam->name = trim($request->name);
        $exam->note = trim($request->note);
        $exam->created_by = Auth::user()->id;
        $exam->save();

        return redirect('admin/Examination/exam')->with('success', 'Examination Added Successfully');
    }

    public function AdminEditExam($id)
    {
        $data['getRecord'] = ExamModel::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = 'Edit Examination';
            return view('admin.Examination.edit', $data);
        }else{
            abort(404);
        }

    }

    public function AdminUpdateExam($id, Request $request)
    {
        $exam = ExamModel::getSingle($id);
        $exam->name =trim ($request->name);
        $exam->note = trim($request->note);
        $exam->save();

        return redirect('admin/Examination/exam')->with('success', 'Examination Updated Successfully');
    }


    public function AdminDeleteExam($id)
    {
        $getRecord = ExamModel::getSingle($id);
        if(!empty($getRecord)){
            $getRecord->is_delete = 1;
            $getRecord->save();
        }else{
            abort(404);
        }
        return redirect()->back()->with('success', 'Examination Deleted Successfully');
        
    }


    public function AdminExamSchedule(Request $request)

    {
        $data['getClass'] = ClassModel::getClass();
        $data['getExam'] = ExamModel::getExam();

        if(!empty($request->get('exam_id')) && !empty($request->get('class_id'))){
            $getSubject = ClassSubjectModel::MySubjects($request->get('class_id'));
            foreach($getSubject as $value){
                $dataS = array();
                $dataS['subject_id'] = $value->subject_id;
                $dataS['class_id'] = $value->class_id;
                $dataS['subject_name'] = $value->subject_name;
                $dataS['subject_type'] = $value->subject_type;
                $examSchedule = ExamScheduleModel::getRecordSingle($request->get('exam_id'), $request->get('class_id'), $value->subject_id);
                if(!empty($examSchedule)){
                    $dataS['exam_date'] = $examSchedule->exam_date;
                    $dataS['exam_start_time'] = $examSchedule->exam_start_time;
                    $dataS['exam_end_time'] = $examSchedule->exam_end_time;
                    $dataS['exam_rum_num'] = $examSchedule->exam_rum_num;
                    $dataS['exam_full_mark'] = $examSchedule->exam_full_mark;
                    $dataS['exam_pass_mark'] = $examSchedule->exam_pass_mark;
                    
                }else{
                    $dataS['exam_date']="";
                    $dataS['exam_start_time']="";
                    $dataS['exam_end_time']="";
                    $dataS['exam_rum_num']="";
                    $dataS['exam_full_mark']="";
                    $dataS['exam_pass_mark']="";
                }
                $result[] = $dataS;
                // dd($result);
            }
            $data['getRecord'] = $result;
        }
        $data['header_title'] = 'Examination Schedule';
        return view('admin.Examination.exam_schedule', $data);   
    }
    

    public function AdminExamScheduleInsert(Request $request)
    {
        ExamScheduleModel::deleteRecords($request->exam_id, $request->class_id);
        if(!empty($request->schedule)){
            foreach($request->schedule as $schedule){

                if(!empty($schedule['subject_id']) && !empty($schedule['exam_date']) && !empty($schedule['exam_start_time']) && !empty($schedule['exam_end_time']) && !empty($schedule['exam_rum_num']) && !empty($schedule['exam_end_time']) && !empty($schedule['exam_rum_num'])
                 && !empty($schedule['exam_full_mark']) && !empty($schedule['exam_pass_mark'])){

                    $examSchedule = new ExamScheduleModel;
    
                    $examSchedule->exam_id = $request->exam_id;
                    $examSchedule->class_id = $request->class_id;
                    $examSchedule->subject_id = $schedule['subject_id'];
                    $examSchedule->exam_date = $schedule['exam_date'];
                    $examSchedule->exam_start_time = $schedule['exam_start_time'];
                    $examSchedule->exam_end_time = $schedule['exam_end_time'];
                    $examSchedule->exam_rum_num = $schedule['exam_rum_num'];
                    $examSchedule->exam_full_mark = $schedule['exam_full_mark'];
                    $examSchedule->exam_pass_mark = $schedule['exam_pass_mark'];
                    $examSchedule->created_by = Auth::User()->id;
                    $examSchedule->save();
                }
            }

        }
        return redirect()->back()->with('success', 'Exam Scheduled Successfully');
        
    }


    public function MyStudentExamTimeTable(Request $request)
    {
        $class_id = Auth::user()->Class_id;
        $getExam = ExamScheduleModel::getExamId($class_id);
        $result = array();
        foreach($getExam as $value){
            $dataE = array();

            $dataE['name'] = $value->exam_name;

            $getExamTimeTable = ExamScheduleModel::getExamTimeTable($value->exam_id, $class_id);
                foreach($getExamTimeTable as $valueS){
                    $dataS = array();
                    $dataS['subject_name'] = $valueS->subject_name;
                    $dataS['exam_date'] = $valueS->exam_date;
                    $dataS['start_time'] = $valueS->exam_start_time;
                    $dataS['end_time'] = $valueS->exam_end_time;
                    $dataS['room_number'] = $valueS->exam_rum_num;
                    $dataS['exam_pass_mark'] = $valueS->exam_pass_mark;
                    $dataS['exam_full_mark'] = $valueS->exam_full_mark;
                    $resultS[] = $dataS;
                }
                $dataE['exams'] = $resultS;
                $result[] = $dataE;
                $data['getRecord'] = $result;
        }
        // $data['getRecord'] = ExamModel::getRecord();
        $data['header_title'] = 'My Exam Time-Table List';
        return view('Student.my_exam_time_table', $data);
    }

    // Teacher TimeTable

    public function TeacherExamTimeTable()
    {
        $result = array();
        $getClass = AssignClassTeacherModel::getMyClassSubjectGroup(Auth::user()->id);
        foreach($getClass as $class){
            $dataC = array();
            $dataC['class_name'] =$class->class_name;
            $getExam = ExamScheduleModel::getExamId($class->class_id);
            $examArray= array();
            foreach($getExam as $exam){
                $dataE = array();

                $dataE['exam_name']= $exam->exam_name;
            $getExamTimeTable = ExamScheduleModel::getExamTimeTable($exam->exam_id, $class->class_id);
            $subjectArray = array();
            foreach($getExamTimeTable as $valueS){
                $dataS = array();
                $dataS['subject_name'] = $valueS->subject_name;
                $dataS['exam_date'] = $valueS->exam_date;
                $dataS['start_time'] = $valueS->exam_start_time;
                $dataS['end_time'] = $valueS->exam_end_time;
                $dataS['room_number'] = $valueS->exam_rum_num;
                $dataS['exam_pass_mark'] = $valueS->exam_pass_mark;
                $dataS['exam_full_mark'] = $valueS->exam_full_mark;
                $subjectArray[] = $dataS;
            }

            $dataE['subject'] =$subjectArray;
                $examArray[] = $dataE;
            }
            // dd($getExam);
            $dataC['exams'] = $examArray;
            $result[] = $dataC;
            $data['getRecord'] = $result;
            // dd($result);

        }
        // dd($getExam);
        $data['header_title'] = 'My Exam Time-Table List';
        return view('Teacher.my_exam_time_table', $data);
    }



    public function MarksRegister(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getExam'] = ExamModel::getExam();
        if(!empty($request->get('exam_id')) && !empty($request->get('class_id'))){
            $data['getSubject']=ExamScheduleModel::getSubject($request->get('exam_id'), $request->get('class_id'));
            $data['getStudentClass']=User::getStudentClass($request->get('class_id'));
            // dd($data['getStudentClass']);
        }
        $data['header_title'] = 'Marks Register';
        return view('admin.Examination.mark_register', $data);   
    }
}
