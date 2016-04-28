<?php
include "login_func.php";
include "../tools/utils.php";
sec_session_start();

if(isset($_POST['user']) and isset($_POST['p'])) {
  try {
    $conn = connectToDB();
  } catch(PDOException $e) {
    echo $e->getMessage();
  }
  if(login($_POST['user'], $_POST['p'], $conn)) {
    header("Location: ../admin/managebookings.php");
  } else {
    header("Location: login_page.php?error=1");
  }
}
?>
