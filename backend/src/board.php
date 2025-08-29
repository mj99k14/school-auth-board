<?php 
    session_start(); 
    
    require_once("./db_info.php");

    $conn = new mysqli(
        db_info::DB_URL,
        db_info::USER_ID,
        db_info::PASSWD,
        db_info::DB
    );

    $sql ="SELECT * FROM KMJ_BOARD ORDER BY created_at DESC LIMIT ?,? ";
    $stmt = $conn->prepare($sql);
    $start = 0;
    $end = 5;
    $stmt->bind_param('ii',$start,$end);
    $stmt->execute();
    $result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>
</head>
<body>
    <h2>민정이의 게시판</h2>
     <fieldset>
        <legend>게시물 목록</legend>
        <table border="1";">
           <tr>
                <th>등록번호</th>
                <th>제목</th>
                <th>작성자</th>
                <th>작성일</th>
                <th>수정일</th>
                <th>상세보기</th>
            </tr>
      
       
        <?php if ($result): ?>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['title']) ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['created_at']) ?></td>
            <td><?= $row['updated_at'] ? htmlspecialchars($row['updated_at']) : '-' ?></td>
            <td><a href="view.php?id=<?= $row['id'] ?>">상세보기</a></td>
        </form>
        </tr>
        <?php endwhile; ?>   
        <?php endif; ?>       
        <button type="button" onclick="location.href= 'create_post.php'">게시물 작성</button>
</body>
</html>