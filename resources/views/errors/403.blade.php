<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 Error - Forbidden</title>
    <style>
        body {
            background-color: #f8f9fa;
            color: #343a40;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 3em;
            margin-bottom: 10px;
            color: #dc3545;
        }
        p {
            font-size: 1.2em;
            margin-bottom: 20px;
        }
        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            font-size: 1.1em;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>403 Error - Forbidden</h1>
        <p>Sorry, you do not have permission to access this page.</p>
        <p><a href="{{ url('/dashboard') }}">Go Back To The Dashboard</a></p>
    </div>
</body>
</html>
