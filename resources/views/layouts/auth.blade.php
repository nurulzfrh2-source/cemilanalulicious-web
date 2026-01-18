<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Cemilan Alulicious</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #d81d7b 0%, #f8bbd0 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: sans-serif;
        }
        .card-login {
            width: 100%;
            max-width: 400px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }
        .login-header {
            background-color: white;
            padding: 30px 20px 10px;
            text-align: center;
        }
        .btn-pink {
            background-color: #d81d7b;
            color: white;
            border: none;
            padding: 10px;
            font-weight: bold;
        }
        .btn-pink:hover {
            background-color: #b01563;
            color: white;
        }
    </style>
</head>
<body>

    @yield('content')

</body>
</html>