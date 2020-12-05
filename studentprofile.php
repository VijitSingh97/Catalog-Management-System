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
        <li><a class="active" href="https://vxs8476.uta.cloud/Catalog-Management-System/profile.php">My Profile</a></li>
        <li><a href="http://vxs8476.uta.cloud">Blog</a></li>
    </ul>
    <div class="centered top">
    <?php
        echo "<h1>" . $_GET["name"] . "'s Student Panel</h1>";
    ?>
    <h2 class="border-top">Suggested Courses</h2>
    <table>
        <thead>
            <tr>
                <th class="left-align">Name</th>
                <th class="left-align">Course ID</th>
                <th class="center-align">Description</th>
                <th class="left-align">Semester</th> 
                <th class="left-align">Year</th>
                <th class="left-align">Seats Available</th>
                <th class="center-align">Options</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $server = "localhost:3306";
                $username = "vxs8476_cms";
                $password = "AgR3atPassword";
                $dbname = "vxs8476_blog";

                $current_semester = "Fall";
                $current_year = 2021;

                // Create connection
                $conn = new mysqli($server, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                } 

                $sql = "SELECT `major_id` FROM `Users` WHERE `user_id`=" . $_GET["id"];
                $result = $conn->query($sql);
                if ($result->num_rows > 0) { 
                    while($row = $result->fetch_assoc()) {
                        $courses_sql = "SELECT Courses.`course_id`, `course_name`,`course_university_id`,`course_description`,`course_semester`,`course_year`,`capacity` FROM `Courses` LEFT JOIN `Major_Courses` ON `Major_Courses`.`course_id`=Courses.`course_id` WHERE `course_semester`=\"" . $current_semester . "\" and `course_year`=" . $current_year . " and major_id=" . $row["major_id"];
                        $courses_result = $conn->query($courses_sql);
                        if ($courses_result->num_rows > 0) { 
                            while($courses_row = $courses_result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $courses_row["course_name"] . "</td>";
                                echo "<td>" . $courses_row["course_university_id"] . "</td>";
                                echo "<td>" . $courses_row["course_description"] . "</td>";
                                echo "<td>" . $courses_row["course_semester"] . "</td>";
                                echo "<td>" . $courses_row["course_year"] . "</td>";
                                echo "<td>" . $courses_row["capacity"] . "</td>";
                                echo "<td class=\"center-align\"><input type=\"button\" onclick=\"location.href='https://vxs8476.uta.cloud/Catalog-Management-System/addUserCourse.php/?userId=" . $_GET["id"] . "&courseId=" . $courses_row["course_id"] . "';\" value=\"Add\" /></td>";
                                echo "</tr>";
                            }
                        }
                        break;
                    }
                }
                $conn->close();
            ?>
        </tbody>
    </table>

    <h2 class="border-top">Added Courses</h2>
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

                $current_semester = "Fall";
                $current_year = 2021;

                // Create connection
                $conn = new mysqli($server, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                } 

                $sql = "SELECT `User_Courses`.`user_course_id`, Courses.`course_id`, `course_name`,`course_university_id`,`course_description`,`course_semester`,`course_year`,`capacity` FROM `Courses` LEFT JOIN `User_Courses` ON `User_Courses`.`course_id`=Courses.`course_id` WHERE `user_id`=" . $_GET["id"];
                $result = $conn->query($sql);
                if ($result->num_rows > 0) { 
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["course_name"] . "</td>";
                        echo "<td>" . $row["course_university_id"] . "</td>";
                        echo "<td>" . $row["course_description"] . "</td>";
                        echo "<td>" . $row["course_semester"] . "</td>";
                        echo "<td>" . $row["course_year"] . "</td>";
                        echo "<td>" . $row["capacity"] . "</td>";
                        echo "<td class=\"center-align\"><input type=\"button\" onclick=\"location.href='https://vxs8476.uta.cloud/Catalog-Management-System/deleteUserCourse.php/?userId=" . $_GET["id"] . "&deleteId=" . $row["user_course_id"] . "';\" value=\"Drop\" /></td>";
                        echo "</tr>";
                    }
                }
                $conn->close();
            ?>
        </tbody>
    </table>
    <br />
    <h3 class="border-top">
        Want to request a course not on your suggested list? Click below to send a request to your advisors:
    <h3>
    <a href="mailto:email@example.com?subject=Request%20a%20Classe&body=Can I request <WRITE UNIVERSITY COURSE ID HERE> be added as a course for me?"><button type="button">Request a Class</button></a>
</div>

</body>
</html>