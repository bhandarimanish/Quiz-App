@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
     <div class="col-md-8">
     <center><h2>Your Result</h2></center>
     <div style="background-color:#aab0fa;color:#4305a6">
     Totalquestion:&nbsp;{{$totalquestions}}<br>
     Attemptqsns:&nbsp;{{$attemptquestions}}<br>
     Correctans:&nbsp;{{$usercorrectedanswer}}<br>
     Percentage:&nbsp;{{round($percentage,2)}}%<br>
     </div>
     <br>
     @foreach($results as $key=>$result)
       <div class="card">
         <div class="card-header">
        Question {{$key+1}}
         </div>
         <div class="card-body" style="background-color:#ffc04a">
            <p>
            <h2>
            {{$result->question->name}}
            <hr>
            </h2>
            </p>
            @php
            $i=1;
            $answers=DB::table('answers')->where('question_id',$result->question_id)->get();
            foreach($answers as $ans)
            {
                echo'<p>'.$i++.')'
                .$ans->answer.
                '</p>';
            }
            @endphp
            <p>
           <strong> Your answer:&nbsp;{{$result->answer->answer}}</strong>
            </p>
            @php
            $correctAnswer=DB::table('answers')->where('question_id',$result->question_id)->where('is_correct',1)->get();
            foreach($correctAnswer as $ans)
            {
              echo "<mark>Correct Answer:&nbsp;".$ans->answer."</mark>";
            }
            @endphp

            @if($result->answer->is_correct)
            <p>
              <span class="badge badge-success">Correct</span>
            </p>
            @else
            <p>
              <span class="badge badge-danger">Incorrect</span>
            </p>
            @endif
         </div>
      </div>
      @endforeach
    </div>
  </div>
  @endsection