<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('/public/css/app.css') }}" rel="stylesheet">
</head>
<body>

	<div style= "background:#999; color:#000; width:50%;">
		<span style="float:left;">{{ Session::get('username') }}</span>
		<span style="float:right;">{{ Session::get('userType') }}</span>

	</div>

	<br/>
     <br/>
      <br/>
    <div style="margin-top: 3%;padding-left:20%; padding-right:20%;">
        <p style="float:left;"><a href="/blogganesh/allblog" > All Blogs </a> </span>
        <p style="float:center; margin-left:20%;"><a href="/blogganesh/createblog" >Create blogs</a></span>
        <p style="float:right;"><a href="/blogganesh/myblog">Your blogs</a></span>
    </div>

	<br/>
	<br/>

				
</body>

</html>