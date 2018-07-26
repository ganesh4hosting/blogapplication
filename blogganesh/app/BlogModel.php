<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
	private $con;

    Private function getConnect()
    {
    	$dbArray = array('localhost', 'root', '', 'blogganesh');
    	$this->con = mysqli_connect($dbArray[0], $dbArray[1], $dbArray[2], $dbArray[3]);
    	
    }

    Private function closeConnection()
    {
    	mysqli_close($this->con);
    }

    public function checkUser($reqObj, $login = false)
    {
    	//dd($reqObj);

    	$this->getConnect();
    	$con = $this->con;

    	$qrytxt = ($login == true) ? "   and password = '{$reqObj->input('password')}'  " : "";

    	$qry = "select count(1) as cnt from  user_details where username = '{$reqObj->input('email')}' {$qrytxt} ";

    	$cntQry = mysqli_query($con, $qry);

    	if($login == true)
    	{
    		$this->closeConnection();
    	}

    	return mysqli_num_rows($cntQry);
    }

    public function registerUser($reqObj)
    {
    	//dd($reqObj);

    	$this->getConnect();
    	$con = $this->con;

    	$qry = "insert into user_details (username, name, password, type, reg_date) values('{$reqObj->input('email')}' ,'{$reqObj->input('name')}', '{$reqObj->input('password')}', 0, now() )";

    	$insFlg = mysqli_query($con, $qry);

    	$this->closeConnection();

    	return $insFlg;
    }

    public function createBlog($reqObj)
    {
    	$this->getConnect();
    	$con = $this->con;

    	$qry = "insert into blog_app (created_by, header_txt, blog_content,	insert_date) values('{$reqObj->session()->get('username')}' ,'{$reqObj->input('header')}', '{$reqObj->input('content')}',  now() )";

    	$insFlg = mysqli_query($con, $qry);

    	$this->closeConnection();

    	return $insFlg;
    }

     public function updateBlog($reqObj)
    {
    	$this->getConnect();
    	$con = $this->con;

    	$qry = "update blog_app set  header_txt = '{$reqObj->input('header_txt')}',  blog_content = '{$reqObj->input('blog_content')}' where created_by = '{$reqObj->session()->get('username')}' and id = '{$reqObj->session->get('blogid')}' ";

    	$insFlg = mysqli_query($con, $qry);

    	$this->closeConnection();

    	return $insFlg;
    }
    

    public function allBlogs($reqObj, $userType = 'admin')
    {
    	$this->getConnect();
    	$con = $this->con;
    	$blogtxt = ($userType == 'user') ? "  where  id  = '{$reqObj->input('blogid')}' " : "";
    	$qry = " select * from blog_app  {$blogtxt}  ";

    	$res = mysqli_query($con, $qry);

    	$arr = array();
    	$p = 0;
    	while($row = mysqli_fetch_assoc($res))
    	{
    		$arr[$p]['blogid'] = $row['id'];
    		$arr[$p]['header_txt'] = $row['header_txt'];
    		$arr[$p]['blog_content'] = $row['blog_content'];
    		$arr[$p]['created_by'] = $row['created_by'];
    		$arr[$p]['created_on'] = $row['insert_date'];
    		
    		$p = $p +1;
    	}

    	$this->closeConnection();
    	$jsonObj = json_encode($arr);
    	return $jsonObj;
    }

    
}
