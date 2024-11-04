document.getElementById('hamburger').addEventListener('click', function() {
    var navbarList = document.getElementById('navbar-list');
    if (navbarList.style.display === 'block') {
        navbarList.style.display = 'none';
    } else {
        navbarList.style.display = 'block';
    }
});

function myFunction(x) {
    x.classList.toggle("fa-thumbs-down");
}

const checkbox = document.getElementById("checkbox")
checkbox.addEventListener("change", () => {
  document.body.classList.toggle("dark")
})

// Pop Box
var aboutMeLink = document.getElementById('aboutMeLink');
aboutMeLink.addEventListener('click', function(event) {
    event.preventDefault();
    var userConfirmation = confirm('Apakah Anda ingin melanjutkan ke halaman About Me?');
    if (userConfirmation) {
        window.location.href = 'about_me.html';
    } 
    else {
        alert('Anda tetap berada di halaman ini.');
    }
});

