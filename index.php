<!DOCTYPE html>
<?php  include('connexion.php');?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  
    <style>
    body{
      overflow-x:hidden;
    }
       footer div{
            color: white;
        }
       p>a{
            text-decoration: none;
            color:white
        }
        li > span{
          font-weight:bold;
        }
    </style>
</head>

    <body>
    <?php
  
    ?>
     <!-- Navigation -->
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php"><img src="logo3.png" width="120" height="80" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto ">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="reservation.php">reservation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="confirmation.php">confirmation</a>
              </li>
              <li class="nav-item">
                        <?php 
                       include('class/classUser.php');
                       session_start();
                       $user=new user();
                        if(!empty($_SESSION["user"])){
                          
                        $data=$user->sessionUser();

                        ?>
                <a class="nav-link" href="infoUtilisateur.php"><i class="fas fa-user-circle" style="font-size:30px;margin-top:-7px"></i>&nbsp<?php echo $data[0]['nom'];?></a>
                <li class="nav-item">
                <a  class="btn btn-outline-danger" href="logoutUser.php">log out</a>
              </li>
                <?php
                 }
                 elseif(!empty($_SESSION["admin"])){
                  $data=$user->sessionAdmin();
                   ?>
                  <a class="nav-link" href="ajouterVole.php"><i class="fas fa-user-circle" style="font-size:30px;margin-top:-7px"></i>&nbsp<?php echo  $data[0]['nom'];?></a>
                  <li class="nav-item">
                <a  class="btn btn-outline-danger" href="logout.php">log out</a>
              </li>
                  <?php } 
                  else{
                    header('location:login.php');
                  }
                  ?>
                
              </li>
             
          </ul>
        </div>
      </nav>
          <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="avion.jpg"  class="d-block w-100" height="400" alt="...">
                <div class="carousel-caption d-none d-md-block">
                
                </div>
              </div>
              <div class="carousel-item">
                <img src="avion2.jpg"  class="d-block w-100" height="400" alt="...">
                <div class="carousel-caption d-none d-md-block">
                 
                </div>
              </div>
              <div class="carousel-item">
                <img src="avion3.jpg"  class="d-block w-100" height="400" alt="...">
                <div class="carousel-caption d-none d-md-block">
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
  <!-- Page Content -->
  <div class="container-fluid px-0">

    <h1 class="col-12 my-4 d-flex justify-content-center">Reserver maintenant</h1>

    <div class="container-fluid ">
<div class="row "> 
    <div class="jumbotron jumbotron w-100" >
        <div class="container">
        <form method="POST" class="col-12">
            <div class="row d-flex justify-content-center">

           
          <div class="col-5" class="display-6">Lieu depart <input type="text" class="form-control" name="lieu"></div>
          <div class="col-5"> Destination <input type="text" class="form-control" name="destination"></div>
         <div class="col-12 d-flex justify-content-center my-3">
             <input type="submit" class="btn btn-primary" value="rechercher" name="recherche">
            </div>
        </div>
        </div>
      </div>
      </div>
      </form>
</div>
</div>
<div class="container">
    <div class="row">
    <?php
    include('class/classVole.php');
     if(isset($_POST["recherche"])){
     $vol=new vol();
     if(isset($_POST['lieu']) && isset($_POST['destination'])){
    $data= $vol->recherche($_POST['lieu'],$_POST['destination']);
    foreach($data as $row){
    ?>
      <div class="col-lg-4 col-sm-6 ">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="img2.jpg" alt="" id="image"></a>
                 <div class="card-body">
                 <h5 class="card-title offset-2" ><?php echo $row['lieuDepart']; ?>-<?php echo $row['destination']; ?></h5>
                 <p class="card-text"></p>
                  </div>
                  <ul class="list-group list-group-flush">
                  <li class="list-group-item"><span >date</span>:<?php echo $row['dateVole'];?></li>
                    <li class="list-group-item"><span>nombre place</span>:<?php echo $row['nombreplace'];?></li>
             <li class="list-group-item"><span>prix</span>: <?php echo $row['prix']; ?></li>
                  </ul>
              <div class="card-body">
               <a href="reservation.php?idvol=<?php echo $row['idvol']; ?>" class="btn btn-primary btn-md offset-4" name="reserver">reserver</a> 
                </div>    
        </div>
      </div>
    <?php }
     }
   } 
   ?>
     
    
    </div>
    </div>
    <!-- /.row -->
    <!-- Features Section -->
   </div>
  <!-- /.container -->
<?php include('footer.php'); ?>

 
   