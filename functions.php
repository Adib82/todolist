<?php
$conn=mysqli_connect("localhost", "root", "", "todolist");

function query($query){
	global $conn;
	$result=mysqli_query($conn, $query);
	$rows=[];
	while($row=mysqli_fetch_assoc($result)){
		$rows[]=$row;
	}
	return $rows;
}

function tambah($data){
    global $conn;
    //ambil data dari tiap elemen dalam form 
    $task=($data["task"]);
    $date=($data["date"]);


    
    //query insert data
    $query="INSERT INTO todolist VAlUES
    ('', '$task', '$date')
    ";
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
    }

    function hapus($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM todolist WHERE id=$id");
        
        return mysqli_affected_rows($conn);
    }

    function ubah($data){
		global $conn;
	//ambil data dari tiap elemen dalam form 
	$id=$data["id"];
	$task=htmlspecialchars($data["task"]);
	$date=htmlspecialchars($data["date"]);
	
	
	//query insert data
	$query="UPDATE todolist set 
	task='$task',
	date='$date'
	WHERE id=$id;
	";
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
    }

?>