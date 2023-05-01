<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApplyRequest;
use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\Applicantjob;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApplicantController extends Controller
{
    
    public function index()
    {
        return view('applicant.applicant', ['jobs' => Job::paginate(10)]);
    }
    public function show($id){
        $job = Job::find($id);
        return view('applicant.job',['job'=>$job]);
    }
    public function apply($id){
        $job = Job::find($id);
        $skills = $job->skills()->get();
         return view('applicant.apply',['skills'=>$skills,'job'=>$job]);
    }
    public function create(ApplyRequest $request,$id){
        $applicant_id = Auth::guard('applicant')->id();
        $applicant = Applicant::find($applicant_id);
       $applicant_job = $applicant->jobs()->attach($id,[
            'latest_company' => $request->get('latest_company'),
            'latest_title' => $request->get('latest_title'),
            'work_field' => $request->get('work_field'),
            'experience' => $request->get('experience'),
            'education_level' => $request->get('education_level')
        ]);
        $applicant_job =Applicantjob::find(DB::table('applicantjobs')->latest()->first()->id);
        foreach($request->get('skills') as $skill){
           
            $applicant_job->skills()->create(['skill'=>$skill]);
        }
    }
}
