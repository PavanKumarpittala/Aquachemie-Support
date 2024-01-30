<?php

namespace App\Http\Controllers;

use App\Models\PreviousEmployement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UserController;

class Emp_previous_info extends Controller {

    public function index() {
        $data = PreviousEmployement::all();
        return view( 'emp_previous_info', compact( 'data' ) );
    }

    public function SaveData( Request $request ) {
        // $employee_id = UserController::user()->employee_id;
        // Assuming the user is logged in and you have the employee_id in your user model
        $company = $request->input( 'company' );
        $date_from = $request->input( 'date_from' );
        $date_to = $request->input( 'date_to' );
        $employeer = $request->input( 'employeer' );
        $position = $request->input( 'position' );
        $remark = $request->input( 'remark' );
        $employee_id = $request->input( 'emp_id' );

        DB::insert( "INSERT INTO emp_previous_info(company,date_from,date_to,employeer,position,remark,employee_id) 
        VALUES('$company','$date_from','$date_to','$employeer','$position','$remark','$employee_id')" );
        return redirect()->back()->with( 'success', 'data submitted successfully' );

    }

    public function edit( $id ) {
        $data = PreviousEmployement::find( $id );
        return view( 'edit_previous', compact( 'data' ) );
    }

    public function update( Request $request, $id ) {
        $data = PreviousEmployement::find( $id );
        $data->company = $request->input( 'company' );
        $data->date_from = $request->input( 'date_from' );
        $data->date_to = $request->input( 'date_to' );
        $data->employeer = $request->input('employeer');
        $data->position = $request->input('position');
        $data->remark = $request->input('remark');
        $data->update();
        // Update the 'updated_at' timestamp
        $data->touch();

        return redirect(route('emp_edit',$data->employee_id ))->with( 'success', 'Previous Details Updated Successfully' );
    }

    public function delete($id) 
    {
        $data = PreviousEmployement::find($id);

        $data->status = 0;
        $data->save();
        return redirect()->back()->with( 'success', 'Previous Details Deleted Successfully' );

    }

}
