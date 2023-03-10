<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day 26 OPP + Mysql</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-4 col-12 border border-success rounded p-3">
                <form method="POST">
                    <?php
                    include 'classes.php';

                    $stdObj = new student;
                    if (isset($_POST['btn'])) {
                        $stdObj->insert($_POST);
                    }
                       
                        
                    ?>
                    <div class="form-group my-3">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                    <div class="form-group my-3">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control">
                    </div>
                    <div class="form-group my-3">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control">
                    </div>
                    <div class="form-group my-3">
                        <label for="status"></label>
                        <select name="status" id="status" class="form-control">
                            <option value="">----Select Status----</option>
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>
                    </div>
                    <button name="btn" class="btn btn-success form-control">Save Information</button>
                </form>
            </div>
            <div class="col-lg-8 col-12 border border-success rounded p-3 ">
                <table class="table" border="1">
                    <thead>
                        <tr>
                            <th>Sl Num</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                        $obj = $stdObj->show();

                        if (isset($_GET['active'])){
                             $active = $_GET['active'];
                             $stdObj->active($active);

                        }
                        if (isset($_GET['inactive'])){
                            $inactive = $_GET['inactive'];
                            $stdObj->inactive($inactive);

                       }
                       if (isset($_GET['deleteId'])){
                        $deleteId = $_GET['deleteId'];
                        $stdObj->delete($deleteId);

                            }
                           if($obj->num_rows > 0){
                            $sqn = '1';
                            while($allData = $obj->fetch_assoc()){
                                $myStatus = '';
                                if($allData['status'] == 1){
                                    $myStatus = '<a href="index.php?active='.$allData['id'].'" class="btn btn-success btn-sm">Active</a>';
                                }
                                else{
                                    $myStatus = ' <a href="index.php?inactive='.$allData['id'].'" class="btn btn-warning btn-sm">Inactive</a>';
                                }
                               echo "<tr>
                               <td>".$sqn."</td>
                               <td class='fw-bold'>".$allData['name']."</td>
                               <td>".$allData['email']."</td>
                               <td>".$allData['phone']."</td>
                               <td>".$myStatus."</td>
                               <td>".'<a href="edit.php?editId='.$allData["id"].'" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                               <button data-bs-toggle="modal" data-bs-target="#delete'.$allData["id"].'" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>'."</td>
                               </tr>";
                                ?>
                               <!-- Modal -->
<div class="modal fade" id="delete<?php echo $allData['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Please Confirm</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3>Sure You Wanna delete Info of <?php echo $allData['name'] ?> ?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <a  href="index.php?deleteId=<?php echo $allData['id']?>" type="button" class="btn btn-primary">Yes</a>
      </div>
    </div>
  </div>
</div>
                                <?php
                           $sqn++; }
                           }
                           else{
                            echo "<tr>
                            <td colspan = '6' class='text-center text-danger'>".'<strong>No Data Found</strong>'."</td>
                            </tr>";
                           }
                        ?>
                    </tbody>
                    
                   
                    
                </table>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</body>

</html>