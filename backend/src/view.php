<?php 
    session_start(); 
    require_once("./db_info.php");

    $conn = new mysqli(
        db_info::DB_URL,
        db_info::USER_ID,
        db_info::PASSWD,
        db_info::DB
    );

    $id_raw = $_GET["id"];



    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>상세보기</title>
</head>
<body>
    <h2>상세보기</h2>
    <form action="./create_post_process.php" method ="POST">
    <fieldset>
        <legend>상세보기</legend>
       
    </fieldset>
    <input type="submit" value="확인">
        <input type="submit" value="수정">   
            <input type="submit" value="확인">     
</body>
</html>