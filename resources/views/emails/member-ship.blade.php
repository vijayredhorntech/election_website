<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to One Nation</title>
</head>

<body style="margin:0;padding:0;background-color:#f4f4f4;font-family:Arial, sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f4f4f4;padding:20px;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" border="0" style="background:#ffffff;border-radius:10px;padding:20px;">
                    <tr>
                        <td align="center" style="padding-bottom:20px;">
                            <img src="{{asset('assets/images/logo.png')}}" alt="One Nation Logo" width="150" style="display:block;">
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <h2 style="color:#333333;margin:0;font-size:24px;">🎉 Congratulations! 🎉</h2>
                            <p style="color:#555555;font-size:16px;line-height:24px;margin:15px 0 20px;">
                                Welcome to <strong>One Nation</strong>! You are now part of a community dedicated to unity, progress, and positive change.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <p style="color:#555555;font-size:16px;line-height:24px;margin:0;">
                                Your account has been created successfully. Below are your login details:
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding-top:15px;">
                            <table width="80%" cellpadding="10" cellspacing="0" border="0" style="background:#f8f8f8;border-radius:5px;">
                                <tr>
                                    <td align="left" style="font-size:16px;color:#333;">
                                        <strong>Email:</strong> {{ $user['email'] }}<br>
                                        <strong>Default Password:</strong> {{ $defaultPassword }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding-top:20px;">
                            <a href="{{ url('/login') }}" target="_blank" style="background:#38C2F1;color:#ffffff;text-decoration:none;padding:12px 30px;border-radius:25px;font-size:18px;font-weight:bold;display:inline-block;">
                                Login to Your Account
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding-top:30px;">
                            <p style="color:#888888;font-size:14px;margin:0;">
                                For security reasons, please change your password after logging in.
                                If you need any assistance, feel free to contact our support team.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>