let nameproduct = document.getElementById("name")
let price = document.getElementById("price")
let btn = document.getElementById("btn")
let content = document.getElementById("content")
let disacount = document.getElementById("disacount")


let product = [
  {
    "Name": "Cola",
    "price": "20",
    "features": "features1, features2, features3"
  },
  {
    "Name": "Ships",
    "price": "60",
    "features": "features1, features2, features3"
  },
  {
    "Name": "Shoklet",
    "price": "10",
    "features": "features1, features2, features3"
  },
  {
    "Name": "fffffff",
    "price": "10",
    "features": "features1, features2, features3"
  },
];

let container = document.querySelector('.container');

// for(let i = 0 ; i < product.length ; i++){
//   let card = document.createElement('div');
//   card.setAttribute('class','card');

//   let h2 = document.createElement('h2');
//   h2.innerHTML = product[i].Name;
//   card.appendChild(h2);

//   let p = document.createElement('p');
//   if(product[i].price < 50){
//     p.innerHTML = 'Sales: ' + product[i].price +' $'
//   }else{
//     p.innerHTML = product[i].price +' $'
//   }
//   card.appendChild(p);

//   let f = product[i].features.split(', ')
//   for(let j = 0 ; j < f.length ; j++){
//     let a = document.createElement('a');
//     a.innerHTML = f[j]
//     card.appendChild(a);
//   }

//   container.appendChild(card);

// }
product.forEach(el => {
  let f = el.features.split(', ').map(fe => `<a> ${fe} </a>`).join('');
  let card=`
    <div class="card">
      <h2>${el.Name}</h2>
      <p>${el.price} </p>
      ${f}
    </div>`;
  container.innerHTML += card
});
