<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classSubjectTimeTableModel extends Model
{
    use HasFactory;

    protected $table = 'class_time_table';

    static public function getRecordClassSubject($class_id, $subject_id, $week_id)
    {
        return classSubjectTimeTableModel::where('class_id', '=', $class_id)
        ->where('subject_id', '=', $subject_id)
        ->where('week_id', '=', $week_id)->first();
    }
}
