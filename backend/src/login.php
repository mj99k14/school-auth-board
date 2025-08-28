<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>login</title>
  </head>
  <body>
    <?php
      if (isset($_SESSION['error'])){
        echo "error 값: ".$_SESSION['error']."<br/>";
        unset($_SESSION['error']);
      }


    ?>
    <h1>로그인 페이지</h1>
    <form action="login_process.php" method ="post">
     <label>아이디: <input type ="text" name="name"></label><br>
     <label>비밀번호:<input type ="password" name="password"></label><br>
     <button type="submit">로그인</button>
     <button type="button" onclick="location.href='Register.php'">회원가입</button>
    </form>
  </body>
</html>
