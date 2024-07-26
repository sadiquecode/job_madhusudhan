<?php

namespace App\Http\Controllers\GlobalDetails;

use App\Models\GlobalDetails\Non_academic;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

class Non_AcademicController extends Controller
{

// index
    public function index(Request $request)
    {
        $non_academic = Non_academic::get();
        return view('golbal_details.non_academic', compact('non_academic'));
    }

// store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'status' => 'required|string'
        ]);

       $fileUpload = new Non_academic;
       $fileUpload->title = $request->title;
       $fileUpload->status = $request->status;
       $fileUpload->save();
       return redirect()->back()->with('success', 'Non academic created successfully.');
    }


// update
    public function update(Request $request, Non_academic $non_academic)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'status' => 'required|string'
        ]);

        $non_academic->update([
            'title' => $request->title,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Non academic updated successfully.');
    }

// destroy
    public function destroy(Non_academic $non_academic)
    {
        $non_academic->delete();
        return redirect()->back()->with('success', 'Non academic Deleted successfully.');
    }


}
