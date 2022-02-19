<?php
if (isset($_POST["employee_id"])) {
     $output = '';
     include '../connection.php'; // MySQL Connection
     $query  = "SELECT * FROM user WHERE user_id = '" . $_POST["employee_id"] . "'";
     $result = mysqli_query($connection, $query);
     $output .= '  
      <div class="table-responsive">  
           <table class="table table-striped">';
     while ($row = mysqli_fetch_array($result)) {
          $output .= '  
                <tr>  
                     <td width="10%"><label>ชื่อและนามสกุล</label></td>  
                     <td width="10%">' . $row["user_name"] . ' ' . $row["user_last"] . '</td>  
                </tr>  
                <tr>  
                    <td width="10%"><label>เบอร์โทร</label></td>  
                    <td width="10%">' . $row["user_phone"] . '</td>  
               </tr>  
               <tr>  
                    <td width="10%"><label>ที่อยู่</label></td>  
                    <td width="10%">' . $row["user_add"] . '</td>  
               </tr>  
               <tr>  
                    <td width="10%"><label>วันเดือนปีเกิด</label></td>  
                    <td width="10%">' . $row["user_date"] . '</td>  
               </tr>  
           ';
     }
     $output .= '  
           </table>  
      </div>  
      ';
     echo $output;
}
