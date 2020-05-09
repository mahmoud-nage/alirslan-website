<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from st.ourhtmldemo.com/new/Healthcoach-Preview/ by HTTrack Website Copier/3.x [XR&CO'2010], Tue, 31 Mar 2020 14:06:45 GMT -->
<head>
	<meta charset="UTF-8">
    <title>{{config('app.name', 'AliRaslan')}} /@yield('title') </title>
    @yield('meta')

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/web/template/img/favicon.jpeg') }}">
    <!-- responsive meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Typical Design">

	<!-- master stylesheet -->
    <link rel="stylesheet" href="{{url('/public/web/template')}}/css/style.css">
    
	<!-- Responsive stylesheet -->
	<link rel="stylesheet" href="{{url('/public/web/template')}}/css/responsive.css">

    <!-- Fixing Internet Explorer-->
    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="js/html5shiv.js"></script>
    <![endif]-->

   <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
   <link rel="stylesheet" href="{{ asset('public/web/css/style.css') }}">
    
</head>
