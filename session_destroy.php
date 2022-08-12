<?php 
  session_start();

  session_unset();   // 모든 세션 변수의 등록 해지
  session_destroy(); // 세션 아이디의 삭제

  echo "세션을 삭제했습니다.<br>";
  echo "<a href=\"session_test.php\">테스트 페이지로 이동</a>";
?>