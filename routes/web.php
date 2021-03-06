<?php
//admin routes
Route::prefix('admin')->group(function()
{   
    //admin personal urls
    Route::get('/adminlogin','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/adminlogin','Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/dashboard','Admin\AdminController@index')->name('admin.dashboard');
    Route::get('/profile','Admin\AdminController@profile')->name('admin.profile');
    Route::post('/profile','Admin\AdminController@updateProfile')->name('admin.profile.update');
    //doctors
    Route::get('/doctors','Admin\AdminController@showDoctorsForm')->name('admin.doctor.add');
    Route::post('/doctor','Admin\AdminController@addNewDoctor')->name('admin.doctor.submit');
    Route::get('/doctors/all','Admin\AdminController@viewAllDoctors')->name('admin.doctors.view.all');
    Route::get('/doctor/update','Admin\AdminController@showDrEditForm')->name('admin.doctor.edit.form');
    Route::post('/doctor/update','Admin\AdminController@updateDrInformation')->name('admin.doctor.update');
    Route::get('/doctor/delete','Admin\AdminController@deleteDrInformation')->name('admin.doctor.delete');
    //nurses
    Route::get('/nurses','Admin\AdminController@showNursesForm')->name('admin.nurses.add');
    Route::post('/nurses','Admin\AdminController@addNewNurse')->name('admin.nurse.submit');
    Route::get('/nurses/all','Admin\AdminController@viewAllNurses')->name('admin.nurses.view.all');
    Route::get('/nurse/update','Admin\AdminController@showNurseEditForm')->name('admin.nurse.edit.form');
    Route::post('/nurse/update','Admin\AdminController@updateNurseInformation')->name('admin.nurse.update');
    Route::get('/nurse/delete','Admin\AdminController@deleteNurseInformation')->name('admin.nurse.delete');
    //non medical staff
    Route::get('/staff','Admin\AdminController@showStaffForm')->name('admin.staff.add');
    Route::post('/staff','Admin\AdminController@addNewStaff')->name('admin.staff.submit');
    //patients
    Route::get('/patients','Admin\AdminController@viewAllPatients')->name('admin.patients.view.all');
    //departments
    Route::get('/departments/create-new','Admin\AdminController@showDepartmentsForm')->name('admin.department.add');
    Route::post('/departments','Admin\AdminController@addNewDepartment')->name('admin.department.submit');
    Route::get('/departments/all','Admin\AdminController@viewAllDepartments')->name('admin.departments.view.all');
    Route::get('/department/update','Admin\AdminController@showDepartmentEditForm')->name('admin.department.edit.form');
    Route::post('/department/update','Admin\AdminController@updateDepartmentInformation')->name('admin.department.update');
    Route::get('/departement/delete','Admin\AdminController@deleteDepartmentInforrmation')->name('admin.department.delete');
    Route::get('/department/show','Admin\AdminController@showDepartmentDetails')->name('admin.department.show');
    //mail
    Route::get('mail','Admin\AdminController@showAllMail')->name('admin.mails.view.all');
    //password resets
    Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset','Auth\AdminResetPasswordController@reset')->name('admin.password.update');
});
//doctors routes
Route::prefix('doctors')->group(function()
{
    Route::get('/doctorlogin','Auth\DoctorsLoginController@showLoginForm')->name('doctor.login');
    Route::post('/doctorlogin', 'Auth\DoctorsLoginController@login')->name('doctor.login.submit');
    Route::get('/logout','Auth\DoctorsLoginController@logout')->name('doctor.logout');
    Route::get('/dashboard','Doctors\DoctorsController@index')->name('doctor.dashboard');
    Route::get('/profile','Doctors\DoctorsController@profile')->name('doctor.profile');
    Route::post('/profile','Doctors\DoctorsController@updateProfile')->name('doctor.profile.update');
    Route::get('/patient/bookings/requests','Doctors\DoctorsController@viewAllBookings')->name('doctor.patient.bookings.request');
    Route::get('/patient/booking/detail','Doctors\DoctorsController@viewPatientBookingDetail')->name('doctor.patient.booking.detail');
    Route::post('/patient/booking/approval','Doctors\DoctorsController@approveAppointmentBooking')->name('doctor.patient.booking.approve');
    Route::get('/patient/bookings/approved','Doctors\DoctorsController@showAllApprovedBookings')->name('doctor.patient.bookings.approved.all');

    /************************ emergencies ************************************/
    //accidents
    Route::get('/emergencies/accidents','Doctors\DoctorsController@listAllAccidentsFromNurse')->name('doctor.emergencies.accidents');
    Route::get('/emergencies/accident','Doctors\DoctorsController@viewAccidentDetail')->name('doctor.emergencies.accident.detail');
    Route::get('/emergencies/accident/delete','Doctors\DoctorsController@removeAccidentDetail')->name('doctor.emergencies.accident.delete');
    //maternity
    Route::get('/emergencies/maternity','Doctors\DoctorsController@listAllMaternityEmergenciesFormNurse')->name('doctor.emergencies.maternity');
    Route::get('/emergencies/maternity-detail','Doctors\DoctorsController@viewMaternityDetail')->name('doctor.emergencies.maternity.detail');
    Route::get('/emergencies/maternity-delete','Doctors/DoctorsController@removeMaternityDetail')->name('doctor.emergencies.maternity.delete');
    //First Aid
    Route::get('/emergencies/first-aid','Doctors\DoctorsController@listAllFirstAidEmergenciesFormNurse')->name('doctor.emergencies.first-aid');
    Route::get('/emergencies/first-aid-detail','Doctors\DoctorsController@viewFirstAidEmergencyDetail')->name('doctor.emergencies.firts-aid.detail');
    Route::get('/emergencies/first-aid/delete','Doctors\DoctorsController@removeFirstAidEmergencyDetail')->name('doctor.emergencies.first-aid.delete');

    /************************** Emergency Responsesc  ***********************/
    //Accidents
    Route::post('/emeregencies/accidents/response','Doctors\DoctorsController@respondToAccidentEmergency')->name('doctor.emergencies.accident.response.post');
});
//patients routes
Route::prefix('patients')->group(function()
{
    Route::get('/patientlogin','Auth\PatientsLoginController@showLoginForm')->name('patient.login');
    Route::post('/patientlogin','Auth\PatientsLoginController@login')->name('patient.login.submit');
    Route::get('/logout','Auth\PatientsLoginController@logout')->name('patient.logout');
    Route::get('/dashboard','Patients\PatientsController@index')->name('patient.dashboard');
    Route::get('/profile','Patients\PatientsController@profile')->name('patient.profile');
    Route::post('/profile','Patients\PatientsController@updateProfile')->name('patient.profile.update');
    Route::get('/doctor/bookings','Patients\PatientsController@showDrBookingForm')->name('patient.doctor.booking');
    Route::post('/doctor/bookings','Patients\PatientsController@submitDrBookings')->name('patient.doctor.booking.submit');
    Route::get('/doctor/bookings/history','Patients\PatientsController@viewHistory')->name('patient.doctor.bookings.history');
    Route::post('/doctor/bookings/cancel','Patients\PatientsController@cancelBooking')->name('patient.doctor.booking.cancel');
    Route::get('/doctor/bookings/delete','Patients\PatientsController@deleteBookingHistory')->name('patient.doctor.booking.history.delete');
    Route::get('/doctor/bookings/approved','Patients\PatientsController@showAllApprovedBookings')->name('patient.doctor.bookings.approved.all');
});
//nurses routes
Route::prefix('nurses')->group(function()
{
    Route::get('/nurseslogin','Auth\NursesLoginController@showLoginForm')->name('nurse.login');
    Route::post('/nurseslogin','Auth\NursesLoginController@login')->name('nurse.login.submit');
    Route::get('/logout','Auth\NursesLoginController@logout')->name('nurse.logout');
    Route::get('/dashboard','Nurses\NursesController@index')->name('nurse.dashboard');
    //emergencies
    Route::get('/emergencies/reported-accidents','Nurses\NursesController@viewAllReportedAccidents')->name('nurse.emergencies.accidents.all');
    Route::get('/emergencies/reported-accidents-detail','Nurses\NursesController@emergencyAccidentDetails')->name('nurse.emergency.accident.detail');
    Route::get('/emergencies/reported-maternity','Nurses\NursesController@viewAllReportedMaternity')->name('nurse.emergencies.maternity.all');
    Route::get('/emergencies/reported-maternity-detail','Nurses\NursesController@emergencyMaternityDetail')->name('nurse.emergencies.maternity.detail');
    Route::get('/emergencies/reported-first-aid-requests','Nurses\NursesController@viewAllReportedfirstAid')->name('nurse.emergencies.first_aid.all');
    Route::get('/emergencies/reported-first-aid-request-details','Nurses\NursesController@emergencyFirstAidDetail')->name('nurse.emergencies.first_aid.detail');
    /**************** emergency response **********************/
    //accident responses
    Route::get('/emergencies/reported-accident/response','Nurses\NursesController@emergencyAccidentResponse')->name('nurse.emergencies.accident.response');
    Route::post('/emergencies/reported-accident/response','Nurses\NursesController@sendAccidentResponse')->name('nurse.emergencies.accident.response.post');
    //maternity responses
    Route::get('/emergencies/reported-maternity/response','Nurses\NursesController@emergencyMaternityResponse')->name('nurse.emergencies.maternity.response');
    Route::post('/emergencies/reported-maternity/response','Nurses\NursesController@sendMaternityResponseToDr')->name('nurse.emergencies.maternity.response.post');
});
//staff routes
Route::prefix('staff')->group(function()
{
    Route::get('/stafflogin','Auth\StaffLoginController@showLoginForm')->name('staff.login');
    Route::post('/stafflogin','Auth\StaffLoginController@login')->name('staff.login.submit');
    Route::get('/logout','Auth\StaffLoginController@logout')->name('staff.logout');
    Route::get('/dashboard','Staff\StaffController@index')->name('staff.dashboard');
    Route::get('/patients/transactions','Staff\StaffController@listAllPatientTransactions')->name('pharmacists.patient.transactions.all');
    Route::get('/patients/transactions/details','Staff\StaffController@ViewPatientTransactionDetail')->name('pharmacists.patient.transactions.detail');
    Route::post('/patients/transactions/details','Staff\StaffController@chargePatient')->name('pharmacists.patient.transactions.charge');
});

//general welcome page functionalities
Route::post('/welcome/patient/service-request','HospitalServices\PatientServivesController@postPatientServiceRequest')->name('welcome.patient.services.request');
Route::get('/patient-emergency-request','HospitalServices\PatientServivesController@showPatientEmergencyForm')->name('patient.emergency.request.form');
Route::post('/patient-emergency-request','HospitalServices\PatientServivesController@submitPatientEmergencyRequest')->name('patient.emergency.request.submit');
Route::get('/patient/create-new-account','HospitalServices\PatientServivesController@showPatientRegistrationForm')->name('patient.register');
Route::post('/patient/create-new-account','HospitalServices\PatientServivesController@registerPatient')->name('patient.register.submit');
Route::get('/patient/nurse-request','HospitalServices\PatientServivesController@showPatientNurseRequestForm')->name('patient.nurse.request.form');

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
