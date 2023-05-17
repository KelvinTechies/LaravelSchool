<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\SubjectModel;
use Auth;

class ClassSubjectController extends Controller
{
    public function AdminAssignSubject()
    {
        $data['header_title'] = 'Assign Subjects';
        $data['getRecord'] = ClassSubjectModel::getRecord();
        return view('admin.assign_subject.list', $data);
    }

    public function AdminAssignAddSubject()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getSubject'] = SubjectModel::getSubject();
        $data['header_title'] = 'Assign New Subject';

        return view('admin.assign_subject.add', $data);

    }

    public function InsertNewAssignSubject(Request $request)
    {

        if (!empty($request->subject_id)) {

            foreach ($request->subject_id as $subject_id) {
                $getFirst = ClassSubjectModel::getFirst($request->class_id, $subject_id);
                if (!empty($getFirst)) {
                    $getFirst->status = $request->status;
                    $getFirst->save();
                } else {

                    $ClassSubjectModel = new ClassSubjectModel;
                    $ClassSubjectModel->class_id = $request->class_id;
                    $ClassSubjectModel->subject_id = $subject_id;
                    $ClassSubjectModel->status = $request->status;
                    $ClassSubjectModel->created_by = Auth::user()->id;
                    $ClassSubjectModel->save();
                }
            }
            return redirect('admin/assign_subject')->with('success', 'Subject Successfully Assigned');

        } else {
            return redirect()->back()->with('error', 'Please Try Again');
        }
    }

    public function AdminDeleteAssignSubject($id)
    {
        $delete = ClassSubjectModel::getSingle($id);
        $delete->isDelete = 1;
        $delete->save();
        return redirect('admin/assign_subject')->with('success', 'Record Successfully Deleted');

    }

    public function AdminEditAssignSubject($id)
    {
        $getRecord = ClassSubjectModel::getSingle($id);
        if (!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
            $data['getAssignSubjectId'] = ClassSubjectModel::getAssignSubjectId($getRecord->class_id);
            $data['getClass'] = ClassModel::getClass();
            $data['getSubject'] = SubjectModel::getSubject();
            $data['header_title'] = 'Edit Assigned Subjects';

            return view('admin.assign_subject.Edit', $data);
        } else {
            abort(404);
        }

    }



    public function AdminEditSingleAssignSubject($id)
    {
        $getRecord = ClassSubjectModel::getSingle($id);
        if (!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
            $data['getClass'] = ClassModel::getClass();
            $data['getSubject'] = SubjectModel::getSubject();
            $data['header_title'] = 'Edit Assigned Subjects';
            return view('admin.assign_subject.Edit-single', $data);
        } else {
            abort(404);
        }

    }



    public function AdminUpdateAssignSubject($id, Request $request)
    {
        ClassSubjectModel::deleteSubject($request->class_id);
        if (!empty($request->subject_id)) {

            foreach ($request->subject_id as $subject_id) {
                $getFirst = ClassSubjectModel::getFirst($request->class_id, $subject_id);
                if (!empty($getFirst)) {
                    $getFirst->status = $request->status;
                    $getFirst->save();
                } else {

                    $ClassSubjectModel = new ClassSubjectModel;
                    $ClassSubjectModel->class_id = $request->class_id;
                    $ClassSubjectModel->subject_id = $subject_id;
                    $ClassSubjectModel->status = $request->status;
                    $ClassSubjectModel->created_by = Auth::user()->id;
                    $ClassSubjectModel->save();
                }
            }
            return redirect('admin/assign_subject')->with('success', 'Subject-Assignment Successfully Updated');

        } else {
            return redirect()->back()->with('error', 'Please Try Again');
        }
    }

    public function AdminUpdateSingleAssignSubject($id, Request $request)
    {
        $getFirst = ClassSubjectModel::getFirst($request->class_id, $request->subject_id);
        if (!empty($getFirst)) {
            $getFirst->status = $request->status;
            $getFirst->save();
            return redirect('admin/assign_subject')->with('success', 'Status Successfully Updated');

        } else {

            $ClassSubjectModel = ClassSubjectModel::getSingle($id);
            $ClassSubjectModel->class_id = $request->class_id;
            $ClassSubjectModel->subject_id = $request->subject_id;
            $ClassSubjectModel->status = $request->status;
            $ClassSubjectModel->save();
        }
        return redirect('admin/assign_subject')->with('success', 'Subject-Assignment Successfully Updated');

    }
}
