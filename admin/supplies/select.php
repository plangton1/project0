<?php
if (isset($_POST["employee_id"])) {
     $output = '';
     include 'conn.php'; // MySQL Connection
     $query  = "SELECT * FROM supplies WHERE sup_id = '" . $_POST["employee_id"] . "'";
     $result = mysqli_query($connect, $query);
     $output .= '  
      <div class="table-responsive">  
           <table class="table table-striped">';
     while ($row = mysqli_fetch_array($result)) {
          $output .= '  
                <tr>  
                     <td width="10%"><label>ชื่อและนามสกุล</label></td>  
                     <td width="10%">' . $row["sup_name"] . ' ' . $row["sup_last"] . '</td>  
                </tr>  
                <tr>  
                    <td width="10%"><label>เบอร์โทร</label></td>  
                    <td width="10%">' . $row["sup_phone"] . '</td>  
               </tr>  
               <tr>  
                    <td width="10%"><label>ที่อยู่</label></td>  
                    <td width="10%">' . $row["sup_add"] . '</td>  
               </tr>  
               <tr>  
                    <td width="10%"><label>วันเดือนปีเกิด</label></td>  
                    <td width="10%">' . $row["sup_date"] . '</td>  
               </tr>  
           ';
     }
     $output .= '  
           </table>  
      </div>  
      ';
     echo $output;
}
