<?php
require_once("DBsettings.php");
if(!$conn) 
{
    echo"<p>Database connection failure</p>";
} 

//echo $_GET['password']; 
//echo "   ";
//echo $_GET['oldPassword'];
if(($_GET['password']==$_GET['oldPassword']) && $_GET['isDel']=="false"){
    
    $postNum = $_GET['postNum'];
    $writer = $_GET['writer'];
    $password = $_GET['password'];
    $pLocation = $_GET['pLocation'];
    $destination = $_GET['destination'];
    $pDate = $_GET['pDate'];
    $pTime = $_GET['pTime'];
    
    $query = "UPDATE post set writer = '$writer',
                              password = '$password',
                              pLocation = '$pLocation',
                              destination = '$destination',
                              pDate = '$pDate',
                              pTime = '$pTime'
                          where 
                              postNum = '$postNum'
                              ";
        
    

    $result = mysqli_query($conn,$query);
		if(!$result)
		{
			Echo" updating Data Failed Try Again";
			
		} else {
            header('Location: /finalProject\main.php');
        }

} elseif (($_GET['password']==$_GET['oldPassword']) && $_GET['isDel']=="true") {
    $postNum = $_GET['postNum'];

    $query = "DELETE from post where postNum = '$postNum'";
    $result = mysqli_query($conn,$query);

    if(!$result)
		{
			Echo" deleting Data Failed Try Again";
			
		} else {
            header('Location: /finalProject\main.php');
        }

} else {
    echo "<script>alert('비밀번호가 일치하지 않습니다');</script>";
    //$prevPage = $_SERVER['HTTP_REFERER'];
    echo "<a href={$_SERVER['HTTP_REFERER']}>돌아가기</a>&nbsp&nbsp&nbsp&nbsp";
    echo "<a href='/finalProject\main.php'>메인화면으로 돌아가기</a>";
    //echo $_GET['isDel'];
    //header('location:'.$_SERVER['HTTP_REFERER']);
}