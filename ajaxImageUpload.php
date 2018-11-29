<?php
error_reporting(0);
session_start();
include('db.php');
$session_id='1'; //$session id
define ("MAX_SIZE","2000"); // 2MB MAX file size
function getExtension($str)
{
$i = strrpos($str,".");
if (!$i) { return ""; }
$l = strlen($str) - $i;
$ext = substr($str,$i+1,$l);
return $ext;
}
// Valid image formats 
$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") 
{
$uploaddir = "uploads/"; //Image upload directory
foreach ($_FILES['photos']['name'] as $name => $value)
{
$filename = stripslashes($_FILES['photos']['name'][$name]);
$size=filesize($_FILES['photos']['tmp_name'][$name]);
//Convert extension into a lower case format
$ext = getExtension($filename);
$ext = strtolower($ext);
//File extension check
if(in_array($ext,$valid_formats))
{
//File size check
if ($size < (MAX_SIZE*1024))
{ 
$image_name=time().$filename; 
echo "<img src='".$uploaddir.$image_name."' class='imgList'>"; 
$newname=$uploaddir.$image_name; 
Moving file to uploads folder
if (move_uploaded_file($_FILES['photos']['tmp_name'][$name], $newname)) 
{ 
$time=time(); 
//Insert upload image files names into user_uploads table
//mysql_query("INSERT INTO user_uploads(image_name,user_id_fk,created) VALUES('$image_name','$session_id','$time')");
//}
//else 
//{ 
//echo '<span class="imgList">You have exceeded the size limit! so moving unsuccessful! </span>'; } 
//}

//else 
//{ 
//echo '<span class="imgList">You have exceeded the size limit!</span>'; 
//} 

//} 
//
//else 
//{ 
//echo '<span class="imgList">Unknown extension!</span>'; 
//} 

//} //foreach end

} 
?>