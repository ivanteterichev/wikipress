<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <style>
        html {
            display:table;
            height:100%;
            text-align:center;
            width:calc(100% - 10px);
            padding:5px;
        }
        body{
            display:table-cell;
            vertical-align:middle;
            margin:2em auto;
            background-color:rgba(0,0,0,0.05);
        }
        div.form{
            text-align:left;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            width:310px;
            margin: 0 auto;
            padding:20px 20px 40px;
            background-color:white;
            font-family: verdana;
            color: #646464;
        }
        div.form p.error{
            color:orange;
        }
        div.form h2{
            text-align:center;
        }
        form label{
            display:block;
            margin-bottom:5px;
        }
        form input[type="text"],form input[type="email"],form input[type="password"]{
            border:0;
            width:calc(100% - 10px);
            height:30px;
            padding:5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            font-size: 12px;
            color: #646464;
        }
        div.form a{
            color: #646464;
            text-decoration:none;
        }
    </style>
</head>
<body>
<div class="form">