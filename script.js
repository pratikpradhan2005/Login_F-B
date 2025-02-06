
  

let img1 = document.getElementById('output-img1');
let img2 = document.getElementById('output-img2');
let button = document.getElementById('input-search');
let radio1 = document.getElementById('input-radio1');
let radio2 = document.getElementById('input-radio2');
let outputDiv = document.getElementById('output-div');
let messageDiv = document.createElement('div');

button.addEventListener('click', () => {
   
    img1.style.display = 'none';
    img2.style.display = 'none';
    messageDiv.textContent = '';

    
    outputDiv.appendChild(messageDiv);

    document.getElementById('sidebar').classList.add('show');
})

  var modal = document.getElementById("forgotPasswordModal");

  var btn = document.querySelector(".text a");

  var span = document.getElementsByClassName("close")[0];


  btn.onclick = function() {
    modal.style.display = "block";
  }


  span.onclick = function() {
    modal.style.display = "none";
  }
  
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }

  



