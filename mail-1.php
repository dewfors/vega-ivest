<?php
date_default_timezone_set("Europe/Moscow");
// Откликаться будет ТОЛЬКО на ajax запросы
if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) || $_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') {return;}

// Сниппет будет обрабатывать не один вид запросов, поэтому работать будем по запрашиваемому действию
// Если в массиве POST нет действия - выход
if (empty($_POST['action'])) {return;}


if ($_POST['action'] === 'autodelivery'){


    $body = '<br>';

    $arrayEmails = array("vzaharchenko@groupst.ru", "ekleschev@groupst.ru", "zmalakhov@groupst.ru");

    $dateTime = date("d-m-Y H:i:s");
    $body = $body . $dateTime . " создана заявка<br><br>";

    $_name              = $_POST['fio'];
    $_email             = $_POST['email'];
    $_tel               = $_POST['tel'];




    $body = $body
        . "Имя: "
        . "$_name<br>"
        . "Email: "
        . "$_email<br>"
        . "Телефон: "
        . "$_tel<br>"
        . "<br>"

        . "<br>"




        . "send from vega-invest.ru";


    $modx->getService('mail', 'mail.modPHPMailer');
    $modx->mail->set(modMail::MAIL_BODY,$body);
    $modx->mail->set(modMail::MAIL_FROM,'site@workgroupst.ru');
    $modx->mail->set(modMail::MAIL_FROM_NAME,'workgroupst');
    // $modx->mail->set(modMail::MAIL_SUBJECT,'Заявка на перевозку с автодоставкой - workgroupst.ru');
    $modx->mail->set(modMail::MAIL_SUBJECT,'Заявка на перевозку с автодоставкой - groupst.ru');

    $countEmails = count($arrayEmails);
    for ($i = 0; $i < $countEmails; $i++) {
        $modx->mail->address('to',$arrayEmails[$i]);
    }

    $modx->mail->address('to','1zaur1@mail.ru');
    $modx->mail->address('to','zmalakhov@groupst.ru');


    $modx->mail->setHTML(true);
    if (!$modx->mail->send()) {
        $modx->log(modX::LOG_LEVEL_ERROR,'An error occurred while trying to send the email: '.$modx->mail->mailer->ErrorInfo);
    }
    $modx->mail->reset();







    $res = json_encode(
        array(
            // 'proverka'          => $body,
            // 'sum_type_avia'     => $_POST['action'],
            // 'sum_type_jdl20'    => $_POST['yourname_call'],
            // 'sum_type_jdl40'    => $_POST['phone_call'],
            // 'sum_type_jds'      => $_POST['callToFilial'],
            // 'sum_type_expess'   => $_POST['subject_call'],
            // 'sum_type_more'     => $_POST['message_call'],

        )
    );
    die($res);
}
else{
    return;
}

//Если у нас есть, что отдать на запрос - отдаем и прерываем работу парсера MODX
if (!empty($res)) {
    die($res);
}