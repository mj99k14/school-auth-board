<?php 
    session_start(); 
    require_once("./db_info.php");

    $conn = new mysqli(
        db_info::DB_URL,
        db_info::USER_ID,
        db_info::PASSWD,
        db_info::DB
    );
    if (isset($_SESSION['error'])){
    echo "error 값: ".$_SESSION['error']."<br/>";
    unset($_SESSION['error']);
    }

    if (isset($_SESSION['message'])){
    echo "message 값: ".$_SESSION['message']."<br/>";
    unset($_SESSION['message']);
    }

    $sql = "SELECT * from KMJ_BOARD  WHERE id = ?"; 
    $id = $_GET['id'] ?? 0; 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
      
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
    <fieldset>
        <legend>상세보기</legend>
     <?php if ($result): ?>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <p>등록번호:<?= htmlspecialchars($row['id']) ?></p>
            <p>제목:<?= htmlspecialchars($row['title']) ?></p>
            <p>작성자:<?= htmlspecialchars($row['name']) ?></p>
            <p>작성일:<?= htmlspecialchars($row['created_at']) ?></p>
            <p>수정일<?= $row['updated_at'] ? htmlspecialchars($row['updated_at']) : '-' ?></p><br><br>
            <p>내용:<?= htmlspecialchars($row['content']) ?></p>
            <td><button type="button" onclick="window.location.href='Edit.php?id=<?= $row['id'] ?>'">수정</button></td>
            <button type="button" onclick="location.href='board.php'">뒤로가기</button>
            <button type="button" onclick="window.location.href='Delete_process.php?id=<?= $row['id'] ?>'">삭제</button>
            <br>
        </form>
        </tr>
        <?php endwhile; ?>   
        <?php endif; ?>       
       </fieldset>
        </body>
</html>