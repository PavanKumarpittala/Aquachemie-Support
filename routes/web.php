<?php

use App\Http\Controllers\AssetsController;
use App\Http\Controllers\EmployeeAcadamicdetailsController;
use App\Http\Controllers\EmployeeAddressController;
use App\Http\Controllers\EmployeEditController;
use App\Http\Controllers\EmployeeFamilyController;
use App\Http\Controllers\EmployeeResidentialController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Emp_attachements_info;
use App\Http\Controllers\Emp_bank_info;
use App\Http\Controllers\Emp_hr_info;
use App\Http\Controllers\Emp_personal_info;
use App\Http\Controllers\Emp_previous_info;
use App\Http\Controllers\Emp_salary_info;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Emp_basic_info;


Auth::routes(['register' => false]);



// Only For Admin
Route::middleware('checkRole:1')->group(function () {

    Route::any('support_emails', 'App\Http\Controllers\SupportController@supportEmails')->name('support_emails');
    Route::any('email_json', 'App\Http\Controllers\SupportController@emailJson')->name('email_json');

    Route::get('report', [App\Http\Controllers\ReportController::class, 'index'])->name('time.report');
    Route::get('report_json', [App\Http\Controllers\ReportController::class, 'reportJson'])->name('report.json');
    Route::get('get_user_timelog/{userId}/{month}/{year}', [App\Http\Controllers\ReportController::class, 'getUserTimelog'])->name('time.log');

});

// Only Admin & HR
Route::middleware('checkRole:1,5')->group(function () {

    Route::any('users_list', 'App\Http\Controllers\UserController@user')->name('users_list');
    Route::any('add_user', 'App\Http\Controllers\UserController@addEmployees')->name('add_user');
    Route::any('employee_json', 'App\Http\Controllers\UserController@employeejson')->name('employee_json');

    
});

// Only Admin & HR
Route::middleware('checkRole:1,2,5')->group(function () {

    //--------------------ASSETS CONTROLLER-----------------------------------------------
    Route::any('update_asset', 'App\Http\Controllers\AssetsController@updateAssets')->name('update_asset');

    Route::any('add_asset', 'App\Http\Controllers\AssetsController@addAsset')->name('add_asset');
    Route::any('delete_assets/{id}/{status}', 'App\Http\Controllers\AssetsController@deleteAssets')->name('delete_assets');


});

// Only Admin & Employee
Route::middleware('checkRole:1,2,3')->group(function () {

    // Support System
    Route::any('support_view', 'App\Http\Controllers\SupportController@supportView')->name('support_view');
    Route::any('support_json', 'App\Http\Controllers\SupportController@supportJson')->name('support_json');
    Route::any('update_status', 'App\Http\Controllers\SupportController@updateStatus')->name('update_status');
    Route::any('assign_user', 'App\Http\Controllers\SupportController@assignUser')->name('assign_user');
    Route::any('view_email_body/{id}', 'App\Http\Controllers\SupportController@viewEmailBody')->name('view_email_body');
    Route::any('update_support_status', 'App\Http\Controllers\SupportController@updateSupportStatus')->name('update_support_status');
    Route::any('update_support_comments', 'App\Http\Controllers\SupportController@updateSupportComments')->name('update_support_comments');
    Route::post('replyticket', [App\Http\Controllers\SupportController::class, 'storeReplyTicket'])->name('replyticket');
    Route::any('view_ticket/{id}', 'App\Http\Controllers\SupportController@viewTicket')->name('view_ticket');
    Route::any('view_ticket_json', 'App\Http\Controllers\SupportController@viewTicketJson')->name('view_ticket_json');
    Route::any('ticket_details', 'App\Http\Controllers\SupportController@addTicketDetails')->name('ticket_details');
    Route::any('update_details', 'App\Http\Controllers\SupportController@updateDetails')->name('update_details');


    Route::any('timesheets', 'App\Http\Controllers\TimesheetController@timesheets')->name('timesheets');
    Route::any('timesheet_details', 'App\Http\Controllers\TimesheetController@addTimesheetDetails')->name('timesheet_details');
    Route::any('get_status_loop/{ticket_id}', 'App\Http\Controllers\SupportController@getStatus')->name('get_status_loop');
    Route::any('get_timesheet_description/{id}', 'App\Http\Controllers\TimesheetController@getDescription')->name('get_timesheet_description');

    Route::any('add_ticket', 'App\Http\Controllers\SupportController@addTicket')->name('add_ticket');
    Route::any('timesheets_list', 'App\Http\Controllers\TimesheetController@timesheetsList')->name('timesheets_list');
    Route::any('timesheets_json', 'App\Http\Controllers\TimesheetController@timesheetsJson')->name('timesheets_json');


});

