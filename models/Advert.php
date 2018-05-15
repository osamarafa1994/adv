<?php
/**
 *
 */
class Advert extends Model
{

  function __construct()
  {
    parent::__construct();

  }

  public function getAll()
  {
    $sql = "SELECT * FROM  advertisement";
    $this->result = $this->dbase()->query($sql);

    //  $result = $stmt->fetch_assoc();
    // var_dump($stmt->num_rows);
    return  ($this->result) ? $this->result : false;

  }

  public  function getById($id)
  {
    $sql = 'SELECT * FROM  advertisement WHERE id ="' . $id . '"' ;
    $this->result = $this->dbase()->query($sql);

    return  ($this->result) ? $this->result->fetch_assoc() : false;
  }

  public function getCommetByPK($id)
  {
    $sql = 'SELECT * FROM  comments WHERE adv_id ="' . $id . '"' ;
    $this->result = mysqli_query($this->dbase(),$sql);
    $rows = mysqli_fetch_all($this->result,MYSQLI_ASSOC);

      if (count($rows) > 0) {
        $i= 0;
      foreach ($rows as $row) {

        $rows[$i]['user'] = $this->get_userById($row['user_id']);
        $i++;
          }
        }
    return  ($rows) ? $rows : false;

  }




  public function get_userById($id)
  {
    $sql = 'SELECT * FROM  users WHERE user_id ="' . $id . '"' ;
    $this->result = $this->dbase()->query($sql);
    return  ($this->result) ? $this->result->fetch_assoc() : array();
  }


  public function register($insertData)
  {
    $sql = "INSERT INTO users (name , email, username, password) Values ( '". $insertData['name'] . "' , '" . $insertData['email'] . "', '" . $insertData['username'] . "', '" . $insertData['password'] . "')";
    $this->result = $this->dbase()->query($sql);

    return  ($this->result) ? true : false;
  }

  public function checkloginAdmin($username, $password)
  {

    $sql = 'SELECT * FROM  users WHERE username = "'.  $username  . '" AND password = "'. $password . '"' ;
    $this->result = $this->dbase()->query($sql);

    return  ($this->result) ? $this->result->fetch_assoc() : false;
  }

  public function addADV($descr, $image_name)
  {
    $sql = "INSERT INTO advertisement (descr_ad , image_n) Values ( '". $descr. "' , '" . $image_name . "')";
    $this->result = $this->dbase()->query($sql);

    return  ($this->result) ? true : false;
  }

  public function updateADV($desc, $id)
  {
    $sql = 'UPDATE advertisement SET descr_ad = "'. $desc .'" WHERE id = "' . $id .'" ';
    $this->result = $this->dbase()->query($sql);

    return  ($this->result) ? true : false;
  }

  public function deleteADV($id)
  {
    $sql = 'DELETE FROM advertisement WHERE id = "' . $id .'"';
    $this->result = $this->dbase()->query($sql);

    return  ($this->result) ? true : false;
  }

  public function deleteCOM($id)
  {
    $sql = 'DELETE FROM comments WHERE com_id = "' . $id .'"';
    $this->result = $this->dbase()->query($sql);

    return  ($this->result) ? true : false;
  }


  public function createCOM($body ,$ad_id , $user_id)
  {
    $sql = "INSERT INTO Comments (body, adv_id , user_id) Values ( '". $body . "', '". $ad_id . "' ,'". $user_id . "')";
    $this->result = $this->dbase()->query($sql);

    return  ($this->result) ? true : false;
  }



  public function valid_username($username)
  {
    $sql = 'SELECT * FROM  users WHERE username = "'.  $username  . '"' ;
    $this->result = $this->dbase()->query($sql);

    return  ($this->result) ? $this->result->num_rows : 0;
  }


    public function valid_email($email)
    {
      $sql = 'SELECT * FROM  users WHERE email = "'.  $email  . '"' ;
      $this->result = $this->dbase()->query($sql);

      return  ($this->result) ? $this->result->num_rows : 0;
    }

}

 ?>
