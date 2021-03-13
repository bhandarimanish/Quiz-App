@extends('backend.layouts.master')

	@section('title','create question')

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
                                <h3>All Questions</h3>
                            </div>

                            <div class="module-body">
                            	<table class="table table-striped">
								  <thead>
									<tr>
									  <th>#</th>
									  <th>Question</th>
									  <th>Quiz</th>
									  <th>Created</th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
									</tr>
								  </thead>
								  <tbody>
                                      @if(count($questions)>0)
                                      @foreach($questions as $key=>$question)
									<tr>
									  <td>{{$key+1}}</td>
									  <td>{{$question->name}}</td>
									  <td>{{$question->quiz->name}}</td>
									  <td>{{date('F d,Y',strtotime($question->created_at))}}</td>
                                      <td>
                                      <a href="{{route('question.show',$question->id)}}" class="btn btn-info">   
                                      View
                                      </a>
                                      </td>
                                      <td>
                                          <a href="{{route('question.edit',$question->id)}}" class="btn btn-primary">
                                            Edit
                                          </a>
                                      </td>
                                      <td>
                                       <form id="delete-form{{$question->id}}" method="POST" action="{{route('question.destroy',$question->id)}}"> 
                                           @method("DELETE")
                                           @csrf
                                       <form>
                                           <a href="#" onclick="if(confirm('Do you really wanna delete?'))
                                           {
                                               event.preventDefault();
                                               document.getElementById('delete-form{{$question->id}}').submit()
                                           }
                                           else {
                                            event.preventDefault();

                                           }
                                           " class="btn btn-danger">
                                        Delete
                                        </a>
                                       </td>
									</tr>
                                    @endforeach
                                     @else
                                     <td>Sorry! No Question To Display....<td>
                                     @endif
								  </tbody>
								</table>
                                <div class="w-100 h-100 d-flex justify-content-center align-questions-center">
                                {{ $questions->links() }}
                                </div>
                       		</div> 
                   		</div>
                		
                		</div>
           			 
           			</div>
        		</div> 

    @endsection