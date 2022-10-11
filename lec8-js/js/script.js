let btn = document.getElementById('btn')
let myProgress = document.getElementById('myProgress')
let myBar = document.getElementById('myBar')
let num = document.getElementById('num')
let container = document.getElementById('container')

btn.addEventListener('click',function(){
    let i = num.innerHTML
    let f =0;
    let size = 100/i;
    setInterval(() => {
        num.innerHTML = i--;
        if(i<0){
            num.innerHTML = 'finished'
        }
        f +=size
        myProgress.style.width = f + '%';
        
    }, 1000);
});


