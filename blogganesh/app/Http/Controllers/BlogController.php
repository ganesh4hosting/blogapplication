<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogModel;

class BlogController extends Controller
{
    public function CreateNew(Request $req)
    {
    	if($req->session()->get('username'))
    	{
    		$objcon = new BlogModel();
    	
    		$blgFlg = $objcon->createBlog($req);
    		
    		$allJson = $objcon->allBlogs($req);

    		$allarr = json_decode($allJson ,  1); 

    		return view('allblogs' , ['allblogs' => $allarr]);
    	}
    	else
    	{
    		return view('login');
    	}
    }

     public function allBlogs(Request $req)
    {
    	if($req->session()->get('username'))
    	{
    		$objcon = new BlogModel();
    	
    		
    		
    		$allJson = $objcon->allBlogs($req);

    		$allarr = json_decode($allJson ,  1); 

    		return view('allblogs' , ['allblogs' => $allarr]);
    	}
    	else
    	{
    		return view('login');
    	}
    }

    public function updateBlogs(Request $req)
    {
    	if($req->session()->get('username'))
    	{
    		$objcon = new BlogModel();
    	
    		
    		
    		$allJson = $objcon->updateBlog($req);

    		$allJson = $objcon->allBlogs($req , 'user');
    		$allarr = json_decode($allJson ,  1); 

    		return view('allblogs' , ['allblogs' => $allarr]);
    	}
    	else
    	{
    		return view('login');
    	}
    }

    public function BlogsByUser(Request $req)
    {
    	if($req->session()->get('username'))
    	{
    		$objcon = new BlogModel();
    	
    		$allJson = $objcon->allBlogs($req);
    		$allarr = json_decode($allJson ,  1); 

    		return view('allblogs' , ['allblogs' => $allarr]);
    	}
    	else
    	{
    		return view('login');
    	}
    }
}
