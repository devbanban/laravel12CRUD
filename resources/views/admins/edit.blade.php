@extends('layout')
@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-sm-3"></div>
    <div class="col-sm-9">

<h3> :: form Update Admin   :: </h3>


<form action="/admins/{{ $id }}" method="post">
@csrf
@method('put')

<div class="form-group row mb-2">
    <label class="col-sm-2"> Admin Name </label>
    <div class="col-sm-6">
        <input type="text" class="form-control" name="name" required placeholder="name" value="{{ $name }}">
        @if(isset($errors))
        @if($errors->has('name'))
            <div class="text-danger"> {{ $errors->first('name') }}</div>
        @endif 
    @endif
    </div>
</div>

<div class="form-group row mb-2">
    <label class="col-sm-2"> phone </label>
    <div class="col-sm-6">
        <input type="tel" class="form-control" name="phone" required placeholder="phone" value="{{ $phone }}">
        @if(isset($errors))
        @if($errors->has('phone'))
            <div class="text-danger"> {{ $errors->first('phone') }}</div>
        @endif 
    @endif
    </div>
</div>

<div class="form-group row mb-2">
    <label class="col-sm-2"> Email/Username </label>
    <div class="col-sm-6">
        <input type="email" class="form-control" name="username" required placeholder="username" value="{{ $username }}">
        @if(isset($errors))
        @if($errors->has('username'))
            <div class="text-danger"> {{ $errors->first('username') }}</div>
        @endif 
    @endif
    </div>
</div>
 

<div class="form-group row mb-2">
    <label class="col-sm-2">  </label>
    <div class="col-sm-5">
       <button type="submit" class="btn btn-primary"> Update  </button>
       <a href="/admins" class="btn btn-danger">cancel</a>
    </div>
</div>

</form>
    </div>
    </div>
</div>
    
@endsection