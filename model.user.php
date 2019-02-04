<?php



    /* controlador.php */
  $action = $_POST['action'];
  switch ($action) {
    case 'almacenar':
        almacenar();
      break;

    default:
      // code...
      break;
  }


  public function almacenar(){
    $user = new User();
    $user->setName($_POST['name']);
    $user->setUsername($_POST['username']);

    echo $user->save();

  }

  /* model.user.php */
  include ('conexion.php');

  public class User{

    private $name;
    private $username;
    private $sex;

    public function User(){}

    public function User($name,$username,$sex){
      $this->name = $name;
      $this->username = $username;
      $this->sex = $sex;
    }

    public function getName(){
      return $this->name;
    }
    public function getUsername(){
      return $this->username;
    }
    public function getSex(){
      return $this->sex;
    }


    public function setName($name){
      $this->name = $name;
    }
    public function setUsername($username){
      $this->username = $username;
    }
    public function setSex($sex){
      $this->sex = $sex;
    }

    public function save(){
      /* almacenar en la db */
      $name = $this->getName();
      $username = $this->getUsername();

      $conexion = new Conexion()
      $conexion->connect(); /* sql_serv($host,$sInfo) */


      $sql = "insert into user (name,username) values ('".$name."','".$username."')"

      echo $conexion->query($sql)

    }

      public function getUsers(){
        $sql = "SELECT * FROM USERS"
        return $result;

      }

  }


    include ('conexion.php');

    $user = new User();

    $users = $user->getUsers();

    for ($i<$users.count();$i++){
      ?>
      <span>Name:</span> <?php echo $users[$i]->getName(); ?>
      <span>Username:</span> <?php echo $users[$i]->getUsername(); ?>
    <?php}







 ?>
