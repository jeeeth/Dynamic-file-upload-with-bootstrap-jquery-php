<?php
if (isset($_REQUEST['sub_file'])) {
   $sno=1;
   echo $fcount = $_REQUEST['txt_fcount'];
   while ($sno <= $fcount) {
      echo $filename="fl_doc".$sno;
      // if (!empty($_FILES[$filename])) {

      // get file name size type
      $fileName=$_FILES[$filename]["name"];
      $fileSize=$_FILES[$filename]["size"]/1024;
      $fileType=$_FILES[$filename]["type"];
      $fileTmpName=$_FILES[$filename]["tmp_name"];
      // check the file format
      if($fileType=="image/png" || $fileType=="image/jpeg")
      {
         if($fileSize<=10000)
         {
            $tstamp=time();
            //New file name
            $newFileNameprof=$fileName;
            $_SESSION['filenameprofile']=$newFileNameprof;

            //File upload path
            $uploadPath="photo/".$newFileNameprof;
            //chmod("Uploads/".$newFileName, 0777);

            //function for upload file
            if(move_uploaded_file($fileTmpName,$uploadPath))
            {
               echo'<script>document.getElementById("sucmsg").innerHTML = "Successfully uploaded";</script>';
            }
            else
            {
               echo '<p style="color:red"></p>';
               echo'<script>document.getElementById("errmsg").innerHTML = "File upload failed.";</script>';
            }
         }
         else
         {
            echo '<p style="color:red"></p>';
            echo'<script>document.getElementById("errmsg").innerHTML = "File size too large";</script>';
         }
      }
      else{
         echo '<p style="color:red"></p>';
         echo'<script>document.getElementById("errmsg").innerHTML = "Invalid file format";</script>';
      }
      $sno++;
   }

   // }



}

?>
