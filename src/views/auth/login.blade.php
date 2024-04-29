<!-- resources/views/login.blade.php -->
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

<form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email/Username Input -->
    <div>
        <label for="email">Email/Username:</label>
        <input id="email" type="email" name="email" required autofocus>
    </div>

    <!-- Password Input -->
    <div>
        <label for="password">Password:</label>
        <input id="password" type="password" name="password" required>
    </div>

    <!-- Remember Me Checkbox -->
    <div>
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Remember me</label>
    </div>

    <!-- Submit Button -->
    <div>
        <button type="submit">Login</button>
    </div>
</form>
</body>
</html>
