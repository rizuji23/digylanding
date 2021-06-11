window.onload = function () {
    showarticle("all");
}

$('#keyword').keydown(function () {
    var key = $(this).val();

    showarticle(key);
})

function showarticle(value) {
    $.ajax({
        url: 'controller/ajax',
        method: 'POST',
        data: {
            'articleall': value
        },
        success: function (data) {
            $('#dataarticle').html(data);
        }
    })

}

$('.detail').click(function () {
    var i = $(this).attr('id');
    $.ajax({
        url: '../controller/ajax',
        data: {
            'detailArtikel': i
        },
        method: "POST",
        success: function (data) {
            $('#modalArtikel').html(data);
        }
    })
})