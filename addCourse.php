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

        $sql = "INSERT INTO `Courses` (`course_id`, `course_name`, `course_description`, `course_semester`, `course_year`, `course_university_id`, `capacity`) VALUES (NULL, '" . $_POST["name"] . "', '" . $_POST["description"] . "', '" . $_POST["semester"] . "', '" . $_POST["year"] . "', '" . $_POST["uid"] . "', '" . $_POST["capacity"] . "')";
        $conn->query($sql);
        if ($conn->affected_rows > 0) { 
            // output data of each row
            echo "<head>";
            echo "<meta http-equiv = \"refresh\" content = \"2; url = https://vxs8476.uta.cloud/Catalog-Management-System/profile.php/?id=" . $_GET["id"] . "\" />";
            echo "</head>";
            echo "<body onload=\"mymessage()\">";
            echo "<p>If not redirected, click </p>";
            echo "<a href=\"https://vxs8476.uta.cloud/Catalog-Management-System/profile.php/?id=" . $_GET["id"] . "\" >here</a>";
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