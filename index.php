<?php include 'db.php';

// Trinti

if (isset($_GET['del_id'])){

    $del_sql = "DELETE FROM tasks WHERE id ='$_GET[del_id]'";

    $run_sql = mysqli_query($conn, $del_sql);

}


session_start();
if(!isset($_SESSION['user_id'])){   

 $_SESSION['user_id'] = $row['id']; 

 $_SESSION['user_name'] = $row['name'];  

  header("Location: login.php");    

} 
if(isset($_POST['status_id'])){   

 $status_id = mysqli_real_escape_string($conn, $_POST['status_id']);

}

else{   

        $status_id = -1;

}

?>
<!DOCTYPE html>

<html lang="en">

<head>   

 <meta charset="UTF-8">  

<meta http-equiv="X-UA-Compatible" content="IE=edge"> 

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>document</title>

<!-- CSS only -->   

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
       <div class="container">

           <?php    

                   if (isset($_SESSION['user_name'])){       

                   echo "<li class='mt-4'><a href='disconect.php'>Atsijungti </a></li> ";     

                   echo "<p class='mt-2 fs-5 fw-bold'>Sveikas ".$_SESSION['user_name']."</p>";       

}    

?>    

</div>
       <div class="container">     

                 <a href="add.php" class="text-Primary">Add</a> 

       </div>      

       <div class="container">
               <table class="table table-striped">     

                    <thead>    

                            <th>Užduoties pavadinimas</th> 

                            <th>Užduoties aprašymas</th>       

                            <th>Būsenos ID</th>
 

                             <th>Pridėti datą</th>       

                             <th>Baigta data</th>     

                             <th>Redaguoti</th>       

                             <th>Istrinti</th>   

              </thead> 

              <tbody> 

               <?php        

           $sql = "SELECT tasks.*, statuses.name FROM tasks, statuses WHERE tasks.status_id = statuses.ID" ;      

              $run_sql = mysqli_query($conn , $sql);    

               while ( $rows = mysqli_fetch_assoc($run_sql)){   

                     echo '<tr>      

                     <td hidden>'.$rows['id'].'</td>          

                     <td>'.$rows['task_name'].'</td>            

                     <td>'.$rows['task_description'].'</td>    

                     <td>'.$rows['name'].'</td>           

                             

                     <td>'.$rows['add_date'].'</td>    

                    <td>'.$rows['completed_date'].'</td>    

                    <td><a href="edit.php?edit_id='.$rows['id'].'" class="text-success">Redaguoti</a></td>    

                    <td><a href="index.php?del_id='.$rows['id'].'" class="text-danger">Istrinti</a></td>   

                     </tr>    

                    ';        

  }           

      ?>           

 </tbody>

 </table>

    </div>
    <!-- JavaScript Bundle with Popper -->  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>

</html>