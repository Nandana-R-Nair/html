<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();
$id = $_SESSION['qwe'];
$con = mysqli_connect("localhost", "root", "", "studentreg");
if ($con) {
    $query = "SELECT course_code, internal, external, total, grade FROM marks WHERE id='$id'";
    $result = mysqli_query($con, $query);
    if (!$result) {
        echo "fetching Details Failed";
    } else {
        $row = mysqli_fetch_assoc($result);
        $course = $row["course_code"];
        $int = $row["internal"];
        $ext = $row["external"];
        $Tot = $row["total"];
        $grad = $row["grade"];
        echo "<center><h1>Logged in as $id</h1></center>";
        echo "<h1>Welcome to ScoreCard</h1>";
        echo "<table border='1px'>";
        echo "<tr>";
        echo "<td align='center' colspan='2'>Your Marks</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Course Code</td>";
        echo "<td>$course</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Internal Marks</td>";
        echo "<td>$int</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>External Marks</td>";
        echo "<td>$ext</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Total Marks</td>";
        echo "<td>$Tot</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Grade</td>";
        echo "<td>$grad</td>";
        echo "</tr>";
        echo "</table>";
    }
    mysqli_close($con);
} else {
    echo "Connection to database failed.";
}
?>
</body>
</html>
