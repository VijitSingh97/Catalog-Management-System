<!DOCTYPE html>
<html>
    <?php
        if(!preg_match('/^[0-9]+$/', $_POST["major_id"])
            && !preg_match('/^[0-9]+$/', $_POST["name"])
            && !preg_match('/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/', $_POST["email"])
            && !preg_match('/^[^\n ]{8,10}$/', $_POST["password"])
            && !preg_match('/^student|staff|admin$/', $_POST["user_type"])) {
            // go home page
            echo "<head>";
            echo "<meta http-equiv = \"refresh\" content = \"2; url = https://vxs8476.uta.cloud/Catalog-Management-System/login-page.php\" />";
            echo "</head>";
            echo "<body onload=\"mymessage()\">";
            echo "<p>Please login</p>";
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

        $sql = "INSERT INTO `Users` (`user_id`, `major_id`, `name`, `email`, `password`, `user_type`) VALUES (NULL, '" . $_POST["major_id"] . "', '" . $_POST["name"] . "', '" . strtolower($_POST["email"]) . "', '" . $_POST["password"] . "', '" . $_POST["user_type"] . "')";
        $conn->query($sql);
        if ($conn->affected_rows > 0) { 
            $to = $_POST["email"];
            $subject = "Catalog Management System Registration Confirmation";
            
            $message = "Welcome to the CMS " . $_POST["name"] . ". Please login and explore what the CMS has to offer.";
            
            echo "<head>";
            echo "<script type=\"text/javascript\">function mymessage(){location.href = \"mailto:" . $to . "?subject=" . $subject . "&body=" . $message. "\";}</script>";
            echo "<meta http-equiv = \"refresh\" content = \"2; url = https://vxs8476.uta.cloud/Catalog-Management-System/login-page.php\" />";
            echo "</head>";
            echo "<body onload=\"mymessage()\">";
            echo "<p>User Created!<br />If not redirected, click </p><a href=\"https://vxs8476.uta.cloud/Catalog-Management-System/login-page.php\">here</a>";
            echo "</body>";
        } else {
            echo "<body>";
            echo "<p>Email already in use...</p>";
            echo "<a href=\"https://vxs8476.uta.cloud/Catalog-Management-System/login-page.php\">Try registration again...</a>";
            echo "<br />";
            echo "<a href=\"https://vxs8476.uta.cloud/Catalog-Management-System/homepage.php\">Go home...</a>";
            echo "</body>";
        }

        $conn->close();
    ?>
</html>