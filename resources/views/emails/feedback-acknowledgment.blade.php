<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Feedback Acknowledgment</title>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(to right, #d53369, #daae51);
            color: white;
            padding: 30px 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            background: #ffffff;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 0 0 5px 5px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            padding: 20px;
            color: #666;
            font-size: 14px;
        }
        .btn {
            display: inline-block;
            padding: 12px 30px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Thank You for Your Feedback</h1>
        </div>
        <div class="content">
            <p>Dear {{ $feedback->name }},</p>
            
            <p>Thank you for taking the time to share your feedback with us. We greatly appreciate your input and want you to know that it has been received successfully.</p>
            
            <p><strong>Feedback Details:</strong></p>
            <ul>
                <li>Subject: {{ $feedback->subject }}</li>
                <li>Type: {{ ucfirst($feedback->feedback_type) }}</li>
                @if($feedback->constituency)
                <li>Constituency: {{ $feedback->constituency->name }}</li>
                @endif
            </ul>
            
            <p>Our team will carefully review your feedback and take appropriate action. If necessary, we will contact you for any additional information.</p>
            
            <a href="{{ route('index') }}" class="btn">Visit Our Website</a>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} One Nation. All rights reserved.</p>
        </div>
    </div>
</body>
</html>