<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// Sample route, with a "before" filter called "domain_access"
// Route::group(['middleware' => ['web'],'domain' => '{account}.vocaptionary.app'], function () {
// 	Route::any( '{slug}', function($account){
// 		echo $account;
// 		Route::get('test',['middleware' => ['beforeFilter:tet'], function ($account) {
// 	    	return Redirect::action('AdminsController@getLogin');
// 	    }]);
// 	});
// 	// Route::any('', function($account){
// 	//     Route::get('/test', function ($account) {
// 	//     	echo $account;
// 	//     });
// 	// });
// });


Route::group(['middleware' => ['web','beforeFilter']], function () {
	//HOME ROUTE
	Route::get('/', ['as'=>'home_index', 'uses' => 'HomeController@home']);
	Route::get('play',  ['as' => 'game_play','uses' => 'GamesController@getPlayIndex']);
	Route::get('study',  ['as' => 'game_study','uses' => 'GamesController@getStudyIndex']);
	Route::get('home/logout', 'HomeController@getLogoutUser');	
});


Route::group(['prefix' => 'api/v1', 'middleware' => 'auth:api'], function () {
	Route::get('users-all', ['uses' => 'UsersController@getAPIUsersAll']);
});

Route::group(['middleware' => ['web']], function () {
	// FACEBOOK PAGE
	Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
	Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');
});




