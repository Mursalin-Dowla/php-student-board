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
}
