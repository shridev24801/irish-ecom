<!-- resources/views/register.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name Input -->
    <div>
        <label for="name">Name:</label>
        <input id="name" type="text" name="name" required autofocus>
    </div>

    <!-- Email Input -->
    <div>
        <label for="email">Email:</label>
        <input id="email" type="email" name="email" required>
    </div>

    <!-- Password Input -->
    <div>
        <label for="password">Password:</label>
        <input id="password" type="password" name="password" required>
    </div>

    <!-- Confirm Password Input -->
    <div>
        <label for="password_confirmation">Confirm Password:</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>
    </div>

    <!-- Submit Button -->
    <div>
        <button type="submit">Register</button>
    </div>
</form>
</body>
</html>
