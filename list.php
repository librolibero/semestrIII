<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
                <title>Lista</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; text-align: center}
        .wrapper{ width: 350px; padding: 10px;  }
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-image: url(images/128.gif);
            
         }
         
         .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            color: #4B0082;
         }
         
         
         
     .container {
    left-margin: 20px
     }
         
       
         
   
         h2{
            text-align: center;
            color: #FFFFFF;
         }
         tr {
             padding: center;
             text-align: center; 
				border: #000 0px;
				padding: 20px;
                                text-align: center;
            color: #FFFFFF;
            
			}
         td {
             padding: center;
             text-align: center; 
				border: solid #000 0px;
				padding: 10px;
                                text-align: center;
            color: #FFFFFF;
            
			}
    </style>
 
	</head>
	<body>
            <h2>Wpisane dane</h2>
             <div class="container">
<?php
$servername = "localhost";
$username = "root";
$password = "vertrigo";
$dbname = "cw";

// Zdefiniowanie polaczenia
$conn = new mysqli($servername, $username, $password, $dbname);
// Utwrzeie polaczenia
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//Zapytanie SQL do bazy
$sql = "SELECT id, nazwisko, imie, telefon, miasto FROM ksiazka"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) { //jezeli jest rezultat wiekszy od zera to wyswietli
    
    echo "<table>";
				echo "<tr>";
				echo "<th>id</th>";
				echo "<th>nazwisko</th>";
				echo "<th>imie</th>";
                                echo "<th>telefon</th>";
                               echo "<th>miasto</th>";
				echo "</tr>";
     
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
					
					echo "<td>" . $row["id"]    . "</td>";
					echo "<td>" . $row["nazwisko"] . "</td>";
					echo "<td>" . $row["imie"] . "</td>";
                                        echo "<td>" . $row["telefon"] . "</td>";
                                        echo "<td>" . $row["miasto"] . "</td>";
					
					echo "</tr>";
				}
				
				echo "</table>";
				
       //echo "id: " . $row["id"]. " - nazwisko: " . $row["nazwisko"]. " imie: " . $row["imie"]. " miasto: " . $row["miasto"]. " telefon: " . $row["telefon"]. "<br>"; 
    
    				
					 
} else {
    echo "Brak danych";
}
//zamkniecie polaczenia
$conn->close();
?>
             </div> 
<br>
<a href="welcome.php" class="btn btn-info">Powrót</a>
</body>
</html>
