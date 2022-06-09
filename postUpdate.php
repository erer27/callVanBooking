<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Post Update</title>

        <?php 
        require_once("DBsettings.php");
        $name = $_GET['name'];
        $query = "SELECT * from post where postNum='$name'"; 
        $result = mysqli_query($conn, $query); 
        $row = mysqli_fetch_array($result);
        ?>

        
    </head>
    <body>
        

        <div style="display:grid; place-items:center; min-height:80vh">
        <form action="updateProcess.php" name="form">

            <p>
                <input type="hidden" id="isDel" name="isDel" value="false">
                <input type="hidden" name="postNum" value="<?php echo $row['postNum']?>">
                <input type="hidden" name="oldPassword" value="<?php echo $row['password']?>">
                <input type="text"  name="writer"  value="<?php echo $row['writer']?>" placeholder="이름" style="width: 60px" required="required"/>
                &nbsp&nbsp&nbsp<input type="text"  name="password"  placeholder="비밀번호" style="width: 60px" required="required"/>
            </p>
            <p>
                <input type="text"  name="pLocation" placeholder="승차지를 입력하세요" value="<?php echo $row['pLocation']?>" required="required"/>
            </p>
            <p>
                <input type="text"  name="destination" placeholder="목적지를 입력하세요" value="<?php echo $row['destination']?>" required="required"/>
            </p>
            <p>
                <div>승차 예정 날짜</div>
                <input type="date" name="pDate" id="pDate" value="<?php echo $row['pDate']?>" required="required"/>
            </p>

            <p>
                <div>승차 예정 시각</div>
                <input type="time" name="pTime" required="required" style="width: 100px" value="<?php echo $row['pTime']?>" required="required"/>
            </p>
                

            <p>
                <input type="submit" />  <input type="button" value="삭제" onClick="delBtn()" />
            </p>
            
            <script>
                function delBtn(){
                    document.getElementById("isDel").value = "true";
                    document.form.submit();
                }
            </script>
            
        </form>
        </div>
        
    </body>
</html>





