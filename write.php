<?php
    require_once 'db_con.php';
    
    $conn = mysqli_connect($hn,$un,$pw,$db);

    if(mysqli_connect_errno()) die(mysqli_connect_error());

    session_start();
    if(!isset($_SESSION['name'])){
        echo "login please";
        echo "<html><body><a href='/practice/home.html'>Main page</a></body></html>";
    }else{
        if(isset($_POST['name'])) $name = $_POST['name'];
        else $name = "(NOT entered)";
        
        if(isset($_POST['title'])) $title=$_POST['title'];
        else $title = "(NOT entered)";

        if(isset($_POST['article'])) $article=$_POST['article'];
        else $article="(NOT entered)";

        if(isset($_FILES['file'])){
            $uploaddir='./uploads/';
            $uploadfile=$uploaddir.basename($_FILES['file']['name']);

            if(move_uploaded_file($_FILES['file']['tmp_name'],$uploadfile)){
                $filename=$_FILES['file']['name'];
            }
        }
        if(isset($filename)){
                $query="INSERT INTO test_table1(name, title, article,filename) VALUES('$name','$title','$article','$filename');";
        }else{
            $query="INSERT INTO test_table1(name, title, article) VALUES('$name','$title','$article');";
        }

        $result = mysqli_query($conn,$query);

        if($result==false){
            echo mysqli_error($conn);
        }else{
            echo "<html><body><a href='/practice/home.html'>Main page</a></body></html>";
        }
    }

?>