Route::middleware('auth')->group(function () {

    Route::get('/home', 'App\Http\Controllers\HomeController@index');
    Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

    Route::any('get_users/{user_id}', 'App\Http\Controllers\UserController@getUsers')->name('get_users');
    Route::any('update_users', 'App\Http\Controllers\UserController@updateUser')->name('update_users');
    Route::any('delete_user/{id}/{status}', 'App\Http\Controllers\UserController@deleteUser')->name('delete_user');
    Route::any('user_assigned', 'App\Http\Controllers\UserController@userAssigned')->name('user_assigned');
    Route::any('add_user_assigned', 'App\Http\Controllers\UserController@addUserAssigned')->name('add_user_assigned');
    Route::any('assigned_user_json', 'App\Http\Controllers\UserController@assignedUserJson')->name('assigned_user_json');


    Route::any('get_assets/{id}', 'App\Http\Controllers\AssetsController@getAssets')->name('get_assets');
    Route::any('assets', 'App\Http\Controllers\AssetsController@userAssets')->name('assets');
    Route::any('asset-json', 'App\Http\Controllers\AssetsController@assetjson')->name('asset-json');
    Route::get('assets_view/{id}', [AssetsController::class,'showDetails'])->name('assets_view/{id}');

    //------------Employee Edit Information CONTROLLER-------------------------
    Route::get('emp_edit/{id}', [EmployeEditController::class,'ShowData'])->name('emp_edit');

    Route::post("emp_basic_info/post",[Emp_basic_info::class,'SaveData'])->name('emp_basic_info/post');

    Route::post("emp_hr_info/post",[Emp_hr_info::class,'SaveData'])->name('emp_hr_info/post');
    Route::post("emp_personal_info/post",[Emp_personal_info::class,'SaveData'])->name('emp_personal_info/post');

    Route::post("emp_bank_info/post",[Emp_bank_info::class,'SaveData'])->name('emp_bank_info/post');
    Route::get("bank",[Emp_bank_info::class,'index']);
    Route::get("edit-bank/{id}",[Emp_bank_info::class,'edit'])->name('edit-bank/{id}');
    Route::put("update-bank/{id}",[Emp_bank_info::class,'update'])->name('update-bank/{id}');
    Route::get("delete-bank/{id}",[Emp_bank_info::class,'delete'])->name('delete-bank/{id}');

    Route::get('attachements',[Emp_attachements_info::class,'index']);
    Route::get('edit-attachements/{id}',[Emp_attachements_info::class,'edit']);
    Route::post("emp_attachements_info/post",[Emp_attachements_info::class,'SaveData'])->name('emp_attachements_info/post');
    Route::put('update-attachements/{id}',[Emp_attachements_info::class,'update']);
    Route::get("delete-attachements/{id}",[Emp_attachements_info::class,'delete'])->name('delete-attachements/{id}');

    Route::post("emp_salary_info/post",[Emp_salary_info::class,'SaveData'])->name('emp_salary_info/post');

    Route::get('family',[EmployeeFamilyController::class, 'index']);
    Route::post("emp_family_info/post",[EmployeeFamilyController::class,'SaveData'])->name('emp_family_info/post');
    Route::get('edit-family/{id}',[EmployeeFamilyController::class, 'edit']);
    Route::put('update-family/{id}',[EmployeeFamilyController::class, 'update'])->name('update-family/{id}');
    Route::get('delete-family/{id}',[EmployeeFamilyController::class, 'delete'])->name('delete-family/{id}');

    Route::get('previous',[Emp_previous_info::class, 'index']);
    Route::post("emp_previous_info/post",[Emp_previous_info::class,'SaveData'])->name('emp_previous_info/post');
    Route::get('edit-previous/{id}',[Emp_previous_info::class,'edit']);
    Route::put('update-previous/{id}',[Emp_previous_info::class, 'update']);
    Route::get('delete-previous/{id}',[Emp_previous_info::class, 'delete']);

    Route::get('residential',[EmployeeResidentialController::class,'index']);
    Route::get('edit-residential/{id}',[EmployeeResidentialController::class,'edit']);
    Route::put('update-residential/{id}',[EmployeeResidentialController::class, 'update']);
    Route::post("emp_residential_info/post",[EmployeeResidentialController::class,'SaveData'])->name('emp_residential_info/post');
    Route::get('delete-residential/{id}',[EmployeeResidentialController::class,'delete']);

    Route::get('communication',[EmployeeAddressController::class,'index']);
    Route::post("emp_address_info/post",[EmployeeAddressController::class,'SaveData'])->name('emp_address_info/post');
    Route::get('edit-communication/{id}',[EmployeeAddressController::class, 'edit']);
    Route::put('update-communication/{id}',[EmployeeAddressController::class, 'update']);
    Route::get('delete-communication/{id}',[EmployeeAddressController::class, 'delete']);

    Route::get('acadamics',[EmployeeAcadamicdetailsController::class,'index']);
    Route::post("emp_acadamic_info/post",[EmployeeAcadamicdetailsController::class,'SaveData'])->name('emp_acadamic_info/post');
    Route::put('update-acadamics/{id}',[EmployeeAcadamicdetailsController::class,'update']);
    Route::get('edit-acadamics/{id}',[EmployeeAcadamicdetailsController::class,'edit']);
    Route::get('delete-acadamics/{id}',[EmployeeAcadamicdetailsController::class,'delete']);


    // Common to All Roles

    Route::get('/changePassword', [App\Http\Controllers\UserController::class, 'showChangePasswordGet'])->name('changePasswordGet');
    Route::post('/changePassword', [App\Http\Controllers\UserController::class, 'changePasswordPost'])->name('changePasswordPost');

});

