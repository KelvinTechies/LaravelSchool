<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Request;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    static public function getEmailSingle($email)
    {
        return User::where('email', '=', $email)->first();
    }
    static public function getTokenSingle($remember_token)
    {
        return User::where('remember_token', '=', $remember_token)->first();
    }
    static public function getAdmin()
    {
        $return = self::select('users.*')
            ->where('User_type', '=', 1)
            ->where('is_delete', '=', 0);
        if (!empty(Request::get('name'))) {
            $return = $return->where('name', 'like', '%' . Request::get('name') . '%');
        }

        if (!empty(Request::get('email'))) {
            $return = $return->where('email', 'like', '%' . Request::get('email') . '%');
        }
        if (!empty(Request::get('date'))) {
            $return = $return->whereDate('created_at', 'like', '%' . Request::get('date') . '%');
        }
        $return = $return->orderBy('id', 'desc')
            ->paginate(10);
        return $return;
    }


    static public function getParent()
    {
        $return = self::select('users.*')
            ->where('User_type', '=', 4)
            ->where('is_delete', '=', 0);
        if (!empty(Request::get('name'))) {
            $return = $return->where('name', 'like', '%' . Request::get('name') . '%');
        }

        if (!empty(Request::get('email'))) {
            $return = $return->where('email', 'like', '%' . Request::get('email') . '%');
        }
        if (!empty(Request::get('Phone'))) {
            $return = $return->where('Phone', 'like', '%' . Request::get('Phone') . '%');
        }
        if (!empty(Request::get('date'))) {
            $return = $return->whereDate('created_at', 'like', '%' . Request::get('date') . '%');
        }
        $return = $return->orderBy('id', 'desc')
            ->paginate(10);
        return $return;
    }


    static public function getStudent()
    {
        $return = self::select('users.*', 'class.Name as class_name')
            ->join('class', 'class.id', '=', 'users.Class_id', 'left')
            ->where('users.User_type', '=', 3)
            ->where('users.is_delete', '=', 0);
        if (!empty(Request::get('name'))) {
            $return = $return->where('users.name', 'like', '%' . Request::get('name') . '%');
        }
        if (!empty(Request::get('lstname'))) {
            $return = $return->where('users.Last_name', 'like', '%' . Request::get('lstname') . '%');
        }
        if (!empty(Request::get('email'))) {
            $return = $return->where('users.email', 'like', '%' . Request::get('email') . '%');
        }
        if (!empty(Request::get('admission_num'))) {
            $return = $return->where('users.Admission_Number', 'like', '%' . Request::get('admission_num') . '%');
        }
        if (!empty(Request::get('Admission_date'))) {
            $return = $return->whereDate('Admission_date', 'like', '%' . Request::get('Admission_date') . '%');
        }
        $return = $return->orderBy('users.id', 'desc')
            ->paginate(10);
        return $return;
    }


    static public function getSearchStudent()
    {
        if (!empty(Request::get('stuId')) || !empty(Request::get('name')) || !empty(Request::get('lstname')) || !empty(Request::get('email'))) {
            $return = self::select('users.*', 'class.Name as class_name', 'parent.name as parent_name')
                ->join('users as parent', 'parent.id', '=', 'users.parent_id', 'left')
                ->join('class', 'class.id', '=', 'users.Class_id', 'left')
                ->where('users.User_type', '=', 3)
                ->where('users.is_delete', '=', 0);
            if (!empty(Request::get('name'))) {
                $return = $return->where('users.name', 'like', '%' . Request::get('name') . '%');
            }
            if (!empty(Request::get('lstname'))) {
                $return = $return->where('users.Last_name', 'like', '%' . Request::get('lstname') . '%');
            }
            if (!empty(Request::get('email'))) {
                $return = $return->where('users.email', 'like', '%' . Request::get('email') . '%');
            }
            if (!empty(Request::get('phone'))) {
                $return = $return->where('users.email', 'like', '%' . Request::get('email') . '%');
            }
            if (!empty(Request::get('date'))) {
                $return = $return->where('users.Date_joined', 'like', '%' . Request::get('date') . '%');
            }
            $return = $return->orderBy('users.id', 'desc')
                ->limit(10)
                ->get();
            return $return;
        }
    }

    static public function getMyStudent($parent_id)
    {
        $return = self::select('users.*', 'class.Name as class_name')
            ->join('users as parent', 'parent.id', '=', 'users.parent_id')
            ->join('class', 'class.id', '=', 'users.Class_id')
            ->where('users.User_type', '=', 3)
            ->where('users.parent_id', '=', $parent_id)
            ->where('users.is_delete', '=', 0)
            ->orderBy('users.id', 'desc')
            ->get();
        return $return;
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }

    // static public function getProfile()
    // {
    //     if (!empty($this->profile_pic) && file_exists('Uploads/profile/' . $this->profile_pic)) {
    //         return url('Uploads/profile/' . $this->profile_pic);
    //     } else {
    //         return "";
    //     }
    // }

    static function getTeacher(){

        $return = self::select('users.*')
            ->where('User_type', '=', 2)
            ->where('is_delete', '=', 0);
        if (!empty(Request::get('name'))) {
            $return = $return->where('name', 'like', '%' . Request::get('name') . '%');
        }

        if (!empty(Request::get('email'))) {
            $return = $return->where('email', 'like', '%' . Request::get('email') . '%');
        }
        if (!empty(Request::get('date'))) {
            $return = $return->whereDate('created_at', 'like', '%' . Request::get('date') . '%');
        }
        $return = $return->orderBy('id', 'desc')
            ->paginate(10);
        return $return;
    }

    static function getTeacherClass(){

        $return = self::select('users.*')
            ->where('User_type', '=', 2)
            ->where('is_delete', '=', 0);
          $return = $return->orderBy('id', 'desc')
            ->get();
        return $return;
    }


    
    static public function getStudentClass($class_id)
    {
        return self::select('users.id', 'users.name', 'users.Last_name')
            ->where('users.class_id', '=', $class_id)
            ->where('users.User_type', '=', 3)
            ->where('users.is_delete', '=', 0)
            ->orderBy('users.id', 'desc')
            ->get();
    }


    static public function getTeacherStudent($teacher_id)
    {
        $return = self::select('users.*', 'class.Name as class_name')
            ->join('class', 'class.id', '=', 'users.Class_id')
            ->join('assignclassteacher', 'assignclassteacher.Class_id', '=', 'class.id')
            ->where('assignclassteacher.Teacher_id', '=', $teacher_id)
            ->where('assignclassteacher.Status', '=', 0)
            ->where('assignclassteacher.is_delete', '=', 0)
            ->where('users.User_type', '=', 3)
            ->where('users.is_delete', '=', 0);
        if (!empty(Request::get('name'))) {
            $return = $return->where('users.name', 'like', '%' . Request::get('name') . '%');
        }
        if (!empty(Request::get('lstname'))) {
            $return = $return->where('users.Last_name', 'like', '%' . Request::get('lstname') . '%');
        }
        if (!empty(Request::get('email'))) {
            $return = $return->where('users.email', 'like', '%' . Request::get('email') . '%');
        }
        if (!empty(Request::get('admission_num'))) {
            $return = $return->where('users.Admission_Number', 'like', '%' . Request::get('admission_num') . '%');
        }
        if (!empty(Request::get('Admission_date'))) {
            $return = $return->whereDate('Admission_date', 'like', '%' . Request::get('Admission_date') . '%');
        }
        $return = $return->orderBy('users.id', 'desc')
            ->paginate(5);
        return $return;
    }

    
}
