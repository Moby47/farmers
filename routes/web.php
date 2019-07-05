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

//......................Toggledebugbar.......................//
//app('debugbar')->disable();


///////////////////////////////visitor routes///////////////////////////////////////


//user or admin
Route::get('/home', 'HomeController@index')->name('homee');

//index
Route::get('/', 'pagescontroller@index')->name('index');



//route resourse //ads
Route::resource('/buy-ad','adscontroller');

//route resourse //user
Route::resource('/buy-product','visitorcontroller');

//route resourse //guest
Route::resource('/buy-by-categories','pagescontroller');

//find page 
Route::get('/items-to-buy-around-campus', 'pagescontroller@find')->name('center');

//auto complete
Route::get('/auto', 'visitorcontroller@auto_complete');

//contact us
//Route::get('/contact-dstreet', 'pagescontroller@contact');

//public search ads
Route::get('/public-search-ads', 'visitorcontroller@pub_search_ads')->name('ad_search');

Route::get('/report', 'pagescontroller@feedbk')->name('feedback-page');

Route::get('/all-student-adverts', 'pagescontroller@all_ads');

Route::get('/help', 'pagescontroller@help')->name('help');



Route::get('/search-campus-by-category', 'extracontroller@betterfilter')->name('betterfilter');



Route::get('/how-to-buy-sell', 'pagescontroller@how')->name('howto');

//force redirects
Route::get('/message-user/{id}', 'pagescontroller@force_msg');

Route::get('/goto-post', 'pagescontroller@force_post')->name('goto_post');

Route::get('/goto-ad', 'pagescontroller@force_ad');

Route::get('/goto-req', 'pagescontroller@force_req')->name('goto_req');

Route::get('/login-to-claim', 'extracontroller@force_claim')->name('goto_claim');
//force redirects

//promo claim
Route::get('/claim-dstreet-promo', 'extracontroller@claim')->name('claim');


//promo page
Route::get('/dstreet-promo', 'extracontroller@promo')->name('promo');


//promo success page
Route::get('/dstreet-promo-claimed', 'extracontroller@claimed')->name('claimed');


Route::get('/privacy', 'pagescontroller@privacy');

Route::get('/more_product_details', 'pagescontroller@single');

Route::get('/terms', 'pagescontroller@terms');

Route::get('/search-req', 'visitorcontroller@search_req')->name('search_req');

Route::POST('/question', 'visitorcontroller@create')->name('question');

//reviews
Route::POST('/reviews', 'visitorcontroller@feedback')->name('feeds');

//contact us
Route::GET('/contact-form', 'mailcontroller@contact')->name('contact');

//find price
//Route::GET('/post-by-price', 'visitorcontroller@find_p')->name('find_p');

//favourite post
Route::POST('/favourite-product', 'visitorcontroller@fav')->name('fav');

//favourite ad
Route::POST('/favourite-advert', 'visitorcontroller@fav_ad')->name('fav_ad');

//route resultpage
Route::get('/buy-search-result', 'pagescontroller@result');

// requests page
Route::get('/view-requests', 'pagescontroller@rq')->name('reqqq');


//search site
Route::get('/site-search', 'visitorcontroller@site_search')->name('site_search');


//route for email verification
Route::get('/verifyemailfirst', 'Auth\RegisterController@verifyemailfirst')->name('verifyemailfirst');

//sendEmailDone route
Route::get('/verify/{email}/{verifytoken}', 'Auth\RegisterController@sendEmailDone')->name('sendEmailDone');



//resend verification email link to page
Route::GET('/resend-verify', 'visitorcontroller@resendemail');
//resend verification email send
Route::POST('/resend', 'visitorcontroller@resend')->name('resend');

//................Ajax load routes.......................//

Route::GET('/ads-and-posts', 'pagescontroller@contents')->name('find_content');

//in sch selectdropdown
Route::GET('/find-by-school', 'visitorcontroller@filter')->name('filter');



//find cat
Route::GET('/post-by-category', 'visitorcontroller@find_cat')->name('find_cat');


