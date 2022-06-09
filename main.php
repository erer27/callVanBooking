<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>main</title>

    </head>
    <body>
        <div >
        <table border="1" id="table" >
            <tr>
                <td width="100px" align="center">&nbsp글쓴이</td>
                <td width="200px" align="center">&nbsp승차 예정 시각</td>
                <td width="400px" align="center">&nbsp승차지 · 목적지</td>
                <td align="center">&nbsp인원&nbsp</td>
            </tr>
            
            <?php
             require_once("DBsettings.php");
             $query = "SELECT * from post";
             $result = mysqli_query($conn, $query);
            while( $row = mysqli_fetch_array($result) ) {//table 행 생성하는 while문
                $time = new DateTime($row['pTime']);
                $stringTime = $time->format('H:i');
                echo "<tr name={$row['postNum']}>
                        <td align='center'><p>{$row['writer']}<p></td>

                        <td align='center'><p>{$row['pDate']}  {$stringTime}<p></td>
                        
                        <td onClick={location.href='postUpdate.php?name={$row['postNum']}'}><p>&nbsp승차지 : {$row['pLocation']}<p> <p>&nbsp목적지 : {$row['destination']}<p></td>

                        <td onClick={location.href='numberUpdateProcess.php?name={$row['postNum']}'}><p>&nbsp{$row['numberofPeople']}명&nbsp<p></td>

                        

                    <tr>";
                
            }
            //echo "<input type='button' value='글쓰기'>"
            ?>
        </table>
        <input type='button' value='글쓰기' onClick="location.href='postCreate.php'">
        </div>
        
                                   
                
        
    </body>
</html>


<?php
    
   
    
?>

