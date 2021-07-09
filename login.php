<?php
    require_once 'db_con.php';

    $conn=mysqli_connect($hn,$un,$pw,$db);

    if(mysqli_connect_errno()) die(mysqli_connect_errno());
    
    if(isset($_POST['id'])) $id=$_POST['id'];
    if(isset($_POST['pw'])) $pw=$_POST['pw'];

    $query = "SELECT name FROM user WHERE id='$id' AND pw='$pw';";
    
    $result = mysqli_query($conn,$query);

    $row=mysqli_fetch_array($result,MYSQL_NUM);
    
    if($row[0]){
        session_start();
        $_SESSION['name']=$row[0];
        echo "HELLO $row[0]!<br>";
        echo "<html><body><a href='/practice/home.html'>Main page</a></body></html>";
    }else{
        echo "Failed login!<br>";
        echo "<html><body><a href='/practice/home.html'>Main page</a></body></html>";
    }
?>