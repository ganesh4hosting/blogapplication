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

<h1>Create Blog Page</h1>

	<div style= "background:#999; color:#000; width:50%;">
		<span style="float:left;">{{ Session::get('username') }}</span>
		<span style="float:right;">{{ Session::get('userType') }}</span>

	</div>

	  
</body>

</html>