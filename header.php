<?php
 
 if(!isset($_SESSION)) 
 { 
	 session_start(); 

 } 
 ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GOOD BOOK</title>
    <link rel="shortcut icon" href="./images/favicon.ico">
    <link rel="stylesheet" href="./fonts.css">
    <!-- <link rel="stylesheet" href="./style.css"> -->
</head>
<body>
    <header>
        <div>
            <!-- <img class="logo" src="./images/logo-white.svg" alt="book logo"> -->
        </div>
        <nav>
            <ul class="zarin-menu">
                

                <li>
                    <a href="./1.php">صفحه اصلی</a>
                </li>


                <li>
                    <a href="#">تماس‌باما</a>
                </li>

                
                <?php
					if(!isset($_SESSION['username']))
						{
							echo "<li><a href='./user_login_header.php'><span>ورود</span></a></li>";
						}
					else
						{
							echo "<li><a href='user_profile.php'><span>پروفایل من</span></a></li>";
						}
				?>
            </ul>
        </nav>
        

        
            
            
        </div>
        
    </header>