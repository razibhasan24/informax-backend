<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Submission;

class SubmissionController extends Controller
{
    // Get all submissions
    public function index()
    {
        $submissions = Submission::orderBy('id', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => $submissions
        ]);
    }

    // Store new submission
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'message' => 'required|string'
        ]);

        $submission = Submission::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Submission saved successfully',
            'data' => $submission
        ]);
    }
}
