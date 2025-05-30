<!DOCTYPE html>
<html lang="id">
<head>
    <title>Register | SIMH69</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Poppins', sans-serif;
            background: url('/assets/img/1.png') center/cover no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        form {
            background-color: rgba(255,255,255,0.13);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255,255,255,0.1);
            border-radius: 10px;
            box-shadow: 0 0 40px rgba(8,7,16,0.6);
            padding: 30px;
            width: 100%;
            max-width: 400px;
        }
        h3 {
            color: #FF9D3D;
            font-size: 26px;
            margin-bottom: 5px;
            text-align: center;
        }
        p {
            color: #fff;
            font-size: 14px;
            margin-bottom: 20px;
            text-align: center;
        }
        label {
            color: #fff;
            font-size: 14px;
            margin-top: 15px;
            display: block;
        }
        input {
            width: 100%;
            padding: 10px 12px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: #fff;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: #23a2f6;
            box-shadow: 0 0 5px rgba(35, 162, 246, 0.5);
        }

        input[type="file"] {
            border: 1px solid #ccc;
        }
        .form-group {
            margin-bottom: 10px;
        }
        button {
            width: 100%;
            margin-top: 20px;
            padding: 12px;
            background-color: #fff;
            color: #23a2f6;
            font-weight: 600;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #e4e7ee;
        }
        .alert {
            margin-top: 10px;
            padding: 10px;
            border-radius: 5px;
        }
        .alert-success { background-color: #d4edda; color: #155724; }
        .alert-danger { background-color: #f8d7da; color: #721c24; }

        @media (max-width: 480px) {
            form { padding: 20px; }
        }
    </style>
</head>
<body>
    <form method="POST" action="{{ route('register-siswa.submit') }}" enctype="multipart/form-data">
        @csrf
        <h3>REGISTER</h3>
        <p>Silakan isi formulir untuk membuat akun</p>

                <!-- Perubahan pada bagian <input> -->
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email aktif" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="nis">NIS/NISN</label>
                <input type="text" id="nis" name="nis" placeholder="Masukkan NIS atau NISN" value="{{ old('nis') }}" required>
            </div>

            <div class="form-group">
                <label for="kelas">Kelas</label>
                <input type="text" id="kelas" name="kelas" placeholder="Contoh: XII IPA 2" value="{{ old('kelas') }}" required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" placeholder="Masukkan alamat rumah" value="{{ old('alamat') }}" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password" required>
            </div>

            <div class="form-group">
                <label for="kartu_pelajar">Upload Kartu Pelajar</label>
                <input type="file" id="kartu_pelajar" name="kartu_pelajar" required>
            </div>


        <button type="submit">Daftar</button>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
</body>
</html>
