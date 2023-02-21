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
                           if($obj->num_rows > 0){
                            while($allData = $obj->fetch_assoc()){
                                $myStatus = '';
                                if($allData['status'] == 1){
                                    $myStatus = '<span class="text-success badge">Active</span>';
                                }
                                else{
                                    $myStatus = '<span class="text-warning badge">Inactive</span>';
                                }
                               echo "<tr>
                               <td>".$allData['id']."</td>
                               <td class='fw-bold'>".$allData['name']."</td>
                               <td>".$allData['email']."</td>
                               <td>".$allData['phone']."</td>
                               <td>".$myStatus."</td>
                               <td>".'<button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                               <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>'."</td>
                               </tr>";
                            }
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