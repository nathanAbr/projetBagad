

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
