@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
        @if(Session::has('error'))
    <div class="alert alert-danger">
        {{Session::get('error')}}
    </div>
    @endif
            <div class="card">
                <div class="card-header">Best Of Luck Do Your Best!!</div>
                @if($isExamassigned)
                @foreach($quizzes as $quiz)
                <div class="card-body" style="background-color: #A9C9FF;
background-image: linear-gradient(180deg, #A9C9FF 0%, #dec0d6 100%);
">
                  <p><h3>{{$quiz->name}}</h3></p>
                  <p>About Exam:{{$quiz->description}}</p>
                  <p>Tine Allocated:{{$quiz->minutes}} minutes</p>
                  <p>Number Of Questions:{{$quiz->questions->count()}}</p>
                  <p>
                  @if(!in_array($quiz->id,$wasQuizCompleted))
                      <a href="user/quiz/{{$quiz->id}}" class="btn btn-success">Start Quiz<a>
                      <span class="float-right" style="color:red"> Uncompleted</span>
                  @else
                  <b><a href="/result/user/{{auth()->user()->id}}/quiz/{{$quiz->id}}" class ="btn btn-primary">View Result</a></b>
                  <span class="float-right" style="color:#36a318">Completed</span>
                  @endif
                  </p>
                </div>
                <hr>
                @endforeach
                @else
                    <b>You have not assigned any exam</b>
                @endif
            </div>
        </div>
        <div class="row" style="margin-left:4px">
        <div class="card">
            <div class="card-header">
                User Profile
            </div>
            <div class="card-body" style="background-color: #8cb7ff;
background-image: linear-gradient(315deg, #8cb7ff 0%, #f7d3ed 100%);">
                <p>Email:{{auth()->user()->email}}</p>
                <p>Occupation:{{auth()->user()->occupation}}</p>
                <p>Address:{{auth()->user()->address}}</p>
                <p>Phone:{{auth()->user()->phone}}</p>

            </div>
        </div>
        </div>
    </div>
</div>
@endsection
