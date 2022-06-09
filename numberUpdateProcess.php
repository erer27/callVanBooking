<?php
require_once("DBsettings.php");
$postNum = $_GET['name'];
$query = "SELECT * from post where postNum='$postNum'"; 
$result = mysqli_query($conn, $query); 
$row = mysqli_fetch_array($result);

$numberofPeople = $row['numberofPeople'];

if($numberofPeople<4){
    $numberofPeople++;
    $query = "UPDATE post set numberofPeople = '$numberofPeople'
                          where postNum = '$postNum'";
    $result = mysqli_query($conn, $query);

    if(!$result)
		{
			Echo "updating Data Failed Try Again    ";
            echo $numberofPeople   ;
            echo $query;
			
		} else {
            header('Location: /finalProject\main.php');
        }
}else { 
    echo "정원이 꽉 찼습니다. ";
    echo "<a href={$_SERVER['HTTP_REFERER']}>돌아가기</a>";
}


