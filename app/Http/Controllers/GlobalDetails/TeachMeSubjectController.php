<?php

namespace App\Http\Controllers\GlobalDetails;

use App\Models\GlobalDetails\Subject;
use App\Models\GlobalDetails\Datatypes;
use App\Models\GlobalDetails\Speciality;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

class TeachMeSubjectController extends Controller
{

// index
    public function index(Request $request)
    {
        $Datatypes = Datatypes::get();
        $TeachmeSubject = Subject::with('speciality.dataType')->get();
        return view('golbal_details.subject', compact('TeachmeSubject','Datatypes'));
    }

    public function getSpecialities($datatypeId)
    {
        $specialities = Speciality::where('data_types_id', $datatypeId)->get();
        return response()->json($specialities);
    }

// store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'speciality_id' => 'required|exists:specialities,id',
            'status' => 'required|string'
        ]);

       $fileUpload = new Subject;
       $fileUpload->title = $request->title;
       $fileUpload->speciality_id = $request->speciality_id;
       $fileUpload->status = $request->status;
       $fileUpload->save();
       return redirect()->back()->with('success', 'Subject created successfully.');
    }


// update
    public function update(Request $request, Subject $subject)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'speciality_id' => 'required|exists:specialities,id',
            'status' => 'required|string'
        ]);

        $subject->update([
            'title' => $request->title,
            'nick_name' => $request->nick_name,
            'data_types_id' => $request->data_types_id,
            'speciality_id' => $request->speciality_id,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Subject updated successfully.');
    }

// destroy
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->back()->with('success', 'Subject Deleted successfully.');
    }


}
