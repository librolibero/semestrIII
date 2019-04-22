<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="pl">
<head>
    <link rel="shortcut icon" href="images/128.jpg">
    <meta charset="UTF-8">
     <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1'>
    <title>Książka tel</title>
     <link rel='stylesheet' href='css/mojestyle.css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center;}
        .wrapper{ width: 350px; padding: 20px; }
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-image: url(images/128.gif);
         }
         
 
         #transbox {
    width: 300px;
    margin: 0 auto;
    background-color: #fff;
    filter:alpha(opacity=50);
    opacity: 0.5;
    -moz-opacity:0.5;
}
#transbox div {
    padding: 20px;
    color: #000;
    filter:alpha(opacity=100);
    opacity: 1;
    -moz-opacity:1;
}
         
.form-group{
    width: 50%;
}
         .container {
    margin: 30px  auto;
     border-top-width: 15px;}   
         
          h1{
            text-align: center;
            color: #FFFAF0;
         }
         
         h2{
            text-align: center;
            color: #4B0082;
         }
         h4{
            text-align: center;
            color: white;

         }
    </style>
</head>
<body>
    <div class="container">

        <!-- header -->
        <header>
            <img src="images/header.jpg" alt="" />
        </header>
        <!-- sidebar -->
        <aside>
            <nav>

                <div class="mobimin" onclick="$('.menu').toggle();">
                    &equiv;
                </div>
                <ul class="menu">
                    <li><a href="index.php">Home</a></li>
                 <li><a href="login.php">Zaloguj się</a></li>
                 <li><a href="register.php">Zarejestruj się</a></li>
                 <li><a href="uploadd.php">Dodaj zdjęcie</a></li>
                 <li><a href="reset-password.php">Zresetuj hasło</a></li>
                    
                </ul>
            </nav>
        </aside>
        <!-- main -->
    <div class="page-header">
        <h1>Hej, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Twoja strona.</h1>
    </div>
    <b>
        <h4><center>Wprowadź dane do systemu</center></h4>
            </b>
        <div class="container">
		<?php
			if( isset($_POST["nazwisko"]) ){
			        $nazwisko = $_POST["nazwisko"];	
                                $imie = $_POST["imie"];
				$telefon = $_POST["telefon"];
				$miasto = $_POST["miasto"];
                             
                                 
                  					
					$conn = new mysqli("localhost", "root", "vertrigo", "cw");
					
					$odp = $conn->query("INSERT INTO ksiazka(nazwisko, imie, telefon, miasto) VALUES ('$nazwisko', '$imie', '$telefon', '$miasto')");
echo "<br>";
					if($odp){
						echo "Udało się!";
					}else {
						echo "Nie udało się dodać użytkownika";
					}
					
					$conn->close();
				}
				
			
			
		?>
        </div>
    <div class="container">
            <form method="POST" action="welcome.php"> 
		
<form action= method="post">
       
            <div class="form-group ">
                <h4>Nazwisko</h4>
                <input type="text" name="nazwisko"  class="form-control">
            </div>    
            <div class="form-group  ">
                <h4>Imię</h4>
                <input type="text" name="imie" class="form-control">               
 <span class="help-block"></span>
                <span class="help-block"></span>
            </div>
     <div class="form-group  ">
                <h4>Miasto</h4>
                <input type="text" name="miasto" class="form-control" >
                <span class="help-block"></span>
            </div>    
            <div class="form-group ">
                <h4>Telefon<h4>
                        <input type="number" name="telefon" class="form-control" >
                        
                <span class="help-block"></span>
            </div>
   <div class="form-group">
                <input type="submit"  class="btn btn-primary" value="Zapisz">
            </div>
    </div>
    <p>
        <a href="reset-password.php" class="btn btn-info">Zresetuj hasło</a>
        <a href="logout.php" class="btn btn-primary">Wyloguj się. </a>
        <a href="uploadd.php" class="btn btn-info"> Chcesz dodać zdjęcie?</a>
        <a href="list.php" class="btn btn-primary"> Możesz zobaczyć swoje wyniki tutaj</a>
        <br>
        <hr>
        <a href = "logout.php" class="btn btn-primary">Kliknij tu by wyczyścić sesję</a>
        
    </p>
     <!-- footer -->
        <footer>
            <p>Humanistyka UKW © 2019</p>
        </footer>
</body>
</html>
