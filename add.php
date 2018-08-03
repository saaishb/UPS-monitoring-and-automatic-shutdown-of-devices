<html>
<head>
    <title>Add Data</title>
</head>
 
<body background = "1.png">
<?php
include_once("config.php");
 
if(isset($_POST['Submit'])) {    
    $upsip =$_POST['upsip'];
    
    $deviceip=$_POST['deviceip'];
     
    
        
    if(empty($upsip) || empty($deviceip)) {            
        if(empty($upsip)) {
            echo "<font color='red'>*** Please enter UPS IP  </font><br/>";
        }
        
       
        
        
	if(empty($deviceip)) {
            echo "<font color='red'>*** Please enter device ip</font><br/>";
        } 
	
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        
        $result = $db->exec("INSERT INTO data(upsip,deviceip) VALUES('$upsip','$deviceip')");
	
	$command = escapeshellcmd('python shutdown.py');
	shell_exec($command);
	#echo "$output";        
       	
        echo "<font color='green'>Information of UPSs and Devices added Sucessfully.";
        echo "<br/><a href='list.php'>View list</a>";
    }
}

?>
</body>
</html>
