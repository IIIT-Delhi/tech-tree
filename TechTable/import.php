<?php

//import.php


 $file_data = fopen("./sampleCourses.csv", 'r');
 fgetcsv($file_data);
 while($row = fgetcsv($file_data))
 {
  $data[] = array(
   'Course Name'  => $row[0],
   'Course Acronym'  => $row[1],
   'Course Code'  => $row[2],
   'Prerequisites'  => $row[3],
   'Antirequisites'  => $row[4],
   'Semester'  => $row[5]
  );
 }
 echo json_encode($data);


?>