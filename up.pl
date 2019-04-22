<!DOCTYPE html>
<html>
	<head>
            <link rel="shortcut icon" href="images/128.jpg">
		<meta charset="utf-8">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center;}
        .wrapper{ width: 350px; padding: 20px; }
    </style>
	</head>
         <style>
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
         
         .form-signin .form-signin-heading,
         .form-signin .checkbox {
            margin-bottom: 10px;
         }
         
         .form-signin .checkbox {
            font-weight: normal;
         }
         
         .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
         }
         
         .form-signin .form-control:focus {
            z-index: 2;
         }
         
         .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            border-color:#4B0082;
         }
         
         .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-color:#4B0082
         }
         
         h2{
            text-align: center;
            color: #4B0082;
         }
         </style>
	<body>
            <h2>Wpisane dane</h2>
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
$sql = "SELECT id, nazwisko, imie, miasto, telefon FROM tabela_kontakty"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) { //jezeli jest rezultat wiekszy od zera to wyswietli
    
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - nazwisko: " . $row["nazwisko"]. " imie: " . $row["imie"]. " miasto: " . $row["miasto"]. " telefon: " . $row["telefon"]. "<br>";
    }
} else {
    echo "Brak danych";
}
//zamkniecie polaczenia
$conn->close();
?>
<br>
</body>
</html>
