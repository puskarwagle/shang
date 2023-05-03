<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }
        form {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            margin: 50px auto;
            max-width: 400px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <form method="POST" action="">
        @csrf
        <h2>Login</h2>
        @if ($errors->any())
            <div style="color: red;">
                {{ implode('', $errors->all(':message')) }}
            </div>
        @endif
        <div>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" required autofocus>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember Me</label>
        </div>
        <button type="submit">Login</button>
    </form>
</body>
</html>
