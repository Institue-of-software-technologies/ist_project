<!DOCTYPE html>
<html>
<head>
    <title>500 Error - Internal Server Error</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        h1 {
            font-size: 48px;
            color: #dc3545;
            margin-bottom: 20px;
        }
        p {
            font-size: 18px;
            color: #666;
            margin-bottom: 20px;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>500 Error - Internal Server Error</h1>
        <p>Sorry, something went wrong on our end. Please try again later.</p>
        <p><a href="{{ url('/dashboard') }}">Go Back To The Dashboard</a></p>
    </div>
</body>
</html>
