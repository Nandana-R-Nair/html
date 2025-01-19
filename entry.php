<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark Entry</title>
</head>
<body>
<h1>Welcome to Mark Entry</h1>
<form action="" method="post">
    <div class="contain">
        <table>
            <tr>
                <td><label>Select Student to Enter Marks: </label></td>
                <td>
                    <select name="opt" id="">
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "studentreg");
                        if ($con) {
                            $query = "SELECT ID FROM students";
                            $result = mysqli_query($con, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['ID'] . "'>" . $row['ID'] . "</option>";
                            }
                        } else {
                            echo "<option value=''>Connection Failed</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Enter Course Code:</label></td>
                <td><input type="text" name="course"></td>
            </tr>
            <tr>
                <td><label>Enter Internal Marks:</label></td>
                <td><input type="number" name="internal" max="40"></td>
            </tr>
            <tr>
                <td><label>Enter External Marks:</label></td>
                <td><input type="number" name="external" max="60"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="sub" value="Submit">
                </td>
            </tr>
        </table>
    </div>
</form>

<?php
if (isset($_POST['sub'])) {
    $course = $_POST['course'];
    $intern = $_POST['internal'];
    $extern = $_POST['external'];
    $id = $_POST['opt'] ?? null; // Validate 'opt' to avoid warnings
    if (!$id) {
        echo "<h4 style='color: red;'>Please select a student.</h4>";
        exit;
    }

    $tot = $intern + $extern;
    $grade = ($tot > 90) ? 'S' : (($tot > 80) ? 'A' : (($tot > 70) ? 'B' : (($tot > 60) ? 'C' : (($tot > 50) ? 'P' : 'F'))));

    $query1 = "SELECT * FROM marks WHERE id='$id' AND course_code='$course'";
    $result1 = mysqli_query($con, $query1);

    if (mysqli_num_rows($result1) > 0) {
        $entry = "UPDATE marks SET internal='$intern', external='$extern', total='$tot', grade='$grade' WHERE id='$id' AND course_code='$course'";
    } else {
        $entry = "INSERT INTO marks (id, course_code, internal, external, total, grade) VALUES ('$id', '$course', '$intern', '$extern', '$tot', '$grade')";
    }

    $enter = mysqli_query($con, $entry);
    if ($enter) {
        echo "<h4 style='color: green;'>Mark Entry Successful</h4>";
        echo "<a href='admin.php'><button>Back to Admin</button></a>";
    } else {
        echo "<h4 style='color: red;'>Failed: " . mysqli_error($con) . "</h4>";
    }
}
?>
</body>
</html>
