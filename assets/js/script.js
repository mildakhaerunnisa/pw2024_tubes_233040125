// //ambil elemen yg dibutuhkan
// var keyword = document.getElementById('keyword');
// var tombolCari = document.getElementById('tombol-cari');
// var container = document.getElementById('container');

// //tambahkan event ketika keyword ditulis
// keyword.addEventListener('keyup', function() {

//   //buat object ajax
//   var xhr = new XMLHttpRequest()

//   // cek kesiapan ajax
//   xhr.onreadystatechange = function() {
//     if( xhr.readyState == 4 && xhr.status == 200) {
//       container.innerHTML = xhr.responseText;
//     }
//   }

//   //eksekusi ajax
//   xhr.open('GET', 'ajax/movies.php?keyword=' + keyword.value, true);
//   xhr.send();
// });

// jquery
$(document).ready(function(){

    //tombol cari
    $('#tombol-cari_movie').hide();
    // ketika keywoard di tulis
    $('#keyword_movie').on('keyup', function(){
        $('#container').load('../ajax/movie.php?keyword=' + $('#keyword_galery').val());
    });

});

$(document).ready(function(){

    //tombol cari 
    $('#tombol-cari_category').hide();
    // ketika keywoard di tulis
    $('#keyword').on('keyup', function(){
        $('#container').load('../ajax/category.php?keyword=' + $('#keyword').val());
    });

});