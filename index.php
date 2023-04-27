<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Restro Management System</title>


    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


    <style>
        html,
        body {
            background: url('https://assets.hyatt.com/content/dam/hyatt/hyattdam/images/2022/06/07/1756/KATHM-P0428-Entrance-Porch.jpg/KATHM-P0428-Entrance-Porch.16x9.jpg');
            background-size: cover;
            background-color: #fff;
            font-weight: bold;
            color: white;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
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

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }



        .links {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 30px;
}

.links a {
  display: block;
  padding: 10px 20px;
  margin: 0 10px;
  text-decoration: none;
  color: #fff;
  font-weight: bold;
  border: 2px solid #fff;
  border-radius: 5px;
  background-color: rgba(255, 255, 255, 0.5);
  transition: background-color 0.3s ease-in-out;
}

.links a:hover {
  background-color: rgba(255, 255, 255, 0.8);
}

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Restaurant Management System
            </div>

            <div class="links">
          
                <a href="Restro/login/">Log In</a>
                <a href="booking.php">Table Booking</a>
               
            </div>
        </div>
    </div>
</body>

</html>