<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width"/>

    <!-- For development, pass document through inliner -->
    <style type="text/css">

        * {
            margin: 0;
            padding: 0;
            font-size: 100%;
            font-family: 'Avenir Next', "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
            line-height: 1.65; }

        /*img {
          max-width: 100%;
          margin: 0 auto;
          display: block; }*/

        img{
            width:170px; /* you can use % */
            height: auto;
            margin: 100 auto;
        }

        body,
        .body-wrap {
            width: 100% !important;
            height: 100%;
            background: #efefef;
            -webkit-font-smoothing: antialiased;
            -webkit-text-size-adjust: none; }

        a {
            color: #ffaf17;
            text-decoration: none; }

        .text-center {
            text-align: center; }

        .text-right {
            text-align: right; }

        .text-left {
            text-align: left; }

        .button {
            display: inline-block;
            color: white;
            background: #ffaf17;
            border: solid #ffaf17;
            border-width: 10px 20px 8px;
            font-weight: bold;
            border-radius: 4px; }

        h1, h2, h3, h4, h5, h6 {
            margin-bottom: 20px;
            line-height: 1.25; }

        h1 {
            font-size: 32px; }

        h2 {
            font-size: 28px; }

        h3 {
            font-size: 24px; }

        h4 {
            font-size: 20px; }

        h5 {
            font-size: 16px; }

        p, ul, ol {
            font-size: 16px;
            font-weight: normal;
            margin-bottom: 20px; }

        .container {
            display: block !important;
            clear: both !important;
            margin: 0 auto !important;
            max-width: 580px !important; }
        .container table {
            width: 100% !important;
            border-collapse: collapse; }
        .container .masthead {
            padding: 80px 0;
            background: #ffaf17;
            color: white; }
        .container .masthead h1 {
            margin: 0 auto !important;
            max-width: 90%;
            text-transform: uppercase; }
        .container .content {
            background: white;
            padding: 30px 35px; }
        .container .content.footer {
            background: none; }
        .container .content.footer p {
            margin-bottom: 0;
            color: #888;
            text-align: center;
            font-size: 14px; }
        .container .content.footer a {
            color: #888;
            text-decoration: none;
            font-weight: bold; }


    </style>
</head>
<body style="width: 100% !important; height: 100%; background: #efefef; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none;">
<table class="body-wrap" style="width: 100% !important; height: 100%; background: #efefef; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none;">
    <tr>
        <td class="container" style="width: 100% !important;border-collapse: collapse;">

            <!-- Message start -->
            <table>
                <tr>
                    <td align="center" class="masthead" style="padding: 80px 0;background: #ffaf17;color: white;">
                        <div class="logo_container" style="width:auto; margin:0 auto; display:inline-block;">
                            <img alt="CMS logo" src="http://cms.lk/wp-content/uploads/2014/01/cms-logo-resized1.png" style="float: left;">
                            <h1 style="text-transform: uppercase; float: left; padding-left:10px;">Reservations</h1>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="content" style="background: white; padding: 30px 35px;">
                        <h2 style="font-size: 28px;">Hi {{$userName}},</h2>
                        <br/>
                        <table border="1">
                            <tr>
                                <td><b>Title</b></td>
                                <td>{{$title}}</td>
                            </tr>
                            <tr>
                                <td><b>Resource/Venue </b></td>
                                <td>{{$resource}}</td>
                            </tr>
                            <tr>
                                <td><b>Event</b></td>
                                <td>{{$event}}</td>
                            </tr>
                            <tr>
                                <td><b>Event Date</b></td>
                                <td>{{$eventDate}}</td>
                            </tr>
                            <tr>
                                <td><b>Event Start Time</b></td>
                                <td>{{$eventStartTime}}</td>
                            </tr>
                            <tr>
                                <td><b>Event End Time</b></td>
                                <td>{{$eventEndTime}}</td>
                            </tr>
                            <tr>
                                <td><b>Description</b></td>
                                <td>{{$description}}</td>
                            </tr>
                            <tr>
                                <td><b>Reserved By</b></td>
                                <td>{{$userName}}</td>
                            </tr>
                            <tr>
                                <td><b>Reserved On</b></td>
                                <td>{{$reservedOn}}</td>
                            </tr>
                        </table>
                        <br/>
                        <p><em>– CMS Reservations</em></p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="container" style="width: 100% !important;border-collapse: collapse;">
            <!-- Message start -->
            <table>
                <tr>
                    <td class="content footer" align="center" style="background: none;">
                        <p style="margin-bottom: 0; color: #888; text-align: center; font-size: 14px;">Sent by <a href="#" style="color: #888;text-decoration: none;font-weight: bold;">CMS</a> Level 10, Access Towers #278, Union Place, Colombo 02, Sri Lanka</p>
                        <p style="margin-bottom: 0; color: #888; text-align: center; font-size: 14px;">Telephone: +94 (0)11 2300119</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>