<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        #headertintuc {
            margin: 0px auto;
        }
        ul.root > li {
            list-style: none;
            float: left;
            margin-top:15px;
            margin-left: 25px;
            font-size: 17px;
            border-left: 1px;
        }
        ul.root > li > a {
            color: black;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 700;
        }
        ul.root > li > a:hover {
            color: orange;
        }
    </style>
    <base href="{{ asset('') }}">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="css/homepage.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">
    <link rel="stylesheet" href="css/socialmedia.css" type="text/css">
    <link rel="shortcut icon" type="image/png" href="upload/logo.png"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300;1,900&display=swap" rel="stylesheet">

    @yield('css')

</head>

<body>

    @include('layout.header')

    @yield('content')

    @include('layout.footer')
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/my.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    @yield('script')

</body>

</html>