<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Emp_personal_info extends Controller
{
    // public function ShowData(){
    //     $showdata=DB::select('select * from emp_personal_info');
    //     return view('emp_personal_info_list',['showdata'=>$showdata]);
    // }

    public function SaveData(Request $request){
        $gender=$request->input('gender');
        $date_of_birth=$request->input('date_of_birth');
        $place_of_birth=$request->input('place_of_birth');
        $country_of_birth=$request->input('country_of_birth');
        $citizenship=$request->input('citizenship');
        $marital_status=$request->input('marital_status');
        $number_of_children=$request->input('number_of_children');
        $passport_num=$request->input('passport_num');
        $passport_issue_date=$request->input('passport_issue_date');
        $passport_expiry_date=$request->input('passport_expiry_date');
        $country_of_issue=$request->input('country_of_issue');
        $place_of_issue=$request->input('place_of_issue');
        $personal_mobile_num=$request->input('personal_mobile_num');
        $whatsapp_num=$request->input('whatsapp_num');
        $personal_email_id=$request->input('personal_email_id');
        $contact_name = $request->input('contact_name');
        $relation = $request->input('relation');
        $mobile_no = $request->input('mobile_no');
        $email_id = $request->input('email_id');
        $employee_id = $request->input('emp_id');

        DB::table('emp_personal_info')->updateOrInsert(
            ['employee_id' => $employee_id],
            [
                'gender' => $gender,
                'date_of_birth' => $date_of_birth,
                'place_of_birth' => $place_of_birth,
                'country_of_birth' => $country_of_birth,
                'citizenship' => $citizenship,
                'marital_status' => $marital_status,
                'number_of_children' => $number_of_children,
                'passport_num' => $passport_num,
                'passport_issue_date' => $passport_issue_date,
                'passport_expiry_date' => $passport_expiry_date,
                'country_of_issue' => $country_of_issue,
                'place_of_issue' => $place_of_issue,
                'personal_mobile_num' => $personal_mobile_num,
                'whatsapp_num' => $whatsapp_num,
                'personal_email_id' => $personal_email_id,
                'contact_name' => $contact_name,
                'relation' => $relation,
                'mobile_no' => $mobile_no,
                'email_id' => $email_id,
                'employee_id' => $employee_id,
            ]
        );

         return redirect()->back()->with('success', 'Employee Personal info Updated!');

    }
}