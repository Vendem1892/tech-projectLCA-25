//import {React} from 'https://cdnjs.cloudflare.com/ajax/libs/react/19.0.0/cjs/react.production.min.js';
//import {React-DOM} from 'https://cdnjs.cloudflare.com/ajax/libs/react-dom/19.0.0/cjs/react-dom.production.min.js';


let pass  = document.getElementById('#pwd');
let passRepeat :any = document.getElementById('#pwd-rep');
let pageIndex : number;
let itemID : any = document.getElementById('$itemID')

const button :any = document.querySelector('.addtocart');
console.log(button);
let added = false;

let cartOperator : any = document.getElementById('cart')?.style.width;

const template : any = document.getElementById('headerNoReg');
const template2 : any = document.getElementById('headerLogIn');

function changePage(){
    //pageIndex = document
    return Array;
}

function checkPassword(){
    if(pass == passRepeat){
        alert('Login Successful.');
        window.location.replace('../includes/verifyingat');
    }else{
        alert('Login failed!');
        
    }
}

function addToCart(){
    button.addEventListener('click',()=>{
        if(added){          
          added = false;
        }
        else{          
          added = true;
        }
          
      })    
}

function openCart(){
    cartOperator = '20%';
}

function closeCart(){
    cartOperator = '0%';
}

function revTemplate(){
    document.body.appendChild(template.content);
}

function revTemplateLogIn(){
    document.body.appendChild(template2.content);
}