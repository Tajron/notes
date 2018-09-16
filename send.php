<?php
/*
	$startWidth = "200px";
	$startHeight = "200px";
	$startLeft = "100px";
	$startTop = "100px";
	$conn=mysqli_connect("localhost", "root", "", "notes");
	if(isset($_GET['operacja'])&&isset($_GET['index'])&&$_GET['operacja']=="tworz"){
		echo $_GET['index'];
		
		
		mysqli_query($conn,"INSERT INTO `tab1` (`index`, `width`, `height`, `left`, `top`) 
			VALUES ('".$_GET['index']."','$startWidth','$startHeight','$startLeft','$startTop')"); 
		//$result = mysqli_query($conn,"SELECT * FROM `tab1`");
		//$row = mysqli_fetch_assoc($result);
		//echo $row['index'];
		

	}*/
    //echo $_GET['tablica'];
	$startWidth = "200px";
	$startHeight = "200px";
	$startLeft = "100px";
	$startTop = "100px";
	$conn=mysqli_connect("localhost", "root", "", "notes");
	if(isset($_GET['operacja'])&&isset($_GET['index'])&&$_GET['operacja']=="tworz"){
		echo $_GET['index'];
		
		
		mysqli_query($conn,"INSERT INTO `tab1` (`index`, `width`, `height`, `left`, `top`,`name`) 
			VALUES ('".$_GET['index']."','$startWidth','$startHeight','$startLeft','$startTop','".$_GET['name']."')"); 
		//$result = mysqli_query($conn,"SELECT * FROM `tab1`");
		//$row = mysqli_fetch_assoc($result);
		//echo $row['index'];
		

	}if(isset($_GET['operacja'])&&$_GET['operacja']=="mousemove"){
		$result = mysqli_query($conn,"SELECT * FROM `tab1` WHERE `index`=".$_GET['index']);
		$row = mysqli_fetch_assoc($result);
		mysqli_query($conn,"DELETE FROM `tab1` WHERE `index`=".$_GET['index']);
		if($_GET['lodowka']>1){
			mysqli_query($conn,"SELECT FROM `tab1` WHERE `index`=".$_GET['index']);
			for($i=($_GET['index']+1);$i<=$_GET['lodowka'];$i++){
				mysqli_query($conn,"UPDATE tab1 SET `index`=".($i-1)." WHERE `index`=".$i );
			};
		}; /*WHERE `index`=".$_GET['index']."*/
		mysqli_query($conn,"INSERT INTO `tab1` (`index`, `width`, `height`, `left`, `top`,`name`) 
			VALUES ('".$_GET['lodowka']."','".$row['width']."','".$row['height']."','".$_GET['left']."','".$_GET['top']."','".$_GET['name']."')");
	}if(isset($_GET['operacja'])&&$_GET['operacja']=="resize"){
		$result = mysqli_query($conn,"SELECT * FROM `tab1` WHERE index=".$_GET['index']);
		$row = mysqli_fetch_assoc($result);
		echo $row['index'];
		mysqli_query($conn,"DELETE FROM `tab1` WHERE index=".$_GET['index']);
		if($_GET['lodowka']>1){
			mysqli_query($conn,"SELECT FROM `tab1` WHERE index=".$_GET['index']);
			for($i=($_GET['index']+1);$i<=$_GET['lodowka'];$i++){
				mysqli_query($conn,"UPDATE tab1 SET index=".($i-1)." WHERE index=".$i);
			};
		};
		mysqli_query($conn,"INSERT INTO `tab1` (`index`, `width`, `height`, `left`, `top`,`name`) 
			VALUES ('".$_GET['lodowka']."','".$_GET['width']."','".$_GET['height']."','".$row['left']."','".$row['top']."','".$_GET['name']."')");
	}if(isset($_GET['operacja'])&&$_GET['operacja']=="usun"){
		mysqli_query($conn,"DELETE FROM `tab1` WHERE index=".$_GET['index']);
		if($_GET['lodowka']>1){
			mysqli_query($conn,"SELECT FROM `tab1` WHERE index=".$_GET['index']);
			for($i=($_GET['index']+1);$i<=$_GET['lodowka'];$i++){
				mysqli_query($conn,"UPDATE tab1 SET index=".($i-1)." WHERE index=".$i);
			};
		};
		
	}
	
?>