@extends('backend.layouts.master')

	@section('title','Update Question')

	@section('content')

	<div class="span9">
     <div class="content">

     	@if(Session::has('message'))

     		<div class="alert alert-success">{{Session::get('message')}}</div>
     	@endif



     <form action="{{route('question.update',$question->id)}}" method="POST">@csrf
         @method('PUT')
			
	<div class="module">
            <div class="module-head">
                <h3>Update Question</h3>
            </div>


            <div class="module-body">
                 <div class="control-group">
				<label class="control-lable" for="name">Choose Quiz</label>
				<div class="controls"> 
					<select name="quiz" class="span8 ">
					
						@foreach(App\Models\Quiz::all() as $quiz)
						<option value="{{$quiz->id}}"
                        @if($quiz->id==$question->quiz_id)selected
                        @endif    
                        >{{$quiz->name}}</option>
						@endforeach

					</select>
				</div>
			     @error('quiz')
			    <span class="invalid-feedback" role="alert">
			        <strong style="color:red">{{ $message }}</strong>
			    </span>
			@enderror      

			</div>

            <div class="control-group">
				<label class="control-lable" for="name">Question name</label>
				<div class="controls"> 
					<input type="text" name="question" class="span8 @error('name') border-red @enderror" placeholder="name of a quiz" value="{{$question->name}} " >
				</div>
			     @error('question')
			    <span class="invalid-feedback" role="alert">
			        <strong style="color:red">{{ $message }}</strong>
			    </span>
			@enderror      

			</div>

			 <div class="control-group">
				<label class="control-lable" for="options">Options</label>
				<div class="controls"> 
					@foreach($question->answers as $key=>$answer)
					<input type="text" name="options[]" 
                    value="{{$answer->answer}}"
                    class="span7 @error('name') border-red @enderror" required>

					<input type="radio" name="correct_answer" value="{{$key}}"
                    @if($answer->is_correct)
                    {{'checked'}}
                    @endif
                    required><span>Is correct answer</span>
					@endforeach
				</div>
			     @error('options')
			    <span class="invalid-feedback" role="alert">
			        <strong style="color:red">{{ $message }}</strong>
			    </span>
			@enderror 
			     

			</div>
			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn btn-success">Update</button>
				</div>

		    </div>


   		</div>
	</div>

</form>


</div>
</div>
                      
                    
@endsection