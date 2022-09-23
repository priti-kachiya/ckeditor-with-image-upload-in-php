<?php 
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "test"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

// Insert record
if(isset($_POST['submit'])){

  $title = $_POST['title'];
  $short_desc = $_POST['short_desc'];
  $long_desc = $_POST['long_desc'];

  if($title != ''){

    mysqli_query($con, "INSERT INTO contents(title,short_desc,long_desc) VALUES('".$title."','".$short_desc."','".$long_desc."') ");
    header('location: index.php');
  }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Integrate CKeditor to HTML page and save to MySQL with PHP</title>

    <!-- CSS -->
    <style type="text/css">
    .cke_textarea_inline{
       border: 1px solid black;
    }
    </style>

    <!-- CKEditor --> 
    <script src="ckeditor/ckeditor.js"></script>
  </head>
  <body>

    <form method='post' action=''>
       Blog Title : 
       <input type="text" name="title" ><br>

       Blog Short Description: 
       <textarea id='short_desc' name='short_desc' style='border: 1px solid black;' >  </textarea><br>

       

       Blog Long Description: 
       <textarea id='long_desc' name='long_desc' ></textarea><br>

       <input type="submit" name="submit" value="Submit">
    </form>


<script type="text/javascript">

CKEDITOR.editorConfig = function( config ) {
  // config.extraPlugins = 'imageuploader';
    /* Show these image/flash browsing feature only to Admins */
    config.filebrowserBrowseUrl = '/kcfinder/browse.php?opener=ckeditor&type=files';
    config.filebrowserImageBrowseUrl = '/kcfinder/browse.php?opener=ckeditor&type=images';
    config.filebrowserFlashBrowseUrl = '/kcfinder/browse.php?opener=ckeditor&type=flash';
 
    /* Image/Flash upload feature using kcfinder tool */
    config.filebrowserUploadUrl = '/kcfinder/upload.php?opener=ckeditor&type=files';
    config.filebrowserImageUploadUrl = '/kcfinder/upload.php?opener=ckeditor&type=images';
    config.filebrowserFlashUploadUrl = '/kcfinder/upload.php?opener=ckeditor&type=flash';
};

// Initialize CKEditor
CKEDITOR.replace( 'short_desc',{
  extraPlugins: 'imageuploader'
});


CKEDITOR.replace('long_desc',{

  width: "100%",
  height: "200px"

}); 

</script>
  </body>

</html>