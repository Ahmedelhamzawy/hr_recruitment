<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use App\Models\Job;
use App\Models\Recruiter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function post()
    {
        return view('jobs.post');
    }
    public function create(JobRequest $request)
    {
        $id = Auth::guard('recruiter')->id();
        $recruiter = Recruiter::find($id);
        $job = $recruiter->jobs()->create([
            'company_name' => $request->get('company_name'),
            'job_title' => $request->get('job_title'),
            'job_field' => $request->get('job_field'),
            'experience' => $request->get('experience'),
            'job_description' => $request->get('job_description'),
            'education_level' => $request->get('education_level')
        ]);
        $skills = [];
        foreach ($request->addMoreInputFields as $key => $value) {
            array_push($skills, array('job_id' => $job->id, 'skill' => $value['skill']));
        }
        $job->skills()->insert($skills);
        return redirect()->route('recruiter', ['id' => $id]);

    }
  
}
