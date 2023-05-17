<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
class ExamModel extends Model
{
    use HasFactory;
    protected $table = 'exams';
    

    static public function getRecord()
    {
        $return = self::select('exams.*', 'users.name as created_name')
                ->join('users', 'users.id', '=', 'exams.created_by');
                if(!empty(Request::get('name'))){
                    $return = $return->where('exams.name', 'like', '%'.Request::get('name').'%');
                }
        
        
                if(!empty(Request::get('date'))){
                    $return = $return->whereDate('exams.created_at', 'like', '%'.Request::get('date').'%');
                }
                $return = $return ->where('exams.is_delete', '=', 0)
                ->orderBy('exams.id', 'desc')
                ->paginate(5);
        return $return;
                
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getExam(){
        $return = self::select('exams.*')
        ->join('users', 'users.id', 'exams.created_by')
        ->where('exams.is_delete', '=', 0)
        ->orderBy('exams.name', 'asc')
        ->get();

        return $return;
    }

}