Route::get('send-visa-exp-reminder-email', [EmployeeResidentialController::class, 'sendVisaExpiryRemainder']);
Route::get('asset-details/{unique_id}', [AssetsController::class, 'showAssetPublic']);

Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return 'Command executed successfully';
});

// Route::any('projects', 'App\Http\Controllers\ProjectController@Project')->name('projects');
// Route::any('add_project', 'App\Http\Controllers\ProjectController@addProject')->name('add_project');
// Route::any('project_json', 'App\Http\Controllers\ProjectController@projectjson')->name('project_json');
// Route::any('user_domain', 'App\Http\Controllers\UserController@userDomain')->name('user_domain');
// Route::any('add_domain', 'App\Http\Controllers\UserController@addDomain')->name('add_domain');
// Route::any('domain_json', 'App\Http\Controllers\UserController@domainjson')->name('domain_json');
// Route::any('get_domain/{user_id}', 'App\Http\Controllers\UserController@getDomain')->name('get_domain');
// Route::any('company_details', 'App\Http\Controllers\ProjectController@CompanyDetails')->name('company_details');
// Route::any('edit_company_details/{id}', 'App\Http\Controllers\ProjectController@editCompanyDetails')->name('edit_company_details');
// Route::put('update_company_details/{id}', 'App\Http\Controllers\ProjectController@updateCompanyDetails')->name('update_company_details');
// Route::any('edit_primary_contact/{id}', 'App\Http\Controllers\ProjectController@editPrimaryContact')->name('edit_primary_contact');
// Route::put('update_primary_contact/{id}', 'App\Http\Controllers\ProjectController@updatePrimaryContact')->name('update_primary_contact');
// Route::any('edit_sub_contacts/{id}', 'App\Http\Controllers\ProjectController@editSubContacts')->name('edit_sub_contacts');
// Route::put('update_sub_contacts/{id}', 'App\Http\Controllers\ProjectController@updateSubContacts')->name('update_sub_contacts');
// Route::any('delete_customer/{id}/{status}', 'App\Http\Controllers\ProjectController@deleteCustomer')->name('delete_customer');
// Route::any('view_customer/{id}', 'App\Http\Controllers\ProjectController@viewCustomerDetails')->name('view_customer');
// Route::any('get_customer/{id}', 'App\Http\Controllers\ProjectController@getCustomer')->name('get_customer');
// Route::any('update_customer', 'App\Http\Controllers\ProjectController@updateCustomer')->name('update_customer');
// Route::any('update_user_domain', 'App\Http\Controllers\UserController@updateUserDomain')->name('update_user_domain');
// Route::any('delete_domain/{id}/{status}', 'App\Http\Controllers\UserController@deleteDomain')->name('delete_domain');


