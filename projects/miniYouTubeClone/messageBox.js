var pcs = pcs || {};

pcs.messageboxes = (function () {
    "use strict";

    var buttonDiv;

    function show(buttonAmount) {

        var InputDiv = createElement("div");
        var label = createElement("label");
        var input = createElement("input");
        var inputButton = createElement("button");
        var checkbox = createElement("input");
        var modalDiv = createElement("div");
        var top = 50;
        var zIndex = 2;

        inputButton.type = "text";
        checkbox.type = "checkbox";

        InputDiv.appendChild(label);
        InputDiv.appendChild(input);
        InputDiv.appendChild(inputButton);
        document.body.appendChild(InputDiv);
        document.body.appendChild(checkbox);

        label.innerHTML = 'Please type message';
        inputButton.innerHTML = 'Submit';

        function createMessageBox(buttonAmount) {
            var div = createElement("div");
            var span = createElement("span");
            buttonDiv = createElement("div");
            var okButton = createElement("button");

            div.appendChild(span);
            okButton.innerHTML = "OK";
            buttonDiv.appendChild(okButton);
            div.appendChild(buttonDiv);

            document.body.style.height = '100%';
            div.style.backgroundColor = 'lightblue';
            div.style.padding = '20px';
            div.style.width = '400px';
            div.style.height = '100px';
            div.style.border = '1px solid blue';
            div.style.position = 'absolute';
            div.style.left = '50%';
            if (checkbox.checked) {
                div.style.top = '50%';
            } else {
                div.style.top = top + '%';
            }
            div.style.marginLeft = '-200px';
            div.style.marginTop = '-50px';
            div.style.boxSizing = 'border-box';
            div.style.display = 'inline-block';

            buttonDiv.style.position = 'absolute';
            buttonDiv.style.bottom = '6px';
            buttonDiv.style.textAlign = 'center';
            buttonDiv.style.width = '100%';
            buttonDiv.style.marginLeft = '-20px';

            span.innerHTML = input.value;
            document.body.appendChild(div);

            div.style.zIndex = zIndex;

            top += 1;

            passButtons(buttonAmount);

            div.addEventListener("click", function () {
                div.style.zIndex = ++zIndex;
            });

            okButton.addEventListener("click", function () {
                document.body.removeChild(div);
                document.body.removeChild(modalDiv);
                checkbox.checked = false;
            });
        }

        inputButton.addEventListener("click", function () {
            createMessageBox(buttonAmount);
            if (checkbox.checked) {
                document.body.appendChild(modalDiv);
                modalDiv.style.height = '100%';
                modalDiv.style.width = '100%';
                modalDiv.style.backgroundColor = 'lightgray';
                modalDiv.style.position = 'absolute';
                modalDiv.style.opacity = '.5';
                modalDiv.style.top = '0';
                modalDiv.style.zIndex = '1';
            }
        });

    }

    function createElement(type) {
        return document.createElement(type);
    }

    function passButtons(buttonAmount) {
        var buttonArray = [];
        for (let i = 0; i < buttonAmount; i++) {
            buttonArray[i] = createElement("button");
            buttonArray[i].innerHTML = i + '';
            buttonDiv.appendChild(buttonArray[i]);
            //block(i);
            buttonArray[i].addEventListener("click", function () {
                console.log('button ' + i + " was pressed");
            }
            );
        }
    }

    return {
        show: show
    };
}());