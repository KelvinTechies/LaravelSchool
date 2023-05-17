<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubjectModel;
use App\Models\ClassSubjectModel;
use App\Models\User;
use Auth;
class SubjectController extends Controller
{
    public function AdminSubject()
    {
        $data['header_title'] = 'Subject_list';
        $data['getRecord'] = SubjectModel::getRecord();
        return view('admin.subjects.list', $data);
    }
    public function AdminAddSubject()
    {
        $data['header_title'] = 'Add New Subject';

        return view('admin.subjects.addSubject', $data);

    }

    public function InsertNewSubject(Request $request){
        $class = new SubjectModel;

        $class->name = trim($request->name);
        $class->status = trim($request->status);
        $class->type = trim($request->type);
        $class->created_by = Auth::user()->id;
        $class->save();
        return redirect('admin/subject')->with('success', 'Class Created Successfully');
        
    }

    public function AdminEditSubject($id){
        $data['header_title'] = 'Edit Class';
        $data['getRecord'] = SubjectModel::getSingle($id);

        if(!empty( $data['getRecord'])){

            return view('admin.subjects.edit', $data);
        }else{
            abort(404);
        }

    }
    public function AdminUpdateSubject($id, Request $request){
        $class = SubjectModel::getSingle($id);

        $class->Name = $request->name;
        $class->status = $request->status;
        $class->save();
        return redirect('admin/subject')->with('success', 'Subject Updated Successfully');
        
    }
    public function AdminDeleteSubject($id){
        $class = SubjectModel::getSingle($id);

        $class->isDelete = 1;
        $class->save();
        return redirect()->back()->with('success', 'Subject Updated Successfully');
        
    }


    // studentPart
    public function MySubjects()
    {
        // dd(Auth::user()->Class_id);
        $data['header_title'] = 'My Subject';
        $data['getRecord'] = ClassSubjectModel::MySubjects((Auth::user()->Class_id));
        return view('Student.my_subjects', $data);
    }

    // Parent Side
    
    public function ParentsStudentsSubjects($student_id)
    {
        $user = User::getSingle($student_id);
        $data['header_title'] = 'Student Subject';
        $data['getUser'] = $user;
        $data['getRecord'] = ClassSubjectModel::MySubjects(($user->Class_id));
        return view('Parent.my_studemt_my_subjects', $data);
    }
}