//THE WEB MIDDLEWARE IS ADDED BY L5.2
Route::group(['middleware' => ['web','beforeFilter']], function () {
	Route::get('registration', ['as'=>'registration_view','uses'=>'UsersController@getRegistration']);
	Route::post('registration', ['uses'=>'UsersController@postRegistration']);
	Route::post('users/return-users',  ['uses' => 'UsersController@postReturnUsers', 'middleware' => ['acl:admins/acl/view']]);
	//USER PREFIX
	Route::group(['prefix' => 'users'], function () {
		Route::get('login', ['as'=>'users_login','uses'=>'UsersController@getLogin']);
		Route::post('login',['uses'=>'UsersController@postLogin']);
		Route::post('login-modal', ['uses'=>'UsersController@postLoginModal']);
		Route::get('profile/{username}',  ['as'=>'users_profile','uses' => 'UsersController@getProfile', function ($username) {}]);
		Route::post('profile',  ['as'=>'users_profile_post','uses' => 'UsersController@postProfile']);
		Route::post('user-auth', ['uses'=>'UsersController@postUserAuth']);
		Route::post('send-file', ['uses'=>'UsersController@postSendFile']);
		Route::post('validate', ['uses'=>'UsersController@postValidate']);
		Route::post('send-file-temp', ['uses'=>'UsersController@postSendFileTemp']);
		Route::post('request-users','UsersController@postRequestUsers');
		Route::post('request-user-information','UsersController@postRequestUserInformation');
	});	

	//ADMIN PREFIX
	Route::group(['prefix' => 'admins'], function () {
		Route::get('login', 'AdminsController@getLogin');
		Route::post('login', 'AdminsController@postLogin');
		Route::get('logout', 'AdminsController@getLogout');			
	});

	Route::get('/reminders/forgot', 'RemindersController@getForgot');
	Route::post('/reminders/forgot', 'RemindersController@postForgot');
	Route::get('/reminders/reset/{token}', 'RemindersController@getReset');
	Route::post('/reminders/reset', 'RemindersController@postReset');

	/** ADMINS ACL GROUP **/
	Route::group(['middleware' => ['auth']], function(){






		Route::get('admins',  ['as'=>'admins_index', 'uses' => 'AdminsController@getIndex', 'middleware' => ['acl:admins']]);
		Route::group(['prefix' => 'admins'], function () {
			$prefix = 'admins';	
			Route::get('companies',  ['as' => 'companies_index','uses' => 'CompaniesController@getIndex', 'middleware' => ['acl:'.$prefix.'/companies']]);
			Route::get('companies/add',  ['as' => 'companies_add','uses' => 'CompaniesController@getAdd', 'middleware' => ['acl:'.$prefix.'/companies/add']]);
			Route::post('companies/add',  ['uses' => 'CompaniesController@postAdd', 'middleware' => ['acl:'.$prefix.'/companies/add']]);
			Route::get('companies/edit/{id}',  ['as' => 'companies_edit','uses' => 'CompaniesController@getEdit', 'middleware' => ['acl:'.$prefix.'/companies/edit'], function ($id) {}]);
			Route::post('companies/edit',  ['uses' => 'CompaniesController@postEdit', 'middleware' => ['acl:'.$prefix.'/companies/edit']]);
			Route::get('companies/view',  ['as' => 'companies_view','uses' => 'CompaniesController@getView', 'middleware' => ['acl:'.$prefix.'/companies/view'], function ($id) {}]);
			Route::post('companies/view',  ['uses' => 'CompaniesController@postView', 'middleware' => ['acl:'.$prefix.'/companies/view']]);
			Route::post('companies/delete',  ['uses' => 'CompaniesController@postDelete', 'middleware' => ['acl:'.$prefix.'/companies/delete']]);
			
			Route::get('inventories',  ['as' => 'inventories_index','uses' => 'InventoriesController@getIndex', 'middleware' => ['acl:'.$prefix.'/inventories']]);
			Route::get('inventories/add',  ['as' => 'inventories_add','uses' => 'InventoriesController@getAdd', 'middleware' => ['acl:'.$prefix.'/inventories/add']]);
			Route::post('inventories/add',  ['uses' => 'InventoriesController@postAdd', 'middleware' => ['acl:'.$prefix.'/inventories/add']]);
			Route::get('inventories/edit/{id}',  ['as' => 'inventories_edit','uses' => 'InventoriesController@getEdit', 'middleware' => ['acl:'.$prefix.'/inventories/edit'], function ($id) {}]);
			Route::post('inventories/edit',  ['uses' => 'InventoriesController@postEdit', 'middleware' => ['acl:'.$prefix.'/inventories/edit']]);
			Route::get('inventories/view/{id}',  ['as' => 'inventories_view','uses' => 'InventoriesController@getView', 'middleware' => ['acl:'.$prefix.'/inventories/view'], function ($id) {}]);
			Route::post('inventories/view',  ['uses' => 'InventoriesController@postView', 'middleware' => ['acl:'.$prefix.'/inventories/view']]);
			Route::post('inventories/delete',  ['uses' => 'InventoriesController@postDelete', 'middleware' => ['acl:'.$prefix.'/inventories/delete']]);

			Route::get('inventory-items',  ['as' => 'inventoryItems_index','uses' => 'Inventory-itemsController@getIndex', 'middleware' => ['acl:'.$prefix.'/inventory-items']]);
			Route::get('inventory-items/add',  ['as' => 'inventoryItems_add','uses' => 'Inventory-itemsController@getAdd', 'middleware' => ['acl:'.$prefix.'/inventory-items/add']]);
			Route::post('inventory-items/add',  ['uses' => 'InventoryItemsController@postAdd', 'middleware' => ['acl:'.$prefix.'/inventory-items/add']]);
			Route::get('inventory-items/edit/{id}',  ['as' => 'inventoryItems_edit','uses' => 'Inventory-itemsController@getEdit', 'middleware' => ['acl:'.$prefix.'/inventory-items/edit'], function ($id) {}]);
			Route::post('inventory-items/edit',  ['uses' => 'InventoryItemsController@postEdit', 'middleware' => ['acl:'.$prefix.'/inventory-items/edit']]);
			Route::get('inventory-items/view/{id}',  ['as' => 'inventoryItems_view','uses' => 'Inventory-itemsController@getView', 'middleware' => ['acl:'.$prefix.'/inventory-items/view'], function ($id) {}]);
			Route::post('inventory-items/view',  ['uses' => 'InventoryItemsController@postView', 'middleware' => ['acl:'.$prefix.'/inventory-items/view']]);
			Route::post('inventory-items/delete',  ['uses' => 'InventoryItemsController@postDelete', 'middleware' => ['acl:'.$prefix.'/inventory-items/delete']]);


			Route::get('roles',  ['as'=>'roles_index', 'uses' => 'RolesController@getIndex', 'middleware' => ['acl:'.$prefix.'/roles']]);
			Route::get('roles/add',  ['as'=>'roles_add', 'uses' => 'RolesController@getAdd','middleware' => ['acl:'.$prefix.'/roles/add']]);
			Route::post('roles/add',  ['uses' => 'RolesController@postAdd', 'middleware' => ['acl:'.$prefix.'/roles/add']]);
			Route::get('roles/edit/{id}',  ['as'=>'roles_edit', 'uses' => 'RolesController@getEdit', 'middleware' => ['acl:'.$prefix.'/roles/edit/{id}'], function ($id) {}]);
			Route::post('roles/edit',  ['as'=>'roles_update','uses' => 'RolesController@postEdit', 'middleware' => ['acl:'.$prefix.'/roles/edit']]);
			Route::get('roles/delete-data/{id}',  ['as'=>'roles_delete', 'uses' => 'RolesController@getDelete', 'middleware' => ['acl:'.$prefix.'/roles/delete-data{id}'], function ($id) {}]);

			Route::get('permissions',  ['as'=>'permissions_index', 'uses' => 'PermissionsController@getIndex', 'middleware' => ['acl:'.$prefix.'/permissions']]);
			Route::get('permissions/add',  ['as'=>'permissions_add','uses' => 'PermissionsController@getAdd', 'middleware' => ['acl:'.$prefix.'/permissions/add']]);
			Route::post('permissions/add',  ['uses' => 'PermissionsController@postAdd', 'middleware' => ['acl:'.$prefix.'/permissions/add']]);
			Route::get('permissions/edit/{id}', ['as' => 'permissions_edit', 'uses' => 'PermissionsController@getEdit','middleware' => ['acl:'.$prefix.'/permissions/edit/{id}'], function ($id) {}]);
			Route::post('permissions/edit',  ['uses' => 'PermissionsController@postEdit', 'middleware' => ['acl:'.$prefix.'/permissions/edit']]);
			Route::get('permissions/delete-data/{id}',  ['as'=>'permissions_delete','uses' => 'PermissionsController@getDelete', 'middleware' => ['acl:'.$prefix.'/permissions/delete-data{id}'], function ($id) {}]);

			Route::get('permission-roles',  ['as'=>'permission_roles_index', 'uses' => 'PermissionRolesController@getIndex', 'middleware' => ['acl:'.$prefix.'/permission-roles']]);
			Route::get('permission-roles/add',  ['as'=>'permission_roles_add', 'uses' => 'PermissionRolesController@getAdd', 'middleware' => ['acl:'.$prefix.'/permission-roles/add']]);
			Route::post('permission-roles/add',  ['uses' => 'PermissionRolesController@postAdd', 'middleware' => ['acl:'.$prefix.'/permission-roles/add']]);
			Route::get('permission-roles/edit/{id}',  ['as'=>'permission_roles_edit', 'uses' => 'PermissionRolesController@getEdit', 'middleware' => ['acl:'.$prefix.'/permission-roles/edit/{id}'], function ($id) {}]);
			Route::post('permission-roles/edit',  ['uses' => 'PermissionRolesController@postEdit', 'middleware' => ['acl:'.$prefix.'/permission-roles/edit']]);
			Route::get('permission-roles/delete-data/{id}',  ['as'=>'permission_roles_delete', 'uses' => 'PermissionRolesController@getDelete', 'middleware' => ['acl:'.$prefix.'/permission-roles/delete-data/{id}'], function ($id) {}]);
			
			//SERVICES
			Route::get('services',  ['as' => 'services_index','uses' => 'ServicesController@getIndex', 'middleware' => ['acl:'.$prefix.'/services']]);
			Route::get('services/add',  ['as' => 'services_add','uses' => 'ServicesController@getAdd', 'middleware' => ['acl:'.$prefix.'/services/add']]);
			Route::post('services/add',  ['uses' => 'ServicesController@postAdd', 'middleware' => ['acl:'.$prefix.'/services/add']]);
			Route::get('services/edit/{id}',  ['as' => 'services_edit','uses' => 'ServicesController@getEdit', 'middleware' => ['acl:'.$prefix.'/services/edit'], function ($id) {}]);
			Route::post('services/edit',  ['uses' => 'ServicesController@postEdit', 'middleware' => ['acl:'.$prefix.'/services/edit']]);
			Route::get('services/view/{id}',  ['as' => 'services_view','uses' => 'ServicesController@getView', 'middleware' => ['acl:'.$prefix.'/services/view'], function ($id) {}]);
			Route::post('services/view',  ['uses' => 'ServicesController@postView', 'middleware' => ['acl:'.$prefix.'/services/view']]);
			Route::post('services/delete',  ['uses' => 'ServicesController@postDelete', 'middleware' => ['acl:'.$prefix.'/services/delete']]);

			Route::get('resources',  ['as' => 'resources_index','uses' => 'ResourcesController@getIndex', 'middleware' => ['acl:'.$prefix.'/resources']]);
			Route::get('resources/add',  ['as' => 'resources_add','uses' => 'ResourcesController@getAdd', 'middleware' => ['acl:'.$prefix.'/resources/add']]);
			Route::post('resources/add',  ['uses' => 'ResourcesController@postAdd', 'middleware' => ['acl:'.$prefix.'/resources/add']]);
			Route::get('resources/edit',  ['as' => 'resources_edit','uses' => 'ResourcesController@getEdit', 'middleware' => ['acl:'.$prefix.'/resources/edit']]);
			Route::post('resources/edit',  ['uses' => 'ResourcesController@postEdit', 'middleware' => ['acl:'.$prefix.'/resources/edit']]);
			Route::get('resources/view/{id}',  ['as' => 'resources_view','uses' => 'ResourcesController@getView', 'middleware' => ['acl:'.$prefix.'/resources/view'], function ($id) {}]);
			Route::post('resources/view',  ['uses' => 'ResourcesController@postView', 'middleware' => ['acl:'.$prefix.'/resources/view']]);
			Route::post('resources/delete',  ['uses' => 'ResourcesController@postDelete', 'middleware' => ['acl:'.$prefix.'/resources/delete']]);
			Route::post('resources/file-upload',  ['uses' => 'ResourcesController@postFileupload', 'middleware' => ['acl:'.$prefix.'/resources/file-upload']]);

			//COSTS
			Route::get('costs',  ['as' => 'costs_index','uses' => 'CostsController@getIndex', 'middleware' => ['acl:'.$prefix.'/costs']]);
			Route::get('costs/add',  ['as' => 'costs_add','uses' => 'CostsController@getAdd', 'middleware' => ['acl:'.$prefix.'/costs/add']]);
			Route::post('costs/add',  ['uses' => 'CostsController@postAdd', 'middleware' => ['acl:'.$prefix.'/costs/add']]);
			Route::get('costs/edit',  ['as' => 'costs_edit','uses' => 'CostsController@getEdit', 'middleware' => ['acl:'.$prefix.'/costs/edit']]);
			Route::post('costs/edit',  ['uses' => 'CostsController@postEdit', 'middleware' => ['acl:'.$prefix.'/costs/edit']]);
			Route::get('costs/view/{id}',  ['as' => 'costs_view','uses' => 'CostsController@getView', 'middleware' => ['acl:'.$prefix.'/costs/view'], function ($id) {}]);
			Route::post('costs/view',  ['uses' => 'CostsController@postView', 'middleware' => ['acl:'.$prefix.'/costs/view']]);
			Route::post('costs/delete',  ['uses' => 'CostsController@postDelete', 'middleware' => ['acl:'.$prefix.'/costs/delete']]);

			Route::get('taxes',  ['as' => 'taxes_index','uses' => 'TaxesController@getIndex', 'middleware' => ['acl:'.$prefix.'/taxes']]);
			Route::get('taxes/add',  ['as' => 'taxes_add','uses' => 'TaxesController@getAdd', 'middleware' => ['acl:'.$prefix.'/taxes/add']]);
			Route::post('taxes/add',  ['uses' => 'TaxesController@postAdd', 'middleware' => ['acl:'.$prefix.'/taxes/add']]);
			Route::get('taxes/edit/{id}',  ['as' => 'taxes_edit','uses' => 'TaxesController@getEdit', 'middleware' => ['acl:'.$prefix.'/taxes/edit'], function ($id) {}]);
			Route::post('taxes/edit',  ['uses' => 'TaxesController@postEdit', 'middleware' => ['acl:'.$prefix.'/taxes/edit']]);
			Route::get('taxes/view/{id}',  ['as' => 'taxes_view','uses' => 'TaxesController@getView', 'middleware' => ['acl:'.$prefix.'/taxes/view'], function ($id) {}]);
			Route::post('taxes/view',  ['uses' => 'TaxesController@postView', 'middleware' => ['acl:'.$prefix.'/taxes/view']]);
			Route::post('taxes/delete',  ['uses' => 'TaxesController@postDelete', 'middleware' => ['acl:'.$prefix.'/taxes/delete']]);
			
			//ACL
			Route::get('acl/view',  ['as' => 'acl_view','uses' => 'AdminsController@getViewAcl', 'middleware' => ['acl:'.$prefix.'/acl/view']]);

			//EMMANUELS USER ROUTE
			Route::get('users',  ['as' => 'users_index','uses' => 'UsersController@getIndex', 'middleware' => ['acl:'.$prefix.'/users']]);
			Route::get('users/add',  ['as' => 'users_add','uses' => 'UsersController@getAdd', 'middleware' => ['acl:'.$prefix.'/users/add']]);
			Route::post('users/add',  ['uses' => 'UsersController@postAdd', 'middleware' => ['acl:'.$prefix.'/users/add']]);
			Route::get('users/edit/{id}',  ['as' => 'users_edit','uses' => 'UsersController@getEdit', 'middleware' => ['acl:'.$prefix.'/users/edit'], function ($id) {}]);
			Route::post('users/edit',  ['uses' => 'UsersController@postEdit', 'middleware' => ['acl:'.$prefix.'/users/edit']]);
			Route::get('users/view/{id}',  ['as' => 'users_view','uses' => 'UsersController@getView', 'middleware' => ['acl:'.$prefix.'/users/view'], function ($id) {}]);
			Route::post('users/view',  ['uses' => 'UsersController@postView', 'middleware' => ['acl:'.$prefix.'/users/view']]);
			Route::post('users/delete',  ['uses' => 'UsersController@postDelete', 'middleware' => ['acl:'.$prefix.'/users/delete']]);
			Route::post('users/invoice-users',  ['uses' => 'UsersController@postInvoiceUsers', 'middleware' => ['acl:admins/acl/view']]);
			Route::post('users/user-info',  ['uses' => 'UsersController@postUserInfo', 'middleware' => ['acl:admins/acl/view']]);

		});
	});

	//PERMISSIONS ROUTE
	Route::group(['prefix' => 'permissions'], function () {
		Route::get('auto-update', ['uses'=>'PermissionsController@getAutoUpdate']);
	});
});
	//DONT REMOVE CHEATSHEET**
	// Route::get('blank',  ['as' => 'blank_index','uses' => 'BlankController@getIndex', 'middleware' => ['acl:'.$prefix.'/blank']]);
	// Route::get('blank/add',  ['as' => 'blank_add','uses' => 'BlankController@getAdd', 'middleware' => ['acl:'.$prefix.'/blank/add']]);
	// Route::post('blank/add',  ['uses' => 'BlankController@postAdd', 'middleware' => ['acl:'.$prefix.'/blank/add']]);
	// Route::get('blank/edit/{id}',  ['as' => 'blank_edit','uses' => 'BlankController@getEdit', 'middleware' => ['acl:'.$prefix.'/blank/edit'], function ($id) {}]);
	// Route::post('blank/edit',  ['uses' => 'BlankController@postEdit', 'middleware' => ['acl:'.$prefix.'/blank/edit']]);
	// Route::get('blank/view/{id}',  ['as' => 'blank_view','uses' => 'BlankController@getView', 'middleware' => ['acl:'.$prefix.'/blank/view'], function ($id) {}]);
	// Route::post('blank/view',  ['uses' => 'BlankController@postView', 'middleware' => ['acl:'.$prefix.'/blank/view']]);
	// Route::post('blank/delete',  ['uses' => 'BlankController@postDelete', 'middleware' => ['acl:'.$prefix.'/blank/delete']]);
