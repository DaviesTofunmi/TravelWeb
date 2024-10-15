<?php

namespace App\Http\Controllers;

use App\Models\Companions;
use App\Models\VisaApplicationForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class VisaApplicationFormController extends Controller
{
    //
    
    public function createVisaForm(Request $request)
    {
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $country = $request->input('country');
        $state = $request->input('state');
        $destination = $request->input('destination');
        $city = $request->input('city');
        $email = $request->input('email');
        $transaction_id = Str::uuid();
        $Companions = $request->input('travel_companion');
        // Log::info();
        if (count($Companions) > 0) {
            foreach ($Companions as $comp) {
                Companions::create([
                    'comp_name' => $comp['comp_name'],
                    'relationship' => $comp['relationship'],
                    'comp_email'=>$comp['comp_email'],
                  
                    'transaction_id' => $transaction_id
                ]);
                # code...
            }
        }



        VisaApplicationForm::create([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'country' => $country,
            'state' => $state,
            'destination' => $destination,
            'city' => $city,
            'email' => $email,
            'transaction_id' => $transaction_id
        ]);
        return response()->json(['message' => 'Package created successfully']);
    }





    public function fetchUserApplications()
    {
        $user = Auth::user();
        $applications = VisaApplicationForm::where('email', $user->email)->get();
        if($applications){
            return response()->json(["applications" => $applications], 200);
        }

        else{
            return response()->json(['message' => 'Application not found'], 404);

        }
    }
    // public function fetchUserCompanions()
    // {
    //     $user = Auth::user();
    //     $applications = VisaApplicationForm::where('email', $user->email)->get();
    //     $user_tranz=$applications->pluck('transaction_id');
    //     if($user_tranz){
    //         $user_comp= Companions::where('transaction_id', $user_tranz)->get();

    //         return response()->json(["userComp" => $user_comp], 200);
    //     }
    //     else{
    //         return response()->json(['message' => 'Companion not found'], 404);
    //     }
      
    // }


    //Fetching the companions attached to recieved appId
    public function sendApplicationId(Request $request)
    {
        $applicationId = $request->input('application_id');
        // Process the application ID here
        $tranz= $applicationId;
        if($tranz){
            $companions = Companions::where('transaction_id', $tranz)->get();
            return response()->json(["companions" => $companions], 200);
        }
        else{
            return response()->json(['message' => 'Application not found'], 404);
        }

        
    }

    public function fetchApplicationById($id){
        $application = VisaApplicationForm::find($id);
        if($application){
            return response()->json(["applications" => $application], 200);

        }
        return response()->json(['message' => 'Application not found'], 404);
    }



    public function approveApplication($id)
    {
        $application = VisaApplicationForm::find($id);
        if ($application) {
            $application->status = 'Approved';
            $application->save();
            return response()->json(['message' => 'Application approved successfully'], 200);
        } else {
            return response()->json(['message' => 'Application not found'], 404);
        }
    }




    public function approveCompanion($id)
    {
        $companion = Companions::find($id);
        if ($companion) {
            $companion->status = 'Approved';
            $companion->save();
            return response()->json(['message' => 'Application approved successfully'], 200);
        } else {
            return response()->json(['message' => 'Application not found'], 404);
        }
    }



    public function RejectApplication($id)
    {
        $application = VisaApplicationForm::find($id);
        if ($application) {
            $application->status = 'Denied';
            $application->save();
            return response()->json(['message' => 'Application Denied'], 200);
        } else {
            return response()->json(['message' => 'Application not found'], 404);
        }
    }

    public function DenyCompanion($id)
    {
        $companion = Companions::find($id);
        if ($companion) {
            $companion->status = 'Denied';
            $companion->save();
            return response()->json(['message' => 'Application Denied'], 200);
        } else {
            return response()->json(['message' => 'Application not found'], 404);
        }
    }

    public function fetchAllApplications()
    {
        $applications = VisaApplicationForm::all();
        return response()->json($applications);
    }


//    public function fetchCompanions(Request $request){
//     $tranz_id= $request->input('transaction_id');
//     $companions= Companions::where("transaction_id", $tranz_id)->get();
//     if($companions->isEmpty()){
//         return response()->json(['error'=> "There are no companions"], 404);
//     }
//     return response()->json($companions, 200);
//    }
}
