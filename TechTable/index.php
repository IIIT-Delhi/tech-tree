<!DOCTYPE html>
<html>
 <head>
  <title>IIITD|TechTable</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
    /* Styling for datatable */
  .box
  {
   max-width:600px;
   width:100%;
   margin: 0 auto;;
  }
  /* For padding above and below the header and footer respectively*/
  body{        
        padding-top: 0px;
        padding-bottom: 0px;
    }
  .header{
        width: 100%;
        background: #ffffff;
        padding: 10px 10px;
        color: #ffffff;
        top: 0;
    }
  .footer{
        width: 100%;
        background: #808080;
        padding: 10px 10px;
        color: #ffffff;
        bottom: 0;
    }
    
        
  </style>
 </head>
 <body>
  <div class="header">
        <div class="container">
                <a href="https://iiitd.ac.in/"><img src="IIITDLogo.jpg" alt="Home" align="left"></a>
                <img src = "cdt.png" alt="CourseDirectoryTable" width="250" height="125" align="right">
        </div>
    </div>

  <div class="container">
   <br />
   <h2 align="center">Course Table</h2>
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
       <th>Prerequisites</th>
       <th>Antirequisites</th>
       <th>Semester</th>
      </tr>
     </thead>
    </table>
   </div>

   <div class="footer">
        <div class="container">Copyright &copy; 2019 IIITD</div>        
    </div>
 </body>
</html>
<script>

$(document).ready(function(){
  // checks if the CSV file was loaded correctly
  
  $.ajax({
   url:"import.php",
   method:"POST",
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
     // using the data in json format to make the table.
     columns :  [
      { "targets": 0,
        data: "Course Name",
        "render": function (data, type, row, meta) {
        var cname=data.substring(0,data.indexOf("#"));
        var link=data.substring(data.indexOf("#")+1);
        return '<a href="'+link+'">'+cname+'</a>';}
          // Hyperlinking the course name with the drive link
      },
      { data : "Course Acronym" },
      { data : "Course Code" },
      { data : "Prerequisites"},
      { data : "Antirequisites"},
      { data : "Semester"}

     ]
    });
   }
  });
 
});

</script>