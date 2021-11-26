<?php

    session_start();


    require_once 'db.php';
    if(isset($_POST['login'])){  

      $email = mysqli_real_escape_string($conn, $_POST['email']);

        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $result = mysqli_query($conn, "SELECT * FROM users WHERE email='".$email."'and password = '".md5($password)."'");   

     if($row = mysqli_fetch_array($result)){      

      $_SESSION['user_id'] = $row['id'];      

      $_SESSION['user_name'] = $row['name'];
            header('Location: index.php');        

}

      else{            $error_msg = "Netaisingas";    

    }
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

     <div class="row align-items-center">       

        <div class="col-lg-10 text-center">        

                    <span class="text-danger"><?php if(isset($error_msg)) echo $error_msg ?></span>   

         </div>            

        <div class="col-lg-6 mx-auto">  

              <form class="form-control" method="post">         

                       <div class="form-group md-outline mt-5">        

                                    <label for="exampleInputEmail">Email Address:</label>      

                                    <input type="email" name="email" class="form-control" required="email" id="exampleInputEmail">     

                        </div>
                <div class="form-group md-outline mt-5">      

                                   <label for="exampleInputPassword">Slaptažodis:</label>     

                                   <input type="password" name="password" class="form-control" required="password" id="exampleInputPassword">       

               </div>
                <div class="row">     

                            <div class="col-sm-12 mx-auto col-md-12 text-center mt-5">              

                            <input type="submit" class="btn btn-primary" name="login" value="Prisijungimas">            

                </div>      

                 </div>
                </form>     

       </div>    

    </div>   

 </div>

</body>

</html>