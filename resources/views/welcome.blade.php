<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            ul {
              list-style-type: none;
              margin: 0;
              padding: 0;
              overflow: hidden;
              background-color:white;
            }
            
            li {
              float: right;
              background-color: wheat;
              border: wheat 2px solid
            }
            
            li a {
              display: block;
              color: black;
              text-align: center;
              padding: 14px 16px;
              text-decoration: none;
            }
            
            li a:hover {
              background-color: white;
            }
            img{
                width: 1500px;
                height: 500px;
            }
            body{
                text-align: center;
                background-image: url("./ph.jpg");
                background-repeat: no-repeat;
      background-attachment: fixed ;
        background-position: center;
      background-size: cover; 
    
            }
            </style>
    
    </head>
    <body class="antialiased">
        <ul>
            <li><a class="active" href="/login">login</a></li> 
            <li><a href="/register">register</a></li></ul>
            <br><br><br>
           <h1 style="color:white">Bienvenu !</h1>

    </body>
</html>
