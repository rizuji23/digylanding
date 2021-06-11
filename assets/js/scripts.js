$('.owl-carousel').owlCarousel({
    loop: false,
    margin: -10,
    nav: false,
    dots: false,
    autoWidth: true,
    items: 6,
})

$(document).ready(function () {
    $('.carousel').carousel({
        interval: 4000,
        ride: 'carousel'
    });

    getjadwal('all');
});

$('#summernote').summernote({
    placeholder: 'Isi artikel disini...',
    tabsize: 2,
    height: 300,
    toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
    ]
});
$('.icon-p').click(function () {
    if ($('.pesan-prompt').hasClass('d-pesan-h')) {
        $('.pesan-prompt').addClass('d-pesan-s')
        $('.pesan-prompt').removeClass('d-pesan-h')
    } else if ($('.pesan-prompt').hasClass('d-pesan-s')) {
        $('.pesan-prompt').addClass('d-pesan-h')
        $('.pesan-prompt').removeClass('d-pesan-s')
    }
})

$('#pemb').mouseenter(function () {
    $('.dropdown-responsive').css('display', 'block')

}).mouseout(function () {
    $('.dropdown-responsive').css('display', 'none')
})

$('.dropdown-i-r').mouseenter(function () {
    $('.dropdown-responsive').css('display', 'block')

}).mouseout(function () {
    $('.dropdown-responsive').css('display', 'none')
})

$('#pemb').click(function () {
    $('.dropdown-responsive').css('display', 'block')
})

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

function getjadwal(detail) {
    console.log(detail)
    $.ajax({
        url: "https://kelasvirtual.digyhomeschooling.id/api/getjadwal/" + detail,
        method: 'POST',
        dataType: 'json',
        success: function (data) {
            if (data.data_jadwal.length > 0) {
                $('#empty').hide();
                for (var i = 0; i < data.data_jadwal.length; i++) {
                    var cols = "";
                    var no = 1;
                    var status;
                    var a;

                    if (data.data_jadwal[i].status == "2") {
                        status = `<span class="badge badge-success">Sedang Berlangsung</span>`;
                        a = `/guru/getzoom/` + data.data_jadwal[i].id_zoom + ``;
                    } else {
                        status = `<span class="badge badge-danger">Error</span>`;
                        a = `#`;
                    }
                    cols += `<div class="col">
                    <div class="box-jadwal">
                        <img class="card-img-top card-img" src="https://kelasvirtual.digyhomeschooling.com/thumbnail/` + data.data_jadwal[i].thumbnail + `" alt="Img-background">
                        <div class="img-user-fix">
                            <img class="rounded-circle img-user-s img-fluid" src="https://kelasvirtual.digyhomeschooling.com/thumbnail/` + data.data_jadwal[i].dir_image + `" alt="Img-User">
                        </div>
                        <div class="jadwal-content">
                            <div class="col p-0">
                                <div class="detail-nama">
                                    <p>` + data.data_jadwal[i].nama_guru + `</p>
                                </div>
                                <div class="detail-judul">
                                    <h3>` + data.data_jadwal[i].judul_pertemuan + `</h3>
                                </div>
                                <div class="detail-jadwal">
                                    <h5>` + data.data_jadwal[i].tanggal_pertemuan + `</h5>
                                </div>
                            </div>
                            ` + status + `
                        </div>
                    </div>
                </div>`;
                    $("#jadwal_zoom").append(cols);
                }
            } else {
                $('#empty').show();
            }
        }
    });
}

function getjadwalclass(detail) {
    console.log(detail)
    getjadwal(detail);
}