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
  <br />
  <br />
  <br />
  <td class="border-right center-align">
      <?php
        echo "<form action=\"../addCourse.php/?id=" . $_GET["id"] . "\" method=\"post\">";
      ?>
      <input type="text" name="name" placeholder="Full Course Name" required pattern="[a-zA-Z]+"/> 
      <br/>
      <input type="text" name="uid" placeholder="Course University ID" required pattern="^\d{3,4}[a-zA-Z]{3}$"/> 
      <br/>
      <input type="text" name="description" placeholder="Course Description" required pattern="^[a-zA-Z0-9,.!? ]{,500}$"/> 
      <br/>
      <select name="semester" id="semester">
        <option value="Fall">Fall</option>
        <option value="Spring">Spring</option>
      </select>
      <br/>
      <select name="year" id="year">
        <option value="2021">2021</option>
        <option value="2022">2022</option>
        <option value="2023">2023</option>
        <option value="2024">2024</option>
      </select>
      <br />
      <input type="text" name="capacity" placeholder="Course Capacity" maxlength="3" /> 
      <br/>
      <input type="submit" name="submit" />
    </form>
  </td>

</body>
</html>