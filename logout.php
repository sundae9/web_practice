<?php
    require_once 'db_con.php';
    $conn=mysqli_connect($hn,$un,$pw,$db);

    if(mysqli_connect_errno()) die(mysqli_connect_errno());
    session_start();
    if(isset($_SESSION['name'])){
        echo "Bye!".$_SESSION['name'];
        session_destroy();
        echo "<html><body><a href='home.html'>메인 홈페이지로</a></body></html>";
    }else{
        echo "login please";
        echo "<html><body><a href='home.html'>메인 홈페이지로</a></body></html>";
    }
?>