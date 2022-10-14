// window.scroll = () =>{
//   let header = document.querySelector('header');

//   if (window.scrollY > "721") {
//     header.style.backgroundColor = "#000"
//   } else {
//     header.style.backgroundColor = "transparent"
//   }
// }

let header = document.querySelector("header")
let sticky = header.offsetHeight;
window.addEventListener("scroll", () =>{
  header.classList.toggle("back", window.scrollY > "650")
})


let scrollTop = document.querySelector(".scroll");
scrollTop.addEventListener('click',()=>{
  window.scrollBy(0, -100000);
})


let menu_li = document.querySelectorAll(".filters_menu li")
let images = document.querySelectorAll(".box img")
let images_box =document.querySelectorAll(".filters_box .box");

menu_li.forEach(li => {
  li.addEventListener("click",removeActive)
  li.addEventListener("click",manageImgs)
})

function removeActive(){
  li.forEach(el=>{
      el.classList.remove("active")
      this.classList.add("active")
  })
}

function manageImgs() {
  images_box.forEach((el) => {
      console.log(el)
      el.style.display = "none";
  });
  document.querySelectorAll(this.dataset.cat).forEach((el) => {
    el.style.display = "block";
  });
}

let form = document.getElementById("form")
let name =document.querySelector("#name");
let email =document.querySelector("#email");
let phone = document.querySelector("#phone")
let enterName = document.querySelector(".enterName")
let enterEmail = document.querySelector(".enterEmail")
let enterPhone = document.querySelector(".enterPhone")





form.addEventListener("submit", el=>{
  console.log('form');
    let nameValid = false
    let emailValid = false
    let phoneValid = false

    if((name.value.length > 0 && name.value !=="")){
        nameValid = true
    }else{
      enterName.innerHTML = "Please enter your name *"
    }
    if(email.value.length > 0){
        emailValid = true
    }else{
      enterEmail.innerHTML = "Please enter your email *"
    }
    if((phone.value.length > 0 && phone.value !=="")){
      phoneValid = true
    }else{
      enterPhone.innerHTML = "Please enter your phone *"
    }

    if(nameValid ===false || emailValid === false || phoneValid ===false){
        el.preventDefault()
    }
})

// $(document).ready(function() {
//   $(".header").addClass("headerDark");

//   $(window).scroll(function() {

//     let header_dark = false;          
//     let top_of_screen = $(window).scrollTop();        


//     $('.headerDark').each(function(i) {
//       let top_of_element = $(this).offset().top;
//       let bottom_of_element = top_of_element + $(this).outerHeight();


//       if ((top_of_screen > top_of_element) && (top_of_screen < bottom_of_element)) {
//         header_dark = true;
//         return false;         
//       }
//     });
//     if (header_dark) {
//       $(".header").addClass("headerDark");
//     } else {
//       $(".header").removeClass("headerDark");
//     }
//   });
// });