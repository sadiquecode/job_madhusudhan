<?php
 
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\GlobalDetails\TeachmeTutorDocument;

class TutorController extends Controller
{
     public function index(Request $request)
    {
        $search = $request->search;
        $role = array('tutor','demo');
        $query = User::query()->where('type','user')
        ->whereIn('role', ['tutor', 'demo']);
        if (!empty($search)) {
            $query->where(function ($subquery) use ($search) {
                $subquery->where('name', 'LIKE', "%$search%")
                        ->orWhere('email', 'LIKE', "%$search%")
                        ->orWhere('phone', 'LIKE', "%$search%");
            });
        }
        $tutors = $query->latest()->get();
        return view('auth.index', compact('tutors','role'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:20',
            'password' => 'required|string|min:8|confirmed',
            'status' => 'required|in:active,inactive',
        ]);

        // Handle image upload if needed
        if ($request->hasFile('profile_pic')) {
            $imagePath = $request->file('profile_pic')->store('user_profile', 'public');
            $validatedData['profile_pic'] = $imagePath;
        }
        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['type'] = 'admin';
        User::create($validatedData);
        return redirect()->route('employee.index')->with('success', 'Tutor created successfully.');
    }


    public function update(Request $request, User $tutor)
    {
        $validatedData = $request->validate([
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $tutor->id,
            'phone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:20',
            'password' => 'required|string|min:8|confirmed',
            'status' => 'required|in:active,inactive',
        ]);
        // Handle image upload if needed
        if ($request->hasFile('profile_pic')) {
            $imagePath = $request->file('profile_pic')->store('user_profile', 'public');
            $validatedData['profile_pic'] = $imagePath;
        }

        $validatedData['password'] = bcrypt($validatedData['password']);
        $tutor->update($validatedData);
        return redirect()->route('tutor.index')->with('success', 'Tutor updated successfully.');
    }

        public function show(User $tutor)
    {
        echo "Comming Soon!";
        // return view('tutors.show', compact('tutor'));
    }

    public function destroy(User $tutor)
    { 
        if ($tutor->profile_pic) {
            try {
                // Attempt to delete the profile picture
                Storage::delete('public/' . $tutor->profile_pic);
                Storage::delete('public/' . $tutor->blur_profile_pic);
            } catch (\Exception $e) {
                // Log or handle the error appropriately
                logger()->error('Error deleting profile picture: ' . $e->getMessage());
            }
        }


        $TeachmeTutorDocument = TeachmeTutorDocument::where('tutor_id', $tutor->id)->get();

            // Delete documents
        if ($TeachmeTutorDocument) {
            foreach ($TeachmeTutorDocument as $key) {
                Storage::delete('public/' . $key->document);
            }
        }


        $tutor->DelCheckProfile()->delete();
        $tutor->DelCurriculum()->delete();
        $tutor->DelLanguages()->delete();
        $tutor->DelSubject()->delete();
        $tutor->DelGrade()->delete();
        $tutor->DelDocument()->delete();
        $tutor->DelEducation()->delete();
        $tutor->DelExperience()->delete();
        $tutor->DelSubscription()->delete();
        $tutor->delete();
        return redirect()->route('tutor.index')->with('success', 'Tutor deleted successfully.');
    }
}