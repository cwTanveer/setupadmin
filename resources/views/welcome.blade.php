<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .button-container {
            display: flex;
            gap: 20px;
        }

        .button {
            padding: 10px 20px;
            text-decoration: none;
            color: #fff;
            background-color: #3498db;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #2980b9;
        }
    </style>
    <title>Centered Buttons</title>
</head>
<body>
    <div class="button-container">
        <a href="{{route('admin.login')}}" class="button">Login</a>
        <a href="{{route('admin.register')}}" class="button">Register</a>
    </div>
</body>
</html>
