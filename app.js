var id = [];
var gambar = [];
var nama = [];
var kecamatan = [];
var alamat = [];
var keterangan = [];
var status_lokasi = [];
var lokasi = [];
var cords = '';
var area = [];
var infoWindow;

function peta_awal(){
    var bengkulu = new google.maps.LatLng(-3.7932106,102.2513903);
    var petaoption = {
        zoom: 10,
        center: bengkulu,
        mapTypeId: google.maps.MapTypeId.RoadMap
    };

    peta = new google.maps.Map(document.getElementById("map-canvas"),petaoption);

    url = "ambildata.php";
    $.ajax({
        url: url,
        dataType: 'json',
        cache: false,
        success: function(msg){
            var polygon;
            var cords = [];
            for(i=0;i<msg.bengkulu.lahan.length;i++){
                id[i] = msg.bengkulu.lahan[i].id;
                gambar[i] = msg.bengkulu.lahan[i].gambar;
                nama[i] = msg.bengkulu.lahan[i].nama_lokasi;
                kecamatan[i] = msg.bengkulu.lahan[i].kecamatan;
                alamat[i] = msg.bengkulu.lahan[i].alamat;
                status_lokasi[i] = msg.bengkulu.lahan[i].status;
                keterangan[i] = msg.bengkulu.lahan[i].keterangan;
                lokasi[i] = msg.bengkulu.lahan[i].polygon;

                var str = lokasi[i].split(" ");

                for (var j=0; j < str.length; j++) {
                    var point = str[j].split(",");
                    cords.push(new google.maps.LatLng(parseFloat(point[0]), parseFloat(point[1])));
                }

               var contentString = '<b>'+nama[i]+'</b><br>' +
                                    'Kecamatan: '+ kecamatan[i] +
                                    '<br>' +
                                    'Keterangan: '+ keterangan[i] +
                                    '<br>' +
                                    'Status Lokasi : '+ status_lokasi[i] +
                                    '<br><img src =dist/img/'+ gambar[i] +'> <h3> <a href="lokasi/detail/' + id[i] + ' "> Detail  </h3></a>  ';

                polygon = new google.maps.Polygon({
                    paths: [cords],
                    strokeColor: msg.bengkulu.lahan[i].warna,
                    strokeOpacity: 0,
                    strokeWeight: 1,
                    fillColor: msg.bengkulu.lahan[i].warna,
                    fillOpacity: 0.5,
                    html: contentString
                });

                cords = [];
                polygon.setMap(peta);
                infoWindow = new google.maps.InfoWindow();
                google.maps.event.addListener(polygon, 'click', function(event) {
                    infoWindow.setContent(this.html);
                    infoWindow.setPosition(event.latLng);
                    infoWindow.open(peta);
                });
            }
        }
    });
}

$(document).ready(function(){
    $("#search").click(function(){
        var kecamatan  = $("#kecamatan").val();
        var status     = $("#status").val();
        $.ajax({
            url: "caripeta.php",
            data: "kecamatan="+kecamatan+"&status="+status,
            dataType: 'json',
            cache: false,
            success: function(msg) {
                // var bengkulu2 = new google.maps.LatLng(-6.284600, 107.381583);
                var bengkulu2 = new google.maps.LatLng(-3.7932106,102.2513903);
                var petaoption2 = {
                    zoom: 10,
                    center: bengkulu2,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };

                var peta2 = new google.maps.Map(document.getElementById("map-canvas"),petaoption2);

                var polygon;
                var cords = [];
                for(i=0;i<msg.bengkulu.lahan.length;i++){
                    nama[i] = msg.bengkulu.lahan[i].nama_lokasi;
                    kecamatan[i] = msg.bengkulu.lahan[i].kecamatan;
                    alamat[i] = msg.bengkulu.lahan[i].alamat;
                    status_lokasi[i] = msg.bengkulu.lahan[i].status;
                    keterangan[i] = msg.bengkulu.lahan[i].keterangan;
                    lokasi[i] = msg.bengkulu.lahan[i].polygon;
                    id[i] = msg.bengkulu.lahan[i].id;
                    gambar[i] = msg.bengkulu.lahan[i].gambar;

                    var str = lokasi[i].split(" ");

                    for (var j=0; j < str.length; j++) {
                        var point = str[j].split(",");
                        cords.push(new google.maps.LatLng(parseFloat(point[0]), parseFloat(point[1])));
                    }

                    var contentString = '<b>'+nama[i]+'</b><br>' +
                                        'Alamat: '+ alamat[i] +
                                        '<br>' +
                                        'Kecamatan: '+ kecamatan[i] +
                                        '<br>' +
                                        'Keterangan: '+ keterangan[i] +
                                        '<br>' +
                                        'Status Lokasi : '+ status_lokasi[i] +
                                        '<br><img src =dist/img/'+ gambar[i] +'> <h3> <a href="lokasi/detail/' + id[i] + ' "> Detail  </h3></a>  ';

                    polygon = new google.maps.Polygon({
                        paths: [cords],
                        strokeColor: msg.bengkulu.lahan[i].warna,
                        strokeOpacity: 0,
                        strokeWeight: 1,
                        fillColor: msg.bengkulu.lahan[i].warna,
                        fillOpacity: 0.5,
                        html: contentString
                    });

                    cords = [];

                    polygon.setMap(peta2);
                    google.maps.event.addListener(polygon, 'click', function(event) {
                        infoWindow.setContent(this.html);
                        infoWindow.setPosition(event.latLng);
                        infoWindow.open(peta2);
                    });
                }
            }
        });
    });
});
