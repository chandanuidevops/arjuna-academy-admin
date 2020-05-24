<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] 	= 'authentication';
$route['404_override'] 			= '';
$route['translate_uri_dashes'] 	= FALSE;

//admin authentication
$route['login'] 				= 'authentication/index'; 			//login view
$route['can-login'] 			= 'authentication/form_validation'; //check credential exist
$route['dashboard'] 			= 'authentication/enter'; 			//open dashboard
$route['logout'] 				= 'authentication/logout'; 			//logout
//forgot password
$route['forgot-password'] 		= 'authentication/forgot_password'; 	//forgot password email check
$route['set-password/(:any)'] 	= 'authentication/add_pass/$1'; 		//forgot password email click
$route['update-password']   	= 'authentication/update_pass'; 		//forgot password email click
//change password
$route['change-password']   	= 'account/index'; 						//forgot password email click
$route['password/change']   	= 'account/password_validation'; 		//forgot password email click
//account settings
$route['profile']   		= 'account/accntsttngs'; 
$route['profile/update']   		= 'account/updateacnt'; 





//adminuser	
$route['adminuser/manage']   		= 'Adminuser/index'; 	
$route['adminuser/add']   			= 'Adminuser/add'; 	
$route['adminuser/edit/(:any)']  	= 'Adminuser/edit/$1'; 	
$route['adminuser/delete/(:any)']  	= 'Adminuser/delete/$1';


$route['adminuser/add-pass/(:any)/(:any)']  	= 'Adminuser/add_pass/$1/$2';

$route['gallery/manage']   		= 'gallery/manage';
$route['gallery/add-gallery']   		= 'gallery/add_gallery';
$route['gallery/edit-gallery/(:any)']   		= 'gallery/edit_gallery/$1';
$route['itemDelete']= "gallery/deleteAll";

$route['course/manage']   		= 'course/manage';
$route['course/add-course']   		= 'course/add_course';
$route['course/edit-course/(:any)']   		= 'course/edit_course/$1';
$route['course/add-testimonial/(:any)']   		= 'course/add_testimonial/$1';
$route['course/edit-testimonial/(:any)/(:any)']   		= 'course/edit_testimonial/$1/$2';

$route['event/manage']   		= 'event/manage';
$route['event/add-event']   		= 'event/add_event';
$route['event/edit-event/(:any)']   		= 'event/edit_event/$1';

$route['enquiry/manage']   		= 'enquiry/index';
$route['apply/manage']   		= 'Apply/index';


$route['home-gallery/manage']   		= 'home_gallery/manage';
$route['home-gallery/add-home-gallery']   		= 'home_gallery/add_gallery';
$route['home-gallery/edit-home-gallery/(:any)']   		= 'home_gallery/edit_gallery/$1';

$route['job/manage']   		= 'job/manage';
$route['job/add-job']   		= 'job/add_job';
$route['job/edit-job/(:any)']   		= 'job/edit_job/$1';
$route['job/view/(:any)']   		= 'job/view/$1';

$route['job-application/manage']   		= 'Job_application/index';
$route['job-application/view/(:any)']   		= 'Job_application/view/$1';

$route['enrolled/manage']   		= 'enrolled/index';
$route['enrolled/view/(:any)']   		= 'enrolled/view/$1';

$route['test/manage']   		= 'test/index';

$route['test/add-test']   		= 'test/add_test';
$route['test/add-question/(:any)/(:any)']   		= 'test/add_question/$1/$2';
$route['test/edit-question-row/(:any)/(:any)']   		= 'test/edit_question_row/$1/$2';
$route['test/generate-question/(:any)']   		= 'test/generate_question/$1';
$route['test/edit-subject/(:any)']   		= 'test/edit_subject/$1';
$route['test/edit-question/(:any)']   		= 'test/edit_question/$1';
$route['test/manage-schedule']   		= 'test/manage_schedule';
$route['test/edit-schedule/(:any)']   		= 'test/edit_schedule/$1';


$route['banner/manage']   		= 'banner/manage';
$route['banner/add-banner']   		= 'banner/add_banner';
$route['banner/edit-banner/(:any)']   		= 'banner/edit_banner/$1';
$route['itemDelete']= "gallery/deleteAll";


$route['users/manage']   		= 'users/index';
$route['users/view/(:any)']   		= 'users/view/$1';

$route['test-purchase/manage']   		= 'test_purchase/index';
$route['test-purchase/view/(:any)']   		= 'test_purchase/view/$1';

$route['test-result/manage']   		= 'test_result/index';
$route['test-result/view/(:any)/(:any)']   		= 'test_result/view/$1/$2';
$route['test-result/download/(:any)/(:any)']	=	'test_result/downloads/$1/$2';
$route['test/view-student/(:any)']   		= 'test/view_student/$1';
$route['test/view-schedule']   		= 'test/view_schedule';


$route['admission/manage']   		= 'admission/index';
$route['admission/add-admission-amount']   		= 'admission/add_admission_amount';
$route['admission/edit-amount/(:any)']   		= 'admission/edit_amount/$1';