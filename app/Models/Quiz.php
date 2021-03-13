<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Quiz;
use App\Models\Result;
use App\Models\User;
class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'minutes'
    ];
    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function users()
    {
        return $this->belongsTomany(User::class,'quiz_user');
    } 

    //for frontend to know if user has played the quiz or not
    public function hasQuizAttempted()
    {
        $attemptQuiz=[];
        $auth=auth()->user()->id;
        $user=Result::where('user_id',$auth)->get();
        foreach($user as $u)
        {
            array_push($attemptQuiz,$u->quiz_id);
        }
        return $attemptQuiz;
    }


}
