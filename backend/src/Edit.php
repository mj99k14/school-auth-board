<?php 
    session_start(); 
    require_once("./db_info.php");
    $conn = new mysqli(
        db_info::DB_URL,
        db_info::USER_ID,
        db_info::PASSWD,
        db_info::DB
    );

    $id = $_GET['id'] ?? 0;

    $sql = "SELECT * FROM KMJ_BOARD WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (isset($_SESSION['error'])){
    echo "error 값: ".$_SESSION['error']."<br/>";
    unset($_SESSION['error']);
    }

    if (isset($_SESSION['message'])){
    echo "message 값: ".$_SESSION['message']."<br/>";
    unset($_SESSION['message']);
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>수정</title>
</head>
<body>
    <form  action="Edit_process.php" method ="post">
    <h2>수정</h2>
    <legend>수정</legend>
        <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>">
        <label for="title">제목:</label>
       <input type="text" id="title" name="title" value="<?= htmlspecialchars($row['title'] ?? '') ?>">
        <label for="name">이름:</label>
        <input type="text" id="name" name="name"value ="<?= htmlspecialchars($row['name']?? '') ?>"><br>
        <label for="password">비밀번호:</label>
        <input type="password" id="password" name="password"><br><br>
        <label for="content">내용:</label>
        <textarea id="content" name="content" rows="6" cols="50" required>
            <?= htmlspecialchars($row['content'] ?? '') ?>
        </textarea> 
    <br>
        <button type="button" onclick="location.href='board.php'">뒤로가기</button>
        <button type="submit">수정하기</button>
</form>
</body>
</html>