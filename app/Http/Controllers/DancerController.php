<?php

namespace App\Http\Controllers;
use App\Models\Dancer;
use Illuminate\Http\Request;

class DancerController extends Controller
{
    public function dancer(){

        $dancer = Dancer::orderBy('id')->get();

        return view('dancer.dancer',['dancers' => $dancer]);
    }
    public function create(){
        return view('dancer.create');
    }

    public function store(Request $request){
        $request->validate([
            'full_name'      => 'required',
            'birth_date'     => 'required',
            'gender'         => 'required',
            'phone_number'   => 'required|numeric'
        ]);

        Dancer::create([
            'full_name'     => $request->full_name,
            'birth_date'      => $request->birth_date,
            'gender'         => $request->gender,
            'phone_number'     => $request->phone_number
        ]);

        return redirect('/dancer')->with('message','A new dancer has been added');
    }
    public function edit(Dancer $dancer)
    {
        return view('dancer.edit', compact('dancer'));
    }

    public function update(Dancer $dancer, Request $request)
    {
        $request->validate([
            'full_name'      => 'required',
            'birth_date'     => 'required',
            'gender'         => 'required',
            'phone_number'   => 'required|numeric'
        ]);

        $dancer -> update($request->all());
        return redirect('/dancer')->with('message', "$dancer->full_name has been updated.");
    }

    public function delete(Dancer $dancer)
    {
        $dancer->delete();

        return redirect('/dancer')->with('message', "$dancer->full_name has been deleted successfully");
    }
}
