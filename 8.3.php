<?php

    $link = mysqli_connect('localhost', 'root', '', 'myregistration');

    if (mysqli_connect_error()) {
        
        die ("There was an error connecting to the database");
        
    } 

	
	 if(isset($_POST["file_upload"])){
        #Retrieve file title
        $title = $_POST["title"];
        
        #File name with a random number
        $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
    
        #Temporary file name to store file
        $tname = $_FILES["file"]["tmp_name"];

        #Check file ext
        $ext = strtolower(substr($pname, strpos($pname, '.') + 1));

        //Form validation

        //Title
        if(empty($title) || strlen($title) < 5 || strlen($title) > 100) {array_push($errors, "Името е задължително и трябва да е между 5 и 100 символа");}

        //File extensions
        if($ext != 'zip') {array_push($errors, "Файлът трябва да бъде с разширение '.zip'");}

        if($ext == 'zip'){
            #Temporary file name to store file
            $tname = $_FILES["file"]["tmp_name"];
            
            #Upload directory path
            $uploads_dir = 'uploads';
            #To move the uploaded file to specific location
            move_uploaded_file($tname, $uploads_dir.'/'.$pname);
            #SQL query to insert into database
            $sql = "INSERT into fileup(title,file) VALUES('$title','$pname')";
            if(mysqli_query($conn,$sql)){
                $status = "<span style='color: green'>Файлът е качен успешно!</span>";
                header('refresh: 3; url = index.php');
            }
            else{
                $status = "<span style='color: red'>Файлът не е качен успешно!</span>";
            }
        }
        else{
            $status = "<span style='color: red'>Невалидни данни! Опитайте отново!</span>";
        }
    }
?>