<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
<div class="container">
    @if(session('status'))
        {{ session('status')}}
    @endif
    <h2>Make Payment</h2>
    <form method="POST" action="{{ route('pay') }}" >
        @csrf
        <input type="text" name="email" placeholder="Enter Email Address" required>
        <input type="number" name="amount" placeholder="Enter Amount" required>
        <button type="submit">Submit</button>
    </form>
</div>
</body>
</html>
