<?php

//import.php

/* Loads the csv file and parses it to form arrays. Returns json to index.php*/
 $file_data = fopen("./sampleCourses.csv", 'r');
 fgetcsv($file_data);
 while($row = fgetcsv($file_data))
 {
  $data[] = array(
   'Course Name'  => $row[0].'#'.$row[9],
   // adds a '#' in between the Course Name and Link, and parses them together
   'Course Acronym'  => $row[1],
   'Course Code'  => $row[2],
   'Prerequisites'  => $row[3],
   'Antirequisites'  => $row[4],
   'Semester'  => $row[5],
   'link'  => $row[9]
  );
 }
 echo json_encode($data);


?>