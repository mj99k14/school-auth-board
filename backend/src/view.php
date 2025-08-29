<?php 
    session_start(); 
    require_once("./db_info.php");

    $conn = new mysqli(
        db_info::DB_URL,
        db_info::USER_ID,
        db_info::PASSWD,
        db_info::DB
    );



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
        <label for="title">제목:</label>

        <label for="name">이름:</label>
   
        <label for="password">비밀번호:</label>
    
        <label for="content">내용:</label>
    
    </fieldset>

     <?php if ($result): ?>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['id']) ?></td><br>
            <td><?= htmlspecialchars($row['title']) ?></td><br>
            <td><?= htmlspecialchars($row['name']) ?></td><br>
            <td><?= htmlspecialchars($row['created_at']) ?></td><br>
            <td><?= $row['updated_at'] ? htmlspecialchars($row['updated_at']) : '-' ?></td><br><br>
            <td><?= htmlspecialchars($row['content']) ?></td><
            <td><a href="Edit.php?id=<?= $row['id'] ?>">수정</a></td>
        </form>
        </tr>
        <?php endwhile; ?>   
        <?php endif; ?>       
    <br>
        <button type="button" onclick="location.href='board.php'">뒤로가기</button>
         <button type="button" onclick="location.href='Delete.php'">삭제</button>
</body>
</html>