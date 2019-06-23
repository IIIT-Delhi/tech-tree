<?php

//import.php

if(!empty($_FILES['csv_file']['name']))
{
 $file_data = fopen($_FILES['csv_file']['name'], 'r');
 fgetcsv($file_data);
 while($row = fgetcsv($file_data))
 {
  $data[] = array(
   'Course Name'  => $row[0],
   'Acronym'  => $row[1],
   'Unique ID'  => $row[2],
   'Pre-requisite (Mandatory)'  => $row[3],
   'Pre-requisite (Desirable)'  => $row[4]
  );
 }
 echo json_encode($data);
}

?>
