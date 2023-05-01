
  <nav class="navbar navbar-dark bg-dark justify-content-between align-items-center">
  <a class="navbar-brand" href="/home">HR RECRUITMENT</a>

  <form class="mt-3" action="{{route('logout')}}" method="GET">
  @csrf
<button type="submit" class="btn btn-danger">logout</button>

</form>
</nav>

@extends('layout')
@section('content')
@if(!$jobs->isEmpty())

<p class="d-none">{{$applicant=Auth::guard('applicant')->user();}}</p>
<h1>hello {{$applicant->username}} Find your job</h1>

@foreach($jobs as $job)
<form action="{{route('show-applicant-job',$job->id)}}" method="GET">
<div class="card mt-5" style="width: 18rem;">
  <div class="card-body">
    <h3 class="card-title">{{$job->company_name}}</h3>
    <h5 class="card-text">{{$job->job_title}}</h5>
    <h5>experience : {{$job->experience}} years</h5>
    <button type="submit" class="btn btn-primary">view</button>
  </div>
</div>
</form>
@endforeach
@else
<h1>there is no jobs for this moment comeback later</h1>
@endif
<div class="d-flex">
  {!! $jobs->links() !!}
</div>
@endsection
