/*global $ */
(function () {
    "use strict";

    var img = $('img');
    var i = 1;

    $('#prevButton').click(function () {
        if (i === 1) {
            i = 4;
        }
        i--;
        getPicture();
    });
    $('#nextButton').click(function () {
        if (i === 3) {
            i = 0;
        }
        i++;
        getPicture();
    });
    getPicture();

    function getPicture() {
        $.post("getPicture.php", { id: i }, function (pictureData) {
            img.attr('src', JSON.parse(pictureData));
        });
    }
}());

