<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::all();
        return response()->json(['applications' => $applications]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            // Ajoutez d'autres règles de validation selon vos besoins
        ]);

        $application = Application::create($validatedData);

        return response()->json(['application' => $application]);
    }

    public function show($id)
    {
        $application = Application::find($id);
        return response()->json(['application' => $application]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            // Ajoutez d'autres règles de validation selon vos besoins
        ]);

        $application = Application::find($id);
        $application->update($validatedData);

        return response()->json(['application' => $application]);
    }

    public function destroy($id)
    {
        $application = Application::find($id);
        $application->delete();

        return response()->json(['message' => 'Application deleted successfully']);
    }
}
