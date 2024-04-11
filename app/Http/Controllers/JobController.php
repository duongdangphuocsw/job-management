<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Job;
class JobController extends Controller
{
    public function create(Request $request)
    {
        $job = new Job();
        $job->title = $request->title;
        $job->description = $request->description;
        $job->save();
        return $job;
    }

    public function update($id, Request $request)
    {
        try {
            $job = Job::find($id);
            if(!$job) {
                return response()->json(["message" => "Id not valid"]);
            }
            $request->validate([
                'title' => 'required',
                'description' => 'required',
            ]);
            $job->description = $request->description;
            $job->save();
            return response()->json("Update successful!");
        } catch (Throwable $th) {
            throw $th;
        }
        return $job;
    }

    public function getJobs()
    {
        $jobs = Job::all();
        return $jobs;
    }

    public function getJob($id)
    {
        try {
            $job = Job::find($id);
            if (!$job) {
                return "Can't found";
            }
            return $job;
        } catch (Throwable $e) {
            report($e);
        }
    }


    public function delete($id)
    {
        
        try {
            $job = Job::find($id);
            if (!$job) {
                return response()->json(['message' => "Can't find"]);
            }
            $job->delete();
            return $job;
        } catch (Throwable $e) {
            report($e);
        }
    }
}