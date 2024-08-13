<!DOCTYPE html>
<html>
<head>
    <title>Regarding Your Job Application</title>
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
            color: #e74c3c;
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
        <p>Thank you for applying for the position of {{ $application->job->title }} at {{ $application->job->company_name }}.</p>
        <p>After careful consideration, we regret to inform you that we have decided not to move forward with your application at this time.</p>
        <p>We want to express our appreciation for the time and effort you invested in your application. We encourage you to apply for future openings that match your qualifications.</p>
        <p>We wish you the best of luck in your job search and future endeavors.</p>
        <p class="footer">Best regards,</p>
        <p class="footer">The {{ $application->job->company_name }} Team</p>
    </div>
</body>
</html>
