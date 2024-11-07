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

if (localStorage.getItem('darkMode') === 'true') {
    document.body.classList.add("dark");
    checkbox.checked = true;
}

checkbox.addEventListener("change", () => {
  document.body.classList.toggle("dark");
  localStorage.setItem('darkMode', checkbox.checked);
});

document.addEventListener('DOMContentLoaded', () => {
    const isDark = localStorage.getItem('darkMode') === 'true';
    applyDarkMode(isDark);

    document.getElementById('checkbox').addEventListener('change', (event) => {
        const isChecked = event.target.checked;
        applyDarkMode(isChecked);
        localStorage.setItem('darkMode', isChecked);
    });
});

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

// Accordion
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}