//find sch
Route::GET('/post-by-school', 'visitorcontroller@find_sch')->name('find_sch');


//route if search in sch
Route::GET('/post-result-in-school', 'visitorcontroller@only_sch')->name('only_sch');


//categories
Route::GET('/item-categories', 'visitorcontroller@cat')->name('category');


//tab contents
Route::GET('/buy-sell-school-tab1', 'pagescontroller@tab1')->name('tab1');

//tab contents
Route::GET('/buy-sell-school-tab2', 'pagescontroller@tab2')->name('tab2');

//tab contents
Route::GET('/buy-sell-school-tab3', 'pagescontroller@tab3')->name('tab3');

//tab contents
Route::GET('/buy-sell-school-tab4', 'pagescontroller@tab4')->name('tab4');

//tab contents
Route::GET('/buy-sell-school-tab5', 'pagescontroller@tab5')->name('tab5');

//tab contents
Route::GET('/buy-sell-school-tab6', 'pagescontroller@tab6')->name('tab6');

//tab contents
Route::GET('/buy-sell-school-tab7', 'pagescontroller@tab7')->name('tab7');

//tab contents
Route::GET('/buy-sell-school-tab8', 'pagescontroller@tab8')->name('tab8');

//tab contents
Route::GET('/buy-sell-school-tab9', 'pagescontroller@tab9')->name('tab9');

//tab contents
Route::GET('/buy-sell-school-tab10', 'pagescontroller@tab10')->name('tab10');

//tab contents
Route::GET('/buy-sell-school-tab11', 'pagescontroller@tab11')->name('tab11');

//tab contents
Route::GET('/buy-sell-school-tab12', 'pagescontroller@tab12')->name('tab12');


//tab contents
Route::GET('/buy-sell-school-tab13', 'pagescontroller@tab13')->name('tab13');

//................Ajax load routes.......................//


//to projects
Route::GET('/final-year-projects', 'extracontroller@page')->name('project');

//send project req
Route::POST('/request-final-year', 'extracontroller@req')->name('req_project');

//load..search...sch select #all in one method, nice! reqed projects
Route::GET('/requested-final-year', 'extracontroller@reqed_proj')->name('reqed_proj');

//send project offer
Route::POST('/help-final-year-project', 'extracontroller@offer')->name('offer_project');

//load..search...sch select #all in one method, nice! offered projects
Route::GET('/offered-final-year-project', 'extracontroller@offered_proj')->name('offered_proj');

//mobile app route
Route::GET('/dstreet-for-android', 'extracontroller@app');

/////////////////////////////user acts in visitor area//////////////

//user update/reg after auth from google
Route::GET('/almost-done', 'visitorcontroller@almost');

//register user through API
Route::POST('/social-register', 'register2controller@register')->name('register2');

//message route for category filter
Route::POST('/item-message', 'visitorcontroller@msg')->name('message-cat');

//message route for single pro page and school filter
Route::POST('/send-message', 'visitorcontroller@update')->name('message');

/////////////////////////////user acts in visitor area//////////////



//facebook sociallite
//Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
//Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');


//twitter sociallite
Route::get('login/twitter', 'Auth\LoginController@redirectToProvidertwitter');
Route::get('login/twitter/callback', 'Auth\LoginController@handleProviderCallbacktwitter');


//google sociallite
Route::get('login/google', 'Auth\LoginController@redirectToProvidergoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallbackgoogle');




































