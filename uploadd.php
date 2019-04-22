<!DOCTYPE html>
<html lang="pl">
    <head>
        <link rel="shortcut icon" href="images/128.jpg">
        <meta charset="UTF-8" />
        <title>Upload zajęcia do bazy danych</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style type="text/css">
            body{ font: 14px sans-serif; text-align: center;}
        .wrapper{ width: 350px; padding: 10px; }
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

         
          h1{
            text-align: center;
            color: #FFFFFF;
         }
         
         h2{
            text-align: center;
            color: #FFFAF0;
         }
         h4{
            text-align: center;
            color: #FFFAF0	;
         }
            
            </style>
    </head>
    <body>
        
        <form action="upload.php" method="post"  enctype="multipart/form-data">
            <h1>Wybierz zdjęcie</h1>
            <div class="container">
             <h2><a href="welcome.php" class="btn btn-primary">Powrót do wpisywania danych</a></h2>
                       <input type="file"  name="file" class="btn btn-info" >
                       <br>
            <input type="submit" class="btn btn-primary" name="submit" value="Dodaj">
            <div>
        </form>
        <?php
// Include the database configuration file
include 'dbConfig.php';

// Get images from the database
$query = $db->query("SELECT * FROM images ORDER BY uploaded_on DESC");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["file_name"];
     
?>
    <img src="<?php echo $imageURL; ?>" alt="" />
<?php }
}else{ ?>
    <p>Nie odnaleziono zdjęć.</p>
<?php } ?>
    <br>
    
        
    </body>
</html>
