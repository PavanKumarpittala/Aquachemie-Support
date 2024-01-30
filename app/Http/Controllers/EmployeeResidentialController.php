<?php

namespace App\Http\Controllers;

use App\Models\Residential;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


class EmployeeResidentialController extends Controller
{

    public function index()
    {
        $form = Residential::all();
        return view('emp_residential_info', compact('form'));
    }
    
    public function SaveData(Request $request){
        $resident_visa_status=$request->input('resident_visa_status');
        $visa_num=$request->input('visa_num');
        $visa_start_date=$request->input('visa_start_date');
        $visa_end_date=$request->input('visa_end_date');
        $sponsor_name=$request->input('sponsor_name');
        $visa_status=$request->input('visa_status');
        $employee_id = $request->input('emp_id');

        DB::table('emp_residential_info')->insert(
            [
            'resident_visa_status' => $resident_visa_status,
            'visa_num' => $visa_num,
            'visa_start_date' => $visa_start_date,
            'visa_end_date' => $visa_end_date,
            'sponsor_name' => $sponsor_name,
            'visa_status' => $visa_status,
            'employee_id' => $employee_id,
        ]);
        
         return redirect()->back()->with('success', 'Residential Vissa submitted successfully'); 
    }

    public function edit($id)
    {
        $form = Residential::find($id);
        return view('edit_residential', compact('form'));
    }

    public function update(Request $request,$id)
    {
        $form = Residential::find($id);

        $form->resident_visa_status = $request->input('resident_visa_status');
        $form->visa_num = $request->input('visa_num');
        $form->visa_start_date = $request->input('visa_start_date');
        $form->visa_end_date = $request->input('visa_end_date');
        $form->sponsor_name = $request->input('sponsor_name');
        $form->visa_status = $request->input('visa_status');
        $form->update();

        $form->touch();
        return redirect(route('emp_edit', $form->employee_id))->with( 'success', 'EmployeeResidential Details Updated Successfully');
        // return redirect( '/emp_edit/'.$form->employee_id )->with( 'success', 'EmployeeResidential Details Updated Successfully' );
    }

    public function delete($id){
        $form = Residential::find($id);

        $form->status = 0;
        $form->save();

        return redirect()->back()->with( 'success', 'EmployeeResidential Details Deleted Successfully' );

    }

    public function sendVisaExpiryRemainder() {

        try {
            $records = Residential::whereDate('visa_end_date', '=', now()->subDays(30))->get();

            foreach ($records as $record) {
                $empInfo = User::find($record->employee_id);

                if ($empInfo && !empty($empInfo->email)) {
                    $personalEmail = $empInfo->email;

                    $data = [
                        'name' =>  $empInfo->name,
                        'email' =>  $personalEmail,
                        'expdate' => $record->visa_end_date,
                    ];

                    $mail = Mail::send('emails.visa-exp-reminder', $data, function ($message) use ($personalEmail) {
                        $message->to($personalEmail)->subject('Residential Visa Expiry Reminder');
                    });

                    echo "Mail Sent to $personalEmail";

                } else {
                    Log::warning("User not found for Residential ID: {$record->id} Or Email is Empty");
                }
            }
        } catch (\Exception $e) {
            Log::error("Error during visa expiry reminder process: {$e->getMessage()}");
        }

    }


}

