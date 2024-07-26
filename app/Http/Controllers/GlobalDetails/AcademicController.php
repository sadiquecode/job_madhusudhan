<?php

namespace App\Http\Controllers\GlobalDetails;

use App\Models\GlobalDetails\Academic;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

class AcademicController extends Controller
{

// index
    public function index(Request $request)
    {
        $academic = Academic::get();
        return view('golbal_details.academic', compact('academic'));
    }

// store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'status' => 'required|string'
        ]);

       $fileUpload = new Academic;
       $fileUpload->title = $request->title;
       $fileUpload->status = $request->status;
       $fileUpload->save();
       return redirect()->back()->with('success', 'Academic created successfully.');
    }


// update
    public function update(Request $request, Academic $academic)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'status' => 'required|string'
        ]);

        $academic->update([
            'title' => $request->title,
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
