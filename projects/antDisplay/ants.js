(function () {
    "use strict";
    let canvas = document.getElementById("theCanvas"),
        context = canvas.getContext('2d'),
        ants = [],
        button = getElem("add"),
        colorInput = getElem("color"),
        antsNumInput = getElem("number"),
        widthInput = getElem("width"),
        heightInput = getElem("height");

    function getElem(id) {
        return document.getElementById(id);
    }

    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    class Ant {
        constructor(color, widthPixels, heightPixels) {
            this.x = canvas.width / 2;
            this.y = canvas.height / 2;
            this.color = color;
            this.moveAmount = 0;
            this.moveHorizontal = 0;
            this.moveVertical = 0;
            this.widthPixels = widthPixels;
            this.heightPixels = heightPixels;
        }

        moveSmart() {
            this.moveAmount--;
            if (this.moveAmount < 1) {
                this.moveAmount = Ant.getRandomNumberBetween(1, 9);
                this.moveHorizontal = Ant.getRandomNumberBetween(-2, 2);
                this.moveVertical = Ant.getRandomNumberBetween(-2, 2);
            }
            this.x += this.moveHorizontal;
            this.y += this.moveVertical;
        }

        displayAnt() {
            context.fillStyle = this.color;
            context.fillRect(this.x, this.y, this.widthPixels || 2, this.heightPixels || 2);
        }
        static getRandomNumberBetween(min, max) {
            return Math.floor(Math.random() * (max - min + 1) + min);
        }
    }

    for (let i = 0; i < 10; i++) {
        ants.push(new Ant());
    }

    setInterval(() => {
        context.clearRect(0, 0, canvas.width, canvas.height);
        ants.forEach(function (ant) {
            ant.moveSmart();
            if (ant.x > canvas.width || ant.x < 0 || ant.y > canvas.height || ant.y < 0) {
                ant.x = canvas.width / 2;
                ant.y = canvas.height / 2;
            }
            ant.displayAnt();
        });
    }, 100);
    button.addEventListener('click', function () {
        let theColor = colorInput.value,
            antsNum = antsNumInput.value,
            widthPixels = widthInput.value,
            heightPixels = heightInput.value;
        for (let i = 0; i < antsNum; i++) {
            ants.push(new Ant(theColor, widthPixels, heightPixels));
        }
    });
}());