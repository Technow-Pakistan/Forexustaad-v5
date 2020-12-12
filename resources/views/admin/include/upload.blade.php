<?php


$function_number = $_GET['CKEditorFuncNum'];
  $message = '';
    $url = "../../../storage/app/". $path;
  echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
?>