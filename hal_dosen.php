<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>UNIVERSITY OF OXFORD</title>
    <style type="text/css">
        /* General container styling */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #6fb1fc, #d9e8fc); /* Gradient background */
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 960px;
            padding: 20px;
            background-color: #fff; /* White background */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); /* Soft shadow */
            border-radius: 10px; /* Rounded corners */
            margin: 20px;
        }

        /* Header styling */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 10px;
            border-bottom: 3px solid #0056b3; /* Blue border */
        }

        .logo img {
            width: 110px;
            height: 110px;
        }

        /* Navigation menu styling */
        #navmenu {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .menu-item {
            margin-right: 20px;
        }

        .menu-item a {
            text-decoration: none;
            font-size: 16px;
            color: #0056b3; /* Blue text */
            padding: 8px 16px;
            border: 2px solid #0056b3; /* Blue border */
            border-radius: 5px;
            background-color: #e6f0fc; /* Light blue background */
            transition: all 0.3s ease; /* Smooth transition */
        }

        .menu-item a:hover {
            background-color: #0056b3; /* Blue on hover */
            color: #fff; /* White text on hover */
        }

        /* Page content styling */
        .page {
            margin-top: 20px;
            padding: 20px;
            background-color: #f9f9f9; /* Light background */
            border: 1px solid #ddd;
            min-height: 300px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); /* Light shadow */
            border-radius: 8px; /* Rounded corners */
        }

        /* Footer styling */
        .footer {
            text-align: center;
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #ddd;
            font-size: 14px;
            color: #666;
        }

        /* Decorative background elements */
        .background-decor {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .circle {
            position: absolute;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .circle.small {
            width: 150px;
            height: 150px;
            top: 10%;
            left: 80%;
        }

        .circle.large {
            width: 250px;
            height: 250px;
            bottom: 10%;
            left: 10%;
        }
    </style>
</head>
<body>
    <div class="background-decor">
        <div class="circle small"></div>
        <div class="circle large"></div>
    </div>

    <div class="container">
        <div class="header">
            <div class="logo">
                <img src="images/th.jpg" alt="University Logo" />
            </div>
			
            <ul id="navmenu">
                <li class="menu-item"><a href="hal_dosen.php">Homepage</a></li>
                <li class="menu-item"><a href="?module=bio_dsn#pos">Profil</a></li>
                
                <li class="menu-item"><a href="logout.php">Logout</a></li>
            </ul>
        </div>
       

   

		<div class="page">
		<?php if(isset($_GET['module']))
			include "$_GET[module].php";
		else
			include "dosen.php";?>
		</div>
		<div class="footer">
                <p>&copy; 2019. M Ammaridho S and Inka Sulistiani</p>
        </div>
	</div>
  </body>
</html>