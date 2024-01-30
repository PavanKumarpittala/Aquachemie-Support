<?php

namespace App\Http\Controllers;

/* use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
*/

use App\Models\Assets;
use Illuminate\Http\Request;
use DB;
use Response;
use \Crypt;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AssetsController extends Controller
{

    public function userAssets()
    {
        $users = DB::table('users')->select('name', 'id')->where('status', 1)->orderBy('name')->get();
        return view('user_assets', compact('users'));
    }
    /* ################# add asset store data ################ */

    public function addAsset(Request $request)
    {
        // $request->validate([
        //     'files.*' => 'required|mimes:pdf,doc,docx,png|max:2048',
        // ]);

        $data = $request->all();

        $filePaths = [];

        if ($request->hasfile('files')) {
            foreach ($request->file('files') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets_images'), $fileName);
                $filePaths[] = 'assets_images/' . $fileName;
            }
        }

        $params = [
            'type' => $data['type'],
            'product_name' => $data['product_name'],
            'model' => $data['model'],
            'make' => $data['make'],
            'serial_no' => $data['serial_no'],
            'location' => $data['location'],
            'asset_value' => $data['asset_value'],
            'asset_specs' => $data['asset_specs'],
            'emp_id' => $data['emp_id'],
            'emp_name' => $data['emp_name'],
            'warranty_start_date' => $data['warranty_start_date'],
            'warranty_end_date' => $data['warranty_end_date'],
            'date_of_purchase' => $data['date_of_purchase'],
            'vendor_name' => $data['vendor_name'],
            'vendor_bill_no' => $data['vendor_bill_no'],
            'invoice_value' => $data['invoice_value'],
            'parent_asset_code' => $data['parent_asset_code'],
            'sub_type' => $data['sub_type'],
            'unique_id' => md5(time()),
            'file_paths' => json_encode($filePaths),

        ];

        $asset = DB::table('assets')->insert($params);

        if ($asset) {
            return response()->json(['success' => 1, 'message' => 'Asset Added Successfully.']);
        } else {
            return response()->json(['success' => 0, 'message' => 'Asset Not Added.']);
        }
    }


    /* ################### end of addasset ################################ */

    public function assetjson(Request $request)
    {
        $data = $request->all();
        if (isset($data['draw'])) {

            $columnArray
                = array(
                    'id',
                    // 'user_id',
                    // 'domain',
                    // 'created_at',
                    // 'status'
                );

            try {
                DB::enableQueryLog();

                /**
                 * Database query object selection
                 */

                $query = DB::table('assets as u')->where('status', 1);
                // ->leftJoin( 'users as us', 'us.id', '=', 'u.emp_id' );

                if (Auth::user()->role == 3) {
                    $query->where('emp_id', Auth::user()->id);
                }

                if ($data['search_user'] != '') {

                    $query->whereRaw(

                        "u.product_name like '%" . $data['search_user'] . "%' || u.type like '%" . $data['search_user'] . "%'"

                    );
                }

                if (isset($data['branch_count'])) {

                    $count = $data['branch_count'];
                } else {
                    $count = '10';
                }

                $userCount = count($query->get());
                /**
                 * Order by
                 */
                // echo '<pre>';
                // print_r( $query->toSql() );
                // exit();

                if (isset($data['order'])) {
                    $query->orderBy(
                        $columnArray[$data['order'][0]['column']],
                        $data['order'][0]['dir']
                    );
                }

                /**
                 * Apply limit
                 */
                if ($data['length'] != -1) {
                    $query->skip($data['start'])->take($count);
                }
                //echo '<pre>';
                // print_r( $query->toSql() );
                /**
                 * Get
                 */
                $users = $query->get();
            } catch (\Exception $e) {
                $users = [];
                $userCount = 0;
            }

            $response['draw'] = $data['draw'];
            $response['recordsTotal'] = $userCount;
            $response['recordsFiltered'] = $userCount;

            $response['data'] = $users;

            return response()->json($response);
        }
    }

    public function showDetails($id)
    {
        $assetdetails = Assets::where('id', $id)->first();

        // dd($assetdetails);
        return view('emp_assets_view', compact('assetdetails'));
    }

    public function updateAssets(Request $request)
    {

        $data = $request->all();
        $filePaths = [];
        $result = [];
        if ($request->hasFile('update_files')) {
            // Upload and save new files
            foreach ($request->file('update_files') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets_images'), $fileName);
                $filePaths[] = 'assets_images/' . $fileName;
            }
        }

        $update_all_files = json_decode($data['update_all_files'], true);

        if (isset($data['removefiles'])) {
            $result = array_diff($update_all_files, $data['removefiles']);
            $filePathsAll = array_merge($result, $filePaths);
        } else {
            $filePathsAll = array_merge($update_all_files, $filePaths);
        }

        $params = array(
            'type' => $data['update_type'],
            'sub_type' => $data['update_sub_type'],
            'product_name' => $data['update_product_name'],
            'model' => $data['update_model'],
            'make' => $data['update_make'],
            'serial_no' => $data['update_serial_no'],
            'location' => $data['update_location'],
            'asset_value' => $data['update_asset_value'],
            'asset_specs' => $data['update_asset_specs'],
            'emp_id' => $data['update_emp_id'],
            'emp_name' => $data['update_emp_name'],
            'warranty_start_date' => $data['update_warranty_start_date'],
            'warranty_end_date' => $data['update_warranty_end_date'],
            'date_of_purchase' => $data['update_date_of_purchase'],
            'vendor_name' => $data['update_vendor_name'],
            'vendor_bill_no' => $data['update_vendor_bill_no'],
            'invoice_value' => $data['update_invoice_value'],
            'parent_asset_code' => $data['update_parent_asset_code'],
            'unique_id' => md5(time()),
            'file_paths' => json_encode($filePathsAll),
            'updated_at' => now(), // You can use Carbon to get the current timestamp
        );

        $affectedRows = Assets::where('id', $request['user_hidden'])->update($params);
        if ($affectedRows > 0) {
            return response()->json(['success' => true, 'message' => 'Assets Details Updated.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Assets Details Not Updated.']);
        }
    }

    public function getAssets($id)
    {
        $user = DB::table('assets')

            ->select('*')
            ->where("id", $id)
            ->first();
        return Response::json(array(
            'success' => 1,
            'user'    => $user,
            'message' => 'OK'
        ));
    }

    public function deleteAssets($id, $status)
    {
        if ($status == 0) {
            $update_status = 1;
            $message = "Assets has been not removed";
        } else {
            $update_status = 0;
            $message = "Assets has been removed";
        }


        $delete_assets = [
            'status' => $update_status,
            'updated_at' => now(), // You can use Carbon to get the current timestamp
        ];
        // Update the asset using Eloquent
        $affectedRows = Assets::where('id', $id)->update($delete_assets);

        if ($affectedRows > 0) {
            return response()->json(['success' => 1, 'message' => $message]);
        } else {
            return response()->json(['success' => 0, 'message' => $message]);
        }
    }

    function showAssetPublic($unique_id)
    {
        $assetdetails = Assets::where('unique_id', $unique_id)->first();

        if (!$assetdetails) {
            echo "<h3>Invalid Asset, Try with different Asset</h3>";
        } else
        {
            return view('emp_assets_view_public', compact('assetdetails'));
        }
    }
}
