<?php

namespace App\Http\Controllers;
use App\Models\Style;

use Illuminate\Http\Request;

class StyleApiController extends Controller
{
    public function index() {
        $styles = Style::orderBy('id')->get();

        return response()->json($styles);
    }

    public function view(Style $style) {
        $style->load('dancer');
        return response()->json($style);
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'dancer_id' => 'required|exists:dancers,id',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'origin' => 'nullable|string',
        ]);

        $style = Style::create($fields);

        return response()->json([
            'status' => 'OK',
            'message' => 'Style created successfully',
            'style_id' => $style->id,
        ]);
    }

    public function update(Request $request, Style $style)
    {
        $fields = $request->validate([
            'dancer_id' => 'required|exists:dancers,id',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'origin' => 'nullable|string',
        ]);

        // return response()->json($fields);
        $style->update($fields);

        return response()->json([
            'status' => 'OK',
            'message' => 'Style with ID# ' . $style->id . ' has been updated.'
        ]);
    }

    public function destroy(Style $style)
{
    $style->delete();

    return response()->json([
        'status' => 'OK',
        'message' => 'Style with ID# ' . $style->id . ' has been deleted.'
    ]);
}



}
