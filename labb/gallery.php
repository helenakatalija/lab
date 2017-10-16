<?php 
include 'header.php'; 

include("config.php");

?>





 <h2>Image gallery</h2>

<?php



if (isset($_FILES['upload'])){
    
    $allowedextensions = array('jpg', 'jpeg', 'gif', 'png');
    
    
    $extension = strtolower(substr($_FILES['upload']['name'], strrpos($_FILES['upload']['name'], '.') + 1));
    
   
    echo "Your file extension is: ".$extension;
    
   
    $error = array ();
    
    
    if(in_array($extension, $allowedextensions) === false){
        

        $error[] = 'This is not an image, upload is allowed only for images.';        
    }
    
    if($_FILES['upload']['size'] > 1000000){
        
        $error[]='The file exceeded the upload limit';
    }
    
    if(empty($error)){
        
       
        move_uploaded_file($_FILES['upload']['tmp_name'], "uploadedfiles/{$_FILES['upload']['name']}");     
    }
    
}

?>



          
               <div>
                   <?php 
                   
                   if (isset($error)){
                       if (empty($error)){
                           
                         
                           echo '<a href="uploadedfiles/' . $_FILES['upload']['name'] . '">Check out your image</a>';
                           
                       } else {
                           
                           foreach ($error as $err){
                               echo $err;
                           }
                           
                       }
                   }
                   
                   ?>
               </div>
              

               <div>
                   
                   <form action="" method="POST" enctype="multipart/form-data">
                       <input type="file" name="upload" /></br>
                       <input type="submit" value="Choose this image" />
                   </form>
               </div>
               <br>


            <h2>The uploaded images</h2>

<!-- reference to: https://stackoverflow.com/questions/11903289/pull-all-images-from-a-specified-directory-and-then-display-them -->
                 <?php
                    $images = glob("uploadedfiles/*.*");
                    for ($i = 0; $i < count($images); $i++) {
                        $image = $images[$i];
                        echo '<img class="gallery_img" src="' . $image . '" alt="Random image" />' . " ";
                    }
                  ?>
                  <br>
                  <br>


           <?php include 'footer.php'; ?>

