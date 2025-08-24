<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <div class="form form-login">
            <h2>LOGIN</h2>

            @if (session('sucesso'))
                <div class="message-success">
                    {{ session('sucesso') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="error-box">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('ENlogin') }}" method="POST">
                @csrf
                <div class="field-input">
                    <input type="email" name="email" placeholder="Email" required>
                </div>

                <div class="field-input">
                    <input type="password" name="senha" placeholder="Password" required>
                </div>

                <input type="submit" class="login-btn" value="Log in">

                <div class="links">
                    Don't have an account? <a href="{{ route('ENregistar.form') }}">Register here</a><br><br>
                    <a href="/ENhome">Return to home page</a><br>
                </div>
            </form>
        </div>
    </div>

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'M PLUS Rounded 1c', sans-serif;
        }

        body {
            background: url('background.png') no-repeat center center;
            background-size: cover;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }

        .form {
            background: #e6ffe6;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 450px;
        }

        .form-login h2 {
            text-align: center;
            color: #3f8e42;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .field-input {
            margin-bottom: 15px;
        }

        .field-input p {
            margin-bottom: 5px;
            font-weight: 600;
            color: #333;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            height: 40px;
            padding: 0 10px;
            font-size: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .login-btn {
            width: 100%;
            background-color: #3f8e42;
            color: white;
            font-size: 12px;
            padding: 10px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        .login-btn:hover {
            background-color: #3f8e42;
        }

        .links {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
        }

        .links a {
            color: black;
            text-decoration: none;
        }

        .links a:hover {
            text-decoration: underline;
        }

        .error-box {
            background-color: #ffe0e0;
            border: 1px solid #ff9b9b;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            color: #b00000;
        }

        .error-box ul {
            list-style: none;
            padding-left: 0;
        }

        .message-success {
            background-color: #e6ffe6;
            border: 1px solid #9bff9b;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            color: #007700;
        }
    </style>
</body>

</html>
