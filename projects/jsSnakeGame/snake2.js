(function () {
    "use strict";

    const LEFT = 37,
        UP = 38,
        RIGHT = 39,
        DOWN = 40,
        SNAKE_SIZE = 64;

    var canvas = document.getElementById("theCanvas"),
        context = canvas.getContext('2d'),
        crunchSound = document.getElementById("crunch"),
        direction = RIGHT,
        snake = [{ x: -64, y: 0 }],
        appleX,
        appleY,
        score = 0,
        timeout,
        speed = 400;

    function resizeCanvas() {
        var width = window.innerWidth - 10;
        var height = window.innerHeight - 10;

        canvas.width = width - width % SNAKE_SIZE;
        canvas.height = height - height % SNAKE_SIZE;

        if (appleX) {
            placeApple();
        }
        //canvas.focus();
    }

    window.addEventListener('resize', resizeCanvas);

    resizeCanvas();

    function renderScore() {
        context.font = '48px cursive';
        if (score > 0) {
            context.fillStyle = 'white';
            context.fillText((score - 1).toString(), canvas.width - 100, 50);
        }
        context.fillStyle = 'black';
        context.fillText(score.toString(), canvas.width - 100, 50);
    }

    function gameLoop() {
        timeout = setTimeout(() => {
            var x = 0,
                y = 0,
                grew = false,
                prevX = snake[0].x,
                prevY = snake[0].y;

            switch (direction) {
                case LEFT:
                    x = -SNAKE_SIZE;
                    break;
                case UP:
                    y = -SNAKE_SIZE;
                    break;
                case RIGHT:
                    x = SNAKE_SIZE;
                    break;
                case DOWN:
                    y = SNAKE_SIZE;
                    break;
            }

            if (prevX + x < 0 || prevY + y < 0 || prevX + x >= canvas.width || prevY + y >= canvas.height) {
                crunchSound.currentTime = 0;
                crunchSound.play(); // should be a crash sound
                return;
            }

            for (var i = 3; i < snake.length; i++) {
                if (prevX + x === snake[i].x && prevY + y === snake[i].y) {
                    crunchSound.currentTime = 0;
                    crunchSound.play(); // should be a crash sound
                    return;
                }
            }

            if (prevX + x === appleX && prevY + y === appleY) {
                crunchSound.currentTime = 0;
                crunchSound.play();
                score++;
                speed *= 0.9;
                snake.push({ x: prevX, y: prevY });
                grew = true;
                placeApple();
            }

            let tail = snake.pop();

            snake.unshift({ x: prevX + x, y: prevY + y });

            if (!grew) {
                context.clearRect(tail.x, tail.y, SNAKE_SIZE, SNAKE_SIZE);
            }

            if (snake.length > 1) {
                context.fillStyle = "green";
                context.fillRect(prevX, prevY, SNAKE_SIZE, SNAKE_SIZE);
            }

            context.drawImage(snakeHead, snake[0].x, snake[0].y, SNAKE_SIZE, SNAKE_SIZE);

            renderScore();

            gameLoop();
        }, speed);
    }

    var snakeHead = document.createElement('img');
    snakeHead.src = "images/snake.png";

    snakeHead.onload = gameLoop;

    function getRandomNumberBetween(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    }

    function placeApple() {
        appleX = getRandomNumberBetween(0, canvas.width);
        appleY = getRandomNumberBetween(0, canvas.height);
        appleX = appleX - appleX % SNAKE_SIZE;
        appleY = appleY - appleY % SNAKE_SIZE;
        snake.forEach(function (s) {
            if (appleX === s.x && appleY === s.y) {
                placeApple();
            }
        });
        context.drawImage(apple, appleX, appleY, SNAKE_SIZE, SNAKE_SIZE);
        console.log(appleX, appleY, canvas.width, canvas.height);
        /* if (apple.complete) {
            context.drawImage(apple, appleX, appleY, SNAKE_SIZE, SNAKE_SIZE);
        } else {
            apple.onload = function () {
                context.drawImage(apple, appleX, appleY, SNAKE_SIZE, SNAKE_SIZE);
            }; */
    }

    var apple = document.createElement('img');
    apple.src = "images/apple.png";

    apple.onload = placeApple;

    renderScore();

    window.addEventListener('keydown', function (event) {
        switch (event.keyCode) {
            case LEFT:
                if (direction !== RIGHT || snake.length === 1) {
                    direction = LEFT;
                }
                break;
            case UP:
                if (direction !== DOWN || snake.length === 1) {
                    direction = UP;
                }
                break;
            case RIGHT:
                if (direction !== LEFT || snake.length === 1) {
                    direction = RIGHT;
                }
                break;
            case DOWN:
                if (direction !== UP || snake.length === 1) {
                    direction = DOWN;
                }
                break;
        }
    });
}());