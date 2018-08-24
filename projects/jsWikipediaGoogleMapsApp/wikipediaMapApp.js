/*global $, google */
(function () {
    "use strict";

    var location = { lat: 40.0821, lng: 74.2097 };
    var map = new google.maps.Map(
        document.getElementById('map'),
        {
            center: location,
            zoom: 2,
            mapTypeId: google.maps.MapTypeId.SATELLITE
        }
    );
    var drawingManager = new google.maps.drawing.DrawingManager({
        drawingControl: true,
        drawingControlOptions: {
            position: google.maps.ControlPosition.TOP_CENTER,
            drawingModes: ['marker', 'circle', 'polygon', 'polyline', 'rectangle']
        },
        markerOptions: { icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png' },
        circleOptions: {
            fillColor: '#ffff00',
            fillOpacity: 1,
            strokeWeight: 5,
            clickable: false,
            editable: true,
            zIndex: 1
        }
    });

    var numResultsInput = $('#numResults');
    var infoWindow = new google.maps.InfoWindow({
        maxWidth: 250
    });
    var wikipedia;
    var tagInput = $('#tag');
    var ul = $('ul');
    var liDiv = $('#liDiv');
    var theLi;
    var markers = [];

    drawingManager.setMap(map);
    tagInput.focus();

    function loseFocus(object) {
        setTimeout(function () {
            object.blur();
        }, 300);
    }

    $("#go").click(function () {
        loseFocus(this);
        $.getJSON('http://api.geonames.org/wikipediaSearch?callback=?',
            {
                q: tagInput.val(),
                maxRows: numResultsInput.val(),
                username: 'tschams',
                type: 'json'
            },
            function (data) {
                var bounds = new google.maps.LatLngBounds();
                wikipedia = data.geonames.map(function (place) {
                    return {
                        title: place.title,
                        summary: place.summary,
                        feature: place.feature,
                        lng: place.lng,
                        thumbnailImg: place.thumbnailImg,
                        lat: place.lat,
                        wikipediaUrl: place.wikipediaUrl
                    };
                });
                wikipedia.forEach(function (place) {
                    var location = { lat: place.lat, lng: place.lng };
                    var marker = new google.maps.Marker({
                        position: location,
                        map: map,
                        title: place.title,
                        icon: place.thumbnailImg ? {
                            url: place.thumbnailImg,
                            scaledSize: new google.maps.Size(50, 50)
                        } : null
                    });

                    bounds.extend(location);

                    marker.addListener('click', function () {
                        infoWindow.setContent(place.summary + '<br><a target="_blank" href="http://' + place.wikipediaUrl + '">Wikipedia</a>');
                        infoWindow.open(map, marker);
                    });

                    markers.push(marker);

                    theLi = $('<li class="nav-item"><a class="nav-link active" href="#"onclick="return false;"><figure><figcaption>'
                        + place.title + '</figcaption><fig><img src = "' + (place.thumbnailImg || 'default.png') + '" > </fig></figure></a></li>')
                        .appendTo(liDiv)
                        .click(function () {
                            map.panTo(location);
                            map.setZoom(15);
                        });
                });
                map.fitBounds(bounds);
            });
    });
    $('#clear').click(function () {
        loseFocus(this);
        liDiv.empty();
        numResultsInput.val(10);
        tagInput.val('');
        markers.forEach(function (marker) {
            marker.setMap(null);
        });
        markers = [];
        tagInput.focus();
    });

    google.maps.event.addListener(drawingManager, 'circlecomplete', function (circle) {
        var radius = circle.getRadius();
    });

    google.maps.event.addListener(drawingManager, 'overlaycomplete', function (event) {
        if (event.type == 'circle') {
            var radius = event.overlay.getRadius();
        }
    });
}());