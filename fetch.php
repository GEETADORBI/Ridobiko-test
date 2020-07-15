<?php
$index=1;
if(isset($_POST['submit']))
{
$Cityname=$_POST['Cityname'];
$Type=$_POST['Type'];


if (!empty($Cityname)||!empty($Type))
 {
 $host = "localhost";
 $dbusername="root";
 $dbpassword="";
 $dbname="rido";  

 $conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
 if (mysqli_connect_error()){
    die('connect error('.mysqli_connect_error().')'.mysqli_connect_error());
    echo "error";
}

else
{
  
     $sql = "SELECT * from `motors` where `Cityname`='".$Cityname."' and `Type`='".$Type."' "  ;
   
    if ($result = mysqli_query($conn, $sql)) {
       
       
        while ($row = mysqli_fetch_array($result)) {
          ?>
          <html>
            
            <body>
          <?php          
         echo '<img src="data:image;base64,'.base64_encode($row['image']). '" alt="Image" style="width:300px; height:200px; margin-left:40px;" >';
        ?>
        <div style="width:200px; margin-top:-110px;margin-left:800px;">
      
         <b> TYPE: </b><?php echo $row['Type'];
         echo "<br>";
        ?>
        <b>RENT/DAY: </b><?php echo $row['Rentperday'];
        echo "<br>" ?>
        <b>DEPOSIT: </b><?php echo $row['Deposit']; 
        echo "<br>" ?>
        <b>VEHICLE TYPE: </b><?php echo $row['vehicletype']; 
        echo "<br>" ?>
        <b>VEHICLE NAME: </b><?php echo $row['Vehiclename']; ?>
          <br>
          <br>
          <br>
          <br>
        </div>
        </body>
        </html>
         <?php  
       
         
         echo "<br>";
        }
      }
        mysqli_free_result($result);
       
      }
    
    }

      mysqli_close($conn);
   
}

?>
 