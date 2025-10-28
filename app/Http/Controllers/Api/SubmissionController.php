<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    // Display a listing of all submissions.
    public function index()
    {
        $submissions = Submission::orderBy('id', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => $submissions
        ]);
    }
        
    
     // Store a newly created submission in storage.
     
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


     // Display the specified submission.
     
    public function show($id)
    {
        $submission = Submission::find($id);

        if (!$submission) {
            return response()->json([
                'success' => false,
                'message' => 'Submission not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $submission
        ]);
    }

    
     // Update the specified submission in storage.
     
    public function update(Request $request, $id)
    {
        $submission = Submission::find($id);

        if (!$submission) {
            return response()->json([
                'success' => false,
                'message' => 'Submission not found'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:100',
            'email' => 'sometimes|required|email',
            'message' => 'sometimes|required|string'
        ]);

        $submission->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Submission updated successfully',
            'data' => $submission
        ]);
    }

    // Remove the specified submission from storage.
    
    public function destroy($id)
    {
        $submission = Submission::find($id);

        if (!$submission) {
            return response()->json([
                'success' => false,
                'message' => 'Submission not found'
            ], 404);
        }

        $submission->delete();

        return response()->json([
            'success' => true,
            'message' => 'Submission deleted successfully'
        ]);
    }
}
