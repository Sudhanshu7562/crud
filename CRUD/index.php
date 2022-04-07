<?php include "config.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create read update and delete</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">contact</label>
                        <input type="text" name="contact" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="Submit" name="send"  class="btn btn-success w-100 fw-bold">
                    </div>
                </form>
                <?php
                if(isset($_POST['send'])){
                    $data = [
                        'name' => $_POST['name'],
                        'contact' => $_POST['contact']
                    ];
                    insert("phonebook",$data);
                }
                ?>
            </div>
            <div class="col-9">
                <table class="table">
                <tr>
                    <th class="fw-bold text-center" style="font-size:20px;">Id</th>
                    <th class="fw-bold text-center" style="font-size:20px;">Name</th>
                    <th class="fw-bold text-center" style="font-size:20px;">Contact</th>
                    <th class="fw-bold text-center" style="font-size:20px;">Action</th>
                </tr>
                <?php
                $data = calling("phonebook");
                foreach ($data as $row) {
                ?>
                     <tr>
                         <td class="text-center fw-bold"><?= $row['id'];?></td>
                         <td class="text-center fw-bold"><?= $row['name'];?></td>
                         <td class="text-center fw-bold"><?= $row['contact'];?></td>
                        <td>
                            <a href="?del=<?= $row['id'];?>" class="btn btn-danger" style="margin-left:230px;">delete</a>
                        </td>
                     </tr>
                <?php } ?>
                </table>
            </div>
        </div>
    </div>
    
</body>
</html>
<?php
if(isset($_GET['del'])){
    $id = $_GET['del'];

    delete("phonebook", "id='$id'");
    echo "<script>window.open('index.php','_self')</script>";
}
?>