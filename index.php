<?php
require 'functions.php';
$todolists=query("SELECT*FROM todolist");

if(isset($_POST["submit"])){
	
	//cek apakah data berhasil di tambahkan atau tidak 
	if(tambah($_POST)>0){
	echo "
	<script>
	alert('task added successfully!');
	document.location.href='index.php';
	</script>
	";
	}else{
	echo "	<script>
	alert('task not added successfully!');
	document.location.href='index.php';
	</script>
	";
	}
	
	
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar CRUD</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="text-end bg-success pt-5 pb-5">
    <h1 class="text-center text-light">TO DO LIST</h1> 

   
    <form class="row g-3 justify-content-center mt-3" action="" method="POST" enctype="multipart/form-data">
        <div class="col-5">
            <label for="task" class="visually-hidden">Task</label>
            <input type="text" class="form-control" id="task" name="task">
        </div>
        <div class="col-auto">
            <label for="date" class="visually-hidden">Date</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-light mb-3" name="submit" id="submit">Add Task</button>
        </div>
    </form>

    
</div>

   <div class="container mt-5">
        <div class="table-data mt-5">
            <table border="1" cellpadding="10" cellspacing="0" class="text-center">
                        <tr>
                            <th>Id</th>
                            <th>Aksi</th>
                            <th width="200px">Date</th>   
                            <th width="700px">Task</th>
                        </tr>
                <?php $i=1;?>
                <?php  foreach($todolists as $todolist):?>
                <tr>
                <td><?php echo $i;?></td>
                <td>
                <a href="edit.php?id=<?= $todolist["id"];?>" class="btn btn-success">Update<a>
                <a href="hapus.php?id=<?= $todolist["id"];?>" class="btn btn-danger">Delete<a>
                </td>
                <td><?php echo $todolist["date"];?></td>
                <td><?php echo $todolist["task"];?></td>
                
                </tr>
                <?php $i++;?>
                <?php endforeach;?>
            </table>
        </div>
   </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>