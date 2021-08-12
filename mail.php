<?php

$method = $_SERVER['REQUEST_METHOD'];

//if(mail("zm.grst@gmail.com", "Загаловок", "Текст письма \n 1-ая строчка \n 2-ая строчка \n 3-ая строчка")){
//if(mail("1zaur1@mail.ru", "Загаловок", "Текст письма \n 1-ая строчка \n 2-ая строчка \n 3-ая строчка")){
 //   die("Успешно");
//} else {
 //   die("Не отправлено");
//}

//die();

	$project_name = '';
	$admin_email  = '';
	$form_subject = '';


//Script Foreach
$c = true;
if ( $method === 'POST' ) {

    //echo $_POST;
    $fio = $_POST['fio'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];

    $arr['fio'] = $fio;
    $arr['email'] = $email;
    $arr['tel'] = $tel;

	$project_name = 'investsuperfoods.ru';
	$admin_email  = '1zaur1@mail.ru, zm.grst@gmail.com, aleksey460@gmail.com';
	$form_subject = 'Заявка с сайта';

	$body = "\n";

        $dateTime = date("d-m-Y H:i:s");
        $body = $body  . $dateTime . " создана заявка\n\n";

        $_name              = htmlspecialchars(strip_tags(trim($_POST['fio'])));
        $_email             = htmlspecialchars(strip_tags(trim($_POST['email'])));
        $_tel               = htmlspecialchars(strip_tags(trim($_POST['tel'])));

        $body = $body
            . "Имя: "
            . "$_name\n"
            . "Email: "
            . "$_email\n"
            . "Телефон: "
            . "$_tel\n"
            . "\n"
            . "\n"
            . "send from investsuperfoods.ru";

	//$_POST = json_decode(file_get_contents('php://input'), true);


	//foreach ( $arr as $key => $value ) {
	//	if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
	//		$message .= "
	//		" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
	//			<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
	//			<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
	//		</tr>
	//		";
	//	}
	//}
} else if ( $method === 'GET' ) {

	$project_name = trim($_GET["project_name"]);
	$admin_email  = trim($_GET["admin_email"]);
	$form_subject = trim($_GET["form_subject"]);

	foreach ( $_GET as $key => $value ) {
		if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
			$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
				<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
				<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
			</tr>
			";
		}
	}
}

$message = "<table style='width: 100%;'>$message</table>";

function adopt($text) {
	return '=?UTF-8?B?'.Base64_encode($text).'?=';
}

$headers = "MIME-Version: 1.0" . PHP_EOL .
"Content-Type: text/html; charset=utf-8" . PHP_EOL .
'From: '.adopt($project_name).' <'.$window.'>' . PHP_EOL .
'Reply-To: '.$window.'' . PHP_EOL;


if(mail($admin_email, $project_name, $body)){
    die("OK");
} else {
    die("NULL");
}


//mail($admin_email, adopt($form_subject), $message, $headers );

//support@vedees.ru