<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Contacting Us</title>
</head>

<body style="margin:0;padding:0;background-color:#f4f4f4;font-family:Arial, sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f4f4f4;padding:20px;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" border="0" style="background:#ffffff;border-radius:10px;padding:20px;">
                    <tr>
                        <td align="center" style="padding-bottom:20px;">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="Company Logo" width="150" style="display:block;">
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <h2 style="color:#333333;margin:0;font-size:24px;">🙏 Thank You for Reaching Out! 🙏</h2>
                            <p style="color:#555555;font-size:16px;line-height:24px;margin:15px 0 20px;">
                                Hello <strong>{{ $name }}</strong>, we appreciate you contacting us. Our team has received your message and will get back to you as soon as possible.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <p style="color:#555555;font-size:16px;line-height:24px;margin:0;">
                                In the meantime, feel free to browse our website or contact us for any urgent inquiries.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding-top:20px;">
                            <a href="{{ url('/') }}" target="_blank" style="background:#007bff;color:#ffffff;text-decoration:none;padding:12px 30px;border-radius:25px;font-size:18px;font-weight:700;display:inline-block;transition:all 0.3s ease;text-shadow:1px 1px 1px rgba(0,0,0,0.2);border:1px solid #007bff;">
                                Visit Our Website
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding-top:30px;">
                            <p style="color:#888888;font-size:14px;margin:0;">
                                If you have any further questions, don't hesitate to reach out. We're here to help!
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding-top:20px;">
                            <p style="color:#999999;font-size:14px;margin:0;">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>