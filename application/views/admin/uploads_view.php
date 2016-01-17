<html>
   <!-- the head -->
   <head>
      <meta http-equiv="Content-Type" content="text/html ;charset=utf-8" />
   </head>
   <body>
       <h1>Tải ảnh lên</h1>
       <form method="post" action="" enctype="multipart/form-data">
                <label>Ảnh kèm theo:</label><input type="file"  id="image_list" name="image_list[]" multiple>
                <br />
                <input type="submit" class="button" value="Upload" name='submit' />
        </form>
        <?php
        if($errors != ""){
            echo $errors;
        }
        ?>
   </body>
</html>