<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\ClassModel;

class ClassController extends Controller
{
    public function AdminClass()
    {
        $data['header_title'] = 'Class_list';
        $data['getRecord'] = ClassModel::getRecord();
        return view('admin.class.list', $data);
    }

    public function AdminAddClass()
    {
        $data['header_title'] = 'Add New Class';

        return view('admin.class.addClass', $data);

    }

    public function InsertNewClass(Request $request){
        $class = new ClassModel;

        $class->Name = $request->name;
        $class->status = $request->status;
        $class->created_by = Auth::user()->id;
        $class->save();
        return redirect('admin/class')->with('success', 'Class Created Successfully');
    }

    public function AdminEditClass($id){
        $data['header_title'] = 'Edit Class';
        $data['getRecord'] = ClassModel::getSingle($id);

        if(!empty( $data['getRecord'])){

            return view('admin.class.edit', $data);
        }else{
            abort(404);
        }

    }

    public function AdminUpdateClass($id, Request $request){
        $class = ClassModel::getSingle($id);

        $class->Name = $request->name;
        $class->status = $request->status;
        $class->save();
        return redirect('admin/class')->with('success', 'Class Updated Successfully');
        
    }
}
