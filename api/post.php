<?php
require 'functions.php';

$connect = connect();

/**Post*/
$postdata = file_get_contents("php://input");
if(isset($postdata) && !empty($postdata))
{
    $request     = json_decode($postdata);
	
	$newName     = preg_replace('/[^a-zA-Zא-ת ]/','',$request->newName);
	$newNickName = preg_replace('/[^a-zA-Zא-ת ]/','',$request->newNickName);
	
	$newName     = mysqli_real_escape_string($connect,$newName);
	$newNickName = mysqli_real_escape_string($connect,$newNickName);

	$sql = "INSERT INTO `users`(`name`, `nickname`) VALUES ('$newName','$newNickName')";

    mysqli_query($connect,$sql);
}
