document.addEventListener("DOMContentLoaded", function() {
  const toggle = document.getElementById("nav-toggle");
  const nav = document.getElementById("site-nav");
  if (toggle && nav) {
    toggle.addEventListener("click", function() {
      nav.classList.toggle("active");
    });
  }
});
