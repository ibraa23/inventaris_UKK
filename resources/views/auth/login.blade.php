<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            text-align: center;
        }

        .container h2 {
            font-size: 2rem;
            margin-bottom: 1.2rem;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 1.2rem;
            text-align: left;
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
         
            padding: 0.85rem;
            font-size: 1rem;
            border: none;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            outline: none;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        input:focus {
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid #928dab;
            box-shadow: 0 0 8px rgba(146, 141, 171, 0.5);
        }

        button {
            width: 100%;
            padding: 1rem;
            font-size: 1rem;
            color: #fff;
            background: linear-gradient(135deg, #434343, #000000);
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
        }

        button:hover {
            background: linear-gradient(135deg, #2c2c2c, #000000);
            transform: translateY(-2px);
        }

        .links {
            margin-top: 1.5rem;
        }

        .links a {
            color: #b3b3b3;
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
                padding: 2rem;
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
        <h2>Login</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group ">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Enter your password">
            </div>
            <button type="submit">Login</button>
        </form>
        <div class="links">
            <p>Don't have an account? <a href="{{ route('register') }}">Sign up here</a></p>
        </div>
    </div>
</body>

</html>
