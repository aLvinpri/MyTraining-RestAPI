<?php

// Install extension chrome = JSONview

/* *****************
        TEORI
****************** */

/* 

 A). PHP memiliki 2 method dalam mengelola data JSON
    1. json_encode() :
        berfungsi untuk mengubah array atau object 
        PHP menjadi data JSON agar bisa diakses orang lain/
        mesin.
        contoh :

        ***Data*** 
        $data = [
            "a" => 1,
            "b" => 2,
            "c" => 3
        ];

        echo json_encode($data);
        ***Hasil***
        {"a":1,"b":2,"c":3}

    2. json_decode() :
        berfungsi untuk mengubah data JSON menjadi array PHP.

        Cara mengakses JSON orang lain dengan PHP :
        1. file_get_content()

        contoh mengakses JSON:
        
        ***ambil data JSON dari file,
        ***bentuknya masih text
        $contents = file_get_content('data.json');
        
        ***kemudian ubah standart encode nya (opsional)
        $contents = utf8_encode($contents);

        ***terakhir ubah json menjadi array associative
        $contents = json_decode($contents, true);

        ***atau ubah json menjadi object
        $contents = json_decode($contents);

 B). Sedangkan Javascript juga memiliki 2 method dalam
    mengelola data JSON.

    1. JSON.stringify()
        berfungsi untuk mengubah object Javascript
        menjadi data JSON agar bisa diakses orang lain/
        mesin.
        contoh :

        ***Data*** 
        var data = {
            a => '1',
            b => '2',
            c => '3'
        };

        console.log(JSON.stringify(data));
        ***Hasil***
        {"a":"1","b":"2","c":"3"}

    2. JSON.parse()
        berfungsi untuk mengubah data JSON menjadi object
        javascript.

    Cara mengakses JSON orang lain dengan javascript :

    1. AJAX :
        - XMLHttpRequest (vanila/murni javascript)
        - JQuery (framework javascript)
        contoh :

        a. XMLHttpRequest
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function(){
                if( xhr.readystate === 4 && xhr.status === 200 ){
                    var data = JSON.parse(this.responseText);
                    console.log(data);
                }
            }

            xhr.open('GET', 'data.json', true);
            xhr.send();

*/

/* 
    Rest Server menggunakan library chriskacerguis = https://github.com/chriskacerguis/codeigniter-restserver
*/

/*
    Rest Client menggunakan GuzzlePHP = http://docs.guzzlephp.org/en/stable/
    install dengan composer require guzzlehttp/guzzle:~6.0
*/
