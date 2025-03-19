<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css').'/style.css'}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <img src="{{asset('images').'/logo.jpg'}}" alt="" srcset="">
        <nav>
            <a href="{{route('home')}}">home</a>
            <a href="{{route('about')}}">about us</a>
            <a href="#">gallery</a>
            <a href="#">log in</a>
        </nav>
    </header>
    <main>
@yield('content')
</main>
</body>

</html>