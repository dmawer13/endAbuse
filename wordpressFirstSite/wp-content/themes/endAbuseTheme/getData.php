<?php 

// This is just an example of reading server side data and sending it to the client.
// It reads a json formatted text file and outputs it.

//$string = file_get_contents("sampleData.json");
//echo $string;

// Instead you can query your database and parse into JSON etc etc

$servername="localhost" ; 
    $username="root" ; 
    $password="root" ; 
    $dbname="CSV_DB" ; 
    
    
    // Create connection 
    $conn = new mysqli($servername, $username, $password, $dbname); 
    
    // Check connection 
    if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); } 
    
    //this is my query put into the $sql variable
    $sql = "SELECT ID, Organization, Title FROM TBL_NAME"; 
    $result = $conn->query($sql); 
    
    if ($result->num_rows > 0) { 
        echo 
            "<table>
        <tr>
            <th>ID</th>
            <th>Title</th>
        </tr>"; 
        // output data of each row 
        while($row = $result->fetch_assoc()) { echo "
        <tr>
            <td>".$row["ID"]."</td>
            <td>".$row["Organization"]." ".$row["Title"]."</td>
        </tr>"; } echo "</table>"; } else { echo "0 results"; } $conn->close(); 


?>