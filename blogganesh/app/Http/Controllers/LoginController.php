<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogModel;

class LoginController extends Controller
{
	public function registerUser(Request $reqObj)
	{


	   	$objcon = new BlogModel();
	   
	   	$numUser  = $objcon->checkUser($reqObj);
	   	if($numUser == 0)
	   	{
	   		//$regFlg = $objcon-> registerUser($reqObj);
	   		
	   		if($regFlg ==  1)
	   		{
	   			$userType = ($reqObj->input('email') == 'ganesh@gmail.com') ? 'admin' : 'user';
	   				

	   			$reqObj->session()->put('username' ,  $reqObj->input('email'));
	   			$reqObj->session()->put('userType' , $userType);
	   			
	   			return view("dashboard");
	   		}
	   		else
	   		{
	   			return view("register", ['flgCheck' => '0' , 'msg' => 'something Went wrong!']);
	   		}

	   	}else
	   	{
	   		return view("register", ['flgCheck' => '0' , 'msg' => 'Already Exists!']);
	   	}
	   	
   
   }

    public function loginUser(Request $reqObj)
	{
		$objcon = new BlogModel();

		$numUser  = $objcon->checkUser($reqObj,  true);

		if($numUser == 1)
		{
			$userType = ($reqObj->input('email') == 'ganesh@gmail.com') ? 'admin' : 'user';
	   				

   			$reqObj->session()->put('username' ,  $reqObj->input('email'));
   			$reqObj->session()->put('userType' , $userType);
   			
   			
   			return view("dashboard");

		}
		else
		{
			return view("login", ['flgCheck' => '0' , 'msg' => 'wrong Username Or Password!']);
		}
   	
   
   }
}
