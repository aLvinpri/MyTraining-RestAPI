<?php

$data = file_get_contents('json/example.json');
$mahasiswa = json_decode($data, true);

var_dump($mahasiswa);
echo $mahasiwa[0]["pembimbing"][pembimbing1];