@extends('layouts.app')
@section('content')
<div class="container">
	<h2>Laravel Form</h2>
	@if(isset($blog))
	{{ Form::open(array('route' => ['update',$blog->id],'files'=>true)) }}	
	@endif
  	{{ Form::open(array('route' => 'store','files'=>true)) }}
    <div class="form-group">
      <label for="email">Aplication Name:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter application name" name="application_name" value="{{@$blog->application_name}}">
    </div>
    <div class="form-group">
      <label for="pwd">Title:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter title" name="title" value="{{@$blog->title}}">
    </div>
    <div class="form-group">
      <label for="pwd">Address:</label>
      <textarea class="form-control" placeholder="Enter address" name="address">{{@$blog->address}}</textarea>
    </div>
    <div class="form-group">
      <label for="pwd">Email:</label>
      <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{@$blog->email}}">
    </div>

    <div class="form-group">
      <label for="pwd">Logo:</label>
      {!! Form::file('logo', array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
      <label for="pwd">Getway:</label>
      {!! Form::select('getway', array('L' => 'Large', 'S' => 'Small'),$blog->getway,['class' => 'form-control']) !!}
    </div>
    
    <div class="form-check">
    		
            <label class="form-check-inline">
                <input class="form-check-input" type="checkbox" name="hobby[]" value="1" 
                @if( in_array($blog->hobby, (array)1) ) checked="1" @endif /> football
            </label><br>
            <label class="form-check-inline">
                <input class="form-check-input" type="checkbox" name="hobby[]" value="2"  @if( in_array($blog->hobby, (array)2) ) checked="1" @endif> basketball
            </label><br>
            <label class="form-check-inline">
                <input class="form-check-input" type="checkbox" name="hobby[]" value="3" @if($blog->hobby == 3) checked @endif> swimming
            </label><br><br>
        </div>

        <div class="form-group">
      <label for="pwd">Gender:</label>
    		{!! Form::radio('gender', 'male', (old('gender') ==  'male'),array('id'=>'sex')) !!}Male
{!! Form::radio('gender', 'female', (old('gender') ==  'female'), array('id'=>'sex')) !!}  Frmale
    	</div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  {{ Form::close() }}
</div>
@endsection