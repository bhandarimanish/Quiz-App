@extends('backend.layouts.master')

	@section('title','view question')

	@section('content')

				<div class="span9">
                    <div class="content">
                    	
                    @foreach($quizzes as $quiz)
                        <div class="module">
                            <div class="module-head">
                                
                                  
                            </div>

                            <div class="module-body">
                            	
                                
                            <p><h3  class="heading"><u>{{$quiz->name}}</u></h3></p>



                                <div class="module-body table">

                                @foreach($quiz->questions as $question)
                                    <table class="table table-message">
                                        <tbody>
                                            
                                            
                                            <tr class="read">
                                               <h4>{{$question->name}}</h4>
                                                
                                                <td class="cell-author hidden-phone hidden-tablet">
                                                    @foreach($question->answers as $answer)
                                                    <p>
                                                        {{$answer->answer}}

                                                    @if($answer->is_correct)
                                                    <span class="badge badge-success">correct</span>
                                                    @endif
                                                    </p>
                                                    @endforeach
                                                    
                                                </td>
         
                                            </tr>
                                        </tbody>
                                    </table>
                                    @endforeach
                                </div>
                            @endforeach
                            <div class="modeule-foot">
                                                        <td>
                                                        <a href="{{route('quiz.index')}}" class="btn btn-inverse ">Back</a>
                                                        </td>
                                                    </div>

                       	
                            </div>
                   		</div>
                		
                		</div>
           			 
           			</div>
        		</div> 

            </div> 
            </div> 


@endsection