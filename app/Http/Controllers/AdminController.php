<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
class AdminController extends Controller
{
    public function AdminList(){
        $data['getRecord']=User::getAdmin();
        
        $data['header_title'] = 'Admin-List';
    return view('admin.admin.list', $data);
        
    }

    public function AdminAdd(){
        $data['getRecord']=User::getAdmin();
        $data['header_title'] = 'Admin-Add-New';
        return view('admin.admin.Add', $data);
    }
    public function AdminEdit($id){
        $data['getRecord']=User::getSingle($id);
        if(empty(  $data['getRecord'])){
            abort(404);
        }else{

            $data['header_title'] = 'Admin-Edit';
            return view('admin.admin.Edit', $data);
        }
    }


    public function InsertNewAdmin(Request $request){
        $request->validate([
            'email'=>'required|email|unique:users'
        ]);
        $user = new User;
        $user->name  = trim($request->name);
        $user->email  = trim($request->email);
        $user->password  = Hash::make($request->pwd);
        $user->User_type  = 1;
        $user->save();
        return redirect('admin-list')->with('success', 'Admin Created Successfully');
    }

    public function AdminUpdate($id, Request $request){
        $request->validate([
            'email'=>'required|email|unique:users,email',$id
        ]);
        $user = User::getSingle($id);
        $user->name  = trim($request->name);
        $user->email  = trim($request->email);
        if(!empty($request->pwd)){
        $user->password  = Hash::make($request->pwd);
            
        }
        $user->save();
        return redirect('admin-list')->with('success', 'Admin Updated Successfully');
    }
}
