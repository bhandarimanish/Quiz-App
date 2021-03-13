@extends('backend.layouts.master')

	@section('title','show quiz')

	@section('content')

				<div class="span9">
                <div class="content">
                    @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                    @endif
                    <div class="content">
                    	
                        <div class="module">
                            <div class="module-head">
                                
                                  
                            </div>

                            <div class="module-body">
                            	
                     
                            <p><h3  class="heading">{{$question->name}}</h3></p>



                                <div class="module-body table">
                                    <table class="table table-message">
                                        <tbody>
                                            @foreach($question->answers as $key=>$answer)
                                            
                                            <tr class="read">
                                                
                                                
                                                <td class="cell-author hidden-phone hidden-tablet">
                                                    {{$key+1}}.&nbsp;{{$answer->answer}}
                                                    @if($answer->is_correct)
                                                    <span class="badge badge-success pull-right">correct</b></span>
                                                   @endif
                                                   </td>

                                                

                                               
                                            </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>

                                <div class="module-foot" style="display:flex">
                                <a href="{{route('question.edit',$question->id)}}" class="btn btn-primary">
                                            Edit
                                          </a>
                             &nbsp;&nbsp;&nbsp;
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
                                           " class="btn btn-danger" style="float:left">
                                        Delete
                                        </a>
                                     
                                        <a href="{{route('question.index')}}" class="btn btn-inverse pull-right" style="margin-left:630px">Back</a>
                                        </div>
                                        

                       	
                            </div>
                   		</div>
                		
                		</div>
           			 
           			</div>
        		</div> 

            </div> 
            </div> 


@endsection