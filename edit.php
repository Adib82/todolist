<?php 

require 'functions.php';

//ambil data dari url

$id=$_GET["id"];
//query data siswa berdasarkan id
$a=query("SELECT * FROM todolist where id=$id")[0];


//cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])){
	
	//cek apakah data berhasil di ubah atau tidak 
	if(ubah($_POST)>0){
	echo "
	<script>
	alert('successfully updated!');
	document.location.href='index.php';
	</script>
	";
	}else{
	echo "	<script>
	alert('didn't update successfully!');
	document.location.href='index.php';
	</script>
	";
	}
	
	
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar CRUD</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col d-flex justify-content-center text-center">
                <div class="card bg-success" style="width: 35rem;">
                    <a href="index.php" class="btn btn-danger pt-0">Kembali</a>
                    <div class="card-body">
                        <h1 class="mt-3 text-center">Edit Task</h1>
                            <form class="row g-3 justify-content-center mt-3" action="" method="POST" enctype="multipart/form-data">
                                <div class="col-5">
                                    <input type="hidden" name="id" value="<?= $a["id"];?>">
                                    <label for="task" class="visually-hidden">Task</label>
                                    <input type="text" class="form-control" id="task" name="task" value="<?= $a["task"];?>">
                                </div>
                                <div class="col-auto">
                                    <label for="date" class="visually-hidden">Date</label>
                                    <input type="date" class="form-control" id="date" name="date" value="<?= $a["date"];?>">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-light mb-3" name="submit" id="submit">Edit Task</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
