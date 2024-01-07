<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dancer;

class DancerApiController extends Controller
{
    public function index()
    {
        $dancers = Dancer::orderBy('id')->get();
        return response()->json($dancers);
    }

    public function view(Dancer $dancer)
    {
        $dancer->load('style'); // Assuming you have a 'style' relationship in your Dancer model
        return response()->json($dancer);
    }

    public function store(Request $request) {
        $fields = $request->validate([
            'full_name' => 'required',
            'birth_date' => 'required|date',
            'gender' => 'required',
            'phone_number' => 'required|string',
        ]);

        // Sanitize phone number if needed
        $fields['phone_number'] = filter_var($fields['phone_number'], FILTER_SANITIZE_NUMBER_INT);

        $dancer = Dancer::create($fields);

        return response()->json([
            'status' => 'OK',
            'message' => 'Dancer with ID#' . $dancer->id . ' has been created'
        ]);
    }

    public function update(Request $request, Dancer $dancer) {
        $fields = $request->validate([
            'full_name' => 'string',
            'birth_date' => 'date',
            'gender' => 'string',
            'phone_number' => 'string', // Change the validation rule to accept a string
        ]);

        // Update the dancer with the validated fields
        $dancer->update($fields);

        return response()->json([
            'status' => 'OK',
            'message' => 'Dancer with ID# ' . $dancer->id . ' has been updated.'
        ]);
    }



    public function destroy(Dancer $dancer) {
        $details = $dancer->full_name.", ".$dancer->gender;
        $dancer->delete();

        return response()->json([
            'status' => 'OK',
            'message' => 'The dancer '. $details.  ' has been deleted.'
        ]);
    }
}
