<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Input;
use Validator;
use Redirect;
use Hash;
use Request;
use Route;
use Response;
use Auth;
use URL;
use Session;
use Laracasts\Flash\Flash;
use View;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Job;
use App\User;
use App\Admin;
use App\Role;
use App\Permission;
use App\PermissionRole;
use App\Page;

class Website extends Model {
	protected $fillable = [];

	public static  function WebInit()
	{

	}
