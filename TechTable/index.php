<?php

//index.php

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Import CSV File into Jquery Datatables using PHP Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
  .box
  {
   max-width:600px;
   width:100%;
   margin: 0 auto;;
  }
  </style>
 </head>
 <body>
  <div class="container">
   <br />
   <h3 align="center">TechTable</h3>
   <br />
   <div style="clear:both"></div>
   </form>
   <div class="table-responsive">
    <table class="table table-striped table-bordered" id="data-table">
     <thead>
      <tr>
       <th>Course Name</th>
       <th>Course Acronym</th>
       <th>Course Code</th>
       <th>Mandatory Prerequisites</th>
       <th>Desirable Prerequisite</th>
      </tr>
     </thead>
    </table>
   </div>
 </body>
</html>

<script>

$(document).ready(function(){
  event.preventDefault();
  $.ajax({
   url:"import.php",
   method:"POST",
   data:new FormData(this),
   dataType:'json',
   contentType:false,
   cache:false,
   processData:false,
   success:function(jsonData)
   {
    $('#csv_file').val('');
    $('#data-table').DataTable({
     "paging": false,
     
     data  :  jsonData,
     columns :  [
      { data : "Course Name" },
      { data : "Acronym" },
      { data : "Unique ID" },
      { data : "Pre-requisite (Mandatory)"},
      { data : "Pre-requisite (Desirable)"}
     ]
    });
   }
  });
 
});

</script>