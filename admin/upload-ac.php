
<?php
$root="usersimg";
$allowedExts = array("gif", "jpeg", "jpg", "png","pdf","doc","c","cpp","java","xls","txt","xml","zip","rar");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if (/*(($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&&*/ ($_FILES["file"]["size"] < 200000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "error uploading file <br>";
    }
  else
    {

    if (file_exists($_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
       $root."/".$_FILES["file"]["name"]);
		header("location:adminaccount.php");
		    }
    }
  }
else
  {
  echo "Invalid file";
  }
?>