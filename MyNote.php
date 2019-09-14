<?php

// Install extension chrome = JSONview

/* *****************
        TEORI
****************** */

/* PHP memiliki 2 method dalam mengelola data JSON
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

        Cara mengakses JSON orang lain :
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

*/