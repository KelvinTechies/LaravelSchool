<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\classSubjectModel;
use App\Models\WeekModel;
use App\Models\classSubjectTimeTableModel;
use App\Models\SubjectModel;
use App\Models\User;
use Auth;




class ClassTimeTableController extends Controller
{
    public function TimeTable(Request $request)

    {
        if (!empty($request->class_id)) {
            $data['getSubject'] = classSubjectModel::MySubjects($request->class_id);

        }

        $getWeek = WeekModel::getRecord();

        $week = array();

        foreach ($getWeek as $value) {
            $dataW = array();
            $dataW['week_id'] = $value->id;
            $dataW['week_name'] = $value->name;

            if (!empty($request->class_id) && !empty($request->subject_id)) {
                $classSubject = classSubjectTimeTableModel::getRecordClassSubject($request->class_id, $request->subject_id, $value->id);
                if (!empty($classSubject)) {
                    $dataW['start_time'] = $classSubject->start_time;
                    $dataW['end_time'] = $classSubject->end_time;
                    $dataW['room_number'] = $classSubject->room_number;

                } else {
                    $dataW['start_time'] = "";
                    $dataW['end_time'] = "";
                    $dataW['room_number'] = "";
                }
            } else {
                $dataW['start_time'] = "";
                $dataW['end_time'] = "";
                $dataW['room_number'] = "";
            }
            $week[] = $dataW;

        //    dd($week);
        }
        $data['week'] = $week;
        $data['getClass'] = ClassModel::getClass();

        $data['header_title'] = 'CLass Time-Table';

        return view('admin.classTimeTable.list', $data);
    }

    public function AdminAddTimeTable()
    {
        $data['header_title'] = 'Add Time-Table';

        return view('admin.classTimeTable.add', $data);
    }

    public function getSubject(Request $request)
    {

    // dd($request->all());
        $getSubject = classSubjectModel::MySubjects($request->class_id);
        $html = " <option value=''>---Select---</option>";

        foreach ($getSubject as $value) {
            $html = "<option value='" . $value->subject_id . "'>" . $value->subject_name . "</option>";

        }
        $json['html'] = $html;
        echo json_encode($json);
    }



    public function AddTimeTable(Request $request)
    {
        classSubjectTimeTableModel::where('class_id', '=', $request->class_id)
            ->where('subject_id', '=', $request->subject_id)->delete();

    // dd($request->all());
        foreach ($request->timetable as $timetable) {
            if (!empty($timetable['week_id']) && !empty($timetable['start_time']) && !empty($timetable['end_time']) && !empty($timetable['room_num'])) {

                $classTimeTable = new classSubjectTimeTableModel;
                $classTimeTable->class_id = $request['class_id'];
                $classTimeTable->subject_id = $request['subject_id'];
                $classTimeTable->week_id = $timetable['week_id'];
                $classTimeTable->start_time = $timetable['start_time'];
                $classTimeTable->end_time = $timetable['end_time'];
                $classTimeTable->room_number = $timetable['room_num'];

                $classTimeTable->save();
            }
        }
        return redirect()->back()->with('success', 'Time-Table Successfully Saved');
    }



//    Student Side

    public function MyTimeTable()
    {

        $results = array();
        $getRecord = ClassSubjectModel::MySubjects(Auth::user()->Class_id);
        // dd($getRecord);

        foreach($getRecord as $value){
            $dataS['name'] = $value->subject_name;
            $getWeek = WeekModel::getRecord();
            $week = array();
            foreach($getWeek as $valueW){
                $dataW = array();
                $dataW['week_id'] = $valueW->id;
                $dataW['week_name'] = $valueW->name;
                $classSubject = classSubjectTimeTableModel::getRecordClassSubject($value->class_id, $value->subject_id, $valueW->id);
                if (!empty($classSubject)) {
                    $dataW['start_time'] = $classSubject->start_time;
                    $dataW['end_time'] = $classSubject->end_time;
                    $dataW['room_number'] = $classSubject->room_number;

                } else {
                    $dataW['start_time'] = "";
                    $dataW['end_time'] = "";
                    $dataW['room_number'] = "";
                }
                $week[] = $dataW;
            }
            $dataS['week'] = $week;
            $results[] = $dataS;
        }
        // dd($results);
        $data['getRecord'] = $results;
        
        $data['header_title'] = 'My Time-Table';

        return view('student.my_time_table', $data);
    }


    public function MyClassSubjectsTimeTableTeacher($class_id, $subject_id)
    {
        $data['getClass'] = ClassModel::getSingle($class_id);
        $data['getSubject'] = SubjectModel::getSingle($subject_id);
       
            $getWeek = WeekModel::getRecord();
            $week = array();
            foreach($getWeek as $valueW){
                $dataW = array();
                $dataW['week_id'] = $valueW->id;
                $dataW['week_name'] = $valueW->name;
                $classSubject = classSubjectTimeTableModel::getRecordClassSubject($class_id, $subject_id, $valueW->id);
                if (!empty($classSubject)) {
                    $dataW['start_time'] = $classSubject->start_time;
                    $dataW['end_time'] = $classSubject->end_time;
                    $dataW['room_number'] = $classSubject->room_number;

                } else {
                    $dataW['start_time'] = "";
                    $dataW['end_time'] = "";
                    $dataW['room_number'] = "";
                }
                $results[] = $dataW;
            }
        // dd($results);
        $data['getRecord'] = $results;
        
        $data['header_title'] = 'My Time-Table';

        return view('Teacher.my_time_table', $data);
    }

    // Parents Side

    public function ParentsTimeTable($class_id, $subject_id, $student_id)
    {
        $data['getClass'] = ClassModel::getSingle($class_id);
        $data['getSubject'] = SubjectModel::getSingle($subject_id);
        $data['getStudent'] = User::getSingle($student_id);
       
            $getWeek = WeekModel::getRecord();
            $week = array();
            foreach($getWeek as $valueW){
                $dataW = array();
                $dataW['week_id'] = $valueW->id;
                $dataW['week_name'] = $valueW->name;
                $classSubject = classSubjectTimeTableModel::getRecordClassSubject($class_id, $subject_id, $valueW->id);
                if (!empty($classSubject)) {
                    $dataW['start_time'] = $classSubject->start_time;
                    $dataW['end_time'] = $classSubject->end_time;
                    $dataW['room_number'] = $classSubject->room_number;

                } else {
                    $dataW['start_time'] = "";
                    $dataW['end_time'] = "";
                    $dataW['room_number'] = "";
                }
                $results[] = $dataW;
            }
        // dd($results);
        $data['getRecord'] = $results;
        
        $data['header_title'] = 'My Time-Table';

        return view('Parent.my_time_table', $data);

    }
}
