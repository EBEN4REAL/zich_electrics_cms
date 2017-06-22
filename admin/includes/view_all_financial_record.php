
 <table class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Payee</th>
            <th>Amount paid</th>
            <th>Date Paid</th>
            <th>Edit</th>
            <th>View</th>
            <th>Trash</th>
              
            
           
         </tr>
    </thead>
    <tbody>
    <?php
    //section that deletes comments from thwe database
    if (isset($_GET['del_financial_record'])) {
        # code...
        $del_financial_record = $_GET['del_financial_record'];
        $query = "DELETE FROM comments WHERE comment_id = '$del_financial_record'";
        $unapprove_comment_query=  mysqli_query($connection , $query);


    }
    //section to Unaprove
    if (isset($_GET['unapprove'])) {
         # code...
        $the_comment_id = $_GET['unapprove'];
        $unapprove_comment = "UPDATE comments SET comment_status = 'Unapproved' WHERE comment_id = '$the_comment_id'";
        $sql_query = mysqli_query($connection , $unapprove_comment);
    
        
    }



    //section to Approve comments
    if (isset($_GET['approve'])) {
         # code...
        $the_comment_id = $_GET['approve'];
        $approve_comment = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = '$the_comment_id'";
        $sql_query = mysqli_query($connection , $approve_comment );
    
        
    }
  //section that fetches comments from the database
    $fetch_comments = "SELECT * FROM financial_records";
    $sql_query = mysqli_query($connection , $fetch_comments);
    while ($rows  = mysqli_fetch_assoc($sql_query)) {
        # code...
        $id           = $rows['id'];
        $payee        = $rows['payee']; 
        $amount_paid  = $rows['amount_paid'];
        $date_paid  = $rows['date_paid'];
       
       
        echo "<tr>";
        echo "<td> $id</td>";
        echo "<td> $payee</td>";
        echo "<td> $amount_paid</td>";
        echo "<td> $date_paid</td>";
       
        echo ' <td><a href="financial_record.php?edit='.$id.'" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>';


        echo ' <td><a href="financial_record.php?source=edit_financial_record&edit_financial_record='.$id.'" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-opoen"></span> View</a></td>';

       
        echo ' <td><a href="financial_record.php?del_financial_record='.$id.'" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>';

        
        }



        
   

  

     ?>
       
    </tbody>
</table>





<?php
//section that deletes users form the database
if (isset($_GET['del_id'])) {
    # code...
    $delete = $_GET['del_id'];
    $delete_post = "DELETE FROM users WHERE user_id = '$delete'";
    $sql_query = mysqli_query($connection , $delete_post);
    header("Location: users.php");

}

?>