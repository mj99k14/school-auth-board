<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
</head>
<body>
    <form method="POST" action="Register_process.php">
    <lable>이름:<input type ="text" name ="name"></lable><br>
    <lable>이메일:<input type="text" name ="email"></lable><br>
    <lable>비밀번호:<input type="password" name ="password"></lable><br>
    <button type="button" onclick="location.href='board.php'">확인</button>
    <button type="button" onclick="location.href='login.php'">뒤로가기</button>
</body>
</html>