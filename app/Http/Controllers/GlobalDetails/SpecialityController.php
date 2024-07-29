<?php

namespace App\Http\Controllers\GlobalDetails;

use App\Models\GlobalDetails\Speciality;
use App\Models\GlobalDetails\Datatypes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

class SpecialityController extends Controller
{

// index
    public function index(Request $request)
    {
        $Datatypes = Datatypes::get();
        $speciality = Speciality::with('dataType')->get();
        return view('golbal_details.speciality', compact('speciality','Datatypes'));
    }

// store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'data_types_id' => 'required|exists:data_types,id',
            'status' => 'required|string'
        ]);

       $fileUpload = new Speciality;
       $fileUpload->title = $request->title;
       $fileUpload->data_types_id = $request->data_types_id;
       $fileUpload->status = $request->status;
       $fileUpload->save();
       return redirect()->back()->with('success', 'Speciality created successfully.');
    }


// update
    public function update(Request $request, Speciality $speciality)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'data_types_id' => 'required|exists:data_types,id',
            'status' => 'required|string'
        ]);

        $speciality->update([
            'title' => $request->title,
            'data_types_id' => $request->data_types_id,
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
