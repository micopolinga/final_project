<?php

namespace App\Http\Controllers;

use App\Models\Dancer;
use App\Models\Style;
use Illuminate\Http\Request;

class StyleController extends Controller
{
    public function style(){

        $style = Style::orderBy('id')->get();

        return view('style.style',['styles' => $style]);
    }

    public function create()
    {
        $dancer = Dancer::list();
        return view('style/create', ['dancer' => $dancer]);
    }

    public function store(Request $request){
        $request->validate([
            'dancer_id' => 'required|numeric',
            'name' => 'required',
            'description' => 'required',
            'origin' => 'required'
        ]);

        Style::create([
            'dancer_id' => $request->dancer_id,
            'name' => $request->name,
            'description' => $request->description,
            'origin' => $request->origin
        ]);

        return redirect('/style ')->with('message', 'A new style has been added');
    }

    public function edit(Style $style)
    {
        $dancer = Dancer::all();
        
 return view('style.edit', compact('style', 'dancer'));
    }

    public function update(Style $style, Request $request)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'origin' => 'required',
    ]);

    // Update the fields other than dancer_id
    $style->update([
        'name' => $request->name,
        'description' => $request->description,
        'origin' => $request->origin,
    ]);

    return redirect('/style')->with('message', "$style->full_name has been updated.");
}
    public function delete(Style $style)
{
    $style->delete();

    return redirect('/style')->with('message', "$style->full_name has been deleted successfully");
}
}
