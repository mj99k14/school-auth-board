<?php 
    session_start(); 
    require_once("./db_info.php");

    $conn = new mysqli(
        db_info::DB_URL,
        db_info::USER_ID,
        db_info::PASSWD,
        db_info::DB
    );
    $id = $_POST['id'] ?? ($_GET['id'] ?? 0);
    $password_raw = $_POST["password"] ;


    if($_SERVER['REQUEST_METHOD'] ==='POST'){
        $title_raw = $_POST["title"];
        $name_raw = $_POST["name"] ;
        $password_raw = $_POST["password"] ;
        $content_raw = $_POST["content"] ; 

        $sql = "SELECT * FROM KMJ_BOARD WHERE id =?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        if (empty($password_raw)) {
            $_SESSION["error"] = "비밀번호를 입력해주세요.";
            header("Location: board.php");
            exit;
        }
        if (trim($row['password']) !== trim($password_raw)) {
            $_SESSION["error"] = "비밀번호가 틀립니다. 다시 확인해주세요.";
            header("Location: board.php");
            exit;
        }


        $sql ="UPDATE KMJ_BOARD SET title = ?, name = ?, password = ? ,content = ? WHERE id =?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssi',$title_raw,$name_raw,$password_raw,$content_raw, $id);

        if($stmt->execute()){
            $_SESSION["message"]="게시물 변경 완료되었습니다";
            header("Location: board.php");
            exit;
        }else{
            $_SESSION["error"]="빈칸 전부다 작성해주세요.";
            exit;
        }
            
    }else{
        $sql = "SELECT * FROM KMJ_BOARD WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
    }

   
?>