@extends('backend.layouts.master')

	@section('title','user result')

	@section('content')
<div class="span9">
                    <div class="content">
                    	
                        <div class="module">
                            <div class="module-head">
                                <h3>Result</h3>
                            </div>

                        
                            	<table class="table table-striped">
								  <thead >
									<tr>
									  <th>#</th>
									  <th> Quiz</th>
									  <th>Total Questions</th>
									  <th>Attempt Questions</th>
                                      <th>Correct Answer</th>
                                      <th>Wrong Answer</th>
                                      <th>Percentage</th>
									</tr>
								  </thead>
								  <tbody>
                                    @foreach($quiz as $key=>$q)
									<tr>
									  <td>{{$key+1}}</td>
									  <td>{{$q->name}}</td>
									  <td>{{$totalquestions}}</td>
									  <td>{{$attemptquestions}}</td>
                                      <td>{{$usercorrectedanswer}}</td>
                                      <td>{{$userwronganswer}}</td>
                                      <td>{{round($percentage,2)}}%</td>
									</tr>
                                    @endforeach
								  </tbody>
								</table>
								<br>
								<br>
                                <table class="table table-dark">
								  <thead>
									<tr style="background-color:lightblue">
									  <th>#</th>
									  <th> Questions</th>
                                     <th>Answer Given</th>
                                      <th>Result</th>
									</tr>
								  </thead>
								  <tbody>
                                    @foreach($results as $key=>$res)
									<tr>
									  <td>{{$key+1}}</td>
									  <td>{{$res->question->name}}</td>
									  <td>{{$res->answer->answer}}</td>
                                      @if($res->answer->is_correct)
									  <td style="color:green">Correct</td>
                                      @else
                                      <td style="color:red">Wrong</td>
                                      @endif
									</tr>
                                    @endforeach
								  </tbody>
								</table>
                       		</div>
                   		</div>
                		
                		</div>
           			 
           			</div>
        		</div> 
@endsection

<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
td { text-align: center; }
</style>