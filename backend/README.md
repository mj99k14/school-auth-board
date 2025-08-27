# PHP Backend 강의자료 및 실습 안내

본 리포지토리는 **글로벌시스템융합과 PHP 백엔드 강의**를 위한 자료 저장소입니다.  
PDF 강의자료 다운로드와 실습 예제를 위한 브랜치 안내는 아래 내용을 참고하세요.

---

## 강의자료 다운로드 (PDF)

| 챕터 | 주제          | 자료                                                                                           |
|----|-------------|----------------------------------------------------------------------------------------------|
| 📌 | 백엔드 개요      | [📄 Backend in Web Application.pdf](./docs/Backend%20in%20Web%20Application.pdf)             |
| 1  | PHP 기본 문법   | [📄 PHP-Tag Comments Variable.pdf](./docs/PHP-Tag%20Comments%20Variable.pdf)                 |
| 2  | 연산자, 제어문, 함수 | [📄 PHP-Operator FlowControl Function.pdf](./docs/PHP-Operator%20FlowControl%20Function.pdf) |
| 3  | 쿠키/세션       | [📄 PHP-Cookie Session.pdf](./docs/PHP-Cookie%20Session.pdf)                                 |
| 4  | DB 연동 (MySQLi) | [📄 PHP-DB MySQLi.pdf](./docs/PHP-DB%20MySQLi.pdf)                                           |
| 5  | 로그인 실습      | [📄 PHP-Lab_Login.pdf](./docs/PHP-Lab_Login.pdf)                                             |
| 6  | 게시판 실습      | [📄 PHP-Lab_Board.pdf](./docs/PHP-Lab_Board.pdf)                                             |
---

## 실습 예제 코드 브랜치 안내

| 실습 주제 | 브랜치명                                                                             | 설명                         |
|-----|----------------------------------------------------------------------------------|----------------------------|
| 로그인/회원가입 | [`lab-login-default`](https://github.com/gsc-lab/backend/tree/lab-login-default) | session + mysqli 기반 로그인 실습 |
| 게시판 | [`lab-board-default`](https://github.com/gsc-lab/backend/tree/lab-board-default) | 기본 게시판(로그인 X)              |
👉 추후 실습별로 브랜치가 추가될 예정이며, 각 브랜치에는 실습 전용 코드만 포함되어 있습니다.

---

## 📢 강의자료 업데이트 알림 받기

1. 오른쪽 상단의 `Watch` 버튼 클릭
2. `Custom` > `Releases only` 선택
3. 새 버전이 릴리즈되면 GitHub에서 자동 알림 수신

또는 Discussions 탭 공지 확인.

---

## 개발 환경

- Docker 기반 PHP + MySQL + Nginx 환경 구성
- 환경 설정: [`docker/`](./docker), [`docker-compose.yml`](./docker-compose.yml)

자세한 내용은 PDF 강의자료 내 "Backend 개발 환경 구성" 참고
