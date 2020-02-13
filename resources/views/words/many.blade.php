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
        font-size: 20px;
        padding-left:25px;
        padding-right:25px;
    }

    button{
        position: absolute;
        top:50%;
        right: 0;
        margin-top: 170px;
    }
    </style>
</head>
<body>
    <form  method="post" action="/many">
        {{ csrf_field() }}
        <select class="center" style="height: 185pt" name="word[]" multiple>
        @foreach($words as $word)
            <option  value="{{ $word->id}}">{{$word->word}}</option>
        @endforeach
        </select>
        <button type="submit" class="btn btn-primary center">I know</button>
    </form>
</body>
</html>