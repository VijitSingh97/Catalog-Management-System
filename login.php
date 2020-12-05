<!DOCTYPE html>
<html>
    <?php
        if(!preg_match('/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/', $_POST["email"])
            && !preg_match('/^[^\n ]{8,10}$/', $_POST["password"])) {
            // go home page
            echo "<head>";
            echo "<meta http-equiv = \"refresh\" content = \"2; url = https://vxs8476.uta.cloud/Catalog-Management-System/login-page.php\" />";
            echo "</head>";
            echo "<body onload=\"mymessage()\">";
            echo "<p>Bad login details</p>";
            echo "<a href=\"https://vxs8476.uta.cloud/Catalog-Management-System/login-page.php\" >here</a>";
            echo "</body>";
            exit();
        }

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

        $sql = "SELECT `user_id`, `password` FROM `Users` WHERE email='" . $_POST["email"] ."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) { 
            while($row = $result->fetch_assoc()) {
                if($row["password"] == $_POST["password"]) {
                    echo "<head>";
                    echo "<meta http-equiv = \"refresh\" content = \"2; url = https://vxs8476.uta.cloud/Catalog-Management-System/profile.php/?id=" . $row["user_id"] .  "\" />";
                    echo "</head>";
                    echo "<body onload=\"mymessage()\">";
                    echo "<p>If not redirected, click </p>";
                    echo "<a href=\"https://vxs8476.uta.cloud/Catalog-Management-System/profile.php/?id=" . $row["user_id"] .  "\">here</a>";
                    echo "</body>";
                } else {
                    echo "<head>";
                    echo "</head>";
                    echo "<body>";
                    echo "<p>Bad Username or password</p>";
                    echo "<a href=\"https://vxs8476.uta.cloud/Catalog-Management-System/login-page.php\">Try Login Again</a>";
                    echo "<br />";
                    echo "<a href=\"https://vxs8476.uta.cloud/Catalog-Management-System/homepage.php\">Go Home</a>";
                    echo "</body>";
                }
            }
        } else {
            echo "<head>";
            echo "</head>";
            echo "<body>";
            echo "<p>Bad Username or password</p>";
            echo "<a href=\"https://vxs8476.uta.cloud/Catalog-Management-System/login-page.php\">Try Login Again</a>";
            echo "<br />";
            echo "<a href=\"https://vxs8476.uta.cloud/Catalog-Management-System/homepage.php\">Go Home</a>";
            echo "</body>";
        }
        $conn->close();
    ?>
</html>