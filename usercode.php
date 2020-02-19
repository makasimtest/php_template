<?php

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

require_once __DIR__.'/vendor/autoload.php';

function handle($data) {
    $loader = new \Twig\Loader\ArrayLoader([
        'subscription_mail' => <<<EOL
<h1>Hello {{ name }}!</h1>

<p>You've successfully subscribed to {{mailing_list}} mailing list!.</p> 
<p>To unsubscribe click <a href="{{unsubscribe_link}}">Unsubscribe</a>.</p>
EOL
    ]);

    $twig = new \Twig\Environment($loader);

    $data['body'] = $twig->render('subscription_mail', $data);

    return $data;
}