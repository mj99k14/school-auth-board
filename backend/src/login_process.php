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
#비밀번호 아이디 공백확인
$name_raw = trim($_POST["id"] ?? '');
$password_raw = trim($_POST["password"] ?? '');

if($name_raw === '' || $password_raw === ''){
    $_SESSION['error'] = "정보입력을 똑바로 기입해주세요";
    header("Location:login.php");
    exit;
}


#디비에서 체크하고 있으면보드 페이지로 이동
$sql ="SELECT * FROM KMJ_USER WHERE id =? AND password =? ";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss',$name_raw,$password_raw);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    #없으면 회원등록이 필요하다고 알림 
    $_SESSION["name"] = $name_raw;
    header("Location:board.php");
}else{
    $_SESSION['error'] ="일치하는 정보가 없습니다";
    header("Location:Register.php");
}












?>

