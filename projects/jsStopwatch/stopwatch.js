(function () {
    "use strict";
    function get(id) {
        return document.getElementById(id);
    }
    var intervalId;
    var timeElapsed;
    var displayHours = get("hours");
    var displayMinutes = get("minutes");
    var displaySeconds = get("seconds");
    var displayCentiseconds = get("centiseconds");
    var b = get("b");
    var reset = get("reset");
    var time;
    var seconds;
    var minutes;
    var hours;
    var centiseconds;
    var startString = 'Start';
    var stopString = 'Stop';
    var accumulatedTime;

    function getTimeElapsed() {
        var date = new Date(timeElapsed);
        minutes = date.getMinutes();
        seconds = date.getSeconds();
        hours = date.getHours() - 19;
        centiseconds = (date.getMilliseconds() + '').slice(1);
    }

    function display() {
        displayHours.innerHTML = (1e2 + hours + '').slice(-2);
        displayMinutes.innerHTML = ':' + (1e2 + minutes + '').slice(-2);
        displaySeconds.innerHTML = ':' + (1e2 + seconds + '').slice(-2);
        displayCentiseconds.innerHTML = '.' + (1e2 + centiseconds + '').slice(-2);
    }

    function startDisplay() {
        displayHours.innerHTML = '00';
        displayMinutes.innerHTML = ':' + '00';
        displaySeconds.innerHTML = ':' + '00';
        displayCentiseconds.innerHTML = '.' + '00';
    }

    b.innerHTML = startString;
    startDisplay();

    b.addEventListener('click', function () {
        if (b.innerHTML === startString) {
            time = new Date();
            intervalId = setInterval(function () {
                if (intervalId) {
                    timeElapsed = new Date() - time;
                    if (accumulatedTime) {
                        timeElapsed += accumulatedTime;
                    }
                    getTimeElapsed();
                }
                display();
            }, 6);
            b.innerHTML = stopString;
        } else {
            accumulatedTime = timeElapsed;
            clearInterval(intervalId);
            b.innerHTML = startString;
        }
    });
    reset.addEventListener('click', function () {
        startDisplay();
        accumulatedTime = 0;
    });
}());