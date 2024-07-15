<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Feedback App</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f8fafc;
            color: #1a202c;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            max-width: 600px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .title {
            font-size: 2rem;
            margin-bottom: 1rem;
        }
        .description {
            font-size: 1rem;
            margin-bottom: 2rem;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            background-color: #1a202c;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #4a5568;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="title">Welcome to Feedback App</h1>
        <p class="description">Your feedback matters! Share your thoughts and help us improve our services.</p>
        <a href="{{ route('login') }}" class="button">Log In</a>
        <a href="{{ route('register') }}" class="button" style="margin-left: 10px;">Register</a>
    </div>
</body>
</html>
