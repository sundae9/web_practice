<?php
    require_once 'db_con.php';
    $conn=mysqli_connect($hn,$un,$pw,$db);

    if(mysqli_connect_errno()) die(mysqli_connect_errno());
    
    $query="SELECT no,name,title FROM test_table1";
    $result = mysqli_query($conn,$query);
    if(!$result) echo mysqli_error($conn);

    $rows=mysqli_num_rows($result);

    for($j=0;$j<$rows;++$j){
        $row=mysqli_fetch_array($result,MYSQL_NUM);

        echo "
            <html>
            <body>
                <a href = '/practice/article_show_board.php?no=".$row[0]."'>no: ".$row[0]." name: ".$row[1]." title: ".$row[2]."<br></a>
            </body>
            </html>
        ";
    }

    mysqli_close($conn);
?>