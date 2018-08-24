/*global $ */
(function () {
    "use strict";

    var slideIndex = 0;
    var imgs = [$('#1'), $('#2'), $('#3')];
    var divs = [$('#captionOne'), $('#captionTwo'), $('#captionThree')];
    var x = 0;

    $.post("getPictures.php", function (pictureData) {
        JSON.parse(pictureData).forEach(function (picture) {
            imgs[x].attr('src', picture.url);
            divs[x].text(picture.title);
            x++;
        });
    });

    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) { slideIndex = 1; }
        slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 1500); // Change image every 1.5 seconds
    }
}());