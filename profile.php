<!DOCTYPE html>
<html>
<?php 

    

    $server = "localhost:3306";
    $username = "vxs8476_cms";
    $password = "AgR3atPassword";
    $dbname = "vxs8476_blog";

    // Create connection
    $conn = new mysqli($server, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT `name`, `user_type` FROM `Users` WHERE `user_id`=" . $_GET["id"];
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            // go to page based on user_type
            if ($row["user_type"] == "student") {
                echo "<head>";
                echo "<meta http-equiv = \"refresh\" content = \"2; url = https://vxs8476.uta.cloud/Catalog-Management-System/studentprofile.php/?id=" . $_GET["id"] . "&name=" . $row["name"] . "\" />";
                echo "</head>";
                echo "<body onload=\"mymessage()\">";
                echo "<p>If not redirected, click </p>";
                echo "<a href=\"https://vxs8476.uta.cloud/Catalog-Management-System/studentprofile.php/?id=" . $_GET["id"] . "&name=" . $row["name"] . "\" >here</a>";
                echo "</body>";
            } else if ($row["user_type"] == "staff") {
                echo "<head>";
                echo "<meta http-equiv = \"refresh\" content = \"2; url = https://vxs8476.uta.cloud/Catalog-Management-System/staffprofile.php/?id=" . $_GET["id"] . "&name=" . $row["name"] . "\" />";
                echo "</head>";
                echo "<body onload=\"mymessage()\">";
                echo "<p>If not redirected, click </p>";
                echo "<a href=\"https://vxs8476.uta.cloud/Catalog-Management-System/studentprofile.php/?id=" . $_GET["id"] . "\" >here</a>";
                echo "</body>";
            } else if ($row["user_type"] == "admin") {
                echo "<head>";
                echo "<meta http-equiv = \"refresh\" content = \"2; url = https://vxs8476.uta.cloud/Catalog-Management-System/adminprofile.php/?id=" . $_GET["id"] . "&name=" . $row["name"] . "\" />";
                echo "</head>";
                echo "<body onload=\"mymessage()\">";
                echo "<p>If not redirected, click </p>";
                echo "<a href=\"https://vxs8476.uta.cloud/Catalog-Management-System/studentprofile.php/?id=" . $_GET["id"] . "&name=" . $row["name"] . "\" >here</a>";
                echo "</body>";
            } else {
                echo "<head>";
                echo "<meta http-equiv = \"refresh\" content = \"2; url = https://vxs8476.uta.cloud/Catalog-Management-System/homepage.php\" />";
                echo "</head>";
                echo "<body onload=\"mymessage()\">";
                echo "<p>If not redirected, click </p>";
                echo "<a href=\"https://vxs8476.uta.cloud/Catalog-Management-System/homepage.php\" >here</a>";
                echo "</body>";
            }
            break;
        }
    } else {
        // go home page
        echo "<head>";
        echo "<meta http-equiv = \"refresh\" content = \"2; url = https://vxs8476.uta.cloud/Catalog-Management-System/login-page.php\" />";
        echo "</head>";
        echo "<body onload=\"mymessage()\">";
        echo "<p>Please login</p>";
        echo "<a href=\"https://vxs8476.uta.cloud/Catalog-Management-System/login-page.php\" >here</a>";
        echo "</body>";
    }
    $conn->close();

?>
</html>