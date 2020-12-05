<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../cataloguesystem.css">
</head>
<body>

    <ul>
        <li><a href="../homepage.php">Home</a></li>
        <li><a href="../about.html">About</a></li>
        <li><a href="../login-page.php">Login</a></li>
        <li><a href="../profile.php">My Profile</a></li>
    </ul>

    <div class="centered top">
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

            $sql = "SELECT major_name, major_description FROM Majors WHERE major_id=" . $_GET["id"];
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<h3>" . $row["major_name"] . "</h3>";
                    echo "<p>" . $row["major_description"] . "</p>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
        ?>

        <h3>Courses offered Semester</h3>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Course ID</th>
                        <th>Description</th>
                        <th>Semester</th> 
                        <th>Year</th>
                        <th>Seats Available</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
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

                        $sql = "SELECT `course_name`, `course_university_id`, `course_description`, `course_semester`, `course_year`, `capacity` FROM `Courses` LEFT JOIN `Major_Courses` ON `Major_Courses`.`course_id`=Courses.`course_id` WHERE `Major_Courses`.`major_id` = " . $_GET["id"];
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["course_name"] . "</td>";
                                echo "<td>" . $row["course_university_id"] . "</td>";
                                echo "<td>" . $row["course_description"] . "</td>";
                                echo "<td>" . $row["course_semester"] . "</td>";
                                echo "<td>" . $row["course_year"] . "</td>";
                                echo "<td>" . $row["capacity"] . "</td>";
                                echo "<td><button type=\"button\">Add</button><button type=\"button\">Drop</button></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                    ?>
                </tbody>
        </table>
      </div>
</body>
</html>