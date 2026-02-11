<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QRCode Project</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #128C7E;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 400px;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 200px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group input:focus {
            border: 1px solid #128C7E;
        }

        .submit-button {
            background-color: #128C7E;
            color: #fff;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-button:hover {
            background-color: #0D6D5C;
        }
    </style>

</head>

<body>
    <div class="login-container" id="login-container">
        <div class="logo">
            <img src="{{url('/')}}/uok-logo.png" alt="KU Logo">
            <!-- <h2>Login Form</h2> -->
        </div>

        @if (Session::has('error'))
        <p class="text-danger">{{ Session::get('error') }}</p>
        @endif
        @if (Session::has('success'))
        <p class="text-success">{{ Session::get('success') }}</p>
        @endif

        <form action="{{ route('login') }}" method="post">
            @csrf
            @method('post')
            <div class="form-group">
                <label for="name">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>

                @if ($errors->has('email'))
                <p class="text-danger">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>

                @if ($errors->has('password'))
                <p class="text-danger">{{ $errors->first('password') }}</p>
                @endif
            </div>
            <!-- <button class="submit-button d-print-none" onclick="printPage()" type="submit">Print</button> -->
            <center>
                <button class="btn btn-primary">Log In</button>
            </center>
        </form>
    </div>
</body>

</html>