const darkmodelogo = document.getElementById("dlmode");
const body = document.getElementById("idbody");

const storageKey = 'darkModeEnabled'; 

function applyTheme(isDarkMode) {
    if (isDarkMode) {
        body.classList.add("darkmodecss");
        darkmodelogo.classList.add("active");
    } else {
        body.classList.remove("darkmodecss");
        darkmodelogo.classList.remove("active");
    }
}

function loadTheme() {
    const savedPreference = localStorage.getItem(storageKey); 
    
    const isDarkMode = (savedPreference === 'true');

    applyTheme(isDarkMode);
}

function toggleTheme() {
    const isCurrentlyDark = body.classList.contains("darkmodecss");
    
    const newThemeState = !isCurrentlyDark;
    
    applyTheme(newThemeState);
    
    localStorage.setItem(storageKey, newThemeState.toString());
}

loadTheme();

if (darkmodelogo) {
    darkmodelogo.addEventListener("click", toggleTheme);
}


/* ===== NAV BAR OPEN CLOSE ===== */
const btn_container = document.getElementById("nav-btn-container");
let lastScroll = 0;

window.addEventListener('scroll', () => {
    const currentScroll = window.scrollY;
    
    if(currentScroll > lastScroll && currentScroll > 50){
        btn_container.classList.add('collapsed');
    }
    else if (currentScroll === 0){
        btn_container.classList.remove('collapsed');
    }
    lastScroll = currentScroll;
});

// ===== Mobile Menu Toggle =====
const menuIcon = document.getElementById("menu-icon");

menuIcon.addEventListener("click", () => {
  btn_container.classList.toggle("active");
  menuIcon.classList.toggle("active");
});

// Close menu when clicking a link
document.querySelectorAll(".nav-btn a").forEach(link => {
  link.addEventListener("click", () => {
    btn_container.classList.remove("active");
    menuIcon.classList.remove("active");
  });
});
