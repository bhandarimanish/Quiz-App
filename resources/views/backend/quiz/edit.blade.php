@extends('backend.layouts.master')

	@section('title','create quiz')

	@section('content')
	<div class="span9">
     <div class="content">
     <form action="{{route('quiz.update',$quiz->id)}}" method="POST">
            @csrf
            @method('PUT')
			<div class="module">
            <div class="module-head">
                <h3>Update Quiz</h3>
            </div>

            <div class="module-body">
                            	<div class="control-group">
				<label class="control-lable" for="name">Quiz name</label>
				<div class="controls"> 
					<input type="text" name="name"  value="{{$quiz->name}}"class="span8 @error('name') border-red @enderror" placeholder="name of a quiz" value=" {{old('name')}}   " >
				</div>
			     @error('name')
			    <span class="invalid-feedback" role="alert">
			        <strong style="color:red">{{ $message }}</strong>
			    </span>
			@enderror      

			</div>

			<div class="control-group">
				<label class="control-lable" for="name">Description</label>
				<div class="controls">
					<textarea name="description" class="span8 @error('description') is-invalid @enderror"> {{$quiz->description}}   </textarea>
				</div>
			        @error('description')
			        <span class="invalid-feedback" role="alert">
			            <strong style="color:red">{{ $message }}</strong>
			        </span>
			    @enderror

			</div>

			<div class="control-group">
				<label class="control-lable" for="name">Time(in minute)</label>
				<div class="controls">
					<input type="text" name="minutes" value="{{$quiz->minutes}}" class="span8 @error('minutes') is-invalid @enderror" placeholder="Duration of a quiz" value="{{old('minutes')}} " >
				</div>
			   @error('minutes')
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

        </form>

   		</div>
		</div>

<form>
</div>
</div>
                      
                    
@endsection