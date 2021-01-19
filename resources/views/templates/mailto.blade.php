<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    @yield('css')
    <style>
        body{
            margin: 0;
            padding: 0;
            background-color: #f3f3f3;
            display: flex;
            justify-content: center;
        }
        section{
            display: block;
            padding: 0;
            width: 100%;
            height: 100vh;
            max-height: 428px;
            max-width: 728px;
            margin: 0;
            background-color: #fff;
            box-shadow: 5px 5px 10px rgba(225,225,225,5);

            padding: 20px;
        }
    </style>
</head>
<body>
    <section>
        @yield('content')
    </section>
</body>
</html>