//////////////////route to prevent backbutton after logout ///////
Route::group(['middleware' => 'preventbackbutton'], function(){

    //auth routes
Auth::routes();





    /////////////user routes /////////////////////////////////////////////////////////////////////////

//route group to protect  user routes from guests and users
Route::group(['middleware' => 'usermware'], function(){

    /////////////pages route
    Route::get('/dashboard', 'pages2controller@user_dash')->name('home');
    
    Route::get('/post', 'pages2controller@post')->name('post-page');
    
    Route::get('/manage-post', 'pages2controller@manage')->name('manage-post-page');
    
    
    //route fav post
    Route::get('/favourites', 'pages2controller@fav')->name('fav-post-page');
    
    //route fav ad
    Route::get('/favourites-ad', 'pages2controller@favad')->name('fav-ad-page');
    
    Route::get('/ads', 'pages2controller@ads')->name('ad-page');
    
    Route::get('/payment_history', 'pages2controller@payment')->name('general-ad-page');
    
    Route::get('/profile', 'pages2controller@profile')->name('profile-page');
    
    Route::get('/make-request', 'pages2controller@req')->name('request-page');
    
    //sent page route
    Route::get('/new-message', 'pages2controller@new_msg')->name('message-page');
    
    //replies page route
    Route::get('/message-feedback', 'pages2controller@msg_feed')->name('message-resend-page');
    
    //view my schoo ads only
    Route::GET('/my-school-ads', 'usercontroller@mysch')->name('myads');
    
      //search my sch ads only
      Route::GET('/search-school-ads', 'visitorcontroller@search_mysch_ads')->name('search_mysch_ads');
    /////////////pages route
    
    
    
    
    
    
    //////POSTS////////////////////////////
    
    //route to store message
    Route::POST('/mail', 'usercontroller@store')->name('mail');
    
    //route to store post
    Route::POST('/new_post', 'usercontroller@store_post')->name('post');
    
    //route to mark as sold
    Route::POST('/sold', 'usercontroller@sold')->name('sold');
    
    //route to store ad
    Route::POST('/post_ad', 'usercontroller@store_ad')->name('ad');
    
    //update profile route
    Route::POST('/edit_profile', 'usercontroller@recreate')->name('resave');
    
    //place request
    Route::POST('/place-request', 'usercontroller@request')->name('req');
    
    //edit post
    Route::POST('/recreate-post', 'usercontroller@update')->name('repair');
    
    //ask the street for custom banner
    Route::POST('/design-for-me', 'adscontroller@create')->name('custom');
    
    //reply final edit col
    Route::POST('/reply-final', 'messagecontroller@update')->name('reply');
    
    //reply final edit col
    Route::POST('/refeed-sub', 'feedcontroller@update')->name('refeed');
    
    //route to check ad availability
    Route::POST('/check', 'adscontroller@index')->name('check');
    
    //report post
    Route::POST('/report-item', 'pages2controller@report')->name('report');
    
    
    //////POSTS////////////////////////////
    
    
    
    
    
    //////DELETES////////////////////////////
    
    //route to delete post
    Route::DELETE('/delete_post', 'usercontroller@destroy')->name('remove');
    
    //delete req
    Route::DELETE('/remove-request', 'userController@eject')->name('close');
    
    //delete general ad
    Route::DELETE('/remove-ad', 'adscontroller@destroy')->name('delete_ad');
    
    //delete fav post
    Route::DELETE('/remove-favourite-post', 'favcontroller@destroy')->name('remove_fav');
    
    //delete fav ad
    Route::DELETE('/remove-favourite-ad', 'fav_adcontroller@destroy')->name('remove_fav_ad');
    
    //delete fav ad
    Route::DELETE('/delete-feed', 'feedController@destroy')->name('remove-feed');
    
    //////DELETES////////////////////////////
    
    
    //resoures /////////////////////////////////////
    
    //route to edit post
    Route::resource('modify','usercontroller');
    
    //route resourse //delete favourite post
    Route::resource('/favs','favcontroller');
    
    Route::resource('/favs-ad','fav_adcontroller');
    
    //route to message read and reply
    Route::resource('message','messagecontroller');
    
    //route to feeds
    Route::resource('refeed','feedcontroller');
    
    
    //resoures /////////////////////////////////////
    
    
    ////////////ajax pages routes/////////////////////
    
    Route::GET('/manage-posts','pages2controller@manage_post')->name('manage-post');
    
    Route::GET('/new-message-ajax','pages2controller@new_message')->name('new-message');
    
    Route::GET('/feedback-ajax','pages2controller@feedback')->name('feedback');
    
    Route::GET('/request-ajax','pages2controller@req_ajax')->name('req-ajax');
    
    Route::GET('/fav-post','pages2controller@fav_post')->name('fav_post');
    
    Route::GET('/fav-ad','pages2controller@fav_ad')->name('fav-ad');
    
    Route::GET('/general-ad','pages2controller@gen_ad')->name('user-gen-ad');
    
    ////////////ajax pages routes/////////////////////
    
    });
    //route group to protect user routes from guests and users
    














//////////////////////////////////////////admin routes///////////////////////////////////////////////


//route group to protect admin routes from guests and users
Route::group(['middleware' => 'adminmware'], function(){


    //export excel

Route::get('downloadExcel/{type}', 'excelcontroller@downloadExcel');
Route::get('downloadExcel2/{type}', 'excelcontroller@downloadExcel2');
Route::get('downloadExcel3/{type}', 'excelcontroller@downloadExcel3');
//Route::post('importExcel', 'excelcontroller@importExcel');


    /////////pages routes
    Route::get('/question', 'admincontroller@question')->name('que');

    Route::get('/dashhboard', 'admincontroller@admin')->name('dash-page');

    Route::get('/admin-manage-post', 'admincontroller@man')->name('man-post-page');

    Route::get('/view_admins', 'admincontroller@view')->name('view-admin');

    Route::get('/approved_posts', 'admincontroller@approved_posts')->name('app-page');

    Route::get('/declined_posts', 'admincontroller@declined_posts')->name('dec-page');

    Route::get('/create-admin', 'admincontroller@add')->name('made-man');

    Route::get('/manage_ads', 'admincontroller@man_ads')->name('gen-ad-page');

    Route::get('/custom_ads', 'admincontroller@custom')->name('cus-page');

    Route::get('/log', 'admincontroller@log')->name('log-page');

   
    //project page
    Route::get('/project-page', 'admin2controller@project_page')->name('project-page');

    //project data
    Route::get('/project-data', 'admin2controller@proj_data')->name('proj-data');

    //allow or delete project data
    Route::POST('/project_validity', 'admin2controller@project_validity')->name('project_validity');

//users page
    Route::get('/users', 'admin2controller@users_page')->name('users_page');
//users page data load
Route::GET('/users-ajax', 'admin2controller@users_data')->name('users_data');
//users update
Route::POST('/users-update', 'admin2controller@update_user')->name('update_user');

//users page data load
Route::GET('/users-search', 'admin2controller@users_search')->name('users_search');

//users page data load
Route::POST('/activation-state', 'admin2controller@state')->name('state');



//search ad
Route::get('/search-ad', 'admin2controller@admin_ad_search')->name('admin_ad_search');



//admin post stuff
Route::get('/admin-post', 'admin2controller@post');
//users page data load
Route::POST('/force_post', 'admin2controller@force_post')->name('forcep');

    Route::get('/site-settings', 'admincontroller@settings');

    Route::get('/expired', 'admincontroller@expired_ads')->name('ex-page');

    Route::GET('/reports', 'admincontroller@reports')->name('reports');
    /////////pages routes


    //resourses
    Route::resource('reported-content','admincontroller');

    Route::resource('reported-item','admin2controller');
     //resourses


     //////POST routes

    //create new admin
    Route::POST('/new-admin', 'admincontroller@new_admin')->name('new_admin');

//approve ad
    Route::POST('/allow-ad', 'admincontroller@allow')->name('allow');

//approve ad
    Route::POST('/admin-details', 'admincontroller@admin_view')->name('admin_view');

//disapprove ad
    Route::POST('/disallow-ad', 'admincontroller@disallow')->name('disallow');

//disapprove ad
    Route::POST('/expire', 'admincontroller@expire')->name('expire');

//ans question
    Route::POST('/answer', 'admincontroller@ans')->name('ans');

//update custom banner
    Route::POST('/update-custom-banner', 'admincontroller@update')->name('cus');

    //admin approve post
    Route::POST('/approved', 'admincontroller@approve')->name('approve');

//admin decline post
    Route::POST('/declined', 'admincontroller@decline')->name('decline');

   
       //verify user
       Route::POST('/verify_user', 'admin2controller@verify_user')->name('verify_user');

    //admin restore declined post
    Route::POST('/restore-post', 'admin2controller@restore')->name('restore');

     //////POST routes


//delete running post
Route::DELETE('/delete-running-post', 'admincontroller@destroy')->name('remove-running');

//delete declined post
Route::DELETE('/delete-declined-post', 'admincontroller@remove_dec')->name('remove-declined');

//delete running post
Route::DELETE('/delete-reported-post', 'admincontroller@delpost')->name('delpost');

//delete running post
Route::DELETE('/delete-reported-ad', 'admincontroller@delad')->name('delad');

//ignore reported post
Route::DELETE('/ignore-reported-post', 'admin2controller@ignorereppost')->name('ignorereppost');

//ignore reported ad
Route::DELETE('/ignore-reported-ad', 'admin2controller@ignorerepad')->name('ignorerepad');


//................Ajax load routes.......................//

Route::GET('/ad-status', 'admincontroller@ad_status')->name('ad-stat');

Route::GET('/manage-post-ajax', 'admincontroller@mp')->name('man-post');

Route::GET('/approved-post-ajax', 'admincontroller@app')->name('app-post');

Route::GET('/declined-post-ajax', 'admincontroller@dec')->name('dec-post');

Route::POST('/admin-info', 'admincontroller@info')->name('info');

//load manage request page
Route::Get('/manage-requests', 'admin2controller@manage_req')->name('manage_req');

//load requests 
Route::Get('/requests-data', 'admin2controller@request_data')->name('request_data');

//allow of disallow
Route::POST('/validity-request', 'admin2controller@validity')->name('validity');


Route::get('/mail-marketing', 'admin2controller@mail')->name('mail');

//search app
Route::GET('/search-approved-post', 'admincontroller@searchapp')->name('search-app');

//search dec
Route::GET('/search-declined-post', 'admincontroller@searchdec')->name('search-dec');


Route::GET('/general-ads', 'admincontroller@general')->name('gen-ad');


Route::GET('/custom-ads-request', 'admincontroller@cus_req')->name('cus-req');

Route::GET('/question-ajax', 'admincontroller@q')->name('q');

Route::GET('/log-ajax', 'admincontroller@log_ajax')->name('log');

Route::GET('/report-ad-ajax', 'admincontroller@repad_ajax')->name('rep_ad');

Route::GET('/report-post-ajax', 'admincontroller@reppost_ajax')->name('rep_post');

//search log
Route::GET('/search-log', 'admincontroller@searchlog')->name('search_log');


Route::GET('/ex-ajax', 'admincontroller@ex')->name('ex');
//................Ajax load routes.......................//



//dashboard reload routes//
Route::GET('/post-count', 'admin2controller@post_count')->name('post_count');

Route::GET('/pending-post-count', 'admin2controller@p_post_count')->name('pending_post_count');

Route::GET('/ad-count', 'admin2controller@ad_count')->name('ad_count');

Route::GET('/pending-ad-count', 'admin2controller@p_ad_count')->name('pending_ad_count');

Route::GET('/user-count', 'admin2controller@user_count')->name('user_count');

Route::GET('/admin-count', 'admin2controller@admin_count')->name('admin_count');

Route::GET('/sold-post-count', 'admin2controller@sold_count')->name('sold_count');

Route::GET('/ad-cash-count', 'admin2controller@ad_cash_count')->name('ad_cash_count');

Route::GET('/question-count', 'admin2controller@question_count')->name('question_count');

Route::GET('/report-count', 'admin2controller@report_count')->name('report_count');

Route::GET('/total-requests-count', 'admin2controller@req_count')->name('req_count');

Route::GET('/pending-reguest-count', 'admin2controller@pending_req_count')->name('pending_req_count');
//dashboard reload routes//
  
//Route::get('/https://www.dstreet.com.ng', 'pagescontroller@find')->name('dummy');

});
//route group to protect admin routes from guests and users




});
//////////////////route to prevent backbutton after logout ///////
