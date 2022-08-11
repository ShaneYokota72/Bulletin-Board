<?php 
  /*
    session_start():
    세션 아이디가 이미 존재하는지를 확인하고, 존재하지 않으면 새로운 아이디를 만든다.
    만약 이미 존재하는 세션 아이디가 있을 때는 원래 있던 세션 변수를 다시 불러와서 사용한다.
  */
  session_start();


  // 세션 변수에 특정한 값을 등록한다.
  $_SESSION["userName"] = "퍼스트코딩";

  echo "사용자이름: {$_SESSION['userName']} 세션 설정했습니다.<br>";
  echo "<a href=\"session_test.php\">테스트 페이지로 이동</a>";
?>