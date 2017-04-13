var element = [];
element = document.querySelectorAll(".event");
console.log(element);
for(var i = 0; i<element.count;i++){
    if(i % 2 == 0){
        element[i].classList.push("right");
    }
}


// Get the modal
var modal = document.getElementById("modal");
var createForm = document.getElementById("createForm");
var deleteForm = document.getElementById("deleteForm");
var updateForm = document.getElementById("updateForm");
/*var modalDelete = document.getElementById('modalDelete');
var modalUpdate = document.getElementById('modalUpdate');*/
// Get the button that opens the modal
var btnCreate = document.getElementById("btnCreate");
var listButtonDelete = document.getElementsByClassName("btnDelete");
var listButtonUpdate = document.getElementsByClassName("btnUpdate");
//var btnUpdate = document.getElementById("btnUpdate");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
/*var spanDelete = document.getElementsByClassName("close")[1];
var spanUpdate = document.getElementsByClassName("close")[2];*/
// When the user clicks the button, open the modal 
btnCreate.onclick = function() {
    modal.style.display = "block";
    createForm.style.display = "block";
}

for( item of listButtonDelete){
    item.onclick = function(){
        modal.style.display = "block";
        deleteForm.style.display = "block";
    }
}

for( item of listButtonUpdate){
    item.onclick = function(){
        modal.style.display = "block";
        updateForm.style.display = "block";
    }
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
    createForm.style.display = "none";
    deleteForm.style.display = "none";
    updateForm.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
