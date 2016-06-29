<?php

$conn = mysqli_connect('localhost','root','','testingmanagement');
if(!$conn)
{
	die(mysqli_connect_error());
}