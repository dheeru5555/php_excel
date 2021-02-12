<?php
   $connect = mysqli_connect("localhost","root","","php_excel");
   $query = "SELECT * FROM excel_data";
   $statement = mysqli_query($connect,$query);
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Mysql Data to Excel</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   </head>
   <body>
      <div class="row">
         <div class="col-sm-12">
            <h6 class="text-center  ml-4 mb-1">View Records (Scroll Down to see all Records)</h6>
            <table class="table mb-5">
            <!-- <button   class="btn btn-success convert" id="btnHide">Convert</button> -->
            <input type="submit" name="convert"  id="convert" class="btn btn-success" value="Download as excel sheet"> 
            <form method="POST" id="convert_form" action="export.php">
               <table class="table table-striped table-bordered">
                  <tr>
                     <th>No</th>
                     <th>First Name</th>
                     <th>Last Name</th>
                     <th>Email</th>
                     <th>Birthdate</th>
                     <th>Record Added</th>
                     <div class="pp">
                        <div class="progress-bar"></div>
                     </div>
                  </tr>
                  <tbody id="table_content">
                     <?php
                        foreach($statement as $row)
                        {
                          echo '
                          <tr>
                            <td>'.$row["id"].'</td>
                            <td>'.$row["first_name"].'</td>
                            <td>'.$row["last_name"].'</td>
                            <td>'.$row["email"].'</td>
                            <td>'.$row["birthdate"].'</td>
                            <td>'.$row["added"].'</td>
                          </tr>
                          ';
                        }
                        ?>
                  </tbody>
               </table>
               <input type="hidden" name="file_content" id="file_content" />
            </form>
            <br />
            <br />
         </div>
      </div>
      </div>
   </body>
</html>
<script>
   $(document).ready(function() {
     $("#convert").on("click", function() {
        $(".result").text("");
         $(".loading-icon").removeClass("hide");
         $(".data-load").hide();
         $(".button").attr("disabled", true);
         $(".btn-txt").text("Fetching Data from Mysql Database...");    

         window.location.href = 'export.php';
         $('#excelsheet').hide();
         $('#loadExcel').html('<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>  <div class="alert alert-success mt-5" id="alertMsg1" role="alert">  <h6 class="text-center mt-2"><i class="loading-icon fa fa-spinner fa-spin hide"></i> <span class="loading-icon text-center hide">100,000 Records are Loading.... </br>(Wait for few Seocnds)</span></h6> <p class="text-center font-weight-bold " id="finish"> Excel Sheet is Laoding ...</br> (Wait for few Seconds)</p> </div>')
         .delay( 18800 ).fadeOut('#finish');
         $('#downloaded').html('<h4 class="text-center">Thanks For Downloading</h4>');
     });
   });
</script>