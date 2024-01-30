<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Attachements;

class Emp_attachements_info extends Controller {

    public function index() {
        $data = Attachements::all();
        return view( 'emp_attachements_info', compact( 'attachements' ) );
    }

    public function SaveData( Request $request ) {

        $attachement_type = $request->input( 'attachement_type' );
        $certificates = $request->file( 'certificates' )->store( 'uploads', 'public' );
        $remark = $request->input( 'remark' );
        $employee_id = $request->input( 'emp_id' );
        $expiry_date = $request->input( 'expiry_date' );

        // DB::insert( "INSERT INTO emp_attachements_info(certificates,attachement_type,remark,'employee_id') VALUES('$certificates',' $attachement_type',' $remark','$employee_id')" );
        DB::table( 'emp_attachements_info' )->insert(
            [
                'attachement_type' => $attachement_type,
                'certificates' => $certificates,
                'remark' => $remark,
                'employee_id' => $employee_id,
                'expiry_date' => $expiry_date
            ]

        );
        return redirect()->back()->with( 'success', 'data submitted successfully' );

    }

    public function edit( $id ) {
        $data = Attachements::find( $id );
        return view( 'edit_attachements', compact( 'data' ) );
    }

    public function update( Request $request, $id ) {
        $data = Attachements::find( $id );
        $data->attachement_type = $request->input( 'attachement_type' );
        $data->certificates = $request->file( 'certificates' )->store( 'uploads', 'public' );
        $data->remark = $request->input( 'remark' );
        $data->expiry_date = $request->input( 'expiry_date' );
        $data->update();

        // Update the 'updated_at' timestamp
        $data->touch();

        // return redirect( '/emp_edit/'.$data->employee_id )->with( 'success', 'Attachements Details Updated Successfully' );
        return redirect(route('emp_edit', $data->employee_id))->with( 'success', 'Attachements Details Updated Successfully');

    }

    public function delete( $id ) {
        $data = Attachements::find( $id );
        $data->status = 0;
        $data->save();

        return redirect()->back()->with( 'success', 'Attachements Record Deleted Successfully' );
    }
}
