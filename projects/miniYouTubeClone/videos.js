/*global $*/
//use getJson
(function () {
    "use strict";

    var div = $('div'),
        videoTag = $('video'),
        title = $('p'),
        list = $('ul');

    $.get("projects/miniYouTubeClone/getVideos.php", function (loadedVideos) {
        JSON.parse(loadedVideos).forEach(function (video) {
            loadVideoOption(video);
        });
    });

    function loadVideoOption(video) {
        $('<li><figcaption>' + video.title + '</figcaption><figure><img src = "' + video.img + '">' + '</figure></li>')
            .appendTo(list)
            .click(function () {
                videoTag.show();
                addVideo(video);
                videoTag[0].play();
            });
    }

    function addVideo(video) {
        videoTag.attr('src', video.url);
        title.text(video.title);
        div.attr('title', video.title);
        videoTag.attr('poster', video.img);
    }
}());