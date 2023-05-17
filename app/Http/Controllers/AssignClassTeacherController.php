<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\User;
use App\Models\AssignClassTeacherModel;
use Auth;

class AssignClassTeacherController extends Controller
{
    public function AssignClassTeacher()
    {
        $data['header_title'] = 'Assign Class Teacher';
        $data['getRecord'] = AssignClassTeacherModel::getRecord();
        return view('admin.assign_teachers.list', $data);
    }

    public function AdminAssignAddClassTeacher(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getTeacher'] = User::getTeacherClass();
        $data['header_title'] = 'Add Assign Class Teacher';
        return view('admin.assign_teachers.add', $data);        
    }

    public function AdminInsertAssignAddClassTeacher(Request $request)
    {
    //    dd($request->all());
    if (!empty($request->teacher_id)) {

        foreach ($request->teacher_id as $teacher_id) {
            $getFirst = AssignClassTeacherModel::getFirst($request->class_id, $teacher_id);
            if (!empty($getFirst)) {
                $getFirst->Status = $request->status;
                $getFirst->save();
            } else {

                $AssignClassTeacherModel = new AssignClassTeacherModel;
                $AssignClassTeacherModel->Class_id = $request->class_id;
                $AssignClassTeacherModel->Teacher_id = $teacher_id;
                $AssignClassTeacherModel->Status = $request->status;
                $AssignClassTeacherModel->created_by = Auth::user()->id;
                $AssignClassTeacherModel->save();
            }
        }
        return redirect('admin/assign_teachers')->with('success', 'Teacher Successfully Assigned');
    }
}

public function AdminEditAssignTeacher($id)
{
    $getRecord = AssignClassTeacherModel::getSingle($id);
    if (!empty($getRecord)) {
        $data['getRecord'] = $getRecord;
        $data['getAssignTeacherId'] = AssignClassTeacherModel::getAssignTeacherId($getRecord->Class_id);
        $data['getClass'] = ClassModel::getClass();
        $data['getTeacher'] = User::getTeacherClass();
        $data['header_title'] = 'Edit Assigned Teachers';

        return view('admin.assign_teachers.Edit', $data);
    } else {
        abort(404);
    }

}


public function AdminUpdateAssignTeacher($id, Request $request)
{
    AssignClassTeacherModel::deleteTeacher($request->class_id);
    if (!empty($request->teacher_id)) {

        foreach ($request->teacher_id as $teacher_id) {
            $getFirst = AssignClassTeacherModel::getFirst($request->class_id, $teacher_id);
            if (!empty($getFirst)) {
                $getFirst->Status = $request->status;
                $getFirst->save();
            } else {

                $AssignClassTeacherModel = new AssignClassTeacherModel;
                $AssignClassTeacherModel->Class_id = $request->class_id;
                $AssignClassTeacherModel->Teacher_id = $teacher_id;
                $AssignClassTeacherModel->Status = $request->status;
                $AssignClassTeacherModel->created_by = Auth::user()->id;
                $AssignClassTeacherModel->save();
            }
        }
        return redirect('admin/assign_teachers')->with('success', 'Updated Teacher Successfully Assigned');
    }
}


public function AdminEditSingleAssignTeacher($id){

    $getRecord = AssignClassTeacherModel::getSingle($id);
    if (!empty($getRecord)) {
        $data['getRecord'] = $getRecord;
        $data['getAssignTeacherId'] = AssignClassTeacherModel::getAssignTeacherId($getRecord->Class_id);
        $data['getClass'] = ClassModel::getClass();
        $data['getTeacher'] = User::getTeacherClass();
        $data['header_title'] = 'Edit Single Assigned Teachers';

        return view('admin.assign_teachers.Edit_single', $data);
    } else {
        abort(404);
    }

}
public function AdminUpdateSingleAssignTeacher($id, Request $request)
    {
        // dd($request->all());
        $getFirst = AssignClassTeacherModel::getFirst($request->class_id, $request->teacher_id);
        if (!empty($getFirst)) {
            $getFirst->Status = $request->status;
            $getFirst->save();
            return redirect('admin/assign_teachers')->with('success', 'Status Successfully Updated');

        } else {

            $AssignClassTeacherModel = AssignClassTeacherModel::getSingle($id);
            $AssignClassTeacherModel->Class_id = $request->class_id;
            $AssignClassTeacherModel->Teacher_id = $request->teacher_id;
            $AssignClassTeacherModel->Status = $request->status;
            $AssignClassTeacherModel->save();
        }
        return redirect('admin/assign_teachers')->with('success', 'Teacher-Assignment Successfully Updated');

    }

    public function AdminDeleteAssignTeacher($id)
    {
        $delete = AssignClassTeacherModel::getSingle($id);
        $delete->delete();;
        return redirect('admin/assign_teachers')->with('success', 'Teacher Assigned Successfully Deleted');

    }

// teachers side work
    public function MyClassSubjects()

    {
        $data['getRecord'] = AssignClassTeacherModel::getMyClassSubjects(Auth::user()->id);
        $data['heade_title'] = "My Class & Subjects";
        return view('Teacher.myclasssubjects', $data);

    }

}
