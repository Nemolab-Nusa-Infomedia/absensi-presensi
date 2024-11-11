<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Login Presensi</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px;">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 0; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <tr>
            <td align="center" style="background-color: #007bff; color: #ffffff; padding: 10px 0; border-radius: 8px 8px 0 0;">
                <h1 style="margin: 0; font-size: 24px;">Detail Informasi Login</h1>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px;">
                <p style="font-size: 16px; line-height: 1.6; color: #333;">Hello, <strong>{{ $name }}</strong>,</p>
                <p style="font-size: 16px; line-height: 1.6; color: #333;">Email Anda : <strong>{{ $email }}</strong></p>
                <p style="font-size: 16px; line-height: 1.6; color: #333;">Kode OTP:</p>
                <div style="font-size: 18px; font-weight: bold; color: #333; background-color: #f2f2f2; padding: 10px; text-align: center; border-radius: 4px; margin-top: 20px;">{{ $otp }}</div>
                <p style="font-size: 16px; line-height: 1.6; color: #333;">Silahkan Login ke aplikasi Presensi menggunakan data diatas.</p>
            </td>
        </tr>
        <tr>
            <td align="center" style="padding: 20px; font-size: 14px; color: #999;">
                <p style="margin: 0;">Terimakasih !</p>
                <p style="margin: 0;">&copy; {{ date('Y') }} Hugo Studio. All rights reserved.</p>
            </td>
        </tr>
    </table>
</body>
</html>
