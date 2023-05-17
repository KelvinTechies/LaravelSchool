<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
class ClassSubjectModel extends Model
{
    use HasFactory;

    protected $table = 'classSubjects';

    static public function getRecord(){
       $return = self::select('classsubjects.*', 'class.name as class_name', 
        'subject.name as subject_name',
         'users.name as created_by_name')
        ->join('subject', 'subject.id', '=', 'classSubjects.subject_id')
        ->join('class', 'class.id', '=', 'classSubjects.class_id')
        ->join('users', 'users.id', '=', 'classSubjects.created_by')
        ->where('classsubjects.isDelete', '=', 0);
        if(!empty(Request::get('Class_name'))){
            $return = $return->where('class.name', 'like','%'. Request::get('Class_name').'%');
            
        }
        if(!empty(Request::get('Subject_name'))){
            $return = $return->where('subject.name', 'like','%'. Request::get('Subject_name').'%');
            
        }
        if(!empty(Request::get('date'))){
            $return = $return->whereDate('classSubjects.created_at', 'like', '%'.Request::get('date').'%');
        }
        $return = $return->orderBy('classSubjects.id', 'desc')
        ->paginate(4);
        return $return;
    }

    static public function MySubjects($Class_id){
        return self::select('classsubjects.*', 'subject.name as subject_name', 'subject.Type as subject_type')
                    ->join('subject', 'subject.id', '=', 'classSubjects.subject_id')
                    ->join('class', 'class.id', '=', 'classSubjects.class_id')
                    ->join('users', 'users.id', '=', 'classSubjects.created_by')
                    ->where('classsubjects.Class_id', '=', $Class_id)
                    ->where('classsubjects.isDelete', '=', 0)
                    ->where('classsubjects.Status', '=', 0)
                    ->orderBy('classSubjects.id', 'desc')
                    ->get();
     }
 



    static public function getFirst($class_id, $subject_id)
    {
       return self::where('class_id', '=', $class_id)->where('subject_id', '=', $subject_id)->first();
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getAssignSubjectId($class_id)
    {
        return self::where('class_id', '=', $class_id)->where('isDelete', '=', 0)->get();       
    }
    static public function deleteSubject($class_id)
    {
        return self::where('class_id', '=', $class_id)->delete();       
    }
}
