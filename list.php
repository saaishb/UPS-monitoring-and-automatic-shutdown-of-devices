<?php

include_once("config.php");
 

$result = $db->query("SELECT * FROM info ORDER BY id"); 
?>
 
<html>
<head>    
    <title>Main Page</title>
</head>
 
<body
    background = "1.png">
    
    <h1>List of all UPSs and DEVICES Information</h1>
    <table width='100%' border=10>
        <tr bgcolor = 'yellow' >
            <th style = "color:red;">Ups ip</th>
            <th style = "color:red;">Battery Time</th>
	    <th style = "color:red;">Next Probe Time</th>
	    <th style = "color:red;">UPS Status</th>
	    <th style = "color:blue;">Device ip</th>
	    <th style = "color:blue;">Device status</th>
            <th style = "color:green;">Options</th>
        </tr>
        <?php 
         
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {         
            echo "<tr>";
            echo "<td>".$row['upsip']."</td>";
            echo "<td>".$row['bt']."</td>";
            echo "<td>".$row['nextprobe']."</td>";
	    echo "<td>".$row['status']."</td>";
	    echo "<td>".$row['deviceip']."</td>";
	    echo "<td>".$row['dstatus']."</td>";  
            echo "<td><a href=\"edit.php?id=$row[id]\"><button  type=\"button\">EDIT</button></a><a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Delete this information?')\"><button  type=\"button\">DELETE</button></a></td>";  
	    
        }
        ?>
    </table>
	<a href="add.html"><button  type="button">Add new information of UPS and DEVICE</button></a><br/><br/>
</body>
</html>
