<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Emp_salary_info extends Controller
{
    
    public function ShowData(){
        $showdata=DB::select('select * from emp_salary_info');
        return view('emp_salary_info_list',['showdata'=>$showdata]);
    }

    public function emp_salary_info(){
        return view('emp_salary_info');
    }
    public function SaveData(Request $request){
        $currency=$request->input('currency');
        $basic_salary=$request->input('basic_salary');
        $housing=$request->input('housing');
        $transportation=$request->input('transportation');
        $accommodation=$request->input('accommodation');
        $other_allowance=$request->input('other_allowance');
        $gross_salary=$request->input('gross_salary');
        $employee_id = $request->input('emp_id');


        DB::table('emp_salary_info')->updateOrInsert(
            ['employee_id' => $employee_id],
            [
                'currency' => $currency,
                'basic_salary' => $basic_salary,
                'housing' => $housing,
                'transportation' => $transportation,
                'accommodation' => $accommodation,
                'other_allowance' => $other_allowance,
                'gross_salary' => $gross_salary,
                'employee_id' => $employee_id,
            ]);
            return redirect()->back()->with('success', 'Salary Structure info Updated!');
        }
}
