<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="cataloguesystem.css">
</head>
<body>

    <ul>
        <li><a class="active" href="homepage.php">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="login-page.php">Login</a></li>
        <li><a href="https://vxs8476.uta.cloud/Catalog-Management-System/profile.php">My Profile</a></li>
        <li><a href="http://vxs8476.uta.cloud">Blog</a></li>
    </ul>

    <div class="centered top">
        <h1>
            Catalog Management System
        </h1>
        <h3>
            Explore our courses by Major!
        </h3>
        <table>
            <tr>
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

                    $sql = "SELECT major_id, major_name, major_description FROM Majors";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        $count = 0;
                        while($row = $result->fetch_assoc()) {
                            $count++;
                            echo "<td><div class=\"card\" style=\"width: 20rem;\"><div class=\"card-block\"><h3 class=\"card-title\">" . $row["major_name"] . "</h3>";
                            echo "<p class=\"card-text\">" . substr($row["major_description"], 0, 100) . "...</p>";
                            echo "<a href=\"major.php/?id=" . $row["major_id"] . "\" class=\"btn btn-primary\">See Courses</a></div></div></td>";

                            if($count == 3){
                                $count = 0;
                                echo "</tr><tr>";
                            }
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                ?>
            </tr>
        </table>
    </div>
</body>
</html>