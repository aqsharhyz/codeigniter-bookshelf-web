<?php

function emailer($attachment, $to, $title, $message) {
    $email = \Config\Services::email();
    $email_from = env('EMAIL_FROM');
    $email_name = env('EMAIL_NAME');

    $config['protocol'] = 'smtp';
    $config['SMTPHost'] = 'smtp.gmail.com';
    $config['SMTPUser'] = $email_from;
    $config['SMTPPass'] = env('EMAIL_PASSWORD');
    $config['SMTPPort'] = 587;
    $config['SMTPCrypto'] = 'tls';
    $config['mailType'] = 'html';

    $email->initialize($config);
    $email->setFrom($email_from, $email_name);
    $email->setTo($to);

    if ($attachment) {
        $email->attach($attachment);
    }

    $email->setSubject($title);
    $email->setMessage($message);

    if (!$email->send()) {
        $data = $email->printDebugger(['headers']);
        print_r($data);
        return false;
    }
    return true;
}