<?php
    require_once "db_con.php";

    $conn=mysqli_connect($hn,$un,$pw,$db);
    
    if(mysqli_connect_errno()) die(mysqli_connect_errno());

    if(isset($_POST['id'])) $id=$_POST['id'];
    if(isset($_POST['pw'])) $pw=$_POST['pw'];
    if(isset($_POST['name'])) $name=$_POST['name'];
//id,pw,name 값이 들어오지 않았을 경우도 구현해야함.


    $query="INSERT INTO user(id,pw,name) VALUES('$id','$pw','$name');";

    $result = mysqli_query($conn,$query);

    if($result!=false){
        echo "Successful sign up";
        echo "<html><body><a href='/practice/home.html'>Main page</a></body></html>";
    }else{
        echo "Failed sign up";
        echo "<html><body><a href='/practice/home.html'>Main page</a></body></html>";
    }

?>