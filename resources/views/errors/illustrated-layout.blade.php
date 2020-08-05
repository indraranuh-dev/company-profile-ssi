<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            height: 100vh;
            width: 100vw;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            overflow: hidden;
            background: #222222;
            color: #dae1e7;
        }

        .wrapper {
            padding: 0 10%;
            font-family: monospace;
            transform: translateY(-30px);
        }

        .wrapper .code {
            font-size: 80px;
            margin-bottom: 10px;
            position: relative;
        }

        .wrapper .code h2 {
            margin: 0;
        }

        .wrapper .code::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -20px;
            height: 8px;
            border-radius: 10px;
            width: 16%;
            background-color: #a779e9;
        }

        .wrapper .message {
            font-family: monospace;
            margin: 50px 0 20px;
            font-size: 20px;
        }

        a button {
            cursor: pointer;
            font-size: 20px;
            font-family: monospace;
            padding: 10px 30px;
            margin-top: 10px;
            background-color: transparent;
            border: 2px solid #dae1e7;
            border-radius: 30px;
            color: #dae1e7;
            transition: .5s cubic-bezier(0.19, 1, 0.22, 1);
            box-shadow:
                8px 8px 10px rgba(0, 0, 0, 0.844),
                -8px -8px 10px rgba(52, 52, 52, 0.844),
                inset 3px 3px 5px rgba(0, 0, 0, 0.844),
                inset -3px -3px 5px rgba(52, 52, 52, 0.925);
        }

        a button:hover {
            border-color: #a779e9;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="code">
            @yield('code', __('Oh no'))
        </div>

        @yield('message')

        <a onclick="window.history.back()">
            <button>
                {{ __('Kembali') }}
            </button>
        </a>
    </div>
</body>

</html>
