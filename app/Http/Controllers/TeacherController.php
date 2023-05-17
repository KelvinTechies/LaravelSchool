<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Str;


class TeacherController extends Controller
{
    public function AdminTeacherList()

    {
        $data['getRecord'] = User::getTeacher();
        $data['header_title'] = 'Teachers List';
        return view('admin.teacher.list', $data);
    }

    public function AdminAddTeacher()

    {
        $data['getRecord'] = User::getTeacher();
        $data['header_title'] = 'Add New Teacher';
        return view('admin.teacher.add', $data);
    }

    public function InsertNewTeacher(Request $request)

    {
        //   dd($request->all());

        $request->validate([
            'email' => 'required|email|unique:users'
        ]);

        $Teacher = new User;

        $Teacher->name = trim($request->name);
        $Teacher->Last_Name = trim($request->lst_name);
        $Teacher->Qualification = trim($request->Qualification);
        $Teacher->Work_Experience = trim($request->experience);
        $Teacher->Note = trim($request->Note);
        $Teacher->Date_joined = trim($request->dateJoined);
        $Teacher->Gender = trim($request->gender);
        if (!empty($request->dob)) {
            $Teacher->Date_Of_Birth = trim($request->dob);

        }
        if (!empty($request->file('pic'))) {
            $ext = $request->file('pic')->getClientOriginalExtension();
            $file = $request->file('pic');
            $randMaster = Str::random(20);
            $fileName = strtolower($randMaster) . '-' . $ext;
            $file->move('Uploads/Profile', $fileName);
            $Teacher->profile_pic = $fileName;

        }
        $Teacher->Marital_Status = trim($request->marital);
        $Teacher->Phone = trim($request->fone);
        $Teacher->Permanent_Address = trim($request->address2);
        $Teacher->Address = trim($request->address1);
        $Teacher->Status = trim($request->status);
        $Teacher->password = Hash::make($request->pwd);
        $Teacher->email = trim($request->email);
        $Teacher->User_type = 2;
        $Teacher->save();
        return redirect('admin/Teachers')->with('success', 'Teacher Added Successfully');
    }

    public function EditNewTeacher($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if (empty($data['getRecord'])) {
            abort(404);
        } else {
            $data['header_title'] = 'Edit Teacher';
            return view('admin.Teacher.Edit', $data);
        }
    }

    public function UpdateNewTeacher($id, Request $request)

    {
    //  dd($request->all());

        $request->validate([
            'email' => 'required|email|unique:users,email', $id
        ]);

        $Teacher = User::getSingle($id);

        $Teacher->name = trim($request->name);
        $Teacher->Last_Name = trim($request->lst_name);
        $Teacher->Qualification = trim($request->Qualification);
        $Teacher->Work_Experience = trim($request->experience);
        $Teacher->Note = trim($request->Note);
        $Teacher->Date_joined = trim($request->dateJoined);
        $Teacher->Gender = trim($request->gender);
        if (!empty($request->dob)) {
            $Teacher->Date_Of_Birth = trim($request->dob);

        }
        if (!empty($request->file('pic'))) {
            $ext = $request->file('pic')->getClientOriginalExtension();
            $file = $request->file('pic');
            $randMaster = Str::random(20);
            $fileName = strtolower($randMaster) . '-' . $ext;
            $file->move('Uploads/Profile', $fileName);
            $Teacher->profile_pic = $fileName;

        }
        $Teacher->Marital_Status = trim($request->marital);
        $Teacher->Phone = trim($request->fone);
        $Teacher->Permanent_Address = trim($request->address2);
        $Teacher->Address = trim($request->address1);
        $Teacher->Status = trim($request->status);
        if (!empty($request->pwd)) {
            $Teacher->password = Hash::make($request->pwd);

        }

        $Teacher->email = trim($request->email);
        $Teacher->save();
        return redirect('admin/Teachers')->with('success', 'Teacher Updated Successfully');
    }


    public function DeleteNewTeacher($id)

    {
        $data['getRecord'] = User::getSingle($id);
        if (empty($data['getRecord'])) {
            abort(404);
        } else {
            $getRecord->is_delete = 1;
            $getRecord->save();
            return redirect('admin/Teachers')->with('success', 'Teacher Deleted Successfully');

        }
    }
}