<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use JavaScript;
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
use App\Job;
use App\User;
use App\Admin;
use App\Role;
use App\Permission;
use App\PermissionRole;
use App\Website;
use App\Company;
use App\Menu;
use App\Page;

class HomeController extends Controller
{
    public function __construct() {
        // // THIRD TEMPLATE
        $this->layout = "layouts.home";
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function home()
    {
        return view('home.home')
        ->with('layout',$this->layout);
    }
    
}
