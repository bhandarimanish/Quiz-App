@extends('backend.layouts.master')

	@section('title','exam assigned user')

	@section('content')
    <div class="span9">
                    <div class="content">
                    @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                    @endif
                    @if(Session::has('messages'))
                    <div class="alert alert-danger">
                        {{Session::get('messages')}}
                    </div>
                    @endif
                   <div class="module">
                         <div class="module-head">
                                <h3>All User Quiz</h3>
                            </div>

                            <div class="module-body">
                            	<table class="table table-striped">
								  <thead>
									<tr>
									  <th>#</th>
									  <th>Name</th>
									  <th>Quiz</th>
                                      <th></th>
									</tr>
								  </thead>
								  <tbody>
                                      @if(count($quizzes)>0)
                                      @foreach($quizzes as $quiz)
                                      @foreach($quiz->users as $key=>$user)
									<tr>
									  <td>{{$key+1}}</td>
									  <td>{{$user->name}}</td>
                                      <td>{{$quiz->name}}</td>
                                      <td>
                                      <a href="{{route('quiz.question',$quiz->id)}}" class="btn btn-inverse">
                                      View Questions
                                      </a>
                                      </td>
                                      <td>
                                        <form action="{{route('remove.exam')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{$user->id}}">
                                        <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
                                        <button class="btn btn-danger">Remove</button>
                                        <form>
                                      </td>
									</tr>
                                    @endforeach
                                    @endforeach
                                     @else
                                     <td>Sorry! No Users To Display....<td>
                                     @endif
								  </tbody>
								</table>
                       		</div> 
                   		</div>
                		
                		</div>
           			 
           			</div>
        		</div> 

    @endsection