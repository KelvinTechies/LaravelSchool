<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\classModel;
use Str;
use Hash;
class StudentController extends Controller
{
    public function AdminStudentList(){
        $data['getRecord']=User::getStudent();
        
        $data['header_title'] = 'Student-List';
    return view('admin.Student.list', $data);
        
    }

    public function AdminAddStudent()
    {
        $data['getClass'] = classModel::getClass();
        $data['header_title'] = 'Add New Student';

        return view('admin.student.add', $data);

    }

    public function InsertNewStudent(Request $request)

    {
        // dd($request->all());

        $request->validate([
            'email'=>'required|email|unique:users'
        ]);

        $user = new User;

        $user->name =trim($request->name);
        $user->Last_Name =trim($request->lst_name);
        $user->Admission_Number =trim($request->Admission_Number);
        $user->Ref_num =trim($request->Roll_Number);
        $user->Class_id =trim($request->class_id);
        $user->Gender =trim($request->gender);
        if(!empty($request->dob)){
            $user->Date_Of_Birth =trim($request->dob);

        }
        if(!empty($request->file('pic'))){
            $ext = $request->file('pic')->getClientOriginalExtension();
            $file = $request->file('pic');
            $randMaster = Str::random(20);
            $fileName = strtolower($randMaster).'-'.$ext;
            $file->move('Uploads/Profile', $fileName);
            $user->profile_pic =$fileName;
            
        }
            $user->Class =trim($request->name);
            $user->Caste =trim($request->caste);
            $user->Religion =trim($request->religion);
            $user->Phone =trim($request->fone);
            $user->Admission_date =trim($request->admission_date);
            $user->Blood_Grp =trim($request->blood_grp);
            $user->Height =trim($request->height);
            $user->Weight =trim($request->weight);
            $user->Status =trim($request->status);
            $user->password =Hash::make($request->pwd);
            $user->email =trim($request->email);
            $user->User_type =3;
            $user->save();
            return redirect('admin/students')->with('success', 'Students Added Successfully');
    }

    public function EditNewStudent($id){
        $data['getRecord']=User::getSingle($id);
        if(empty(  $data['getRecord'])){
            abort(404);
        }else{
            $data['getClass']=classModel::getClass($id);
            $data['header_title'] = 'Edit Student';
            return view('admin.student.Edit', $data);
        }
    }

    public function UpdateNewStudent($id, Request $request)
    {
        $request->validate([
            'email'=>'required|email|unique:users,email'
        ]);

        $user = User::getSingle($id);

        $user->name =trim($request->name);
        $user->Last_Name =trim($request->lst_name);
        $user->Admission_Number =trim($request->Admission_Number);
        $user->Ref_num =trim($request->Roll_Number);
        $user->Class_id =trim($request->class_id);
        $user->Gender =trim($request->gender);
        if(!empty($request->dob)){
            $user->Date_Of_Birth =trim($request->dob);

        }
        if(!empty($request->file('pic'))){
            $ext = $request->file('pic')->getClientOriginalExtension();
            $file = $request->file('pic');
            $randMaster = Str::random(20);
            $fileName = strtolower($randMaster).'-'.$ext;
            $file->move('Uploads/Profile', $fileName);
            $user->profile_pic =$fileName;
            
        }
            $user->Class =trim($request->name);
            $user->Caste =trim($request->caste);
            $user->Religion =trim($request->religion);
            $user->Phone =trim($request->fone);
            $user->Admission_date =trim($request->admission_date);
            $user->Blood_Grp =trim($request->blood_grp);
            $user->Height =trim($request->height);
            $user->Weight =trim($request->weight);
            $user->Status =trim($request->status);            
                if(!empty($request->pwd)){
                    $user->password =Hash::make($request->pwd);

                }

            $user->email =trim($request->email);
            $user->save();
            return redirect('admin/students')->with('success', 'Students Updated Successfully');
    }

    public function DeleteNewStudent($id)
    {
        $data['getRecord']=User::getSingle($id);
        if(empty(  $data['getRecord'])){
            abort(404);
        }else{
            $getRecord->is_delete = 1;
            $getRecord->save();
            return redirect('admin/students')->with('success', 'Students Deleted Successfully');
            
        }
    }

    // teacher side work

    public function MyStudents(){
        $data['getRecord']=User::getTeacherStudent(Auth::user()->id);
        
        $data['header_title'] = 'My Student';
    return view('Teacher.mystudent', $data);
        
    }
}
