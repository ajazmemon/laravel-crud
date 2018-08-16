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
      @if ($errors->has('application_name'))
      <div class="error" style="color: red">{{ $errors->first('application_name') }}</div>
      @endif
    </div>
    <div class="form-group">
      <label for="pwd">Title:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter title" name="title" value="{{@$blog->title}}">
      @if ($errors->has('title'))
      <div class="error" style="color: red">{{ $errors->first('title') }}</div>
      @endif
    </div>
    <div class="form-group">
      <label for="pwd">Address:</label>
      <textarea class="form-control" placeholder="Enter address" name="address">{{@$blog->address}}</textarea>
      @if ($errors->has('address'))
      <div class="error" style="color: red">{{ $errors->first('address') }}</div>
      @endif
    </div>
    <div class="form-group">
      <label for="pwd">Email:</label>
      <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{@$blog->email}}">
      @if ($errors->has('email'))
      <div class="error" style="color: red">{{ $errors->first('email') }}</div>
      @endif
    </div>

    <div class="form-group">
      <label for="pwd">Logo:</label>
      {!! Form::file('logo', array('class' => 'form-control')) !!}
      @if ($errors->has('logo'))
      <div class="error" style="color: red">{{ $errors->first('logo') }}</div>
      @endif
    </div>

    <div class="form-group">
      <label for="pwd">Getway:</label>
      {!! Form::select('getway', array('L' => 'Large', 'S' => 'Small'),null,['class' => 'form-control']) !!}
      @if ($errors->has('getway'))
      <div class="error" style="color: red">{{ $errors->first('getway') }}</div>
      @endif
    </div>
    
    <div class="form-check">
     		<?php @$buslist = @$blog->hobby;?>
        <br>

            <label class="form-check-inline">
              @if(isset($blog))
              {{ Form::checkbox('hobby[]', 1,  in_array(1, $buslist), array('class'=>'')) }}football
              @else
                {{ Form::checkbox('hobby[]', 1, null, array('class'=>'')) }}football
                @endif
            </label><br>
            <label class="form-check-inline">
              @if(isset($blog))
              {{ Form::checkbox('hobby[]', 2, in_array(2, $buslist), array('class'=>'')) }} basketball
              @else
                {{ Form::checkbox('hobby[]', 2,null, array('class'=>'')) }} basketball
                @endif
            </label><br>
            <label class="form-check-inline">
              @if(isset($blog))
              {{ Form::checkbox('hobby[]', 3, in_array(3, $buslist), array('class'=>'')) }} swimming
              @else
                {{ Form::checkbox('hobby[]', 3, null, array('class'=>'')) }} swimming
                @endif
            </label><br><br>
        </div>

        <div class="form-group">
          
      <label for="pwd">Gender:</label>
    		{!! Form::radio('gender', 'male',(@$blog->gender =='male'),array('id'=>'sex')) !!}Male
{!! Form::radio('gender', 'female', (@$blog->gender =='female'), array('id'=>'sex')) !!}  Female
    	</div>
    @if ($errors->has('gender'))
      <div class="error" style="color: red">{{ $errors->first('gender') }}</div>
      @endif
    <button type="submit" class="btn btn-primary">Submit</button>
  {{ Form::close() }}
</div>
@endsection