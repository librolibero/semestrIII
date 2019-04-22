<!DOCTYPE html>
<html lang="pl">
    <head>
        <link rel="shortcut icon" href="images/128.gif">
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
             filter: alpha(opacity=90);
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
         
    
         
         
            </style>
            <h5><a href="uploadd.php" class="btn btn-primary">Powrót</a>.</h5>
    </head>
    <body>
          
        <div id="transbox">
    <?php
// Include the database configuration file
include 'dbConfig.php';
$statusMsg = '';

// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
            if($insert){
                $statusMsg = "Plik ".$fileName. " został dodany poprawnie.";
            }else{
                $statusMsg = "Próba dodania pliku nie powiodła się, spróbuj później.";
            } 
        }else{
            $statusMsg = "Pojawił się błąd przy dodawaniu zdjęcia.";
        }
    }else{
        $statusMsg = 'Obsługiwany format plików to: JPG, JPEG, PNG, GIF, & PDF .';
    }
}else{
    $statusMsg = 'Proszę wybrać plik do dodania.';
}

// Display status message
echo $statusMsg;
?>
          
        </div>
        
      
        
    </body>
</html>
