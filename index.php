<?php
$servername = "bzhdzpjqttsvyimwfqfd-mysql.services.clever-cloud.com";
$username = "udwcs3yfmktugbzu";
$password = "4cGHXjHKY0gfcdFlcPdS";
$database = "bzhdzpjqttsvyimwfqfd";
$port = getenv('MYSQL_ADDON_PORT') ?: 3306;
$conn = new mysqli($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Building";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Database Table</title>

    
</head>
<body>
    <h2>Building Data</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Cost</th>
            <th>Meters</th>
            <th>Owner</th>
            <th>Address</th>
            
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['cost']}</td><td>{$row['meters']}</td><td>{$row['owner']}</td><td>{$row['address']}</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No data found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>