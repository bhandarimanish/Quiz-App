
@extends('layouts.app')

@section('content')

<quiz-component
   :time="{{$time}}"
   :quizId="{{$quiz->id}}"
   :quiz-questions = "{{$quizQuestions}}"
   :has-quiz-played ="{{$authuserhasplayedquiz}}"
   >

</quiz-component>
<!-- <script>
window.oncontextmenu=function()
{
   console.log("Right Click Disabled");
   return false;
}
</script> -->

@endsection