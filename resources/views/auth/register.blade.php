@extends('layout')
@section('content')

<div class="row h-100 justify-content-center align-items-center">
  <form action="{{route('custom-register')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label class="form-label">User Name</label>
      <input type="text" name="username" class="form-control">
      @if($errors->has('username'))
      @foreach($errors->get('username') as $error)
      <div class="text-danger">{{$error}}</div>
      @endforeach
      @endif
    </div>

    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1">
      @if($errors->has('password'))
      @foreach($errors->get('password') as $error)
      <div class="text-danger">{{$error}}</div>
      @endforeach
      @endif
    </div>
    <div class="mb-3">
      <select class="form-select" name="user_type" aria-label="Default select example">
        <option name="user_type" value="user_type" selected>User type</option>
        <option name="applicant" value="applicant">applicant</option>
        <option name="recruiter" value="recruiter">recruiter</option>
      </select>
      @if($errors->any()&&!($errors->has('password')||$errors->has('username')))
      <div class="text-danger">{{$errors->first()}}</div>
      @endif
    </div>
    <button type="submit" class="btn btn-primary mb-3">Submit</button>
    <h6>have an account? <a href="/login">login</a></h6>

  </form>
</div>
@endsection