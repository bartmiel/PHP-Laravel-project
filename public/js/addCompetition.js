function addDistance() {
    var index = document.getElementById('distances').children.length;

    var distanceRow = "<div class='row mt-2'>" +
        "<div class='col-9'>" +
            `<input type='text' name='distances[${index}][name]' class='form-control'>` +
        "</div>" +

        "<div class='col-3'>" +
            `<input type='numer' name='distances[${index}][distancelimit]' class='form-control'>` +
        "</div>" +
    "</div>";

    document.getElementById('distances').insertAdjacentHTML('beforeend', distanceRow);
}
