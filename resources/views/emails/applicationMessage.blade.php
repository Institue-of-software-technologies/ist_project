<!DOCTYPE html>
<html>
<head>
    <title>Congratulations on Your Application!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #2ecc71;
        }
        p {
            margin: 0 0 10px;
        }
        .footer {
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
            font-size: 0.9em;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Dear {{ $application->user->name }},</h1>
        <p>Congratulations! We are excited to inform you that we have successfully received your application for the position of {{ $application->job->title }} at {{ $application->job->company_name }}.</p>
        <p>Our team is currently reviewing your application and will be in touch with you shortly regarding the next steps.</p>
        <p>Thank you for your interest in joining our team. We appreciate the time and effort you put into your application.</p>
        <p class="footer">Best regards,</p>
        <p class="footer">The {{ $application->job->company_name }} Team</p>
    </div>
</body>
</html>
