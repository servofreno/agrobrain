document.addEventListener("scroll", () =>{
    const portada = document.querySelector("#portada");
    let offset = window.pageYOffset;
    portada.style.backgroundPositionY = offset * 0.2 + "px";
});