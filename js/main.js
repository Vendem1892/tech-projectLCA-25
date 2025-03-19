var pass = document.getElementById('#pwd');
var passRepeat = document.getElementById('#pwd-rep');
var pageIndex;
var itemID  = document.getElementById('#itemID')

// var sort = document.getElementById('#sort');

// function sortItems (sort){
//     if (sort === 'dateDesc'){
//         document.getElementById('#prodHeader').innerHTML = 'Most Recent Items';
//         var listing = document.getElementById('#itemList');
//         listing.sort(function(a, b){return b-a});
//     }
//     if (sort === 'dateAsc'){
//         document.getElementById('#prodHeader').innerHTML = 'Least Recent Items';
//         var listing = document.getElementById('#itemList');
//         listing.sort(function(a, b){return a-b});
//     }
// }
addToCartButton = document.querySelectorAll(".add-to-cart-button");

document.querySelectorAll('.add-to-cart-button').forEach(function(addToCartButton) {
    addToCartButton.addEventListener('click', function() {
        addToCartButton.classList.add('added');
        setTimeout(function(){
            addToCartButton.classList.remove('added');
        }, 2000);
    });
});


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


