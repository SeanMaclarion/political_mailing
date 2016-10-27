<?php 
require ("connection.php");

$result = mysqli_query($conn,"SELECT * FROM newsletter");
echo "Results from newsletter:"."<br>"."<br>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>"."First Name: " . $row["firstname"]. "<br>". "Last Name: " . $row["lastname"]. "<br>". "Email: " . $row["email"]. "<br>". "Phone: " . $row["phone"];
    }
	echo "<br>";
} else {
    echo "0 results";
}

$conn->close();

?>