<?php
   include_once('class/classConnexion.php');
 
class reservation extends connexion{
    private $idRerservation;
    private $idClient;
    private $idVol;
    private $idUser;
    private $dateR;
public function reserver($n,$p,$a,$t,$e,$pass){
      $conn=$this->getConnect();
      $idvol=$_GET["idvol"];
      $client=new client();
      $lastId=$client->insertClient($n,$p,$a,$t,$e,$pass);

      $query="select nombreplace from vol where idvol='$idvol'";
      $result=$conn->query($query);
      $data=$result->fetchAll();
      $nombreplace=$data[0]['nombreplace'];
      $query4="update vol set nombreplace=$nombreplace-1 where idvol='$idvol'";
      $conn->exec($query4);
if(!empty($_SESSION["user"])){
      $querySession="select idUser from compte where  email='".$_SESSION['user']."'";
      $result=$conn->query($querySession);
      $data=$result->fetchAll(); 
}
      $idUser= $data[0]['idUser'];
      $query3="insert into reservation values(NULL,$lastId,'$idvol',$idUser,'".date("Y/m/d")."')";
      echo $query3;
      $conn->exec($query3);
      $idResevation =$conn->lastInsertId();
   echo "<br>id reservation= ".$idResevation;
  header("location:confirmation.php?idReservation=".$idResevation."");   
   ob_end_flush();
   
}


}
?>