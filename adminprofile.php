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
    <div class="centered top">
        <?php
            echo "<h1>" . $_GET["name"] . "'s Admin Panel</h1>";
        ?>

        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Major</th>
                    <th>Email</th>
                    <th>Role</th>
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

                    $sql = "SELECT `user_id`,`name`,`major_id`,`email`,`user_type` FROM `Users` ORDER BY `user_type` ASC";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) { 
                        while($row = $result->fetch_assoc()) {
                            $major_sql = "SELECT `major_name` FROM `Majors` WHERE `major_id`=" . $row["major_id"];
                            $major_result = $conn->query($major_sql);
                            if ($major_result->num_rows > 0) { 
                                while($major_row = $major_result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["user_id"] . "</td>";
                                    echo "<td>" . $row["name"] . "</td>";
                                    echo "<td>" . $major_row["major_name"] . "</td>";
                                    echo "<td>" . $row["email"] . "</td>";
                                    echo "<td>" . $row["user_type"] . "</td>";
                                    echo "<td><input type=\"button\" onclick=\"location.href='https://vxs8476.uta.cloud/Catalog-Management-System/deleteUser.php/?myId=" . $_GET["id"] . "&deleteId=" . $row["user_id"] . "';\" value=\"Delete User\" /></td>";
                                    echo "</tr>";
                                    break;
                                }
                            }   else {
                                echo "<tr>";
                                echo "<td>" . $row["user_id"] . "</td>";
                                echo "<td>" . $row["name"] . "</td>";
                                echo "<td>N/A</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["user_type"] . "</td>";
                                echo "<td><input type=\"button\" onclick=\"location.href='https://vxs8476.uta.cloud/Catalog-Management-System/deleteUser.php/?myId=" . $_GET["id"] . "&deleteId=" . $row["user_id"] . "';\" value=\"Delete User\" /></td>";
                                echo "</tr>";
                            }
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
            </tbody>
        </table>
    </div>


</body>
</html>