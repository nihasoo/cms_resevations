<!DOCTYPE html>
<html>
    <head>
        <title>Be right back.</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }

            a:link {
                color: #2196f3;
                text-decoration: none;
            }

            a:visited {
                color: #c62828;
                text-decoration: none;
            }

            a:hover {
                color: #4caf50;
                text-decoration: none;
            }

            a:active {
                color: #2196f3;
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <img src="{{ url('images/403.jpg') }}" class="img-responsive rounded" style="width:25%;height:25%;">
                <div class="title">Access Denied! <br/>Go to the <a href="{{ url('home') }}"> Home</a>Page.</div>
            </div>
        </div>
    </body>
</html>