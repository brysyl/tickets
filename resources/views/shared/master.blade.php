<html>
<head>
<title> @yield('title') </title>
<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" >
<link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</head>
<body>

@include('shared.navbar')


@yield('content')

</body>
</html>