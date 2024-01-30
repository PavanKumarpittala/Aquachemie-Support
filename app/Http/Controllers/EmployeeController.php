<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    public function Hrinformation()
    {
        return view("hr_information");
    }

    public function Basicinformation()
    {
        return view("emp_basic_info");
    }

    public function personalInformation()
    {
        return view("information");
    }

    public function PreviousEmployement()
    {
        return view("previous");
    }

    public function FamilyInformation()
    {
        return view("familyinformation");
    }

    public function Attachements()
    {
        return view("attachements");
    }

    public function BankInformation()
    {
        return view("bankinformation");
    }

    public function SalaryStructure()
    {
        return view("salary");
    }

    public function Residential()
    {
        return view("residential");
    }

     public function Address()
    {
        return view("address");
    }

    public function Acadamicdetails()
    {
        return view("acadamic");

    }
    
    public function Assetsview()
    {
        return view("emp_assets_view");
    }
}
