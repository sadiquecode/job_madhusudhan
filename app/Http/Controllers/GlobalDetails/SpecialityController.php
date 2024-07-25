<?php

namespace App\Http\Controllers\GlobalDetails;

use App\Models\GlobalDetails\Speciality;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

class SpecialityController extends Controller
{

// index
    public function index(Request $request)
    {
        $speciality = Speciality::get();
        return view('golbal_details.speciality', compact('speciality'));
    }

// store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'status' => 'required|string'
        ]);

       $fileUpload = new Speciality;
       $fileUpload->title = $request->title;
       $fileUpload->status = $request->status;
       $fileUpload->save();
       return redirect()->back()->with('success', 'Speciality created successfully.');
    }


// update
    public function update(Request $request, Speciality $speciality)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'status' => 'required|string'
        ]);

        $speciality->update([
            'title' => $request->title,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Speciality updated successfully.');
    }

// destroy
    public function destroy(Speciality $speciality)
    {
        $speciality->delete();
        return redirect()->back()->with('success', 'Speciality Deleted successfully.');
    }


}
