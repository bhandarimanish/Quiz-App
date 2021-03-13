<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Quiz;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::all();
        return view('backend.quiz.index',compact('quizzes'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.quiz.create');
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
            'name'=>'required|string',
            'description'=>'required|min:3|max:500',
            'minutes'=>'required|integer'
            ]);
      $data = $request->all();
       Quiz::create($data);
        return redirect()->back()->with('message','Quiz created successfully'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz = Quiz::find($id);
        return view('backend.quiz.edit',compact('quiz'));
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
            'name'=>'required|string',
            'description'=>'required|min:3|max:500',
            'minutes'=>'required|integer'
            ]);
            $quiz = Quiz::find($id);
            $quiz->update($request->all());
        return redirect(route('quiz.index'))->with('message','Quiz updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quiz = Quiz::findorFail($id);
        $quiz->delete();
        return redirect(route('quiz.index'))->with('messages','Quiz deleted successfully');
    }

    public function validateForm($request)
    {
         return $this->validate($request,[
            'name'=>'required|string',
            'description'=>'required|min:3|max:500',
            'minutes'=>'required|integer'
            ]);
    }

    public function question($id)
    {
        $quizzes=Quiz::with('questions')->where('id',$id)->get();
        return view('backend.quiz.question',compact('quizzes'));
    }
}
