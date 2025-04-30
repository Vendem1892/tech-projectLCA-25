/*document.getElementById('registrationForm').addEventListener('input', function () {
  validateForm();
});*/

const email = document.getElementById('email').value;
  const password = document.getElementById('pwd').value;
  const confirmPassword = document.getElementById('pwd-rep').value;
  const firstName = document.getElementById('fName').value;
  const lastName = document.getElementById('lName').value;
  const dateofBirth = document.getElementById('dob').value;
  const itemName = document.getElementById('iName').value;
  const itemDesc = document.getElementById('iDesc').value;
  const itemCategory = document.getElementById('iCat').value;
  const itemPrice = document.getElementById('iPrice').value;
  const itemQuantity = document.getElementById('iAmt').value;
  const itemImage1 = document.getElementById('img1').value;
  const itemImage1_Alt = document.getElementById('img1_Alt').value;
  const submitBtn = document.getElementById('submitBtn');
  const errorElement = document.getElementById('passwordError');

function regValidation() {

  let isValid = true;

  if (!email || !password || !confirmPassword || !firstName || !lastName || !dateofBirth) {
      isValid = false;
  }

  if (password !== confirmPassword) {
      errorElement.textContent = 'Passwords do not match';
      errorElement.classList.remove('success');
      errorElement.classList.add('error');
      isValid = false;
  } else {
      errorElement.textContent = 'Passwords match';
      errorElement.classList.remove('error');
      errorElement.classList.add('success');
  }

  if (isValid) {
      submitBtn.classList.add('enabled');
      submitBtn.disabled = false;
  } else {
      submitBtn.classList.remove('enabled');
      submitBtn.disabled = true;
  }
}

function loginValidation(){

  let isValid = true;

  if (!email || !password || !confirmPassword) {
      isValid = false;
  }

  if (password !== confirmPassword) {
      errorElement.textContent = 'Passwords do not match';
      errorElement.classList.remove('success');
      errorElement.classList.add('error');
      isValid = false;
  } else {
      errorElement.textContent = 'Passwords match';
      errorElement.classList.remove('error');
      errorElement.classList.add('success');
  }

  if (isValid) {
      submitBtn.classList.add('enabled');
      submitBtn.disabled = false;
  } else {
      submitBtn.classList.remove('enabled');
      submitBtn.disabled = true;
  }
}

function listingValidation(){
  let isValid = true;

  if (!email || !password || !confirmPassword || !firstName || !lastName || !dateofBirth) {
      isValid = false;
  }

  if (isValid) {
      submitBtn.classList.add('enabled');
      submitBtn.disabled = false;
  } else {
      submitBtn.classList.remove('enabled');
      submitBtn.disabled = true;
  }
}



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
        alert('Passwords Match.');
        
    }else{
        alert('Passwords Mismatched!');
        stop;
    }
}


// Create a PayPal Checkout component.
braintree.paypalCheckout.create({
    client: clientInstance
  }, function (paypalCheckoutErr, paypalCheckoutInstance) {
    // Base PayPal SDK script options
    var loadPayPalSDKOptions = {
      currency: 'USD',  // Must match the currency passed in with createPayment
      intent: 'capture' // Must match the intent passed in with createPayment
    }

    paypalCheckoutInstance.loadPayPalSDK(loadPayPalSDKOptions, function () {
      paypal.Buttons({
        fundingSource: paypal.FUNDING.PAYPAL,

        createOrder: function () {
          // Base payment request options for one-time payments
          var createPaymentRequestOptions = {
            flow: 'checkout', // Required
            amount: 10.00, // Required
            currency: 'USD', // Required, must match the currency passed in with loadPayPalSDK

            intent: 'capture', // Must match the intent passed in with loadPayPalSDK
          };

          return paypalCheckoutInstance.createPayment(createPaymentRequestOptions);
        },

        onApprove: function (data, actions) {
          return paypalCheckoutInstance.tokenizePayment(data, function (err, payload) {
            // Submit 'payload.nonce' to your server
          });
        },

        onCancel: function (data) {
          console.log('PayPal payment cancelled', JSON.stringify(data, 0, 2));
        },

        onError: function (err) {
          console.error('PayPal error', err);
        }
      }).render('#paypal-button').then(function () {
        // The PayPal button will be rendered in an html element with the ID
        // 'paypal-button'. This function will be called when the PayPal button
        // is set up and ready to be used
      });
    });
  });

  
// Create a client.
braintree.client.create({
    authorization: CLIENT_AUTHORIZATION
  }).then(function (clientInstance) {
    // Create a PayPal Checkout component.
    return braintree.paypalCheckout.create({
      client: clientInstance
    });
  }).then(function (paypalCheckoutInstance) {
    // Base PayPal SDK script options
    var loadPayPalSDKOptions = {
      currency: 'USD', // Must match the currency passed in with createPayment
      intent: 'capture' // Must match the intent passed in with createPayment
    }
  
    return paypalCheckoutInstance.loadPayPalSDK(loadPayPalSDKOptions);
  }).then(function (paypalCheckoutInstance) {
  
    return paypal.Buttons({
      fundingSource: paypal.FUNDING.PAYPAL,
  
      createOrder: function () {
        // Base payment request options for one-time payments
        var createPaymentRequestOptions = {
          flow: 'checkout', // Required
          amount: 10.00, // Required
          currency: 'USD', // Required, must match the currency passed in with loadPayPalSDK
  
          intent: 'capture', // Must match the intent passed in with loadPayPalSDK
        };
  
        return paypalCheckoutInstance.createPayment(createPaymentRequestOptions);
      },
  
      onApprove: function (data, actions) {
        return paypalCheckoutInstance.tokenizePayment(data).then(function (payload) {
          // Submit 'payload.nonce' to your server
        });
      },
  
      onCancel: function (data) {
        console.log('PayPal payment cancelled', JSON.stringify(data, 0, 2));
      },
  
      onError: function (err) {
        console.error('PayPal error', err);
      }
    }).render('#paypal-button');
  }).then(function () {
    // The PayPal button will be rendered in an html element with the ID
    // 'paypal-button'. This function will be called when the PayPal button
    // is set up and ready to be used
  });

  



