var form = document.querySelector("form");
var block = document.querySelector(".basis");
var p = document.querySelector("p");
form.addEventListener("mouseover",function () {
    block.style.background = "black";
    form.style.opacity = 1;
    p.style.color = "white";
});
form.addEventListener("mouseout",function () {
    block.style.background = "white";
    form.style.opacity = 0;
});
console.log(p);