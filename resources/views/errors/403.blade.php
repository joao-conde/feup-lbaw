<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Error!</title>
    <link href="{{ asset('css/errors.css') }}" rel="stylesheet">

	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0-beta.3/flatly/bootstrap.min.css" rel="stylesheet" integrity="sha384-+lmTKXkS+c9d34U9obDdGOZT7zqFicJDkhckYYsW7oenXR37T2OEV4uqfUO45M87"
	 crossorigin="anonymous">

</head>

<body>

    <div class="jumbotron">

        <div class="row justify-content-center">
            <h1 id="error403">403</h1>
        </div>
        <hr>
        <br>

        <div class="row justify-content-center">
            {{-- <h2>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</h2> --}}
            <h3>You have no permissions to access this page.</h3>
        </div>
        
        <br>
        <div class="row justify-content-center">
            <a href="/" class="btn btn-success btn-lg" role="button">Go Home</a>
        </div>
    </div>
</body>

</html>