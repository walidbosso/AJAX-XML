<html>
<head>
<script>
function StudentData(str) {
    if (str == "") {
        document.getElementById("Hint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("Hint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","dbcon.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>


<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, fname, lname FROM students ORDER BY fname";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row	
	echo '<select name="users" onchange="StudentData(this.value)">';
	echo "<option value='0'>Select Name</option>";
    while($row = $result->fetch_assoc()) {
    echo "<option value='" . $row['id'] . "'>" . $row['fname']. " " . $row['lname']. "</option>";
  
    }
    echo "</select>";
	
} else {
    
	echo "0 results";
}
$conn->close();

?>


<br><br>
<div id="Hint"><b>Table Data will be Displayed here</b></div>

</body>
</html>