<?php

namespace App\Http\Controllers\GlobalDetails;

use App\Models\GlobalDetails\Sresult;
use App\Http\Controllers\Controller;
use App\Imports\ResultsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use GreenApi\RestApi\GreenApiClient;
use Illuminate\Validation\Rule;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Log;



class SresultController extends Controller
{

// index
    public function index(Request $request)
    {
        $sresult = Sresult::get();
        return view('golbal_details.sresult', compact('sresult'));
    }


    // store
    public function store(Request $request)
    {
        $request->validate([
            'result_file' => 'required|mimes:xlsx,csv|max:2048',
        ]);

        if ($request->file('result_file')->isValid()) {
            // Delete old records
            Sresult::truncate();

            // Store the new file
            $path = $request->file('result_file')->store('uploads');

            // Import the new data
            Excel::import(new ResultsImport, $request->file('result_file'));

            return back()->with('success', 'File uploaded and processed successfully.');
        }

        return back()->with('error', 'There was an issue with the file upload.');
    }



// update
    public function update(Request $request, Sresult $result)
    {
        $validatedData = $request->validate([
            's_registration_number' => 'required',
            's_name' => 'required',
            's_mobile_number' => 'required',
            's_class_section' => 'required',
            's_subject_1' => 'required',
            's_subject_2' => 'required',
            's_subject_3' => 'required',
            's_subject_4' => 'required',
            's_subject_5' => 'required',
            's_subject_6' => 'required',
            's_percentage' => 'required',
            's_other_message' => 'required'
        ]);

    
        $result->update([
            's_registration_number' => $request->s_registration_number,
            's_name' => $request->s_name,
            's_mobile_number' => $request->s_mobile_number,
            's_class_section' => $request->s_class_section,
            's_subject_1' => $request->s_subject_1,
            's_subject_2' => $request->s_subject_2,
            's_subject_3' => $request->s_subject_3,
            's_subject_4' => $request->s_subject_4,
            's_subject_5' => $request->s_subject_5,
            's_subject_6' => $request->s_subject_6,
            's_percentage' => $request->s_percentage,
            's_other_message' => $request->s_other_message,
        ]);

        return redirect()->back()->with('success', 'Result updated successfully.');
    }

// destroy
    public function destroy(Sresult $result)
    {
        $result->delete();
        return redirect()->back()->with('success', 'Result Deleted successfully.');
    }

    public function deleteBulkRecords(Request $request)
    {
        $ids = $request->input('ids');

        // Validate if IDs are provided
        if (empty($ids)) {
            return response()->json(['status' => 'No records selected for deletion.'], 400);
        }

        // Delete records
        $deletedCount = Sresult::whereIn('id', $ids)->delete();

        if ($deletedCount > 0) {
            return response()->json(['status' => 'Records deleted successfully!']);
        } else {
            return response()->json(['status' => 'No records were deleted.'], 400);
        }
    }


    public function sendBulkMessages(Request $request)
    {
        $apiUrl = 'https://7103.api.greenapi.com/waInstance7103960303/sendMessage/5790bbb33b234376ac3ba19ab224c628865582abfe154c8398';
        // $Sresult = Sresult::all(); // Assuming you have a Sresult model

        $ids = $request->input('ids');
        $Sresult = Sresult::whereIn('id', $ids)->where('status','active')->get();

        $total = count($Sresult);
        $processed = 0;

        foreach ($Sresult as $result) {
            $message = $this->formatMessage($result);
            $success = $this->sendMessage($apiUrl, $result->s_mobile_number, $message);
            
            if ($success) {
                Sresult::where('id', $result->id)->update(['status'=>'sent']);
                Log::info('Message sent successfully to ' . $result->s_mobile_number);
            } else {
                Log::error('Failed to send message to ' . $result->s_mobile_number);
            }

            $processed++;
            $percentage = ($processed / $total) * 100;

            sleep(5); // Wait for 5 seconds between requests
        }

        return response()->json(['status' => 'Messages sent successfully!']);
    }

    private function formatMessage($result)
    {
        return "Registration Number: {$result->s_registration_number}\n" .
               "Name: {$result->s_name}\n" .
               "Class Section: {$result->s_class_section}\n" .
               "Subject 1: {$result->s_subject_1}\n" .
               "Subject 2: {$result->s_subject_2}\n" .
               "Subject 3: {$result->s_subject_3}\n" .
               "Subject 4: {$result->s_subject_4}\n" .
               "Subject 5: {$result->s_subject_5}\n" .
               "Subject 6: {$result->s_subject_6}\n" .
               "Percentage: {$result->s_percentage}\n" .
               "Other Message: {$result->s_other_message}";
    }

    private function sendMessage($apiUrl, $phoneNumber, $message)
    {
        $curl = curl_init();

        $data = [
            'chatId' => $phoneNumber . '@c.us',
            'message' => $message,
            'linkPreview' => false
        ];

        curl_setopt_array($curl, [
            CURLOPT_URL => $apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json'
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            Log::error('Curl Error:', ['error' => $err]);
            return false;
        } else {
            Log::info('Message sent:', ['response' => $response]);
            return true;
        }
    }

}