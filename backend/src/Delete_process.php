<?php 
    session_start(); 
    require_once("./db_info.php");

    $conn = new mysqli(
        db_info::DB_URL,
        db_info::USER_ID,
        db_info::PASSWD,
        db_info::DB
    );
    
    $sql = "DELETE FROM KMJ_BOARD WHERE id =?";
    $id = $_GET['id'] ?? 0; 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if($stmt->affected_rows > 0 ){
        $_SESSION["message"] = "삭제완료";
            header("Location: board.php");
            exit;
    }else{
        $_SESSION["error"] = "에러 발생";
            header("Location: board.php");
            exit;

    } 
      
?>