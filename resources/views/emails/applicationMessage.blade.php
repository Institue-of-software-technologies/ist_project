<!DOCTYPE html>
<html>
<head>
    <title>Regarding Your Job Application</title>
</head>
<body>
    <h1>Dear {{ $application->user->name }},</h1>
    <p>Thank you for applying for the position of {{ $application->job->title }} at {{ $application->job->company_name }}.</p>
    <p>We are pleased to inform you that we have received your application and our team is currently reviewing it. We will get back to you soon with an update.</p>
    <p>Best regards,</p>
    <p>The {{ $application->job->company_name }} Team</p>
</body>
</html>
