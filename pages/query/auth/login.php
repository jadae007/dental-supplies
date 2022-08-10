<?php
require_once('../connect.php');
if (!empty($_POST)) {
  $username = mysqli_real_escape_string($conn, trim($_POST['username']));
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $key = "dentalsuppliesknh";
  $hash_login_password = hash_hmac('sha256', $password, $key);
  $sql = "SELECT * FROM users WHERE username=? AND password=? AND active='1'";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "ss", $username, $hash_login_password);
  mysqli_stmt_execute($stmt);
  $result_user = mysqli_stmt_get_result($stmt);
  if ($result_user->num_rows == 1) {
    session_start();
    $sqlUser = "SELECT `id`,`username`,`firstName`,`lastName`,`email`, `role` FROM users WHERE username = '$username' AND active='1'";
    $result_user2 = mysqli_query($conn, $sqlUser);
    $row_user = mysqli_fetch_array($result_user2, MYSQLI_ASSOC);
    $_SESSION['loginId'] = $row_user['id'];
    $_SESSION['fullname'] = $row_user['firstName'] . " " . $row_user['lastName'];
    $fullname = $_SESSION['fullname'];
    $_SESSION['project'] = "dental-supplies";
    $_SESSION["role"] = $row_user['role'];

    if (isset($_POST['remember'])) {
      setcookie("loginId", $row_user['id'], time() + (60 * 60 * 24 * 7), '/dental-supplies/');
      setcookie("project", "dental-supplies", time() + (60 * 60 * 24 * 7), '/dental-supplies/');
      setcookie("fullname", $fullname, time() + (60 * 60 * 24 * 7), '/dental-supplies/');
      setcookie("role", $row_user['role'], time() + (60 * 60 * 24 * 7), '/dental-supplies/');
    }
    $resultLogin['loginObj'] = array("status"=>true,"message"=>"Successful sign-in","role"=>$row_user['role']);
  }else{
    $resultLogin['loginObj'] = array("status"=>false,"message"=>"username หรือ password ไม่ถูกต้อง","role"=>null);
  }
  print json_encode($resultLogin,JSON_UNESCAPED_UNICODE);
} else {
  print json_encode(array("status" =>false, "message" => "Bad Request.","role"=>null), JSON_UNESCAPED_UNICODE);
}
mysqli_close($conn);
