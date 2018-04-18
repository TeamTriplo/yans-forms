// JS for mobile menu in Yan's Place Shop
        
// document.getElementById("hamburger").addEventListener("click", changeMenu);

// function changeMenu() {
//   var menu = document.getElementById("mobile-menu"); 

//   if (menu.style.maxHeight){
//     menu.style.maxHeight = null;
//   } else {
//     menu.style.maxHeight = menu.scrollHeight + "px";
//   }
  
// }

var hamburger = document.getElementsByClassName("hamburger");
var closeMark = document.getElementsByClassName("fa-times");



for (var i = 0; i < hamburger.length; i++) {
    // alert("test");
    hamburger[i].addEventListener('click', changeMenu, false);
}

for (var i = 0; i < closeMark.length; i++) {
    // alert("test");
    closeMark[i].addEventListener('click', changeMenu, false);
}

function changeMenu() {
  var menu = document.getElementById("mobile-menu"); 
  if (menu.style.maxHeight){
    menu.style.maxHeight = null;
    showHam();
  } else {
    menu.style.maxHeight = menu.scrollHeight + "px";
    hideHam();
  }
}

function hideHam () {
  for (var i = 0; i < hamburger.length; i++) {
      // alert("test");
      document.getElementsByClassName("hamburger")[i].style.display = "none";
  }
}

function showHam () {
  for (var i = 0; i < hamburger.length; i++) {
      // alert("test");
      document.getElementsByClassName("hamburger")[i].style.display = "block";
  }
}



// Path to check if form is filled out

var myFirstName = document.getElementById("first-name");
var myLastName = document.getElementById("last-name");
var myEmail = document.getElementById("email");
var myComments = document.getElementById("comments");
var mySubmitButton = document.getElementById("submit-button");
var submitReady = 1;

myFirstName.addEventListener("change", function() {
  checkFields();
});
myLastName.addEventListener("change", function() {
  checkFields();
});
myEmail.addEventListener("change", function() {
  checkFields();
});
myComments.addEventListener("change", function() {
  checkFields();
});

function checkFields () {
  if (myFirstName.value &&  myLastName.value && myEmail.value && myComments.value ) {
    mySubmitButton.className += " form-complete";
  } else {
    mySubmitButton.className -= " form-complete";
  }

}