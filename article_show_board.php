<?php
    require_once 'db_con.php';
    $conn=mysqli_connect($hn,$un,$pw,$db);

    if(mysqli_connect_errno()) die(mysqli_connect_errno());
    if($_GET['no']) $no=$_GET['no'];
    else $no=0;

    $query="SELECT no,name,title,article,filename FROM test_table1 where no=$no";
    $result = mysqli_query($conn,$query);
    if(!$result) echo mysqli_error($conn);

    $row=mysqli_fetch_array($result,MYSQL_NUM);
    echo 'no:   '.$row[0].' ';
    echo 'name: '.$row[1].' ';
    echo 'title: '.$row[2].'<br>';
    echo 'article:  '.$row[3].'<br><br>';
    echo "<html><body><img src='uploads/$row[4]' onerror=this.style.display='none'; height=350></body></html><br>";
    echo "<html><body><a href='home.html'>메인 홈페이지로</a></body></html>";

    mysqli_close($conn);
?>