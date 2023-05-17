<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassSubjectModel;
use App\Models\WeekModel;
use App\Models\classSubjectTimeTableModel;
use App\Models\ExamScheduleModel;
use App\Models\User;
use Auth;



class CalendarController extends Controller
{
    public function MyCalendar()
    {
        $data['header_title']='My Calendar';
            $data['getMyTimeTable'] =$this->getTimeTable(Auth::user()->Class_id);
            $data['getExamTimeTable'] =$this->getExamTimeTable(Auth::user()->Class_id);
        return view('Student.my_calendar', $data);
            
     }



public function getExamTimeTable($class_id)
{
    $getExam = ExamScheduleModel::getExamId($class_id);
    $result = array();
    foreach($getExam as $value){
        $dataE = array();

        $dataE['name'] = $value->exam_name;

        $getExamTimeTable = ExamScheduleModel::getExamTimeTable($value->exam_id, $class_id);
        $resultS = array();
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
            // $data['getRecord'] = $result;
    }
    return  $result;
}



    public function getTimeTable($class_id)
    {
        $data['header_title']='My Calendar';

        $results = array();
        $getRecord = ClassSubjectModel::MySubjects($class_id);
        // dd($getRecord);

        foreach($getRecord as $value){
            $dataS['name'] = $value->subject_name;
            $getWeek = WeekModel::getRecord();
            $week = array();
            foreach($getWeek as $valueW){
                $dataW = array();
                $dataW['week_id'] = $valueW->id;
                $dataW['week_name'] = $valueW->name;
                $dataW['full_calendar_day'] = $valueW->full_calendar_day;
                $classSubject = classSubjectTimeTableModel::getRecordClassSubject($value->class_id, $value->subject_id, $valueW->id);
                if (!empty($classSubject)) {
                    $dataW['start_time'] = $classSubject->start_time;
                    $dataW['end_time'] = $classSubject->end_time;
                    $dataW['room_number'] = $classSubject->room_number;
                    // $week[] = $dataW;

                }
                 else {
                    $dataW['start_time'] = "";
                    $dataW['end_time'] = "";
                    $dataW['room_number'] = "";
                }
                $week[] = $dataW;
            }
            $dataS['week'] = $week;
            $results[] = $dataS;

            
        }
return $results;
        
    }





    // ParentSide


    public function ParentsCalendar($student_id)
    {
        $getStudent = User::getSingle($student_id);
        $data['getMyTimeTable'] =$this->getTimeTable($getStudent->Class_id);
        
        $data['getExamTimeTable'] =$this->getExamTimeTable($getStudent->Class_id);


        $data['header_title']='My Students Calendar';        
        $data['getStudent']=$getStudent;        
        return view('parent.my_calendar', $data);
        
    }


    public function TeachersCalendar()
    {
        # code...
    }
}