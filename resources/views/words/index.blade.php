<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>My dictionary</title>
    <style>
    *{
        margin: 0;
        padding: 0;
    }

    body {
        background-color: #e0e0e0
    }

    h1{
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translateX(-50%) translateY(-50%);
        text-align: center;
        font-family: Pacifo, Calibri;
        font-size: 5em;
    }
    button{
        position: absolute;
        top:50%;
        right: 0;
    }
    </style>
</head>
<body>
	<h1>{{$words}}</h1>
    <form  method="post" action="/save">
        {{ csrf_field() }}
        <input type='hidden' name='word' value='{{$words}}'>
        <button type="submit" class="btn btn-primary">Done</button>
    </form>
</body>
</html>