<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Family;
use Illuminate\Http\Request;

class EmployeeFamilyController extends Controller {
    public function idex() {
        $data = Family::all();
        return view( 'emp_family_info', compact( 'data' ) );

    }

    public function SaveData( Request $request ) {
        $name = $request->input( 'name' );
        $relation = $request->input( 'relation' );
        $gender = $request->input( 'gender' );
        $date_of_birth = $request->input( 'date_of_birth' );
        $place_of_birth = $request->input( 'place_of_birth' );
        $citizenship = $request->input( 'citizenship' );
        $mobile_number = $request->input( 'mobile_number' );
        $employee_id = $request->input( 'emp_id' );

        DB::table( 'emp_family_info' )->insert(
            [
                'name' => $name,
                'relation' => $relation,
                'gender' => $gender,
                'date_of_birth' => $date_of_birth,
                'place_of_birth' => $place_of_birth,
                'citizenship' => $citizenship,
                'mobile_number' => $mobile_number,
                'employee_id' => $employee_id,
            ] );
            return redirect()->back()->with( 'success', 'data submitted successfully' );

        }

        public function edit( $id ) {
            $data = Family::find( $id );
            return view( 'edit_family', compact( 'data' ) );
        }

        public function update( Request $request, $id ) {
            $data = Family::find( $id );

            $data->name = $request->input( 'name' );
            $data->relation = $request->input( 'relation' );
            $data->gender = $request->input( 'gender' );
            $data->date_of_birth = $request->input( 'date_of_birth' );
            $data->place_of_birth = $request->input( 'place_of_birth' );
            $data->citizenship = $request->input( 'citizenship' );
            $data->mobile_number = $request->input( 'mobile_number' );
            $data->update();

            // Update the 'updated_at' timestamp
            $data->touch();

            return redirect( route('emp_edit',$data->employee_id ))->with( 'success', 'Family Details Updated Successfully' );
        }

        public function delete($id)
        {
            $data = Family::find($id);
            $data->status = 0;
            $data->save();

            return redirect()->back()->with( 'success', 'Family Details Deleted Successfully' );

        }
    }

