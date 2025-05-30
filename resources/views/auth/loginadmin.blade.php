<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | SIMH69</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('/assets/img/3.png');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }
        form {
            background-color: rgba(255, 255, 255, 0.13);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            width: 100%;
            max-width: 350px;
            padding: 30px;
            text-align: center;
        }
        form h3 {
            font-size: 26px;
            font-weight: 600;
            color: #FF9D3D;
            margin-bottom: 5px;
        }
        form p {
            font-size: 14px;
            color: #ffffff;
            margin-bottom: 20px;
        }
        label {
            font-size: 14px;
            color: #ffffff;
            display: block;
            margin-top: 15px;
            text-align: left;
        }
        input {
            width: 100%;
            height: 40px;
            margin-top: 5px;
            padding: 0 10px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            background-color: #ffffff;
            outline: none;
        }
        button {
            margin-top: 20px;
            width: 100%;
            padding: 12px 0;
            font-size: 16px;
            font-weight: 600;
            background-color: #ffffff;
            color: #23a2f6;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #e4e7ee;
        }
        .social {
            margin-top: 15px;
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }
        .social a {
            text-decoration: none;
            font-size: 14px;
            color: black;
            background-color: rgba(255, 255, 255, 0.67);
            padding: 8px 15px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: background-color 0.3s;
        }
        .social a:hover {
            background-color: rgba(255, 255, 255, 0.47);
        }
        @media (max-width: 480px) {
            form {
                padding: 20px;
                max-width: 90%;
            }
            form h3 {
                font-size: 22px;
            }
            form p {
                font-size: 12px;
            }
            input, button {
                font-size: 14px;
                height: 38px;
            }
            .social {
                gap: 8px;
            }
            .social a {
                font-size: 12px;
                padding: 6px 12px;
            }
        }
    </style>
</head>
<body>
    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf
        <h3>Login Admin</h3>
        <p>Silakan masukkan username, password, dan token</p>

        <label for="username">Username</label>
        <input type="text" name="username" placeholder=" Username" id="username" required>

        <label for="password">Password</label>
        <input type="password" name="password" placeholder=" Password" id="password" required>

        <label for="token">Token</label>
        <input type="text" name="token" placeholder=" Token" id="token" required>

        <button type="submit">Log In</button>
    </form>
</body>
</html>
