
<?php ob_start();?>
<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
 <!-- link local CSS -->
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
  
    </style>
 </head>
 <body>
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
<?php
               
               include('class/classVole.php'); 
               $vole=new vol();
                if(isset($_GET["idvol"]))
                {
                
                $data=$vole->getVole();

?>
<div class="row detail">
          <div class="col-12 col-sm-12 col-md-12 col-lg-4 p-0">
            <div class="ribbon"><span> Offre Genius </span></div>
            <img src="avion.jpg" alt="">
          </div>
          <div class="col-12 col-sm-12 col-md-12 col-lg-8 p-0">
            <span class="discount-holder"><span>Reservation</span></span>
            <div class="detail-box">
              <h4>Réservez votre voyage pas cher</h4>
              <p>
                <div class="offer">
                    <span class="offer-text">Réservez avec:</span>
                    <span class="offer-text-2">flexibilité</span>
                </div>
              </p>
            
              <ul>
                <li name="lienDepart"><strong> <i class="fas fa-plane-departure"></i>lienDepart : </strong>  <?php echo $data[0]["lieuDepart"]?></li>
                <li name="destination"><strong > <i class="fas fa-plane-arrival"></i>Destination : </strong> <?php echo $data[0]["destination"]?></li>
                <li name="prix"><strong> Prix Prime par passager : </strong><?php echo $data[0]["prix"]?></li>
              </ul>
              <p name="nombreplace"><strong><i class="fas fa-user-check"></i> Nombre Place : </strong><?php echo $data[0]["nombreplace"]?> </p>
              <h6 name=" dateVol "><strong><i class="fa fa-clock"></i> Date vol :</strong> <?php echo $data[0]["dateVole"]?></h6>
            </div>
           
          </div>
      
        </div>
        <?php } 
       
         ?>
         <!-- formulaire -->
       
 <div class="container register-form" id="formreserv">
            <div class="form">
                <div class="note">
                    <p>Coordonnées des passagers.</p>
                </div>

                <div class="form-content" >
<?php include('codeReservation.php');?>
                    <div class="row" >
                        <div class="col-md-6">
                            <form  method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nom" placeholder="Nom *" value="" required/>
                            </div>
                            
                            <div class="form-group">
                                <input type="text" class="form-control" name="passeport" placeholder="Passeport *" value="" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="prenom" placeholder=" Prenom *" value="" required/>
                             </div>
                             <div class="form-group">
                                <input type="text" class="form-control" name="adresse" placeholder="Adresse *" value="" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="telephone" placeholder="Telephone *" value="" required/>
                            </div>
                           
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="email *" value="" required/>
                             </div>
                        </div>
                    </div>
                    <button type="submit" class="btnSubmit" name="reserver">réservez maintenant</button>
                 
                </div>
            </div>
        </div>
      </form>
      <?php include('footer.php'); ?>