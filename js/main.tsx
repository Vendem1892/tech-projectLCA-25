import React from "react";
import ReactDOM from "react-dom/client";
import 'css/style.css';

var pass = document.getElementById('#pwd');
var passRepeat = document.getElementById('#pwd-rep');

function changePage(){
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

function checkPasswordFirst(){
    if(pass == passRepeat){
        alert('Correct Password');
        window.location.replace('../includes/signup_handler');
    }else{
        alert('Login failed!');
    }
}