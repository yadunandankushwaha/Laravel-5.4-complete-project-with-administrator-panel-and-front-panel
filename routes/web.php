<?php
Route::get('/index','HomeController@viewIndexPage');
Route::get('/about','HomeController@viewAboutPage');

Route::get('/contact','HomeController@viewContactPage');
Route::get('/admin','AdminController@adminIndexPage');
Route::get('/admin/index','AdminController@adminIndexPage');




Route::get('job-apply', function () {return view('job-apply');});
Route::post('apply','JobApplyController@apply');

//Registration and login 		
Route::post('signup','UserController@registration');

Route::get('/confirmation/{token}','UserController@confirmation');
Route::post('/admin/login','AdminController@Authuanticate');

// Authuanticated Routes
Route::group(array('middleware' => 'auth.authByrole'), function()
{


Route::get('/admin/dashboard','AdminController@adminDashboardPage');
Route::get('applied-candidates','JobApplyController@getAppliedCandidates');
Route::get('view-applied-candidate/{id}','JobApplyController@viewAppliedCandidate');
Route::post('comment','CommentsController@addComments');


Route::get('remove_comment/{id}','CommentsController@deleteComments');
Route::post('update-ratings','RatingController@updateRatings');

Route::get('/admin/update-profile','AdminController@updateProfile');
Route::post('/admin/update-profile-data','AdminController@updateProfileData');
Route::get('/admin/change-password','AdminController@changePassword');
Route::post('/admin/change-password-data','AdminController@changePasswordData');

//Admin user manage route
Route::get('/admin/add-user','AdminController@viewAddUser');
Route::post('/admin/add-user','AdminController@addUser');
Route::get('/admin/users','AdminController@getUsers');
Route::get('/admin/update-user/{id}','AdminController@updateUser');
Route::post('/admin/update-user-data','AdminController@updateUserData');
Route::get('/admin/delete-user/{id}','AdminController@deleteUser');
Route::get('/admin/enable-disable-user/{id}','AdminController@enableDisableUser');


//Admin blog manage routes
Route::get('/admin/add-blog','BlogController@viewAddBlog');
Route::post('/admin/add-blog','BlogController@addBlog');
Route::get('/admin/blogs','BlogController@getBlogs');
Route::get('/admin/update-blog/{id}','BlogController@updateBlog');
Route::post('/admin/update-blog-data','BlogController@updateBlogData');
Route::get('/admin/delete-blog/{id}','BlogController@deleteBlog');
Route::get('/admin/enable-disable-blog/{id}','BlogController@enableDisableBlog');

//Admin Testimonial manage routes
Route::get('/admin/add-testimonial','TestimonialController@viewAddTestimonial');
Route::post('/admin/add-testimonial','TestimonialController@addTestimonial');
Route::get('/admin/testimonials','TestimonialController@getTestimonials');
Route::get('/admin/update-testimonial/{id}','TestimonialController@updateTestimonial');
Route::post('/admin/update-testimonial-data','TestimonialController@updateTestimonialData');
Route::get('/admin/delete-testimonial/{id}','TestimonialController@deleteTestimonial');
Route::get('/admin/enable-disable-testimonial/{id}','TestimonialController@enableDisableTestimonial');


//Admin Teams manage routes
Route::get('/admin/add-team','TeamController@viewAddTeam');
Route::post('/admin/add-team','TeamController@addTeam');
Route::get('/admin/teams','TeamController@getTeams');
Route::get('/admin/update-team/{id}','TeamController@updateTeam');
Route::post('/admin/update-team-data','TeamController@updateTeamData');
Route::get('/admin/delete-team/{id}','TeamController@deleteTeam');
Route::get('/admin/enable-disable-team/{id}','TeamController@enableDisableTeam');

//Admin Faq manage routes
Route::get('/admin/add-faq','FaqController@viewAddFaq');
Route::post('/admin/add-faq','FaqController@addFaq');
Route::get('/admin/faqs','FaqController@getFaqs');
Route::get('/admin/update-faq/{id}','FaqController@updateFaq');
Route::post('/admin/update-faq-data','FaqController@updateFaqData');
Route::get('/admin/delete-faq/{id}','FaqController@deleteFaq');
Route::get('/admin/enable-disable-faq/{id}','FaqController@enableDisableFaq');

//Seos manage route
Route::get('/admin/seo-pages','SeoController@getSeosPages');
Route::get('/admin/update-seo-page/{id}','SeoController@updateSeoPage');
Route::post('/admin/update-seo-page','SeoController@updateSeoPageData');

//gallery manage route
Route::get('/admin/add-gallery','GalleryController@viewAddGallery');
Route::post('/admin/add-gallery','GalleryController@addGallery');
Route::get('/admin/galleries','GalleryController@getGalleries');
Route::get('/admin/delete-gallery/{id}','GalleryController@deleteGallery');

//Slider manage route
Route::get('/admin/add-slider','SliderController@viewAddSlider');
Route::post('/admin/add-slider','SliderController@addSlider');
Route::get('/admin/sliders','SliderController@getSliders');
Route::get('/admin/update-slider/{id}','SliderController@updateSlider');
Route::post('/admin/update-slider','SliderController@updateSliderData');
Route::get('/admin/delete-slider/{id}','SliderController@deleteSlider');
Route::get('/admin/enable-disable-slider/{id}','SliderController@enableDisableSlider');


//site configuration 
Route::get('/admin/site-configuration','SiteConfigurationController@viewSiteConfiguration');
Route::post('/admin/update-site-configuration','SiteConfigurationController@updateSiteConfiguration');

//social links route
Route::get('/admin/add-social-link','SocialLinkController@viewAddSocialLink');
Route::post('/admin/add-social-link','SocialLinkController@addSocialLink');
Route::get('/admin/social-links','SocialLinkController@getSocialLinks');
Route::get('/admin/update-social-link/{id}','SocialLinkController@updateSocialLink');
Route::post('/admin/update-social-link','SocialLinkController@updateSocialLinkData');
Route::get('/admin/delete-social-link/{id}','SocialLinkController@deleteSocialLink');
Route::get('/admin/enable-disable-social-link/{id}','SocialLinkController@enableDisableSocialLink');

//Manage Product Pages
Route::get('/admin/product-dashboard','ProductController@view');
Route::get('/admin/add-product','ProductController@viewAddProduct');
Route::post('/admin/add-product','ProductController@addProduct');
Route::get('/admin/update-product/{id}','ProductController@updateProduct');
Route::post('/admin/update-product','ProductController@updateProductData');
Route::get('/admin/products','ProductController@getProducts');
Route::get('/admin/enable-disable-product/{id}','ProductController@enableDisableProduct');

//Manage Product Category Pages
Route::get('/admin/add-product-category','ProductCategoryController@viewAddProductCategory');
Route::post('/admin/add-product-category','ProductCategoryController@addProductCategory');
Route::get('/admin/product-categories','ProductCategoryController@getProductCategories');
Route::get('/admin/update-product-category/{id}','ProductCategoryController@updateProductCategory');
Route::post('/admin/update-product-category','ProductCategoryController@updateProductCategoryData');
Route::get('/admin/delete-product-category/{id}','ProductCategoryController@deleteProductCategory');
Route::get('/admin/enable-disable-product-category/{id}','ProductCategoryController@enableDisableProductCategory');

//payment + orders routs
Route::get('/admin/product-orders','ProductOrderController@getProductOrders');





Route::get('/admin/logout/',function () {
	Auth::logout();
	Session::flash ( 'message', 'Logged Out Successfully! Visit Again.' );
	return Redirect::to('/admin/index');} );

});

Auth::routes();

Route::get('/', function () {
    return view('index');
});

Route::get('/home', 'HomeController@index')->name('home');
