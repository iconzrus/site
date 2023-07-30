<?php
$to = "mls1@bk.ru";
$cc = "";
if(isset($_REQUEST['tildaspec-formid'])){
	header("Content-Type: application/json;charset=utf-8");
	// $headers = "CC: ".$cc."\r\n";
	$headers .= "MIME-Version: 1.0\r\n"; 
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
	$subject = 'Новый запрос с сайта https://ag-a.ru/';
	$Email = htmlspecialchars($_POST['Email']);
	$name = htmlspecialchars($_POST['Name']);
	$phone = htmlspecialchars($_POST['Phone']);
	if(isset($_POST['Textarea']))
		$textarea = htmlspecialchars($_POST['Textarea']);
	else
		$textarea = "";
	$message = "Здравствуйте!<br />С сайта <b>".$_SERVER['HTTP_HOST']."</b> поступил запрос от клиента. Ниже представлена информация для связи, указанная клиентом:<br /><br /><b>Имя клиента</b>: ".$name."<br /><b>Email</b>: ".$Email."<br /><b>Телефон</b>: ".$phone."<br /><b>Сообщение: </b><br />".$textarea."\r\n";
	@mail($to, $subject, $message,$headers);


	echo '{"message":"OK","results":["876271:67766852"]}';
}

?>
