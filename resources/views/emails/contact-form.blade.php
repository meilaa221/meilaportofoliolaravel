<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Message</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .email-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            background: linear-gradient(135deg, #0ea5e9, #d946ef);
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 30px;
        }
        .field {
            margin-bottom: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid #0ea5e9;
        }
        .field-label {
            font-weight: bold;
            color: #0ea5e9;
            margin-bottom: 5px;
        }
        .field-value {
            color: #333;
        }
        .message-field {
            background: #fff;
            border: 1px solid #e9ecef;
            padding: 20px;
            border-radius: 8px;
            margin-top: 10px;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            text-align: center;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>📧 New Contact Form Message</h1>
            <p>You have received a new message from your portfolio website</p>
        </div>

        <div class="field">
            <div class="field-label">👤 Name:</div>
            <div class="field-value">{{ $data['first_name'] }} {{ $data['last_name'] }}</div>
        </div>

        <div class="field">
            <div class="field-label">📧 Email:</div>
            <div class="field-value">{{ $data['email'] }}</div>
        </div>

        <div class="field">
            <div class="field-label">📋 Subject:</div>
            <div class="field-value">{{ $data['subject'] }}</div>
        </div>

        <div class="field">
            <div class="field-label">💬 Message:</div>
            <div class="message-field">
                {{ $data['message'] }}
            </div>
        </div>

        <div class="field">
            <div class="field-label">🕒 Sent At:</div>
            <div class="field-value">{{ $data['sent_at'] }}</div>
        </div>

        <div class="footer">
            <p>This message was sent from your portfolio website contact form.</p>
            <p><strong>Portfolio Website</strong> - Dian Gita Meilani</p>
        </div>
    </div>
</body>
</html>
