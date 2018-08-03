<?php

include_once("config.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $upsip =$_POST['upsip'];
    $bt=$_POST['bt'];
    $nextprobe=$_POST['nextprobe'];
    $status=$_POST['status'];
    $deviceip=$_POST['deviceip'];
    $dstatus=$_POST['dstatus'];    
    
    if(empty($upsip) || empty($bt) || empty($nextprobe) || empty($status) || empty($deviceip) || empty($dstatus)) {            
        if(empty($upsip)) {
            echo "<font color='red'>*** Please enter UPS IP  </font><br/>";
        }
        
        if(empty($bt)) {
            echo "<font color='red'>*** Please enter Battery Time</font><br/>";
        }
        
        if(empty($nextprobe)) {
            echo "<font color='red'>*** Please enter Next Probe Time</font><br/>";
        }  
	if(empty($status)) {
            echo "<font color='red'>*** Please enter UPS status</font><br/>";
        } 
	if(empty($deviceip)) {
            echo "<font color='red'>*** Please enter device ip</font><br/>";
        } 
	if(empty($dstatus)) {
            echo "<font color='red'>*** Please enter device status</font><br/>";
        
        }     
    } else {    
        
        $result = $db->exec("UPDATE info SET upsip='$upsip',bt='$bt',nextprobe='$nextprobe',status='$status',deviceip='$deviceip',dstatus='$dstatus' WHERE id=$id");
        
        
        header("Location: list.php");
    }
}
?>
<?php

$id = $_GET['id'];
 

$result = $db->query("SELECT * FROM info WHERE id=$id");
 
while($res = $result->fetch(PDO::FETCH_ASSOC))
{
    $upsip = $res['upsip'];
    $bt = $res['bt'];
    $nextprobe = $res['nextprobe'];
    $status = $res['status'];
    $deviceip = $res['deviceip'];
    $dstatus = $res['dstatus'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body background = "1.png">
    <a href="list.php">Go to List</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>UPS IP</td>
                <td><input type="text" name="upsip" value="<?php echo $upsip;?>"></td>
            
                <td>Battery Time</td>
                <td><input type="text" name="bt" value="<?php echo $bt;?>"></td>
            </tr>
            <tr> 
                <td>Next Probe Time</td>
                <td><input type="text" name="nextprobe" value="<?php echo $nextprobe;?>"></td>
             
                <td>UPS Status</td>
                <td><input type="text" name="status" value="<?php echo $status;?>"></td>
            </tr>
	    <tr> 
                <td>Device IP</td>
                <td><input type="text" name="deviceip" value="<?php echo $deviceip;?>"></td>
             
                <td>Device Status</td>
                <td><input type="text" name="dstatus" value="<?php echo $dstatus;?>"></td>
            </tr>
            <tr align ="right">
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
