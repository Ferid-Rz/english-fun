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

    .center{
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translateX(-50%) translateY(-50%);
        text-align: center;
        font-family: Pacifo, Calibri;
        font-size: 2em;
    }
    button{
        position: absolute;
        margin-top: 80px;
        top:50%;
        right: 0;
    }
    </style>
</head>
<body>
    <form  method="post" action="/add">
        {{ csrf_field() }}
        <input class='center' type='text' name='word'>
        <button class='center' type="submit" class="btn btn-primary">Add</button>
    </form>
</body>
</html>