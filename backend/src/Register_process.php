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

# 해당정보가잇는지 없는지확인
if($result->num_rows > 0){
    # 회원등록이 필요하다고 없음 
    $_SESSION["error"] = "해당 정보가 있습니다 ";
    header("Location:login.php");
    exit;
}



#비밀번호 아이디 공백확인
$id_raw = trim($_POST["id"] ?? '');
$name_raw = trim($_POST["name"] ?? '');
$password_raw = trim($_POST["password"] ?? '');

if($name_raw === '' || $password_raw === '' ||  $id_raw === ''){
    $_SESSION['error'] = "정보 입력을 똑바로 기입해주세요";
    header("Location:Register.php");
    exit;
}
 
$sql ="INSERT INTO KMJ_USER(id,username,password ) VALUES (?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sss',$name_raw,$password_raw,$id_raw );
if(stmt ->excute(){
    $_SESSION['success']="유저 정보 저장되었습니다";
}else{
    $_SESSION['fail'] ="재입력 해주세요";
})

?>
