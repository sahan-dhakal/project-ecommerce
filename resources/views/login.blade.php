<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: linear-gradient(#ccc, #efdbc6b6, #ffffff);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100vw;
        }
        .loginForm {
            background: #bcbaba;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            height: 200px;
            width: 500px;
        }
        input{
            display: block;
            width: 90%;
            padding: 10px;
            min-height: 40px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin: 10px auto;
            
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }

    </style>
</head>
<body>
    <form action="{{ route('loginUser') }}" class="loginForm">
        @csrf
        <input type="text" name="email" placeholder="Username/Email">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" value="Login">
    </form>
</body>
</html>