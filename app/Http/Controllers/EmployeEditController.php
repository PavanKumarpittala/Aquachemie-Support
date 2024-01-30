<?php

namespace App\Http\Controllers;

use App\Models\Acadamic;
use App\Models\AcadamicDetails;
use App\Models\Address;
use App\Models\Assets;
use App\Models\HrInformation;
use App\Models\Residential;
use App\Models\Residentials;
use App\Models\Salary;
use Illuminate\Http\Request;
use App\Models\Bank;
use App\Models\Attachements;
use App\Models\Family;
use App\Models\PreviousEmployement;
use App\Models\Personal;
use App\Models\User;
use App\Models\Country;

class EmployeEditController extends Controller {
    public function ShowData( $employee_id ) {
        $familyInfoData = Family::where( 'employee_id', $employee_id )->where( 'status', 1 )
        ->get();
        $attachments = Attachements::where( 'employee_id', $employee_id )->where( 'status', 1 )
        ->get();
        $bankdata = Bank::where( 'employee_id', $employee_id )->where( 'status', 1 )
        ->get();
        $previous = PreviousEmployement::where( 'employee_id', $employee_id )->where( 'status', 1 )
        ->get();
        $personal = Personal::where( 'employee_id', $employee_id )->first();
        $salary = Salary::where( 'employee_id', $employee_id )->first();
        $user = User::where( 'id', $employee_id )->first();
        $hrinformation = HrInformation::where( 'employee_id', $employee_id )->first();
        $address = Address::where( 'employee_id', $employee_id )->where( 'status', 1 )->get();
        $visattachements = Residential::where( 'employee_id', $employee_id )->where( 'status', 1 )
        ->get();
        $acadamics = Acadamic::where( 'employee_id', $employee_id )->where( 'status',1 )->get();
        $countries = Country::pluck( 'name', 'id' );
        // dd( $viasattachements );
        return view( 'employee.emp_edit',
        [ 'familyInfoData' => $familyInfoData,
        'attachments' => $attachments, 'bankdata' => $bankdata, 'previous'=>$previous, 'personal' => $personal, 'emp_id' => $employee_id, 'salary'=>$salary, 'user'=>$user, 'hrinformation'=>$hrinformation, 'visattachements'=>$visattachements,
        'address' => $address, 'acadamics' => $acadamics, 'countries' => $countries ] );
    }

}

