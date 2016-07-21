<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Input;
use Validator;
use Redirect;
use Route;
use Response;
use Auth;
use Laracasts\Flash\Flash;
use View;
use JavaScript;
use Excel;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Job;
use App\User;
use App\Admin;


class CostsController extends Controller
{
    public function __construct() {
        $this->layout = 'layouts.admins';
    }
    
	public function getIndex()
	{
		return view('costs.index')
			->with('layout',$this->layout);
	}

	public function getAdd()
	{
		// $tax_status = Tax::taxStatus();
		// return view('taxes.add')
		// 	->with('layout',$this->layout)
		// 	->with('tax_status',$tax_status);
	}
	public function postAdd()
	{
		
	}

	public function getEdit($id = null)
	{
		// return view('taxes.edit')
		// 	->with('layout',$this->layout);
	}
	public function postEdit()
	{
		
	}

	public function postDelete()
	{
		// $tax_id = Input::get('tax_id');
		// $tax = Tax::find($tax_id);
		// if($tax->delete()) {
		// 	return Redirect::action('TaxesController@getIndex')
		// 	->with('message', 'Successfully deleted!')
		// 	->with('alert_type','alert-success');
		// } else {
		// 	return Redirect::back()
		// 	->with('message', 'Oops, somthing went wrong. Please try again.')
		// 	->with('alert_type','alert-danger');	
		// }
	}
}
