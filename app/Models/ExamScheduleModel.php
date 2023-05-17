<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamScheduleModel extends Model
{
    use HasFactory;

    protected $table = 'exam_schedule';

    static public function getRecordSingle($exam_id, $class_id, $subject_id)
    {
        return self::where('exam_id', '=', $exam_id)->where('class_id', '=', $class_id)->where('subject_id', '=', $subject_id)->first();
    }

    static public function deleteRecords($exam_id, $class_id)
    {
        return self::where('exam_id', '=', $exam_id)->where('class_id', '=', $class_id)->delete();

    }

    static public function getExamId($class_id)
    {
        return self::select('exam_schedule.*', 'exams.name as exam_name')
            ->join('exams', 'exams.id', '=', 'exam_schedule.exam_id')
            ->where('exam_schedule.class_id', '=', $class_id)
            ->groupBy('exam_schedule.exam_id')
            ->orderBy('exam_schedule.id', 'desc')
            ->get();
    }

    static public function getExamTimeTable($exam_id, $class_id)
    {
        return self::select('exam_schedule.*', 'subject.name as subject_name', 'subject.type as subject_type')
        ->join('subject', 'subject.id', '=', 'exam_schedule.subject_id')        
        ->where('exam_schedule.exam_id', '=', $exam_id)
        ->where('exam_schedule.class_id', '=', $class_id)
        ->get();
    }

    static public function getSubject($exam_id, $class_id)
    {
        return self::select('exam_schedule.*', 'subject.name as subject_name', 'subject.type as subject_type')
        ->join('subject', 'subject.id', '=', 'exam_schedule.subject_id')        
        ->where('exam_schedule.exam_id', '=', $exam_id)
        ->where('exam_schedule.class_id', '=', $class_id)
        ->get();
    }

    
}
