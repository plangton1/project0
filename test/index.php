<!DOCTYPE html>
<html>
  <head>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
    <meta charset=utf-8 />
    <title>DataTables - JS Bin</title>
  </head>
  <body>
    <div class="container">
      <table id="example" >
        <thead>
          <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
          </tr>
        </thead>

       
      </table>
    </div>
  </body>
  <script>
    $(document).ready( function () {
        var table = $('#example').DataTable();
    } );
  </script>
</html>

