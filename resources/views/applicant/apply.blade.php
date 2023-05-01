
  <nav class="navbar navbar-dark bg-dark justify-content-between align-items-center">
  <a class="navbar-brand" href="/home">HR RECRUITMENT</a>

  <form class="mt-3" action="{{route('logout')}}" method="GET">
  @csrf
<button type="submit" class="btn btn-danger">logout</button>

</form>
</nav>
@extends('layout')
@section('content')
<div class="row h-100 justify-content-center align-items-center">
    <div class="col col-md-6">
        <form action="{{route('custom-apply',$job->id)}}" method="POST">
            @csrf



            <input class="form-control" type="text" name="latest_company" placeholder="enter latest company name you worked in" aria-label="default input example">

            @if($errors->has('latest_company'))
            @foreach ($errors->get('latest_company') as $error)
            <div class="text-danger">{{$error}}</div>
            @endforeach
            @endif

            <br>
            <input class="form-control" type="text" name="latest_title" placeholder="Job Title: enter latest job position you had" aria-label="default input example">
            @if($errors->has('latest_title'))
            @foreach ($errors->get('latest_title') as $error)
            <div class="text-danger">{{ $error }}</div>

            @endforeach
            @endif
            <br>


            <input class="form-control" type="text" name="work_field" placeholder="Job Field: enter your work field (e.g: Engineering, IT Managment, etc..)" aria-label="default input example">
            @if($errors->has('work_field'))
            @foreach ($errors->get('work_field') as $error)
            <div class="text-danger">{{ $error }}</div>

            @endforeach
            @endif



            <br>
             
            

           
<div class="mb-3">
                                <label>Select Skills :</label><br/>
                                <select class="selectpicker" multiple data-live-search="true" name="skills[]">
                                @foreach($skills as $key => $skill)

<option name="" value="{{$skill->skill}}">{{$skill->skill}}</option>

@endforeach
                                </select>
                                @if($errors->has('skills'))
            @foreach ($errors->get('skills') as $error)
            <div class="text-danger">{{ $error }}</div>

            @endforeach
            @endif
                            </div>






            <div class="col col-md-6">
                <select name="education_level" class="form-select" aria-label="Default select example">
                    <option selected>Education Level</option>


                    <option name="education_level" value="Associate">Associate</option>
                    <option name="education_level" value="Bachelor's">Bachelor's</option>
                    <option name="education_level" value="Master's">Master's</option>
                    <option name="education_level" value="Doctoral">Doctoral </option>



                </select>
                @if($errors->has('education_level'))
            @foreach ($errors->get('education_level') as $error)
            <div class="text-danger">{{ $error }}</div>

            @endforeach
            @endif
            </div>
            <br>
            <div class="col col-md-6">
                <select name="experience" class="form-select" aria-label="Default select example">
                    <option selected>Experience</option>


                    <option name="experience" value="1">1 Year</option>
                    <option name="experience" value="2">2 Years</option>
                    <option name="experience" value="3">3 Years</option>
                    <option name="experience" value="4">4 Years</option>
                    <option name="experience" value="5">5 Years</option>
                    <option name="experience" value="6">6 Years</option>
                    <option name="experience" value="7">7 Years</option>
                    <option name="experience" value="8">8 Years</option>
                    <option name="experience" value="9">9 Years</option>
                    <option name="experience" value="10">10 Years</option>
                    <option name="experience" value="11">11 Years</option>
                    <option name="experience" value="12">12 Years</option>
                    <option name="experience" value="13">13 Years</option>
                    <option name="experience" value="14">14 Years</option>
                    <option name="experience" value="15">15 Years</option>
                    <option name="experience" value="16">16 Years</option>
                    <option name="experience" value="17">17 Years</option>
                    <option name="experience" value="18">18 Years</option>
                    <option name="experience" value="19">19 Years</option>
                    <option name="experience" value="20">20 Years</option>
                    <option name="experience" value="21">21 Years</option>
                    <option name="experience" value="22">22 Years</option>
                    <option name="experience" value="23">23 Years</option>
                    <option name="experience" value="24">24 Years</option>
                    <option name="experience" value="25">25 Years</option>
                    <option name="experience" value="26">26 Years</option>
                    <option name="experience" value="27">27 Years</option>
                    <option name="experience" value="28">28 Years</option>
                    <option name="experience" value="29">29 Years</option>
                    <option name="experience" value="30">30 Years</option>


                </select>
                @if($errors->has('experience'))
            @foreach ($errors->get('experience') as $error)
            <div class="text-danger">{{ $error }}</div>

            @endforeach
            @endif
            </div>

            <br>

            <div class="d-flex justify-content-end mt-3"> <button type="submit" class="btn btn-primary">Apply</button></div>
        </form>
    </div>
</div>

</div>


</div>
@endsection