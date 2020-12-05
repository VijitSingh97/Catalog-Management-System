<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="cataloguesystem.css">
</head>
<body>

  <ul>
    <li><a href="homepage.php">Home</a></li>
    <li><a href="about.html">About</a></li>
    <li><a class="active" href="login-page.php">Login</a></li>
    <li><a href="https://vxs8476.uta.cloud/Catalog-Management-System/profile.php">My Profile</a></li>
    <li><a href="http://vxs8476.uta.cloud">Blog</a></li>
  </ul>

  <br />
  <br />
  <br />
  <br />
  <br />
  
  <table>
    <thead>
        <tr>
            <th><h1>Register</h1></th>
            <th><h1>Login</h1></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border-right center-align">
              <form action="register.php" method="post"> 
                <input type="text" name="name" placeholder="Full Name (Letters and spaces only)" required pattern="^[A-Za-z -]+$"/> 
                <br/>
                <select name="major_id" id="major_id">
                  <option value="0">None</option>
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

                    $sql = "SELECT major_id, major_name FROM Majors";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<option value=\"" . $row["major_id"] . "\">" . $row["major_name"] . "</option>";
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                  ?>
                </select>
                <br />
                <input type="text" name="email" placeholder="Lowercase Email Address" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"/> 
                <br/>
                <input type="password" name="password" placeholder="Password" required pattern="^[^\n ]{8,10}$"/>
                <br/>
                <select name="user_type" id="user_id">
                  <option value="student">Student</option>
                  <option value="staff">Staff</option>
                  <option value="admin">Admin</option>
                </select>
                <br/>
                <input type="submit" name="submit" />
              </form>
            </td>
            <td class="center-align">
              <form action="login.php" method="post">
                <input type="text" name="email" placeholder="Lowercase Email Address" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"/> 
                <br/>
                <input type="password" name="password" placeholder="Password" required pattern="^[^\n ]{8,10}$"/>
                <br/>
                <input type="submit" name="submit" />
              </form>
            </td>
        </tr>
    </tbody>
  </table>

</body>
</html>