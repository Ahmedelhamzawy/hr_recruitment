<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

  <div class="container">
    <div class="col col-md-6">
      <div class="input-group mb-3">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <nav class="navbar navbar-light" style="background-color: #e3f2fd;">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#">My Posted Jobs <span class="sr-only"></span></a>
                </li>
              

            </div>
          </nav>
        </nav>
      </div>
    </div>


    <div class="row h-100 justify-content-center align-items-center">
      <div class="col col-md-6">
        <form action="{{route('create-job')}}" method="POST">
          @csrf


          <input class="form-control" type="text" name="company_name" placeholder="company name" aria-label="default input example">

          @if($errors->has('company_name'))
          @foreach ($errors->get('company_name') as $error)
          <div class="text-danger">{{$error}}</div>
          @endforeach
          @endif

          <br>
          <input class="form-control" type="text" name="job_title" placeholder="Job Title: enter required position for the vacant job" aria-label="default input example">
          @if($errors->has('job_title'))
          @foreach ($errors->get('job_title') as $error)
          <div class="text-danger">{{ $error }}</div>

          @endforeach
          @endif
          <br>
          <input class="form-control" type="text" name="job_field" placeholder="Job Field: enter the field for the vacant job" aria-label="default input example">
          @if($errors->has('job_field'))
          @foreach ($errors->get('job_field') as $error)
          <div class="text-danger">{{ $error }}</div>

          @endforeach
          @endif
          <br>

          <table class="table table-bordered" id="dynamicAddRemove">
                <tr>
                    <th>Skills</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td><input type="text" name="addMoreInputFields[0][skill]" placeholder="Enter skill" class="form-control" />
                    </td>
                    <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add Skill</button></td>
                </tr>
            </table>          @if($errors->has('skills'))
          @foreach ($errors->get('skills') as $error)
          <div class="text-danger">{{ $error }}</div>

          @endforeach
          @endif
          <br>

          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Job Description</label>
            <textarea class="form-control" name="job_description" id="exampleFormControlTextarea1" rows="3"></textarea> <!-- input>>job_description??  -->
            @if($errors->has('job_description'))
            @foreach ($errors->get('job_description') as $error)
            <div class="text-danger">{{ $error }}</div>

            @endforeach
            @endif
          </div>

          <div class="col col-md-3">
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

          <div class="col col-md-3">
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



          <div class="d-flex justify-content-end mt-3"> <button type="submit" class="btn btn-danger">Post Job</button></div>
        </form>
      </div>
    </div>

  </div>


  </div>
  </div>
</body>
<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
  var i = 0;
  $("#dynamic-ar").click(function() {
    ++i;
    $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +
      '][skill]" placeholder="Enter skill" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
    );
  });
  $(document).on('click', '.remove-input-field', function() {
    $(this).parents('tr').remove();
  });
</script>

</html>