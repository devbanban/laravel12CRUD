@extends('layout')
@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-sm-3"></div>
    <div class="col-sm-9">

<h3> :: form Update Password  :: </h3>


<form action="/admins/reset/{{ $id }}" method="post">
@csrf
@method('put')

<div class="form-group row mb-2">
    <label class="col-sm-2"> name </label>
    <div class="col-sm-6">
        <input type="text" class="form-control" name="name" disabled placeholder="name" value="{{ $name }}">
    
    </div>
</div>

<div class="form-group row mb-2">
    <label class="col-sm-2"> Email/Username </label>
    <div class="col-sm-6">
        <input type="email" class="form-control" name="username" disabled placeholder="email" value="{{ $username }}" minlength="3">
    </div>
</div>

<div class="form-group row mb-2">
    <label class="col-sm-2"> New Password </label>
    <div class="col-sm-6">
        <input type="password" class="form-control" name="password" required placeholder="New Password 3 characters">
        @if(isset($errors))
        @if($errors->has('password'))
            <div class="text-danger"> {{ $errors->first('password') }}</div>
        @endif 
    @endif
    </div>
</div>


<div class="form-group row mb-2">
    <label class="col-sm-2"> Confirm Password </label>
    <div class="col-sm-6">
        <input type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password 3characters" min="3">
        @if(isset($errors))
        @if($errors->has('password_confirmation'))
            <div class="text-danger"> {{ $errors->first('password_confirmation') }}</div>
        @endif 
    @endif
    </div>
</div>


<div class="form-group row mb-2">
    <label class="col-sm-2">  </label>
    <div class="col-sm-6">
       <button type="submit" class="btn btn-primary"> Update  </button>
       <a href="/admins" class="btn btn-danger">cancel</a>
    </div>
</div>

</form>
    </div>
    </div>
</div>
    
@endsection