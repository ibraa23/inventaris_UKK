<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1f1c2c, #928dab);
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }

        .container {
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(15px);
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
            width: 100%;
            max-width: 380px;
            
        }

        .container h2 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            font-weight: 600;
            text-align: center;
        }

        .form-group {
            margin-bottom: 1.5rem;
            display:flex;
            flex-direction:column;
        }

        label {
            display: block;
            font-size: 1rem;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        input {
           
            padding: 0.9rem;
            font-size: 1rem;
            border: none;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.8);
            color: #333;
            outline: none;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        input:focus {
            background: rgba(255, 255, 255, 1);
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
        }

        button {
            width: 100%;
            padding: 1rem;
            font-size: 1rem;
            color: #fff;
            background: linear-gradient(135deg, #ff7eb3, #ff758c);
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
        }

        button:hover {
            background: linear-gradient(135deg, #ff758c, #ff7eb3);
            transform: scale(1.05);
        }

        .links {
            margin-top: 1.5rem;
        }

        .links a {
            color: #ff7eb3;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s;
        }

        .links a:hover {
            color: #fff;
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .container {
                padding: 1.5rem;
            }

            .container h2 {
                font-size: 1.8rem;
            }

            button {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Register</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" id="name" name="name" required placeholder="Masukkan nama Anda">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required placeholder="Masukkan email Anda">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Masukkan password Anda">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="Konfirmasi password Anda">
            </div>
            <button type="submit">Daftar</button>
        </form>
        <div class="links">
            <p>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
        </div>
    </div>
</body>

</html>
