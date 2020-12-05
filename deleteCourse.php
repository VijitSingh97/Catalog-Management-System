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

    $sql = "DELETE FROM `Courses` WHERE `Courses`.`course_id`=" . $_GET["deleteId"];
    $result = $conn->query($sql);

    if ($conn->affected_rows > 0) { 
        // output data of each row
        echo "<head>";
        echo "<meta http-equiv = \"refresh\" content = \"2; url = https://vxs8476.uta.cloud/Catalog-Management-System/profile.php/?id=" . $_GET["myId"] . "\" />";
        echo "</head>";
        echo "<body onload=\"mymessage()\">";
        echo "<p>If not redirected, click </p>";
        echo "<a href=\"https://vxs8476.uta.cloud/Catalog-Management-System/profile.php/?id=" . $_GET["myId"] . "\" >here</a>";
        echo "</body>";
    } else {
        // go home page
        echo "<head>";
        echo "<meta http-equiv = \"refresh\" content = \"2; url = https://vxs8476.uta.cloud/Catalog-Management-System/homepage.php\" />";
        echo "</head>";
        echo "<body onload=\"mymessage()\">";
        echo "<p>If not redirected, click </p>";
        echo "<a href=\"https://vxs8476.uta.cloud/Catalog-Management-System/homepage.php\" >here</a>";
        echo "</body>";
    }
    $conn->close();

?>
</html>