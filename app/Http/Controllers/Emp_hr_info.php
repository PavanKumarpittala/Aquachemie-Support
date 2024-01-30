<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Emp_hr_info extends Controller
{
    //
    public function ShowData(){
        $showdata=DB::select('select * from emp_hr_info');
        return view('emp_hr_info_list',['showdata'=>$showdata]);
    }

    // public function emp_hr_info(){
    //     return view('emp_hr_info');
    // }
    public function SaveData(Request $request){
        $starting_date=$request->input('starting_date');
        $offer_letter_status=$request->input('offer_letter_status');
        $permit_visa_status=$request->input('permit_visa_status');
        $air_ticket_status=$request->input('air_ticket_status');
        $resident_visa_status=$request->input('resident_visa_status');
        $visa_num=$request->input('visa_num');
        $visa_start_date=$request->input('visa_start_date');
        $visa_end_date=$request->input('visa_end_date');
        $emirate_id_status=$request->input('emirate_id_status');
        $emirate_id_num=$request->input('emirate_id_num');
        $emirate_start_date=$request->input('emirate_start_date');
        $emirate_end_date=$request->input('emirate_end_date');
        $sap_access=$request->input('sap_access');
        $sap_user_id=$request->input('sap_user_id');
        $sap_office_phone=$request->input('sap_office_phone');
        $sap_extension_num=$request->input('sap_extension_num');
        $sap_office_mobile=$request->input('sap_office_mobile');
        $vissa_type=$request->input('vissa_type');
        $residence_status = $request->input('residence_status');
        $working_days = $request->input('working_days');
        $shift_information = $request->input('shift_information');
        $official_mail_id = $request->input('official_mail_id');
        $employee_id = $request->input('emp_id');


        DB::table('emp_hr_info')->updateOrInsert(
            ['employee_id' => $employee_id],
            ['starting_date' => $starting_date,
            'offer_letter_status' => $offer_letter_status,
            'permit_visa_status' => $permit_visa_status,
            'air_ticket_status' => $air_ticket_status,
            'emirate_id_status' => $emirate_id_status,
            'emirate_id_num' => $emirate_id_num,
            'emirate_start_date' => $emirate_start_date,
            'emirate_end_date' => $emirate_end_date,
            'sap_access' => $sap_access,
            'sap_user_id' => $sap_user_id,
            'sap_office_phone' => $sap_office_phone,
            'sap_extension_num' => $sap_extension_num,
            'sap_office_mobile' => $sap_office_mobile,
            'vissa_type' => $vissa_type,
            'residence_status' => $residence_status,
            'working_days' => $working_days, 
            'shift_information' => $shift_information, 
            'official_mail_id'=>$official_mail_id,          
            'employee_id' => $employee_id,
        ]);
        
         return redirect()->back()->with('success', 'Hr Infromation UPdated submitted successfully'); 

    }
}
