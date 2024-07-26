<?php

namespace App\Http\Controllers\GlobalDetails;

use App\Models\GlobalDetails\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

class TeachMeSubjectController extends Controller
{

// index
    public function index(Request $request)
    {
        $TeachmeSubject = Subject::get();
        return view('golbal_details.subject', compact('TeachmeSubject'));
    }

// store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'nick_name' => 'required|string',
            'status' => 'required|string'
        ]);

       $fileUpload = new Subject;
       $fileUpload->title = $request->title;
       $fileUpload->nick_name = $request->nick_name;
       $fileUpload->status = $request->status;
       $fileUpload->save();
       return redirect()->back()->with('success', 'Subject created successfully.');
    }


// update
    public function update(Request $request, Subject $subject)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'nick_name' => 'required|string',
            'status' => 'required|string'
        ]);

        $subject->update([
            'title' => $request->title,
            'nick_name' => $request->nick_name,
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
