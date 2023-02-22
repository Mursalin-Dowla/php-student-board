<?php
class student
{
    private $con = '';
    function __construct()
    {
        $this->con = new mysqli('localhost', 'root', '', 'day_26');
    }

    public function insert($allData)
    {    
        $name = $allData["name"];
        $email = $allData["email"];
        $phone = $allData["phone"];
        $status = $allData["status"];
       if($name == ""){
        echo '<div class="alert alert-danger">Name is Required</div>';
       }
      else if($email == ""){
        echo '<div class="alert alert-danger">Email is Required</div>';
       }
      else if($phone == ""){
        echo '<div class="alert alert-danger">Phone is Required</div>';
       }
      else if($status == ""){
        echo '<div class="alert alert-danger">Status is Required</div>';
       }
       else{
        $com = "INSERT INTO tbl_student(name,email,phone,status)
        VALUES('$name','$email','$phone','$status')";

        $submit = $this->con->query($com);
        if ($submit) {
            echo '<div class="alert alert-success">Data Submitted</div>';
        } else {
            echo '<div class="alert alert-danger">Data Submission Failed</div>';
        }
       }
    }

    function show(){
        $com2 = "SELECT * FROM tbl_student";
        return $this->con->query($com2);

    }
    function active($active){
         $this->con->query("UPDATE tbl_student SET status='2' WHERE id='$active'");
         header("location: index.php");
    }
    function inactive($inactive){
        $this->con->query("UPDATE tbl_student SET status='1' WHERE id='$inactive'");
        header("location: index.php");
   }
   function findForEdit($id){
      return $this->con->query("SELECT * FROM tbl_student WHERE id='$id'");
   }
   function update($allData,$id){
    $name = $allData["name"];
    $email = $allData["email"];
    $phone = $allData["phone"];
    $status = $allData["status"];
   if($name == ""){
    echo '<div class="alert alert-danger">Name is Required</div>';
   }
  else if($email == ""){
    echo '<div class="alert alert-danger">Email is Required</div>';
   }
  else if($phone == ""){
    echo '<div class="alert alert-danger">Phone is Required</div>';
   }
  else if($status == ""){
    echo '<div class="alert alert-danger">Status is Required</div>';
   }
   else{
    $com = "UPDATE tbl_student SET name='$name',email='$email',phone='$phone',status= '$status'
    WHERE id='$id'";

    $submit = $this->con->query($com);
    if ($submit) {
        header("location: index.php");
    } else {
        echo '<div class="alert alert-danger">Data Submission Failed</div>';
    }
   }
   }
   function delete($id){
    $this->con->query("DELETE FROM tbl_student WHERE id='$id'");
    header("location: index.php");
   }
}
