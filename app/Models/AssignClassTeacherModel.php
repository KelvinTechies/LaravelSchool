<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;


class AssignClassTeacherModel extends Model
{
    use HasFactory;
    protected $table = 'assignclassteacher';
    

    static public function getFirst($class_id, $Teacher_id)
    {
       return self::where('Class_id', '=', $class_id)->where('Teacher_id', '=', $Teacher_id)->first();
    }

    static public function getRecord(){
    $return = self::select('assignclassteacher.*', 'class.name as class_name', 
         'teacher.name as teacher_name',
          'users.name as created_by_name')
         ->join('users as teacher', 'teacher.id', '=', 'assignclassteacher.Teacher_id')
         ->join('class', 'class.id', '=', 'assignclassteacher.Class_id')
         ->join('users', 'users.id', '=', 'assignclassteacher.Created_by')
         ->where('assignclassteacher.is_delete', '=', 0);
         if(!empty(Request::get('Class_name'))){
             $return = $return->where('class.name', 'like','%'. Request::get('Class_name').'%');
             
         }
         if(!empty(Request::get('teacher_name'))){
             $return = $return->where('teacher.name', 'like','%'. Request::get('teacher_name').'%');
             
         }
         if(!empty(Request::get('type'))){
             $status = (Request::get('type') ==100) ? 0 : 1;
            $return = $return->where('teacher.Status', '=', $status);
            
        }
         if(!empty(Request::get('date'))){
             $return = $return->whereDate('assignclassteacher.created_at', 'like', '%'.Request::get('date').'%');
         }
         $return = $return->orderBy('assignclassteacher.id', 'desc')
         ->paginate(4);
         return $return;
     }

     static public function getSingle($id)
     {
         return self::find($id);
     }
 




     static public function getAssignTeacherId($class_id)
     {
         return self::where('class_id', '=', $class_id)->where('is_delete', '=', 0)->get();       
     }

     static public function deleteTeacher($class_id)
     {
         return self::where('Class_id', '=', $class_id)->delete();       
     }

     static public function getMyClassSubjects($teacher_id)

     {

        return self::select('assignclassteacher.*', 'class.name as class_name', 
        'subject.name as subject_name',
        'subject.type as subject_type', 'class.id as class_id', 'subject.id as subject_id')
        ->join('class', 'class.id', '=', 'assignclassteacher.Class_id')
        ->join('classSubjects', 'classsubjects.class_id', '=', 'class.id')
        ->join('subject', 'subject.id', '=', 'classsubjects.subject_id')
        ->where('assignclassteacher.is_delete', '=', 0)
        ->where('assignclassteacher.Status', '=', 0)
        ->where('subject.status', '=', 0)
        ->where('subject.isDelete', '=', 0)
        ->where('classSubjects.status', '=', 0)
        ->where('classSubjects.isDelete', '=', 0)
        ->where('assignclassteacher.Teacher_id', '=', $teacher_id)
        ->get();

     }


     static public function getMyClassSubjectGroup($teacher_id)

     {

        return self::select('assignclassteacher.*', 'class.name as class_name', 
         'class.id as class_id')
        ->join('class', 'class.id', '=', 'assignclassteacher.Class_id')
        ->where('assignclassteacher.is_delete', '=', 0)
        ->where('assignclassteacher.Status', '=', 0)
        ->where('assignclassteacher.Teacher_id', '=', $teacher_id)
        ->groupBy('assignclassteacher.Class_id')
        ->get();

     }



     static public function getMyTimeTable($class_id, $subject_id)
     {
        //  return 0;
        $getWeek = WeekModel::getDayUsingName(date('l'));

        return  classSubjectTimeTableModel::getRecordClassSubject($class_id,$subject_id,$getWeek->id);
        //  $classSubject;
        
     }

}
