<html>
<title>webpage</title>
<body>
<h2> Participants database</h2> <BR><BR>


<?php
$servername = "{{ Vdbec2_ip }}";
$username = dbuser;
$password = dbuser123;
$dbname = "employeedb";

$ename = $_POST["empname"];
$dep = $_POST["department"];
$eid = $_POST["empid"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sqltable = "CREATE TABLE emptable (Name VARCHAR(30), Department VARCHAR(30), EmpID INT(10))";
$sqltableresult = $conn->query($sqltable);

$sqlrecord = "INSERT INTO emptable (Name, Department, EmpID)
VALUES ('$ename', '$dep', '$eid')";
$sqlrecordresult = $conn->query($sqlrecord);

$viewrecord = "SELECT Name, Department, EmpID FROM emptable";
$result = $conn->query($viewrecord);
echo "<table style=\"width:100%\" border= \"2px solid black\"><tr><th>Name</th><th>Department</th><th>Emp ID</th></tr>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['Name']. "</td><td>" . $row['Department']."</td><td>" . $row['EmpID']."</td></tr>";
    }
} else {
    echo "0 results";
}
echo "</table>";
$conn->close();
?>


<form align="right" action="index.html" method=POST>
<input type=submit value=Return>
</form>
</body>
</html>
