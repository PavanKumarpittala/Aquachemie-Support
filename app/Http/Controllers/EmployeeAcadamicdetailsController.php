<?php

namespace App\Http\Controllers;

use App\Models\Acadamic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeAcadamicdetailsController extends Controller {
    //

    public function index() {
        $data = Acadamic::all();
        return view ( 'emp_acadamic_info', compact( 'data' ) );
    }

    public function SaveData( Request $request ) {
        $institute_name = $request->input( 'institute_name' );
        $from_year = $request->input( 'from_year' );
        $to_year = $request->input( 'to_year' );
        $board_university = $request->input( 'board_university' );
        $education_type = $request->input( 'education_type' );
        $employee_id = $request->input( 'emp_id' );
        DB::table( 'emp_acadamic_info' )->Insert(
            [
                'institute_name' => $institute_name,
                'from_year' => $from_year,
                'to_year' => $to_year,
                'board_university' => $board_university,
                'education_type' => $education_type,
                'employee_id' => $employee_id
            ] );

            return redirect()->back()->with( 'success', 'Acadamic Details submitted successfully' );
        }

        public function edit( $id ) {
            $data = Acadamic:: find( $id );
            return view( 'edit_acadamics', compact( 'data' ) );
        }

        public function update( Request $request, $id ) {
            $data = Acadamic::find( $id );
            $data->institute_name = $request->input( 'institute_name' );
            $data->from_year = $request->input( 'from_year' );
            $data->to_year = $request->input( 'to_year' );
            $data->board_university = $request->input( 'board_university' );
            $data->education_type = $request->input( 'education_type' );
            $data->update();
            // Update the 'updated_at' timestamp
            $data->touch();

            return redirect(route('emp_edit',$data->employee_id ))->with( 'success', 'Acadamic Details Updated Successfully' );
        }

        public function delete( $id ) {
            $data = Acadamic::find( $id );
            $data->status = 0;
            $data->save();
            return redirect()->back()->with( 'success', 'Accadamic Details Deleted Successfully' );

        }
    }
