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

        $sql = "INSERT INTO `User_Courses` (`user_course_id`, `user_id`, `course_id`, `status`) VALUES (NULL, '" . $_GET["userId"] . "', '" . $_GET["courseId"] . "', 'confirmed')";
        $conn->query($sql);
        if ($conn->affected_rows > 0) { 
            // output data of each row
            echo "<head>";
            echo "<meta http-equiv = \"refresh\" content = \"2; url = https://vxs8476.uta.cloud/Catalog-Management-System/profile.php/?id=" . $_GET["userId"] . "\" />";
            echo "</head>";
            echo "<body onload=\"mymessage()\">";
            echo "<p>If not redirected, click </p>";
            echo "<a href=\"https://vxs8476.uta.cloud/Catalog-Management-System/profile.php/?id=" . $_GET["userId"] . "\" >here</a>";
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