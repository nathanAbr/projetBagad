var element = [];
element = document.querySelectorAll(".event");
console.log(element);
for(var i = 0; i<element.count;i++){
    if(i % 2 == 0){
        element[i].classList.push("right");
    }
}
