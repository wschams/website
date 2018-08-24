"use strict";

function Vehicle(color) {
    this.color = color;
}

Vehicle.prototype.go = function (speed) {
    this.speed = speed;
    console.log("now going at speed ", speed);
};

Vehicle.prototype.print = function () {
    console.log("Speed:", this.speed);
    console.log("Color:", this.color);
};

function Plane(color) {
    this.color = color;
}

Plane.prototype = Object.create(Vehicle.prototype);
Plane.prototype.go = function (speed) {
    this.speed = speed;
    console.log("now flying at speed ", speed);
};
var camry = new Vehicle("grey");
camry.go("25mph");
var plane = new Plane("white");
plane.go("500mph");
camry.print();
plane.print();

