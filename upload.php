 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Upload your file</title>

<link rel="stylesheet" href="style.css">

<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png","txt","pdf");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"file/".$file_name);
         echo "Success";
         header( 'Location:https://giftedheartfeltregister.livesportssport.repl.co/' );
  exit();
      }else{
         print_r($errors);
      }
   }
?>
<html>
   <body>
      <div class="container">
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" />
         <br><br>
         <input type="submit" style="margin-bottom:10px">
      </form>

      <a href="index.php"><input type="submit" value="Home" style="float:left;margin-top:-3px"></a>
      </div>
   </body>
</html>