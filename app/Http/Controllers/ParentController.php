<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Str;
use Hash;
Use Auth;



class ParentController extends Controller
{
    public function AdminParentList()
    {
        $data['getRecord'] = User::getParent();

        $data['header_title'] = 'Parent-List';
        return view('admin.Parents.list', $data);

    }

    public function AdminAddParent()
    {
        $data['header_title'] = 'Add New Parent';

        return view('admin.Parents.add', $data);

    }

    public function InsertNewParent(Request $request)

    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email|unique:users'
        ]);

        $parent = new User;

        $parent->name = trim($request->name);
        $parent->Last_Name = trim($request->lst_name);
        $parent->Occupation = trim($request->Occupation);
        $parent->Gender = trim($request->gender);
        if (!empty($request->file('pic'))) {
            $ext = $request->file('pic')->getClientOriginalExtension();
            $file = $request->file('pic');
            $randMaster = Str::random(20);
            $fileName = strtolower($randMaster) . '-' . $ext;
            $file->move('Uploads/Profile', $fileName);
            $parent->profile_pic = $fileName;
        }
        $parent->Religion = trim($request->religion);
        $parent->Address = trim($request->Address);
        $parent->Status = trim($request->status);
        $parent->Phone = trim($request->fone);
        $parent->password = Hash::make($request->pwd);
        $parent->email = trim($request->email);
        $parent->User_type = 4;
        $parent->save();
        return redirect('admin/Parents')->with('success', 'Parent Added Successfully');
    }

    public function EditNewParent($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if (empty($data['getRecord'])) {
            abort(404);
        } else {
            $data['header_title'] = 'Edit Parent';
            return view('admin.parents.Edit', $data);
        }
    }

    public function UpdateNewParent($id, Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email'
        ]);

        $parent = User::getSingle($id);

        $parent->name = trim($request->name);
        $parent->Last_Name = trim($request->lst_name);
        $parent->Occupation = trim($request->Occupation);
        $parent->Gender = trim($request->gender);
        if (!empty($request->file('pic'))) {
            $ext = $request->file('pic')->getClientOriginalExtension();
            $file = $request->file('pic');
            $randMaster = Str::random(20);
            $fileName = strtolower($randMaster) . '-' . $ext;
            $file->move('Uploads/Profile', $fileName);
            $parent->profile_pic = $fileName;

        }
        $parent->Address = trim($request->Address);
        $parent->Status = trim($request->status);
        if (!empty($request->pwd)) {
            $parent->password = Hash::make($request->pwd);

        }

        $parent->email = trim($request->email);
        $parent->save();
        return redirect('admin/Parents')->with('success', 'Parent Updated Successfully');
    }


    public function DeleteNewParent($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if (empty($data['getRecord'])) {
            abort(404);
        } else {
            $getRecord->is_delete = 1;
            $getRecord->save();
            return redirect('admin/Parents')->with('success', 'Parent Deleted Successfully');

        }
    }
    public function MyStudents($id)
    {
        $data['parent_id'] = $id;
        $data['getSearchStudent'] = User::getSearchStudent();
        // $data['getParent'] = User::getSingle($id);
        $data['getRecord'] = User::getMyStudent($id);
        $data['header_title'] = 'Parent StudentList';
        return view('admin.Parents.my_student', $data);
    }
    public function MyStudentsParent()
    {
        $id  = Auth::user()->id;
        $data['getRecord'] = User::getMyStudent($id);
        $data['header_title'] = 'Parent StudentList';
        return view('Parent.my_student', $data);
    }

    public function Assign_Student_Parent($student_id, $parent_id)
    {
        $student = User::getSingle($student_id);
        $student->parent_id=$parent_id;
        $student->save();
        return redirect()->back()->with('success', "Student Assigned Successfully");
    }

    public function Assign_Student_Parent_Delete($student_id)
    {
        $student = User::getSingle($student_id);
        $student->parent_id=null;
        $student->save();
        return redirect()->back()->with('success', "Student Assigned Successfully Deleted");
    }
}





