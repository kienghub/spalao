<?php
@session_start();
if($_SESSION['autherized']!="fd18481850cc606a9071adc0bc390c62"){
  @header("location:../../login.php");
 }else{
} ?>