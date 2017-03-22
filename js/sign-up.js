/**********
SWTICH FORMS
********/
$(".student").hide();

/*
employer
*/



$(".employer .btn-student").click(function(){
  
  $("div .student").fadeIn();
  $(".employer").fadeOut();
});


/*
STUDENT
*/

$(".student .btn-employer").click(function(){
  $("div .employer").fadeIn();
  $(".student").fadeOut();
});








/*****
password confirm
*****/

$("span").hide();


function passwordEvent() {
  if($(this).val().length > 8){
    $(this).next().hide();
  } else {
    $(this).next().show();
  }
}

$("#password").focus(passwordEvent);

$("#confirm_password").focus(passwordEvent);


document.getElementById('password').style.color = 'tomato';

