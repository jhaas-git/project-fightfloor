// Register modal
var modal = document.getElementById("registerModal");
var btn = document.getElementById("registerBtn");
var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  modal.style.display = "block"; // on click open modal
}
span.onclick = function() {
  modal.style.display = "none"; // on click close modal
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none"; // on click out of window, close modal
  }
}