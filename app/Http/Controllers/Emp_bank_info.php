<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Bank;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Emp_bank_info extends Controller {

    public function index() {
        $data = Bank::all();
        return view( 'emp_bank_info', compact( 'bank' ) );
    }

    // public function emp_bank() {
    //     return view( 'emp_bank_info' );
    // }

    public function SaveData( Request $request ) {
        $bank_name = $request->input( 'bank_name' );
        $account_name = $request->input( 'account_name' );
        $iban_num = $request->input( 'iban_num' );
        $branch_address = $request->input( 'branch_address' );
        $ifsc_code = $request->input( 'ifsc_code' );
        $swift_code = $request->input( 'swift_code' );
        $country = $request->input( 'country' );
        $employee_id = $request->input( 'emp_id' );

       
        DB::table( 'emp_bank_info' )->insert(
            [
                'bank_name' => $bank_name,
                'account_name' => $account_name,
                'iban_num' => $iban_num,
                'branch_address' => $branch_address,
                'ifsc_code' => $ifsc_code,
                'swift_code' => $swift_code,
                'country' => $country,
                'employee_id' => $employee_id,

            ]

        );
        return redirect()->back()->with( 'success', 'data submitted successfully' );

    }

    public function edit( $id ) {
        $data = Bank::find( $id );
        return view( 'edit_bank', compact( 'data' ) );

    }

    public function update( Request $request, $id ) {

        $data = Bank::find( $id );
        $data->bank_name = $request->input( 'bank_name' );
        $data->account_name = $request->input( 'account_name' );
        $data->iban_num = $request->input( 'iban_num' );
        $data->branch_address = $request->input( 'branch_address' );
        $data->ifsc_code = $request->input( 'ifsc_code' );
        $data->swift_code = $request->input( 'swift_code' );
        $data->country = $request->input( 'country' );
        $data->update();

        // Update the 'updated_at' timestamp
        $data->touch();

        // return redirect( '/emp_edit/'.$data->employee_id )->with( 'success', 'Bank Details Updated Successfully' );
        return redirect(route('emp_edit', $data->employee_id))->with( 'success', 'Bank Details Updated Successfully');
    }

    public function delete( $id ) {
        $data = Bank::find( $id );
        // $data->delete();
        $data->status = 0;
        $data->save();

        return redirect()->back()->with( 'success', 'Bank Record Deleted Successfully' );
    }

}
