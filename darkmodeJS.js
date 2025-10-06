const darkmodelogo = document.getElementById("dlmode");
const body = document.getElementById("idbody");

function darkact(){ /* kaning active makita ni sa css */
    darkmodelogo.classList.toggle("active");
                /* Ang classlist kay iyahang e 
                    control ang classes sa sulod sa 
                    class nga gitawag. Example:
                    Ang dlmode nga class iyahang gi
                    control ang tanang class sa sulod
                    sa dlmode
                    Result:
                    class="dlmode active" */

    body.classList.toggle("darkmodecss");
                /* Ang toggle kay mura ni cyag
                    add og remove. Example: Ang 
                    classList iyahang tan-awon ang
                    mga class nya ang toggle iyahang
                    tan-awon kung naay class nga
                    darkmodecss kung naa iyahang e
                    remove kung wla iyahang e add */
}

darkmodelogo.addEventListener("click", darkact);
            /* addEventListener kay murag mga events
                kapareha anang click */



const btn_container = document.getElementById("nav-btn-container");
let lastScroll = 0;

window.addEventListener('scroll', () => {
    const currentScroll = window.scrollY;
    
    if(currentScroll > lastScroll && currentScroll > 50){
        btn_container.classList.add('collapsed');
    }
    else{
        btn_container.classList.remove('collapsed');
    }
    lastScroll = currentScroll;
});