<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return response()->json(['job_s' => $jobs]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // Ajoutez d'autres règles de validation selon vos besoins
        ]);

        $job = Job::create($validatedData);

        return response()->json(['job_' => $job]);
    }

    public function show($id)
    {
        $job = Job::find($id);
        return response()->json(['job_' => $job]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // Ajoutez d'autres règles de validation selon vos besoins
        ]);

        $job = Job::find($id);
        $job->update($validatedData);

        return response()->json(['job_' => $job]);
    }

    public function destroy($id)
    {
        $job = Job::find($id);
        $job->delete();

        return response()->json(['message' => 'Job  deleted successfully']);
    }
}