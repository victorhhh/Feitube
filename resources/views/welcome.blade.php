<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/override.css') }}">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">--->
    <title>FeiTube</title>
</head>
<body>

@include('navbar')
@include('flash::message')
@include('jumbotron')
@include('videos')







</body>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</html>