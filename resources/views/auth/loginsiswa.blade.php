<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SIMH69</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('/assets/img/2.png');
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
        @keyframes fadeOut {
    0% { opacity: 1; }
    80% { opacity: 1; }
    100% { opacity: 0; }
}

    </style>
</head>
<body>
    <form method="POST" action="{{ route('login-siswa.submit') }}">
        @csrf
        <h3>SIMH<span style="color: #fff;">69.</span></h3>
        <p>Sistem Informasi Manajemen Hardware SMKN 69</p>
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Email" id="email" required>
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" id="password" required>
        <button type="submit">Log In</button>
        <div class="social">
            <a href="{{ route('register-siswa') }}">
                <i class="fas fa-user-plus" style="color: #23a2f6 !important;"></i> Daftar
            </a>
            <a href="{{ route('admin.login') }}">
                <i class="fas fa-cogs" style="color: #23a2f6 !important;"></i> Admin
            </a>
        </div>
    </form>
    @if(session('success'))
    <div id="popup-success" style="
        position: fixed;
        top: 20px;
        right: 20px;
        background-color: #28a745;
        color: white;
        padding: 15px 20px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        font-size: 14px;
        z-index: 9999;
        animation: fadeOut 5s forwards;
    ">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </div>

    <script>
        // Setelah 4 detik, sembunyikan popup
        setTimeout(function() {
            var popup = document.getElementById('popup-success');
            if (popup) {
                popup.style.display = 'none';
            }
        }, 4000);
    </script>
@endif

</body>
</html>
