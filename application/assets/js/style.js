

// Get the button that opens the modal

// Get the <span> element that closes the modal

// When the user clicks the button, open the modal 
function btnClickDelete(id) {
	console.log('modal-'+id);
	var modal = document.getElementById('modal-'+id);
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
function Close(id) {
	var modal = document.getElementById('modal-'+id);
    modal.style.display = "none";
}



var modal = document.getElementById("modal");
var createForm = document.getElementById("createForm");
var deleteForm = document.getElementById("deleteForm");
var updateForm = document.getElementById("updateForm");
var btnCreate = document.getElementById("btnCreate");
var span = document.getElementsByClassName("close")[0];
var btnClose = document.getElementById("btnCloseSup");

btnCreate.onclick = function() {

    createForm.style.display = "block";
    deleteForm.style.display = "none";
    updateForm.style.display = "none";
    modal.style.display = "block";

}


function openModalDelete(donnees){
    console.log(donnees);
    var hiddenInput = document.getElementById("supIdEvent");
    var zoneNom = document.getElementById("supNomEvent");
    var result  = donnees.split('-');
    hiddenInput.value= result[1];
    zoneNom.innerHTML = result[0];
    modal.style.display = "block";
    deleteForm.style.display = "block";
    createForm.style.display = "none";
    updateForm.style.display = "none";

}
function openModalDelete(donnees){
    console.log(donnees);
    var hiddenInput = document.getElementById("majIdEvent");
    var zoneNom = document.getElementById("majNomEvent");
    var result  = donnees.split('-');
    hiddenInput.value= result[1];
    zoneNom.innerHTML = result[0];
    modal.style.display = "block";
    deleteForm.style.display = "none";
    createForm.style.display = "none";
    updateForm.style.display = "block";

}
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    closeModal();
}

btnClose.onclick = function () {
    closeModal();
}
function closeModal(){
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
