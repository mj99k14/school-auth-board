<?php 
    session_start(); 
    require_once("./db_info.php");

    $conn = new mysqli(
        db_info::DB_URL,
        db_info::USER_ID,
        db_info::PASSWD,
        db_info::DB
    );

    # 연결 확인
    if ($conn -> connect_error){
    die("Connection failed: " . $conn->connect_error);
    }
    
    $title_raw = trim($_POST["title"] ?? '');
    $name_raw = trim($_POST["name"] ?? '');
    $password_raw = trim($_POST["password"] ?? '');
    $content_raw = trim($_POST["content"] ?? '');
  
  

    // if ($title_raw === '' || $name_raw === ''|| $content_raw === '')){
    //     $_SESSION['error'] = "정보 입력을 똑바로 기입해주세요";
    //     header("Location:Register.php");
    //     exit;
    // }

    $sql ="INSERT INTO KMJ_BOARD (title, name, password ,content) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssss',$title_raw,$name_raw,$password_raw,$content_raw);

    if($stmt->execute()){
        $_SESSION["message"]="게시물 작성완료하였습니다";
        header("Location: board.php");
        exit;
    }else{
        $_SESSION["error"]="빈칸 전부다 작성해주세요.";
        exit;
    }


?>