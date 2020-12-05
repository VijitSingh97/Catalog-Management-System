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

    <br />
    <br />

    <?php
        echo "<h1>" . $_GET["name"] . "'s Staff Panel</h1>";
    ?>
    <h2>This Semester's Courses</h2>
    <table class="left">
        <thead>
            <tr>
                <th class="left-align">Name</th>
                <th class="left-align">Course ID</th>
                <th class="center-align">Description</th>
                <th class="left-align">Semester</th> 
                <th class="left-align">Year</th>
                <th class="left-align">Total Seats</th>
                <th class="center-align">
                    <?php
                        echo "<input type=\"button\" onclick=\"location.href='https://vxs8476.uta.cloud/Catalog-Management-System/addCoursePage.php/?id=" . $_GET["id"] . "';\" value=\"Add Course\" />";
                    ?>
                </th>
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

                $sql = "SELECT `course_id`,`course_name`,`course_university_id`,`course_description`,`course_semester`,`course_year`,`capacity` FROM `Courses` WHERE `course_semester`=\"" . $current_semester . "\" and `course_year`=" . $current_year . " ORDER BY `course_university_id` ASC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) { 
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class=\"left-align\">" . $row["course_name"] . "</td>";
                        echo "<td class=\"left-align\">" . $row["course_university_id"] . "</td>";
                        echo "<td class=\"left-align\">" . $row["course_description"] . "</td>";
                        echo "<td class=\"left-align\">" . $row["course_semester"] . "</td>";
                        echo "<td class=\"left-align\">" . $row["course_year"] . "</td>";
                        echo "<td class=\"left-align\">" . $row["capacity"] . "</td>";
                        echo "<td class=\"center-align\"><input type=\"button\" onclick=\"location.href='https://vxs8476.uta.cloud/Catalog-Management-System/deleteCourse.php/?myId=" . $_GET["id"] . "&deleteId=" . $row["course_id"] . "';\" value=\"Delete Course\" /></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<td>";
                    echo "<p>An error has occurred</p>";
                    echo "<a href=\"https://vxs8476.uta.cloud/Catalog-Management-System/login-page.php\">Try Login Again</a>";
                    echo "<br />";
                    echo "<a href=\"https://vxs8476.uta.cloud/Catalog-Management-System/homepage.php\">Go Home</a>";
                    echo "</td>";
                    $conn->close();
                    exit();
                }
                $conn->close();
            ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td> 
                <td></td> 
                <td>
                    <?php
                        echo "<input type=\"button\" onclick=\"location.href='https://vxs8476.uta.cloud/Catalog-Management-System/addCoursePage.php/?id=" . $_GET["id"] . "';\" value=\"Add Course\" />";
                    ?>
                </td>
            </tr>
        </tbody>
    </table>

    <h2 class="border-top">Planned Courses</h2>
    <table class="left">
        <thead>
            <tr>
                <th class="left-align">Name</th>
                <th class="left-align">Course ID</th>
                <th class="center-align">Description</th>
                <th class="left-align">Semester</th> 
                <th class="left-align">Year</th>
                <th class="left-align">Total Seats</th>
                <th class="center-align">
                    <?php
                        echo "<input type=\"button\" onclick=\"location.href='https://vxs8476.uta.cloud/Catalog-Management-System/addCoursePage.php/?id=" . $_GET["id"] . "';\" value=\"Add Course\" />";
                    ?>
                </th>
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

                $sql = "SELECT `course_id`, `course_name`,`course_university_id`,`course_description`,`course_semester`,`course_year`,`capacity` FROM `Courses` WHERE (`course_semester` != \"" . $current_semester . "\" and `course_year` = " . $current_year . ") or `course_year` != " . $current_year . " ORDER BY `course_year` ASC, `course_semester` ASC, `course_university_id` ASC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) { 
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class=\"left-align\">" . $row["course_name"] . "</td>";
                        echo "<td class=\"left-align\">" . $row["course_university_id"] . "</td>";
                        echo "<td class=\"left-align\">" . $row["course_description"] . "</td>";
                        echo "<td class=\"left-align\">" . $row["course_semester"] . "</td>";
                        echo "<td class=\"left-align\">" . $row["course_year"] . "</td>";
                        echo "<td class=\"left-align\">" . $row["capacity"] . "</td>";
                        echo "<td class=\"center-align\"><input type=\"button\" onclick=\"location.href='https://vxs8476.uta.cloud/Catalog-Management-System/deleteCourse.php/?myId=" . $_GET["id"] . "&deleteId=" . $row["course_id"] . "';\" value=\"Delete Course\" /></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<td>";
                    echo "<p>An error has occurred</p>";
                    echo "<a href=\"https://vxs8476.uta.cloud/Catalog-Management-System/login-page.php\">Try Login Again</a>";
                    echo "<br />";
                    echo "<a href=\"https://vxs8476.uta.cloud/Catalog-Management-System/homepage.php\">Go Home</a>";
                    echo "</td>";
                    $conn->close();
                    exit();
                }
                $conn->close();
            ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td> 
                <td></td> 
                <td>
                    <?php
                        echo "<input type=\"button\" onclick=\"location.href='https://vxs8476.uta.cloud/Catalog-Management-System/addCoursePage.php/?id=" . $_GET["id"] . "';\" value=\"Add Course\" />";
                    ?>
                </td>
            </tr>
        </tbody>
    </table>

    <h2 class="border-top">Student Feedback</h2>
    <table class="right">
        <thead>
            <tr>
                <th class="left-align">Student</th>
                <th class="left-align">Student ID</th>
                <th class="left-align">Course ID</th>
                <th class="left-align">Semester</th> 
                <th class="left-align">Year</th>
                <th class="left-align">Status</th>
                <th class="center-align">Feedback</th>
                <th class="center-align">Option</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="left-align">Bob Johnson</td>
                <td class="left-align">3</td>
                <td class="left-align">CSE101</td>
                <td class="left-align">Fall</td> 
                <td class="left-align">2021</td>
                <td class="left-align">ADD</td>
                <td class="left-align">Hi Advisor, I wanted to add this course to my schedule. It looks like it would be very helpful to understanding programming. Thanks, Bob Swanson</td>
                <td class="center-align">
                    <button type="button">Respond</button>
                    <button type="button">History</button>
                </td> 
            </tr>
            <tr>
                <td class="left-align">Bob Johnson</td>
                <td class="left-align">3</td>
                <td class="left-align">MATH101</td>
                <td class="left-align">Fall</td> 
                <td class="left-align">2021</td>
                <td class="left-align">ADD</td>
                <td class="left-align">Hi Advisor, I wanted to add this course to my schedule. It looks like it would be very helpful to understanding calculus. Thanks, Bob Swanson</td>
                <td class="center-align">
                    <button type="button">Respond</button>
                    <button type="button">History</button>
                </td> 
            </tr>
        </tbody>
    </table>

</body>
</html>