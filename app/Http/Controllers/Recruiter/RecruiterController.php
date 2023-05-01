<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\Applicantjob;
use App\Models\Job;
use Illuminate\Http\Request;

use App\Models\Recruiter;
use Illuminate\Support\Facades\Auth;

class RecruiterController extends Controller
{
    public function index()
    {
        $recruiter = Auth::guard('recruiter')->user();
        $jobs = $recruiter->jobs()->paginate(10);
        return view('recruiter.recruiter',['jobs'=>$jobs]);
    }
    public function show($id){
        $job = Job::find($id);
        return view('recruiter.job',['job'=>$job]);
    }
    public function candidates($id){
        $candidates = Applicantjob::where('job_id','=',$id)->paginate(10);
        $applicants = Applicant::all();
        return view('recruiter.candidates',['applicants'=>$applicants,'candidates'=>$candidates]);
    }
}
