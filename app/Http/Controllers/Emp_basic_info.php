<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Emp_basic_info extends Controller
{
    public function ShowData(){
        $showdata=DB::select('select * from users');
        return view('emp_basic_info_list',['showdata'=>$showdata]);
    }

    public function emp_basic_info(){
        return view('emp_basic_info');
    }
    public function SaveData(Request $request){
        $first_name=$request->input('first_name');
        $last_name=$request->input('last_name');
        $name=$request->input('name');
        $department=$request->input('department');
        $designation=$request->input('designation');
        $reporting_to=$request->input('reporting_to');
        $head_quarter=$request->input('head_quarter');
        $region=$request->input('region');
        $joining_date=$request->input('joining_date');
        $employeer=$request->input('employeer');
        $email=$request->input('email');
        $userid = $request->input('emp_id');
        $employee_id = $request->input('employee_id');
        $role = $request->input('employee_role');
        $employee_blood_group = $request->input('employee_blood_group');


        DB::table('users')->where('id',$userid)->update([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'name' => $name,
            'department' => $department,
            'designation' => $designation,
            'reporting_to' => $reporting_to,
            'head_quarter' => $head_quarter,
            'region' => $region,
            'joining_date' => $joining_date,
            'employeer' => $employeer,
            'email' => $email,
            'employee_id' => $employee_id,
            'role' => $role,
            'employee_blood_group' => $employee_blood_group,
        ]);

        
         return redirect()->back()->with('success', 'Basic Infomation Updated  successfully'); 

    }

}
