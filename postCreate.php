<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Post Create</title>
        
    </head>
    <body>
        <div style="display:grid; place-items:center; min-height:80vh">
        <form >
            <p>
                <input type="text"  name="writer"  value="익명" placeholder="이름" style="width: 60px" required="required"/>
                &nbsp&nbsp&nbsp<input type="text"  name="password"  placeholder="비밀번호" style="width: 60px" required="required"/>
            </p>
            <p>
                <input type="text"  name="pLocation" placeholder="승차지를 입력하세요" required="required"/>
            </p>
            <p>
                <input type="text"  name="destination" placeholder="목적지를 입력하세요" required="required"/>
            </p>
            <p>
                <div>승차 예정 날짜</div>
                <input type="date" name="pDate" id="pDate" required="required"/>
            </p>

            <p>
                <div>승차 예정 시각</div>
                <input type="time" name="pTime" required="required" style="width: 100px"/>
            </p>
                

            <p>
                <input type="submit" />  
            </p>
            
            
        </form>
        </div>
    </body>
</html>

<?php
//session_start();
require_once("DBsettings.php");

if(!$conn) 
{
    echo"<p>Database connection failure</p>";
} 
if(isset($_GET['writer']) && isset($_GET['password']) && isset($_GET['pLocation']) && isset($_GET['destination']) && isset($_GET['pDate']) && isset($_GET['pTime'])){
    $postNum = uniqid();
    $writer = $_GET['writer'];
    $password = $_GET['password'];
    $pLocation = $_GET['pLocation'];
    $destination = $_GET['destination'];
    $pDate = $_GET['pDate'];
    $pTime = $_GET['pTime'];
    $numberofPeople = 1;
    
    $query = "insert into post (
                postNum,
                writer,
                password,
                pLocation,
                destination,
                pDate,
                pTime,
                numberofPeople
            ) VALUES (
                '$postNum',
                '$writer',
                '$password',
                '$pLocation',
                '$destination',
                '$pDate',
                '$pTime',
                '$numberofPeople'
            )";
        
    

    $result = mysqli_query($conn,$query);
		if(!$result)
		{
			Echo" Inserting Data Failed Try Again";
			
		}
    header('Location: /finalProject\main.php');
}


?>