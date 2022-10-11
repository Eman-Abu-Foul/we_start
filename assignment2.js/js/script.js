window.addEventListener("contextmenu",function(event){
  event.preventDefault()
});
window.oncontextmenu = (e) => {
  e.preventDefault
  let context = document.querySelector('#context-menu');
  let x = e.offsetX, y = e.offsetY;
  context.style.top = `${y}px`;
  context.style.left = `${x}px`;
  context.style.visibility = "visible";
  context.classList.add("active");
};

document.addEventListener("click", () => document.querySelector('#context-menu').classList.remove("active"));