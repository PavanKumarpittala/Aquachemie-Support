<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EmployeeAddressController extends Controller
{
    //
    public function index()
    {
        $data = Address::all();
        return view('emp_address_info', compact('address'));
    }

    public function SaveData(Request $request){
        $adress_type=$request->input('adress_type');
        $building=$request->input('building');
        $street_no=$request->input('street_no');
        $street_name = $request->input('street_name');
        $city = $request->input('city');
        $country = $request->input('country');
        $state = $request->input('state');
        $zip_code = $request->input('zip_code');
        $employee_id = $request->input('emp_id');

        DB::table('emp_address_info')->Insert(
            // ['employee_id' => $employee_id],
            [
            'adress_type' => $adress_type,
            'building' => $building,
            'street_no' => $street_no,
            'street_name' => $street_name,
            'city' => $city,
            'country' => $country,
            'state' => $state,
            'zip_code' => $zip_code,
            'employee_id' => $employee_id
        ]);
        
         return redirect()->back()->with('success', 'Address Details submitted successfully');
    }

    public function edit($id){
        $data = Address::find($id);
        return view('edit_address_comunication', compact('data'));
    }

    public function update(Request $request, $id){
        $data = Address::find($id);
        $data->adress_type = $request->input('adress_type');
        $data->building = $request->input('building');
        $data->street_no = $request->input('street_no');
        $data->street_name = $request->input('street_name');
        $data->city = $request->input('city');
        $data->country = $request->input('country');
        $data->state = $request->input('state');
        $data->zip_code = $request->input('zip_code');
        $data->update();

        $data->touch();

        return redirect( route('emp_edit',$data->employee_id ))->with( 'success', 'Communication Details Updated Successfully' );
    }

    public function delete($id){
        $data = Address::find($id);
        $data->status = 0;
        $data->save();

        return redirect()->back()->with( 'success', 'Communication Details Deleted Successfully' );

    }
}
