<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Input;
use Validator;
use Redirect;
use Hash;
use Route;
use Response;
use Auth;
use URL;
use Session;
use Laracasts\Flash\Flash;
use View;
use JavaScript;
use Excel;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Job;
use App\User;
use App\Admin;
use App\Role;
use App\RoleUser;
use App\Permission;
use App\PermissionRole;

class AdminsController extends Controller
{
    public function __construct() {
        $this->layout = 'layouts.admins';
    }
    
    public function getIndex() {
        // $my_file = Excel::load('public/assets/excels/file.xls', function($reader) {
        // })->get();
        // Job::dump($my_file);
        // $new_file_html = Job::PrepareExcelTable($my_file);

        return view('admins.index')
        ->with('layout',$this->layout);
    }
    public function getLogin() {

        $this->layout = 'layouts.master-layout';
        return view('admins.login')
            ->with('layout',$this->layout);
    }

    public function postLogin() {
        $username = Input::get('email');
        $password = Input::get('password');
        // Session::reflash();

        if (Auth::attempt(array('username'=>$username, 'password'=>$password))) {
            Flash::success('Welcome back '.$username.'!');
            // return redirect()->action('AdminsController@getIndex');
            // Check for intended redirect, if not exists then go to default /admins page

            return (Session::has('intended_url')) ? Redirect::to(Session::get('intended_url')) : redirect()->intended('/admins');
        } else { //LOGING FAILED
            Flash::error('Wrong Username or Password!');
            $this->layout = 'layouts.master-layout';
            return view('admins.login')
            ->with('layout',$this->layout)
            ->with('wrong',true);
        }
    }

    public function getLogout() {
        Auth::logout();
        Flash::success('You have successfully been logged out');
        return Redirect::action('AdminsController@getLogin');
    
    }
    public function getViewAcl() {   
        return view('admins.acl_view')
        ->with('layout',$this->layout);
               
    }

    // public function getUsersEdit($id = null) {
    //     $users = User::find($id);
    //     $roles = Role::PerpareAdminRoleSelect();
    //     $user_role_id = RoleUser::GetUserRoleId($users->id);
    //     return view('admins.users_setting.edit')
    //      ->with('layout',$this->layout)
    //      ->with('roles',$roles)
    //      ->with('users',$users)
    //      ->with('user_role_id',$user_role_id); 
    // }
    
    // public function postUsersEdit() {

    //     $username = Input::get('username');
    //     $fname = Input::get('fname');
    //     $lname = Input::get('lname');
    //     $email = Input::get('email');
    //     $role_id = Input::get('role_id');
    //     $id = Input::get('id');

    //     $users = User::find($id);
    //     $users->username = $username;
    //     $users->firstname = $fname;
    //     $users->lastname = $lname;
    //     $users->email = $email;

    //     $role_users = RoleUser::where('user_id',$id)->first();
    //     $role_users->role_id = $role_id;

    //     if ($users->save() && $role_users->save()) {
    //         Flash::success('Successfully Updated');
    //     } else {
    //         Flash::Error('Error');
    //     }
    //     return Redirect::back();
    // }

    
}
