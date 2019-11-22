<?php
  if (isset($_POST["grade"]) && isset($_POST["student"]))
  {
    //Writting to the file
    $grade=$_POST["grade"];
    $student=$_POST["student"];

    $result_line = $_SERVER['REMOTE_ADDR']." - ".date("D M d, Y G:i")." - ".$student.": ".$grade."\n";

    file_put_contents("files/".$student.".log", $result_line , FILE_APPEND | LOCK_EX);

    //Writting to the database
    $conn = new mysqli("sql-service", "root", "devops", "homeworks");

    if ($conn->connect_error) {
      die("ERROR: Unable to connect: " . $conn->connect_error);
    }

    echo 'Connected to the database.<br>';

    $query="INSERT INTO grades(student,grade) VALUES ('$student','$grade')";
    echo $query."<br>";

    if ($conn->query($query)) {
        echo "Inserted into the database";
    } else {
        echo "Error inserting into the database: " . mysqli_error($conn);
    }

    $conn->close();
  }


  echo "<form action=\"/\" method=\"POST\">Student: <input type=\"text\" name=\"student\"><br>Grade: <input type=\"text\" name=\"grade\"><input type=\"submit\" value=\"Submit\"></form>"

?>

