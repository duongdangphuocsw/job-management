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
        $job->status_id = $request->status_id;
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
        foreach ($jobs as $job) {
            // Access user properties
            echo $job->statuses;
        
            // Access user's posts
            // foreach ($user->posts as $post) {
            //     // Access post properties
            //     echo "Post ID: " . $post->id . ", Title: " . $post->title . "\n";
            // }
        }
        // $test = Job::status();
        return $jobs;
        // return $test;
    }

    public function getJob($id)
    {
        try {
            $job = Job::find($id);
            if (!$job) {
                return "Can't found";
            }
            return $job->status;
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