<?php

namespace App\Http\Controllers\GlobalDetails;

use App\Models\GlobalDetails\Expertise;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

class ExpertiseController extends Controller
{

// index
    public function index(Request $request)
    {
        $expertise = Expertise::get();
        return view('golbal_details.expertise', compact('expertise'));
    }

// store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'status' => 'required|string'
        ]);

       $fileUpload = new Expertise;
       $fileUpload->title = $request->title;
       $fileUpload->status = $request->status;
       $fileUpload->save();
       return redirect()->back()->with('success', 'Expertise created successfully.');
    }


// update
    public function update(Request $request, Expertise $expertise)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'status' => 'required|string'
        ]);

        $expertise->update([
            'title' => $request->title,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Expertise updated successfully.');
    }

// destroy
    public function destroy(Expertise $expertise)
    {
        $expertise->delete();
        return redirect()->back()->with('success', 'expertise Deleted successfully.');
    }


}
