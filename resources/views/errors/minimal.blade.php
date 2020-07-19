<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700;900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background: rgb(159, 159, 159);
            background: radial-gradient(circle, rgba(255, 255, 255, 1) 0%, rgba(203, 203, 203, 1) 47%, rgba(159, 159, 159, 1) 100%);
            color: #636b6f;
            font-family: 'Rubik', sans-serif;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        h1,
        h2 {
            font-weight: 900;
            text-align: center
        }

        h3,
        h4,
        h5,
        h6 {
            font-weight: 400;
            text-align: center
        }

        .content {
            max-width: 300px;
            max-width: 300px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .content h2 {
            font-size: 80px;
            margin: 0;
            border-bottom: 3px solid #636b6f;
        }

        .content h2 .emoji {
            font-size: 55px;
            display: inline-flex;
            transform: translateY(-10px);
        }

        .content h3 {
            text-transform: uppercase;
            font-size: 16px;
            letter-spacing: 2px;
            font-weight: 600
        }

        .content a {
            color: whitesmoke;
            background: #636b6f;
            padding: .7rem 1.5rem;
            text-decoration: none;
            margin: 10px 0;
            width: 40%;
        }

        .content a:hover {
            background: #606060;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>

</html>
