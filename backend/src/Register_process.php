<?php 
session_start(); 
require_once("./db_info.php");

$conn = new mysqli(
    db_info::DB_URL,
    db_info::USER_ID,
    db_info::PASSWD,
    db_info::DB
);

if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$name_raw = trim($_POST["name"] ?? '');
$password_raw = trim($_POST["password"] ?? '');

if ($name_raw === '' || $password_raw === ''){
    $_SESSION['error'] = "정보 입력을 똑바로 기입해주세요";
    header("Location:Register.php");
    exit;
}

# username 중복 확인
$sql ="SELECT * FROM KMJ_USER WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s',$name_raw);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    $_SESSION["error"] = "이미 사용 중인 아이디입니다";
    echo "error";
    header("Location:Register.php");
    exit;
}

# 회원 등록
$sql ="INSERT INTO KMJ_USER(username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss',$name_raw,$password_raw);

if($stmt->execute()){
    $_SESSION["message"]="회원가입 축하합니다";
    header("Location: login.php");
    exit;
}else{
    $_SESSION["error"]="에러가 발생했습니다";
    header("Location:Register.php");
    exit;
}
?>
