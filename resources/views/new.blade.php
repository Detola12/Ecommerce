<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="{{ route('getUserDetails') }}" method="POST">
    @csrf
    <label for="firstname">FirstName</label>
    <input type="text" name="firstname">

    <label for="lastname">Lastname</label>
    <input type="text" name="lastname">

    <label for="firstname">Age</label>
    <input type="text" name="age">

    <button type="submit">Submit</button>
</form>

<p>{{ $user->firstname }}</p>
<p>{{ $user->lastname }}</p>
<p>{{ $user->age }}</p>
</body>
</html>
