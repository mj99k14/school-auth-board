<?php 
    session_start(); 

    if (isset($_SESSION['error'])){
    echo "error 값: ".$_SESSION['error']."<br/>";
    unset($_SESSION['error']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시물 작성란</title>
</head>
<body>
    <form action="./create_post_process.php" method ="POST">
    <fieldset>
        <legend>게시물 작성란</legend>
        <label for="title">제목:</label>
        <input type="title" id="title" name="title"><br>
        <label for="name">이름:</label>
        <input type="name" id="name" name="name"><br><
        <label for="password">비밀번호:</label>
        <input type="password" id="password" name="password"><br><br>
        <label for="content">내용:</label>
        <textarea id="content" name="content" rows="6" cols="50" require></textarea><br>
    </fieldset>
    <input type="submit" value="작성완">    
</body>
</html>