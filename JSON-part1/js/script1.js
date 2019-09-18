/*
1). Cara merubah Object Javascript menjadi JSON dengan JSON.stringify

    let mahasiswa = {
    nama: "Alfin",
    nrp: "030403023",
    email: "Alfin@bsi.ac.id"

    console.log(JSON.stringify(mahasiswa));

    
2). Cara merubah JSON menjadi Object Javascript dengan JSON.parse

let xhr = new XMLHttpRequest();
xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
        let mahasiswa = JSON.parse(this.responseText);
        console.log(mahasiswa);
        }
    }
    xhr.open('GET', 'example.json', true);
    xhr.send();

}
*/

// Cara merubah JSON menjadi Object Javascript dengan Jquery

$.getJSON('js/example.json', function (data) {
    console.log(data);
});