<?php


    require_once 'db.php';
    session_start();
    if(!isset($_SESSION['user_id'])){ 

    $_SESSION['user_id'] = $row['id'];   

 }

    if(isset($_POST['edit'])){    

    $name = mysqli_real_escape_string($conn, $_POST['name']);     

    $description =  mysqli_real_escape_string($conn, $_POST['description']);    

    $status =  mysqli_real_escape_string($conn, $_POST['status']);
    $sql = "INSERT INTO tasks (task_name, task_description, user_id ,status_id)  VALUES  ('$name', '$description',".$_SESSION['user_id'].", '$status')";                   $result = mysqli_query($conn, $sql);
        if($result){           

          header('Location: index.php'); 

       }      

   else{         

   echo 'nepavyko';        

    echo mysqli_error($conn);

        }  

  }  

  $status = mysqli_query($conn,"SELECT * FROM statuses");
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
    <div class="container mt-5">
                 <a href="index.php" class="text-danger">Grizti</a>
    </div>
    <div class="container">       

     <form class="form-control" method="post">           

                     <div class="form-group md-outline mt-5">        

                                   <label for="exampleInputName">Užduoties pavadinimas:</label>       

                                   <input type="text" name="name" class="form-control"  id="exampleInputName">        

        </div>
                <div class="form-group md-outline mt-5">            

                          <label for="exampleInputDescription">Užduoties aprašymas:</label>    

                          <input type="text" name="description" class="form-control"  id="exampleInputDescription">        

        </div>
                <div class="form-group md-outline mt-5">             

                              <label for="exampleInputStatus">Būsenos ID:</label>       

                              <select class="form-select form-select-sm" name="status" id="exampleInputStatus" aria-label=".form-select-sm example">          

                               <option selected>Pasirinkite</option>                         

                  <?php                  

                            while ($status_row = mysqli_fetch_array($status)){                       

                                             if($status_row['ID'] == $row['status']){        

                                                   echo '<option value="'.$status_row['ID'].'">'.$status_row['name'].'</option>';                

                } 

                                               else{                   

                                                     echo '<option value="'.$status_row['ID'].'">'.$status_row['name'].'</option>';          

                      }     

                       }    

                    ?>     

               </select>   

             </div>                                

                <div class="row"> 

                   <div class="col-sm-12 mx-auto col-md-12 text-center mt-5">        

                <button type="submit" class="btn btn-primary" name="edit">Issaugoti</button>        

            </div>    

            </div>
            </form>  

  </div>

</body>

</html>