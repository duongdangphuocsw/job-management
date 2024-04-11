<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $statuses = Status::all();
            return $statuses;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'key' => 'required',
            'value' => 'required',
        ]);

        try {
            $status = new Status();
            $status->key = $request->key;
            $status->value = $request->value;
            $status->save();
            return response()->json('Create successful!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        try {
            $status = Status::find($id);
            if (!$status) {
                return response()->json("Can't found");
            }
            return $status;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $status = Status::find($id);
            if (!$status) {
                return response()->json('Id not valid');
            }
            $status->key = $request->key;
            $status->value = $request->value;
            $status->save();
            return response()->json("Update successful!");
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $status = Status::find($id);
            if (!$status) {
                return response()->json(['message' => "Can't find"]);
            }
            $status->delete();
            return $status;
        } catch (Throwable $e) {
            report($e);
        }
    }
}