<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Quiz;
use App\Models\User;
use App\Models\Result;
use App\Models\Question;
use App\Models\Answer;
use DB;

class ExamController extends Controller
{
    public function create()
    {
        return view('backend.exam.create');
    }

    public function assignexam(Request $request)
    {
        $data = $request->all();
        $quizid=$data['quiz_id'];
        $quiz=Quiz::find($quizid);
        $userid=$data['user_id'];
        $quiz->users()->syncWithoutDetaching($userid);
        return redirect()->back()->with('message','Exam assigned to user successfully');
        
    }
    public function userexam(Request $request)
    {
        $quizzes=Quiz::get();
        return view('backend.exam.index',compact('quizzes'));
    }

    public function removeexam(Request $request)
    {
        $userid=$request->get('user_id');
        $quizid=$request->get('quiz_id');
        $quiz=Quiz::find($quizid);
        $result=Result::where('quiz_id',$quizid)->where('user_id',$userid)->exists();
        if($result)
        {
            return redirect()->back()->with('messages','Quiz has been already played so cant be deleted');
        }
        else{
         $quiz->users()->detach($userid);
         return redirect()->back()->with('messages','Now,Exam is not assigned to this user');
            }
     }

     //frontend

     public function getQuizQuestions(Request $request,$quizid)
     {
        $auth=auth()->user()->id;
        //check user has been assigned particular quiz
        $userId=DB::table('quiz_user')->where('user_id',$auth)->pluck('quiz_id')->toArray();
        if(!in_array($quizid,$userId))
        {
            return redirect()->to('/home')->with('error','You are not assigned this exam');
        }
        $quiz=Quiz::find($quizid);
        $time=Quiz::where('id',$quizid)->value('minutes');
        $quizQuestions=Question::where('quiz_id',$quizid)->with('answers')->get();
        $authuserhasplayedquiz=Result::where(['user_id'=>$auth,'quiz_id'=>$quizid])->get();
        //check whether user has already played if then not allow
        $wascompleted=Result::where('user_id',$auth)->whereIn('quiz_id',(new Quiz)->hasQuizAttempted())->pluck('quiz_id')->toArray();      
      if(in_array($quizid,$wascompleted)){
          return redirect()->to('/home')->with('error','You had already participated in this exam');
      } 
      return view('frontend/quiz',compact('quiz','time','quizQuestions','authuserhasplayedquiz'));
    }

     public function postQuiz(Request $request)
     {
         $questionId=$request['questionId'];
         $answerId=$request['answerId'];
         $quizId=$request['quizId'];
         
         $authuser=auth()->user();
         return $userQuestionAnswer=Result::updateOrCreate(
            ['user_id'=>$authuser->id, 'quiz_id'=>$quizId, 'question_id'=>$questionId],
            ['answer_id'=>$answerId]
         );
     }

     public function viewresult($userid,$quizid)
     {
         $results=Result::where('user_id',$userid)->where('quiz_id',$quizid)->get();
        return view('frontend.result-detail',compact('results'));
     }

     public function result()
     {
        $quizzes=Quiz::latest()->first();
        return view('backend.result.index',compact('quizzes'));   
     }

     public function userquizresult($userid,$quizid)
     {
         $results=Result::where('user_id',$userid)->where('quiz_id',$quizid)->get();
        $totalquestions=Question::where('quiz_id',$quizid)->count();
        $attemptquestions=Result::where('quiz_id',$quizid)->where('user_id',$userid)->count();
        $quiz=Quiz::where('id',$quizid)->get();
        $ans=[];
        foreach($results as $answer){
            array_push($ans,$answer->answer_id);
        }
        $usercorrectedanswer=Answer::whereIn('id',$ans)->where('is_correct',1)->count();
       $userwronganswer=$totalquestions-$usercorrectedanswer;
       if($attemptquestions){
        $percentage = ($usercorrectedanswer/$totalquestions)*100;
    }else{
        $percentage=0;
    }
       return view('backend.result.result',compact('results','totalquestions','attemptquestions',
       'usercorrectedanswer','userwronganswer','percentage','quiz')); 
    }
}
