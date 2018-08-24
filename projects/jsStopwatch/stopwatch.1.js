var pcs = pcs || {};

pcs.stopwatch = (function () {
    "use strict";

    var h1 = createElement("h1");
    var hoursTag = createElement("time");
    var minutesTag = createElement("time");
    var secondsTag = createElement("time");
    var centisecondsTag = createElement("time");
    var buttonDiv = createElement("div");
    var startButton = createElement("button");
    var resetButton = createElement("button");


    function get(id) {
        return document.getElementById(id);
    }

    function createElement(type) {
        return document.createElement(type);
    }

    function show() {

        h1.innerHTML = "Tzvi's Stopwatch";
        buttonDiv.appendChild(startButton);
        buttonDiv.appendChild(resetButton);
        document.body.appendChild(h1);
        document.body.appendChild(hoursTag);
        document.body.appendChild(minutesTag);
        document.body.appendChild(secondsTag);
        document.body.appendChild(centisecondsTag);
        document.body.appendChild(buttonDiv);

        document.body.style.textAlign = 'center';
        hoursTag.style.fontSize = '20vw';
        hoursTag.setAttribute("style", "font-size = 20vw; float:left;");
        minutesTag.setAttribute("style", "font-size = 20vw; float:left;");
        secondsTag.setAttribute("style", "font-size = 20vw; float:left;");
        centisecondsTag.setAttribute("style", "font-size = 20vw; float:left;");
        buttonDiv.style.clear = 'both';

        hoursTag.setAttribute("id", "hours");
        minutesTag.setAttribute("id", "minutes");
        secondsTag.setAttribute("id", "seconds");
        centisecondsTag.setAttribute("id", "centiseconds");
        startButton.setAttribute("id", "b");
        resetButton.setAttribute("id", "reset");
        resetButton.innerHTML = "Reset";

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
            hours = date.getUTCHours();
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
    }
    return {
        show: show
    };
}());