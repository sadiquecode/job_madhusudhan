<?php

namespace App\Http\Controllers\GlobalDetails;

use App\Models\GlobalDetails\Academic;
use App\Models\GlobalDetails\Datatypes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

class AcademicController extends Controller
{

// index
    public function index(Request $request)
    {
        $Datatypes = Datatypes::get();
        $academic = Academic::with('dataType')->get();
        return view('golbal_details.academic', compact('academic','Datatypes'));
    }

// store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'data_types_id' => 'required|exists:data_types,id',
            'status' => 'required|string'
        ]);

       $fileUpload = new Academic;
       $fileUpload->title = $request->title;
       $fileUpload->data_types_id = $request->data_types_id;
       $fileUpload->status = $request->status;
       $fileUpload->save();
       return redirect()->back()->with('success', 'Academic created successfully.');
    }


// update
    public function update(Request $request, Academic $academic)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'data_types_id' => 'required|exists:data_types,id',
            'status' => 'required|string'
        ]);


        $academic->update([
            'title' => $request->title,
            'data_types_id' => $request->data_types_id,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Academic updated successfully.');
    }

// destroy
    public function destroy(Academic $academic)
    {
        $academic->delete();
        return redirect()->back()->with('success', 'Academic Deleted successfully.');
    }


}
