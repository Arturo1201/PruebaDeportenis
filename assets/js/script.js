$(document).ready(function() {
    $('#loadGps').click(function() {
        var address = $('input[name="domicilio"]').val() + ' ' + $('input[name="numero"]').val() + ', ' + $('input[name="ciudad"]').val() + ', ' + $('input[name="estado"]').val();
        
        $.getJSON('https://nominatim.openstreetmap.org/search?format=json&limit=1&q=' + encodeURIComponent(address), function(data) {
            if (data.length > 0) {
                $('input[name="latitud"]').val(data[0].lat);
                $('input[name="longitud"]').val(data[0].lon);
            } else {
                alert("No se encontraron datos de GPS para esta dirección.");
            }
        });
    });
});
