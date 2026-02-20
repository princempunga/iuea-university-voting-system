<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>IUEA Voting Portal — Email Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 520px;
            margin: 40px auto;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .header {
            background: #8B0000;
            padding: 32px 40px;
            text-align: center;
        }

        .header img {
            height: 50px;
        }

        .header h1 {
            color: white;
            font-size: 16px;
            margin: 12px 0 0;
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        .body {
            padding: 36px 40px;
        }

        .greeting {
            font-size: 15px;
            color: #1a1a1a;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .desc {
            font-size: 13px;
            color: #555;
            line-height: 1.7;
            margin-bottom: 28px;
        }

        .otp-box {
            background: #f8f8f8;
            border: 2px dashed #8B0000;
            border-radius: 10px;
            text-align: center;
            padding: 20px;
            margin-bottom: 28px;
        }

        .otp-code {
            font-size: 38px;
            font-weight: 900;
            color: #8B0000;
            letter-spacing: 0.3em;
        }

        .otp-label {
            font-size: 10px;
            color: #999;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            margin-top: 4px;
        }

        .warning {
            font-size: 12px;
            color: #cc7700;
            background: #fff8ee;
            border-left: 3px solid #cc7700;
            padding: 10px 14px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .footer {
            background: #f8f8f8;
            padding: 20px 40px;
            text-align: center;
            font-size: 11px;
            color: #aaa;
        }

        .footer strong {
            color: #8B0000;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>IUEA — E-Voting Portal</h1>
        </div>

        <div class="body">
            <p class="greeting">Dear {{ $user->name }},</p>
            <p class="desc">
                You recently registered on the <strong>IUEA University E-Voting Portal</strong>.
                To confirm your identity and activate your account, please use the verification code below.
            </p>

            <div class="otp-box">
                <div class="otp-code">{{ $otp }}</div>
                <div class="otp-label">Your Verification Code</div>
            </div>

            <div class="warning">
                ⚠ This code expires in <strong>{{ $expiresInMinutes }} minutes</strong>.
                Do not share it with anyone. IUEA staff will never ask for this code.
            </div>

            <p class="desc" style="margin-bottom:0;">
                If you did not create an account, please ignore this email or contact the
                Electoral Commission immediately.
            </p>
        </div>

        <div class="footer">
            © {{ date('Y') }} <strong>IUEA University</strong> — Electoral Commission &nbsp;|&nbsp;
            This is an automated message, please do not reply.
        </div>
    </div>
</body>

</html>