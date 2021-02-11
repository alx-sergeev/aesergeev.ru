<?php
/**
 * Файл с функциями для сайта.
 */
use \Bitrix\Main\Application as App;


/**
 * Функция для отладки кода.
 */
function _deb($var)
{
    echo '<pre>';
    print_r($var);
    echo '</pre>';

    return;
}

/**
 * @param $to
 * @param $subject
 * @param $message
 * @param string $additional_headers
 * @param string $additional_parameters
 * Кастомная функция отправки всех почтовых писем Битрикс через SMTP
 */
if(!function_exists('custom_mail'))
{
    function custom_mail($to, $subject, $message, $additional_headers = '', $additional_parameters = '')
    {
        require_once(App::getDocumentRoot() . '/local/php_interface/include/classes/PHPMailer/PHPMailer.php');
        require_once(App::getDocumentRoot() . '/local/php_interface/include/classes/PHPMailer/SMTP.php');
        require_once(App::getDocumentRoot() . '/local/php_interface/include/classes/PHPMailer/Exception.php');

        $phpMailer = new \PHPMailer\PHPMailer\PHPMailer;

        $phpMailer->IsSMTP();
        $phpMailer->SMTPAuth = true;
        $phpMailer->SMTPDebug = 0;
        $phpMailer->SMTPSecure = 'ssl';
        $phpMailer->Host = SMTP_HOST;
        $phpMailer->Port = SMTP_PORT;
        $phpMailer->Username = SMTP_USER;
        $phpMailer->Password = SMTP_PSWD;

        $phpMailer->isHTML(true);
        $phpMailer->CharSet =  'UTF-8';

        $address = explode(',', $to);
        foreach ($address as $addr)
            $phpMailer->addAddress($addr);

        $phpMailer->Subject = $subject;
        $phpMailer->msgHTML($message);
        $phpMailer->setFrom(SMTP_USER, SMTP_FROM_NAME);

        if(!$phpMailer->send()) {
            AddMessage2Log(
            	'To: ' . $to . PHP_EOL.
            	'Subject: ' . $subject . PHP_EOL.
            	'Message: ' . $message . PHP_EOL.
            	'Headers: ' . $additional_headers . PHP_EOL.
            	'Params: ' . $additional_parameters . PHP_EOL
            );
        }
    }
}