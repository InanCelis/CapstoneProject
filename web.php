<?php

/*  
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// // admin routes



Auth::routes();
//VISITOR
Route::get('/', 'MainController@index');
Route::get('/announcement', 'AnnouncementController@index');
Route::get('/announcement/view/{url}', 'AnnouncementController@viewannouncement');
Route::get('/fetch/announcement', 'AnnouncementController@fetch_announcement');	

Route::get('/anilag-color-run/register', 'OutsideEventController@color_run_index');
Route::post('/anilag-color-run/register', 'OutsideEventController@color_run_register')->name('color_run_register');
Route::get('/anilag-color-run/applicant/{token}', 'OutsideEventController@color_run_pdf');

Route::get('/anilag-cosplay/register', 'OutsideEventController@cosplay_index');
Route::post('/anilag-cosplay/register', 'OutsideEventController@cosplay_register')->name('cosplay_register');
Route::get('/anilag-cosplay/applicant/{token}', 'OutsideEventController@cosplay_pdf');

//register route
Route::get('/register/{id}','Auth\RegisterController@get_barangays');


///ADMIN ROUTES
Route::group(['middleware' => ['auth', 'admin', 'status']], function(){

	//visitor manipulate by admin
	//announcement
	

	Route::get('/announcement/create', 'AnnouncementController@creatannouncement');
	Route::post('/announcement/create','AnnouncementController@store')->name('create.announcement');

	Route::get('/announcement/edit/{id}', 'AnnouncementController@edit_announcement');
	Route::post('/announcement/edit/{id}', 'AnnouncementController@update_announcement');

	Route::get('/announcement/movetoarchive/{id}','AnnouncementController@movetoarchive');
	Route::get('/announcement/restore/{id}','AnnouncementController@restore');
	Route::get('/fetch/announcement/archive', 'AnnouncementController@fetch_arvhive');	

	

	//archive announcement
	Route::get('/announcement/archive', 'AnnouncementController@announcement_archive');

	

   Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');

	//ADMIN EVENT
   //3d mural art
   Route::get('/admin/mural-art', 'Admin\MuralArtController@index');

   //color run
   Route::get('/admin/anilag-color-run', 'Admin\AnilagColorRunController@index');

   //cosplay
   Route::get('/admin/anilag-cosplay', 'Admin\AnilagCosplayController@index');

   //anilag singing idol open category
   Route::get('/admin/anilag-singing-idol-open-category', 'Admin\AnilagSingingIdolOpenCategoryController@index');

   //anilag singing idol kid edition
   Route::get('/admin/anilag-singing-idol-kid-editions', 'Admin\AnilagSingingIdolKidsController@index');

   //bandanilag
   Route::get('/admin/bandanilag', 'Admin\BandanilagController@index');

   //Dance Revolution
   Route::get('/admin/dance-revolution', 'Admin\DanceRevolutionController@index');
  

   //Laguna Gay Queen
   Route::get('/admin/laguna-gay-queen', 'Admin\LagunaGayQueenController@index');

   //Laguna Lesbian King
   Route::get('/admin/laguna-lesbian-king', 'Admin\LagunaLesbianKingController@index');

   //mardi gay queen
   Route::get('/admin/mardi-gay-queen', 'Admin\MardiGayController@index');

   //water color
   Route::get('/admin/water-color-competition', 'Admin\WaterColorController@index');

  //updating status of an applicant in registration of all event
   Route::get('/update-applicant-status/{id}/{updatenum}', 'Admin\UpdateApplicantStatusController@update');
   // add remark to user
   Route::post('/add-event-remark/{id}', 'Admin\UpdateApplicantStatusController@addeventremark');


   // IT TRAINING
   Route::get('admin/it-training-program', 'Admin\TesdaController@index');
   //add it batch
   Route::post('/add-batch','Admin\TesdaController@addbatch');
   //edit batch
   Route::get('/edit-batch/{id}', 'Admin\TesdaController@editbatch');
   //update batch
   Route::post('/update-batch/{id}', 'Admin\TesdaController@updatebatch');
   //mark as session completed
   Route::get('/mark-completed/{id}', 'Admin\TesdaController@markcompleted');
   //mark as unfinished session
   Route::get('/mark-unfinish/{id}', 'Admin\TesdaController@markunfinish');
   //delete batch
   Route::get('/delete-batch/{id}', 'Admin\TesdaController@deletebatch');
   //add remark
   Route::post('/add-remark/{id}','Admin\TesdaController@addremark');
   //move to archive tesda
   Route::get('/tesda-move-archive/{id}', 'Admin\TesdaController@movearchive');
   //edit batch
   Route::get('/show-batch/{id}', 'Admin\TesdaController@showbatch');
   //move applicant to bacth
   Route::post('/move-batch/{id}','Admin\TesdaController@movetobatch');
   //register route
   Route::get('/fetchmember/{id}','Admin\TesdaController@fetchmember');
   //move to pending tesda
   Route::get('/pending/{id}','Admin\TesdaController@move_to_pending');
   //change member status either complete or unfinish
   Route::get('/memberchangestatus/{id}','Admin\TesdaController@memberchangestatus');
   //send SMS in Tesda
   Route::post('/sendtesdaSMS/{id}', 'Admin\TesdaController@sendSMS');	
   //view tesda archive
   Route::get('/admin/it-training-program/archive', 'Admin\TesdaController@archiveindex');
   //restore from archive
   Route::get('/tesda-restore/{id}', 'Admin\TesdaController@restore');

   //accreditation
   Route::get('/admin/accreditation/record', 'Admin\AccreditationController@index');
   //view
   Route::get('/admin/accreditation/view/{id}', 'Admin\AccreditationController@viewapplicant');
   //add remark
   Route::post('/add-remark-accreditation/{id}','Admin\AccreditationController@addremarkaccreditation');
   //update status of the applicant
   Route::get('/update-accreditation-status/{id}/{updatenum}', 'Admin\AccreditationController@update');
   //view accreditation archive
   Route::get('/admin/accreditation/archive', 'Admin\AccreditationController@archiveindex');

   //view accreditation archive
   Route::get('/admin/accreditation/request', 'Admin\AccreditationController@requestindex');
   //add feedback to reques of an organization
   Route::post('/add-feedback','Admin\AccreditationController@add_feedback');
   //update-request-status/
   Route::get('/update-request-status/{id}/{updatenum}','Admin\AccreditationController@update_request_status');

   //show send sms-notification
   Route::get('/send-sms-notification/{id}', 'Admin\SmsController@smsmodal');

   //sending sms notification
   Route::post('/sendSMS/{id}', 'Admin\SmsController@sendSMS');	

   //show sms history
   Route::get('/sms-history', 'Admin\SmsController@smshistory');

   //view sms detail
   Route::get('/sms-history-detail/{id}', 'Admin\SmsController@viewsmsdetail');

   //SETTINGS
   Route::get('/settings', 'Admin\SettingController@index');
   Route::get('/pdf_preview', 'Admin\SettingController@pdf_preview');
   Route::post('/changeyear', 'Admin\SettingController@changeyear');
   Route::post('/updateydahead', 'Admin\SettingController@updateydahead');
   Route::post('/updatepdfheader', 'Admin\SettingController@updatepdfheader');
   
   //update event status
   Route::get('/update_event_status/{id}', 'Admin\SettingController@update_event_status');
   //blocked user or unblocked/
   Route::get('/user_status/{id}', 'Admin\SettingController@changeuserstatus');
   
  

   //admin pdf generator
   
   Route::get('/admin/pdf/anilag-color-run/{id}', 'Admin\AnilagColorRunController@colorrunpdf');
   Route::get('/admin/pdf/anilag-cosplay/{id}', 'Admin\AnilagCosplayController@cosplaypdf');
   Route::get('/admin/pdf/mural-art/{id}', 'PdfController@Adminmuralartpdf');
   Route::get('/admin/pdf/anilag-singing-idol/{id}', 'PdfController@Adminanilagsingingidolpdf');
   Route::get('/admin/pdf/anilag-singing-idol-kid/{id}', 'PdfController@Adminanilagsingingidolkidpdf');
   Route::get('/admin/pdf/bandanilag/{id}', 'PdfController@Adminbandanilagpdf');
   Route::get('/admin/pdf/dance-revolution/{id}', 'PdfController@Admindancerevolutionpdf');
   Route::get('/admin/pdf/laguna-gay-queen/{id}', 'PdfController@Admingayqueenpdf');
   Route::get('/admin/pdf/laguna-lesbian-king/{id}', 'PdfController@Adminlesbiankingpdf');
   Route::get('/admin/pdf/mardi-gay/{id}', 'PdfController@Adminmardigaypdf');
   Route::get('/admin/pdf/water-color/{id}', 'PdfController@Adminwatercolorpdf');


   //tesda form
   Route::get('/admin/pdf/it-training-program-form/{id}', 'PdfController@admintesdapdf');

   

   //

});

Route::get('/code/{code}', 'NumberverifiedController@numberverified');

Route::group(['middleware' => ['auth','status', 'number']], function(){

   Route::get('/search', ['uses' => 'HomeController@search', 'as' => 'search'])->name('search');
   //USER ROUTES
  

	//home routes
	Route::get('/home', 'HomeController@index');	
	Route::get('/fetch/post', 'HomeController@fetch_post');	

	//home
	Route::post('/insertpost', 'HomeController@store');									// adding post
	Route::post('/postdelete/{id}', 'HomeController@destroy');							// delete post
	Route::post('/heart_post/{id}', 'HomeController@heart');					  		// heart post
	Route::post('/unheart_post/{id}', 'HomeController@unheart');					    // unheart post
	Route::get('/get_heart_comment/{id}', 'HomeController@getHeartandMessage');         // view all comment and hearts in each post
   Route::get('/reset-notif-count', 'HomeController@resetnotifcount');
   Route::get('/mark-all-read', 'HomeController@markallread');

   Route::get('/{username}/posts/{post_url}','HomeController@viewpost');




   Route::get('/sendMessage/{id}', 'HomeController@sendMessage'); 
   Route::post('/sendMessage/{id}', 'HomeController@sendMessage'); 

   // add comment to post
	Route::get('/get_comment/{id}', 'HomeController@getComment');						// get comment to edit
	Route::post('/deleteMessage/{id}/{post_id}', 'HomeController@deleteMessage');		// update message status to 2
	Route::get('/get_post/{id}', 'HomeController@getPost'); 							// get post to edit
	Route::post('/updatepost/{id}', 'HomeController@updatePost'); 						//update auth post
	Route::post('/update_comment/{id}', 'HomeController@update_comment'); 				//update auth comment

   Route::get('/showheartmost', 'HomeController@showheartmost');
   Route::get('/showlatest', 'HomeController@showlatest');
   Route::get('/showcommentsmost', 'HomeController@showcommentsmost');
   




	//events
	Route::resource('/mural-art', 'User\MuralArtUserController');

	Route::resource('/anilag-singing-idol', 'User\AnilagSingingIdolController');

	//bandanilag crud
	Route::resource('/bandanilag', 'User\BandanilagController');
	Route::post('/bandanilag/addnew', 'User\BandanilagController@addnewmember')->name('addnewmember_bandanilag');
	Route::post('/bandanilag/update', 'User\BandanilagController@update')->name('updatemember_bandanilag');
	Route::post('/bandanilag/{id}/delete', 'User\BandanilagController@destroy');


	//dance revo crud
	Route::resource('/dance-revolution', 'User\DanceRevolutionController');
	Route::post('/dance_revolution/addnew', 'User\DanceRevolutionController@addnewmember')->name('addnewmember_dancerevolution');
	Route::post('/dance_revolution/update', 'User\DanceRevolutionController@update')->name('updatemember_dancerevolution');
	Route::post('/dance_revolution/{id}', 'User\DanceRevolutionController@destroy');

	//laguna gay queen
	Route::resource('/laguna-gay-queen', 'User\LagunaGayQueenController');

	//laguna lesbian king
	Route::resource('/laguna-lesbian-king', 'User\LagunaLesbianKingController');

	//madigay
	Route::resource('/mardi-gay', 'User\MardiGayController');

	//color competition
	Route::resource('/water-color-competition', 'User\WaterColorController');

   //remove remarks in event
   Route::get('/remove_event_remarks/{id}', 'Admin\UpdateApplicantStatusController@removeeventremarks');

	//it training
	Route::get('/it-training-program', 'User\TesdaController@index');
	Route::post('/add-training', 'User\TesdaController@store');
	Route::get('/remove-remarks', 'User\TesdaController@removeremarks');

   Route::get('/accreditation/new-applicant', 'User\AccreditationController@index');
   Route::post('/accreditation/new-applicant', 'User\AccreditationController@add_accreditation');
   Route::post('/update_accreditation', 'User\AccreditationController@update_accreditation');

   Route::get('/accreditation/renewal', 'User\AccreditationController@renewalindex');
   Route::post('/accreditation/renewal', 'User\AccreditationController@renewal_update');
   //remove remarks in accreditation
   Route::get('/remove-accreditation-remarks', 'User\AccreditationController@removeremark_accreditation');
   Route::post('/add-request-accreditation','User\AccreditationController@addrequest');
   Route::get('/view-accreditation-detail/{id}', 'User\AccreditationController@viewdetail');
   Route::post('/add-member-organization','User\AccreditationController@addorganizationmember');

   Route::get('/remove-oraganization-member/{id}', 'User\AccreditationController@removemember');

   //view all accredited organization
   Route::get('/accreditation/accredited-organizations', 'User\AccreditationController@accreditedorgindex');

   //view specific 
   Route::get('/accreditation/organization/{url}/{id}/{code}', 'User\AccreditationController@vieworganization');

  
   


   Route::get('/notifications', 'NotificationController@index');
   Route::get('/fetch/notification', 'NotificationController@showmorenotif');  

	//Account-setting
	Route::get('/account-setting', 'User\AccountSettingController@index');
	Route::get('/get_brgy/{id}','User\AccountSettingController@get_barangays');
	Route::post('/update_info/{id}', 'User\AccountSettingController@update_info');
	Route::post('/update_username/{id}', 'User\AccountSettingController@update_username');
	Route::post('/update_password/{id}', 'User\AccountSettingController@update_password');
	Route::get('/get_auth_to_reset_password/{id}','User\AccountSettingController@get_auth_to_reset_password');


	//profile
	Route::get('/profile/{username}', 'ProfileController@index');
	Route::post('/remove-profile/{id}', 'ProfileController@removeprofile');
	Route::post('/change-profile-color/{id}/{colorcode}', 'ProfileController@changecolorcode');
	Route::post('/update-profile-pic/{id}', 'ProfileController@updateprofilepicture');



	//pdf generator
	Route::get('/pdf/mural-art', 'PdfController@muralartpdf')->name('mural-art.pdf');
	Route::get('/pdf/bandanilag', 'PdfController@bandanilagpdf')->name('bandanilag.pdf');
	Route::get('/pdf/dance_revolution', 'PdfController@dancerevolutionpdf')->name('dance_revolution.pdf');
	Route::get('/pdf/singingidol', 'PdfController@anilagsingingidolpdf')->name('singidol.pdf');
	Route::get('/pdf/singingidolkid', 'PdfController@anilagsingingidolkidpdf')->name('singidolkid.pdf');
	Route::get('/pdf/mardi_gay', 'PdfController@mardigaypdf')->name('mardi_gay.pdf');
	Route::get('/pdf/water_color', 'PdfController@watercolorpdf')->name('water_color.pdf');
	Route::get('/pdf/gay_queen', 'PdfController@gayqueenpdf')->name('gay_queen.pdf');
	Route::get('/pdf/lesbian_king', 'PdfController@lesbiankingpdf')->name('lesbian_king.pdf');
	//tesda form
	Route::get('/pdf/it-training-program-form', 'PdfController@tesdapdf')->name('tesda.pdf');


});

