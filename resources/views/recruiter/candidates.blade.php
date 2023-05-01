
  <nav class="navbar navbar-dark bg-dark justify-content-between align-items-center">
  <a class="navbar-brand" href="/home">HR RECRUITMENT</a>

  <form class="mt-3" action="{{route('logout')}}" method="GET">
  @csrf
<button type="submit" class="btn btn-danger">logout</button>

</form>
</nav>
@extends('layout')
@section('content')
@if($candidates)
<h3>Here are your candidates</h3>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">candidate name</th>
      <th scope="col">latest company</th>
      <th scope="col">latest title</th>
      <th scope="col">work field</th>
      <th scope="col">experience</th>
      <th scope="col">education level</th>
    <th>skills</th>
     

    </tr>
  </thead>
  <tbody>
  @foreach($candidates as $candidate)
  
<tr>
    <td>{{$applicants->where('id','=',$candidate->applicant_id)->first()->username}}</td>
      <td>{{$candidate->latest_company}}</td>
      <td>{{$candidate->latest_title}}</td>
      <td>{{$candidate->work_field}}</td>
      <td>{{$candidate->experience}}</td>
      <td>{{$candidate->education_level}}</td>
      <td>
      @foreach($candidate->skills()->get() as $skill)
     
      <ul>
  <li> {{$skill->skill}} </li>
</ul>
      @endforeach
      </td>
</tr>
@endforeach
  </tbody>
</table>

@else
<h2 class="text-danger">No Candidates Yet</h2>
@endif
<div class="d-flex">
  {!! $candidates->links() !!}
</div>
@endsection