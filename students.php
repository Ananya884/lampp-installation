<?php
$conn = new mysqli("localhost", "webuser", "YOUR_PASSWORD", "sampledb");
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = trim($_POST["name"]);
  $course = trim($_POST["course"]);
  if ($name != "" && $course != "") {
    $stmt = $conn->prepare("INSERT INTO students (name, course) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $course);
    $stmt->execute();
    $stmt->close();
  }
  header("Location: students.php");
  exit;
}

$result = $conn->query("SELECT id, name, course FROM students");
?>
<h1>Student List (from MariaDB)</h1>

<form method="post">
  Name: <input type="text" name="name" required>
  Course: <input type="text" name="course" required>
  <button type="submit">Add student</button>
</form>
<br>

<table border="1" cellpadding="6">
<tr><th>ID</th><th>Name</th><th>Course</th></tr>
<?php while ($row = $result->fetch_assoc()) { ?>
<tr>
  <td><?= $row['id'] ?></td>
  <td><?= htmlspecialchars($row['name']) ?></td>
  <td><?= htmlspecialchars($row['course']) ?></td>
</tr>
<?php } ?>
</table>
<?php $conn->close(); ?>
