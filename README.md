
**How its work** (how to get the project into your system -- please follow the below steps one by one)

1)	 *git clone https://github.com/yadunandankushwaha/Laravel-5.4-complete-project-with-administrator-panel-and-front-panel.git projectName*

2)	(once clonning done go to project folder and run) *composer update*

3)	Create and Change Database name from .env file from root folder (if .env file is not there please create .env file)

4)	Run the command to get database tables:  *php artisan migrate*

5)	Run seeder to insert data in tables eg. *php artisan db:seed --class=UsersTableSeeder* (please check seeder folder to run and get more data in database tables like i did above for user table)

6)	Than run *php artisan serve*

7)	Now hit the localhost with *localhost:8000* in your brower for front end panel

8)	For Admin panel -- *localhost:8000/admin* in your brower for Admin panel 

**Login Credential for Admin**

	Email: ynandan55@gmail.com --- password: 123456
	
	(NOTE: if you are Getting error (Call to undefined method Illuminate\Session\Store::getToken()) in admin login page then please rename the function getToken() to token() and the file will be located in *vendor\laravelcollective\html\src\HtmlServiceProvider.php*)

**Login Credential for User**

	Please register yourself and login with your Credential
	

**Main Components**

1)	Bootstrap Theme integrated for Administration and Front-panel.

2)	Laravel 5.4

3)	Php 5.6

**User Panel**

1)	*Theme Integrate*

2)	*User Login*

3)	*User Registration*

4)	*Manage Dashboard and Settings*

5)	*Add-update-edit-delete blog*

6)	*Blogs comment system*

**Administration Panel**

1)	*Bootstrap Theme Integration for admin panel*

2)	*Login for Admin*

3)	*Forget password*

4)	*Reset password*

5)	*Full dashboard integration*

6)	*Edit profile*

7)	*Change password*

8)	 *Manage USER-* 

	* 	Add user
	
	* 	Update User
	
	*	List of Users
	
	*	Active/Inactive User
	
	*	Delete User
	
9)	  *Manage BLOGS-*

	*	Manage Blog Category(Add, Edit, Delete)
	
	*	Add Blog
	
	*	Update Blog
	
	*	List of blogs
	
	*	Enable/Disable and Delete Blogs
  
  
10)	  *Manage PRODUCTS-*

	*	Manage Product Category(Add, Edit, Delete)
	
	*	Add Products
	
	*	Update Products
	
	*	List of Products
	
	*	Enable/Disable and Delete Products


11)	  *Manage TEAMS-*

	*	Add Team
	
	*	Update Team
	
	*	List of Teams
	
	*	Active/Inactive and Delete Team
	
	
12)	  *Manage TESTIMONIALS-*

	*	Add Testimonial
	
	*	Update Testimonial
	
	*	List of Testimonials
	
	*	Active/Inactive and Delete Testimonial
	
	
13)	  *Manage FAQ-*

	*	Manage Faq Category(Add, Edit, Delete)

	*	Add Faq
	
	*	Update Faq
	
	*	List of Faq
	
	*	Active/Inactive and Delete Faq
	
	
14)	  *Manage GALLERY-*

	*	Add Multiple Gallery Images
	
	*	List of Gallery Images
	
	*	Delete Gallery Images
	
	
15)	  *Manage SITE CONFIGURATION-*

	*	Manage Site Logo, Title etc.
	
	*	Manage Front End Static Pages Dynamically. (About, Contact, Term & Condition, Privacy Policy Pages)
	
	*	Manage Sliders (Add, Edit, Delete)
	
	*	Manage Custom SEO Tools for front-end pages (for meta tag/keywords, description) 
	
	*	Manage Front End Social Links (Add, Edit)
	


**Note:-** This product is under developed by Yadu Nandan Kushwaha .. 

	   Please contact if having any query. Mail to – ynandan55@gmail.com || https://github.com/yadunandankushwaha 
	   

	
