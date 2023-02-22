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
           
            <div class="col-lg-6 offset-lg-3 offset-2 col-8 border border-success rounded p-3">
                <form method="POST">
                <h3>Update Student Information</h3>
                    <?php
                    include 'classes.php';
                        $stdObj = new student;
                        $id = $_GET['editId'];
                        $obj = $stdObj->findForEdit($id);
                        $allData = $obj->fetch_assoc();

                        if(isset($_POST['btn'])){
                            $stdObj->update($_POST,$id);
                        }
                    ?>
                    <div class="form-group my-3">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?php echo $allData['name'] ?>">
                    </div>
                    <div class="form-group my-3">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control" value="<?php echo $allData['email'] ?>">
                    </div>
                    <div class="form-group my-3">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="<?php echo $allData['phone'] ?>">
                    </div>
                    <div class="form-group my-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="<?php echo $allData['status'] ?>"><?php if($allData['status']== '1'){echo 'Active';} else{echo 'Inactive';} ?></option>
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>
                    </div>
                    <button name="btn" class="btn btn-success form-control">Update Information</button>
                </form>
            </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</body>

</html>