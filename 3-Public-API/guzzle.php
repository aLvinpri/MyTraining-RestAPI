<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

$response = $client->request('GET', 'http://omdbapi.com', [
  'query' => [
    'apikey' => 'dca61bcc',
    's' => 'transformer'
  ]
]);

$result = json_decode($response->getBody()->getContents(), true);

// var_dump($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Rest Client with Guzzle</title>
</head>

<body>
  <?php foreach ($result['Search'] as $data) : ?>
    <ul>
      <li>Title : <?= $data['Title']; ?></li>
      <li>Year : <?= $data['Year']; ?></li>
      <li>
        <img src="<?= $data['Poster']; ?>" alt="">
      </li>
    </ul>
  <?php endforeach; ?>
</body>

</html>