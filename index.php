<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="X-UA-Compatible" content="ie=edge" />
      <title>Load Mysql TO Excel</title>
      <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <style>
         .button {
         background-color: #008cba; /* Green */
         border: none;
         color: white;
         padding: 15px 32px;
         text-align: center;
         text-decoration: none;
         display: inline-block;
         font-size: 16px;
         margin: 4px 2px;
         cursor: pointer;
         }
         .button:disabled {
         opacity: 0.5;
         }
         .hide {
         display: none;
         }
      </style>
   </head>
   <body>
      <div class="container">
         <h4 id="excelsheet" class="text-center mt-5">
            <p>Load Mysql data to EXCEL Sheet</p>
            <span class="text-primary mt-4">100,000 Records</span>
         </h4>
         <p id="loadExcel"> </p>
         <h4 class="text-center mt-5" id="downloaded"></h4>
         <button class="button" id="showData">
            <!-- <i class="loading-icon fa fa-spinner fa-spin hide"></i> -->
            <span class="btn-txt">Load Data from Mysql</span>
         </button>
         <div class="alert alert-success mt-5" id="alertMsg" role="alert">
            <h5 class="text-center mt-2"><i class="loading-icon fa fa-spinner fa-spin hide"></i> <span class="loading-icon text-center hide">100,000 Records are Loading.... </br>(Wait for few Seocnds)</span></h5>
            <p class="text-center data-load font-weight-bold"> All 100,000 Records will load here...</p>
         </div>
         <div class="result"></div>
      </div>
      <script>
         $(document).ready(function() {
           $("#showData").on("click", function() {
             $(".result").text("");
             $(".loading-icon").removeClass("hide");
             $(".data-load").hide();
             $(".button").attr("disabled", true);
             $(".btn-txt").text("Fetching Data from Mysql Database...");
         
             $.get("show_excel.php", function(data) {
               $(".result").html(data);
               $("#showData").hide();
               $("#alertMsg").hide();
               $(".loading-icon").addClass("hide");
               $(".button").attr("disabled", false);
               $(".btn-txt").text("Fetch Data From Server");
             });
           });
         });
      </script>
   </body>
</html>