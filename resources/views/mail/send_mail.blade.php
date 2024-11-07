<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Login Presensi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            background-color: #4CAF50;
            color: white;
            padding: 10px 0;
            border-radius: 8px 8px 0 0;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px;
        }
        .content p {
            font-size: 16px;
            line-height: 1.6;
            margin: 10px 0;
        }
        .content .status {
            color: #4CAF50;
            font-weight: bold;
        }
        .code {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            background-color: #f2f2f2;
            padding: 10px;
            text-align: center;
            border-radius: 4px;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            color: #999;
            padding: 20px;
        }
        .footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Detail Informasi Login</h1>
        </div>
        <div class="content">
            <p>Hello, <strong>{{ $name }}</strong>,</p>
            <p>Email Anda : <strong>{{ $email }}</strong></p>
            <p>Kode OTP:</p>
            <div class="code">{{ $otp }}</div>
            <p>Silahkan Login ke aplikasi Presensi menggunakan data diatas.</p>
        </div>
        <div class="footer">
            <p>Terimakasih !</p>
            <p>© {{ date('Y') }} Hugo Studio. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
