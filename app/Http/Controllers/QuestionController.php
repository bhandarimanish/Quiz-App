<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions=Question::latest()->paginate(5);
     return view('backend.question.index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
             'quiz'=>'required',
             'question'=>'required',
             'options'=>'required|array|min:3|unique:answers,answer',
             'correct_answer'=>'required', 
         ]);
        $question = new Question;
        $question->name = $request->question;
        $question->quiz_id= $request->quiz;
        $question->save();
        $data= new Answer;
        $data['options']=$request->options;
        $data['correct_answer']=$request->correct_answer;
        foreach($data['options'] as $key=>$option)
        {
           $is_correct=false;
           if($key==$data['correct_answer'])
           {
               $is_correct=true;
           }
           $answer = Answer::create([
           'question_id'=>$question->id,
            'answer'=>$option,
            'is_correct'=>$is_correct
           ]);
        }
        return redirect(route('question.create'))->with('message','Question created successfully'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question=Question::find($id);
        return view('backend.question.show',compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question=Question::find($id);
        return view('backend.question.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'quiz'=>'required',
            'question'=>'required',
            'options'=>'required|array|min:3',
            'correct_answer'=>'required', 
        ]);
       $question = Question::find($id);
       $question->name = $request->question;
       $question->quiz_id= $request->quiz;
       $question->update();
       Answer::where('question_id',$question->id)->delete();
       $data['options']=$request->options;
       $data['correct_answer']=$request->correct_answer;
       foreach($data['options'] as $key=>$option)
       {
          $is_correct=false;
          if($key==$data['correct_answer'])
          {
              $is_correct=true;
          }
          $answer = Answer::create([
          'question_id'=>$question->id,
           'answer'=>$option,
           'is_correct'=>$is_correct
          ]);
       }
       return redirect(route('question.show',$id))->with('message','Question updated successfully');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id);
        $question->delete();
        Answer::where('question_id',$question->id)->delete();
        return redirect()->route('question.index')->with('messages','Question deleted successfully');

    }
    
  
}
