@extends('backend.layouts.master')

	@section('title','create quiz')

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
                                <h3>All Quiz</h3>
                            </div>

                            <div class="module-body">
                            	<table class="table table-striped">
								  <thead>
									<tr>
									  <th>#</th>
									  <th>Name</th>
									  <th>Description</th>
									  <th>Minutes</th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
									</tr>
								  </thead>
								  <tbody>
                                      @if(count($quizzes)>0)
                                      @foreach($quizzes as $key=>$quiz)
									<tr>
									  <td>{{$key+1}}</td>
									  <td>{{$quiz->name}}</td>
									  <td>{{$quiz->description}}</td>
									  <td>{{$quiz->minutes}}</td>
                                      <td>
                                      <a href="{{route('quiz.question',$quiz->id)}}" class="btn btn-inverse">
                                      View Questions
                                      </a>
                                      </td>
                                      <td>
                                          <a href="{{route('quiz.edit',$quiz->id)}}"  class="btn btn-primary">
                                              Edit
                                          </a>
                                      </td>
                                      <td>
                                       <form id="delete-form{{$quiz->id}}" method="POST" action="{{route('quiz.destroy',$quiz->id)}}"> 
                                           @method("DELETE")
                                           @csrf
                                       <form>
                                           <a href="#" onclick="if(confirm('Do you really wanna delete?'))
                                           {
                                               event.preventDefault();
                                               document.getElementById('delete-form{{$quiz->id}}').submit()
                                           }
                                           else {
                                            event.preventDefault();

                                           }
                                           ">
                                        <input type="submit" value="Delete" class="btn btn-danger">
                                        </a>
                                       </td>
									</tr>
                                    @endforeach
                                     @else
                                     <td>Sorry! No Quiz To Display....<td>
                                     @endif
								  </tbody>
								</table>
                       		</div> 
                   		</div>
                		
                		</div>
           			 
           			</div>
        		</div> 

    @endsection