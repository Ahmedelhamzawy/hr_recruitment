
  <nav class="navbar navbar-dark bg-dark justify-content-between align-items-center">
  <a class="navbar-brand" href="/home">HR RECRUITMENT</a>

  <form class="mt-3" action="{{route('logout')}}" method="GET">
  @csrf
<button type="submit" class="btn btn-danger">logout</button>

</form>
</nav>
@extends('layout')
@section('content')

<form action="{{route('apply',$job->id)}}"  method="GET">
    <div class="row w-100 h-100 justify-content-center align-items-center">
        <div class="col-md-6">
        <?php
    $flag = false;
    ?>
    @if($job->applicants()->exists())
   
    @foreach($job->applicants()->get() as $applicant)
    @if($applicant->id == Auth::guard('applicant')->user()->id)
    <?php
    $flag = true;
    ?>
    @endif
    @endforeach
    @endif
    @if($flag)
     <h3 class="text-success">already applied</h3>
    @endif
<div class="card mt-5 bg-light" style="width: 18rem;">
  <div class="card-body">
    <h3 class="card-title">{{$job->company_name}}</h3>
    <h4 class="card-title">{{$job->job_field}}</h4>
    <h5 class="card-text">{{$job->job_title}}</h5>
    <h5>experience : {{$job->experience}} years</h5>
    <h5>education level : {{$job->education_level}}</h5>
    <h5>job description</h5>
    <p>{{$job->job_description}}</p>
    <h5>required skills
    </h5>
    @foreach($job->skills()->get() as $skill)
    <ul class="list-group">
  <li class="list-group-item">{{$skill->skill}}</li>
</ul>
    @endforeach

    @if($flag)
    <a class="btn btn-danger  mt-3" href="{{route('applicant')}}">close</a>
    @else
    <button type="submit" class="btn btn-primary mt-3">apply</button>
    <a class="btn btn-danger  mt-3" href="{{route('applicant')}}">close</a>
    @endif
 
   
  </div>
</div>
</div>
</div>
</form>
@endsection('content')