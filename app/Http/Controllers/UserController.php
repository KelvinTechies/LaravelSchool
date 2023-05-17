<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Str;

class UserController extends Controller
{
    public function changePassword()
    {
        $data['header_title'] = 'Change Password';


        return view('profile.change_password', $data);
    }

    public function updatePwd(Request $request)
    {

        $user = User::getSingle(Auth::user()->id);

        if(Hash::check($request->old_pwd, $user->password)){

            $user->password = Hash::make($request->new_pwd);
            $user->save();

            return redirect()->back()->with('success', 'Password Updated Successfully');

        }else{
            return redirect()->back()->with('error', 'Password not Correct');
        }

        // return view('profile.change_password');
    }

    public function MyAccount()
    {
        $data['header_title'] = ' My Account';
        $data['getRecord'] = User::getSingle(Auth::user()->id);
if(Auth::user()->User_type == 1){

    return view('Admin.My_Account', $data);
}else if(Auth::user()->User_type == 2){
    return view('Student.My_Account', $data);
    
}else if(Auth::user()->User_type == 3){
    return view('Student.My_Account', $data);
    
}else if(Auth::user()->User_type == 4){
    return view('Parent.My_Account', $data);
    
}
    }

    public function UpdateAdminAccount(Request $request){
            //  dd($request->all());
$id = Auth::user()->id;
        $request->validate([
            'email'=>'required|email|unique:users,email'
        ]);
        $Admin->name  = trim($request->name);
        $Admin->email  = trim($request->email);
        $Admin->save();
        return redirect()->back()->with('success', 'Profile Updated Successfully');
        }
    public function UpdateTeacherAccount( Request $request)

    {
    //  dd($request->all());
$id = Auth::user()->id;
        $request->validate([
            'email' => 'required|email|unique:users,email'
        ]);

        $Teacher = User::getSingle($id);

        $Teacher->name = trim($request->name);
        $Teacher->Last_Name = trim($request->lst_name);
        $Teacher->Qualification = trim($request->Qualification);
        $Teacher->Work_Experience = trim($request->experience);
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
        $Teacher->email = trim($request->email);
        $Teacher->save();
        return redirect()->back()->with('success', 'Profile Updated Successfully');
}

public function UpdateStudentAccount(Request $request)

{
    // dd($request->all());
    $id = Auth::user()->id;
    $request->validate([
        'email'=>'required|email|unique:users,email'
    ]);

    $user = User::getSingle($id);

    $user->name =trim($request->name);
    $user->Last_Name =trim($request->lst_name);
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
        $user->Religion =trim($request->religion);
        $user->Phone =trim($request->fone);
        $user->Blood_Grp =trim($request->blood_grp);
        $user->Height =trim($request->height);
        $user->Weight =trim($request->weight);
        $user->email =trim($request->email);
        $user->save();
        return redirect()->back()->with('success', 'Profile Updated Successfully');
       

}
public function UpdateParentAccount(Request $request)
{
// dd($request->all());
    
    $request->validate([
        'email' => 'required|email|unique:users,email'
    ]);
$id = Auth::user()->id;
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
    $parent->email = trim($request->email);
    $parent->save();
    return redirect()->back()->with('success', 'Profile Updated Successfully');
}    

}
