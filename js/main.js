$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });


$(document).ready(function(){
     $(".button-collapse").sideNav();
     $(".button-collapse").click(function(){
     $('#mobile-demo').animate({left: '315px'});
     });
});


$('.datepicker').pickadate({
   selectMonths: true, // Creates a dropdown to control month
   selectYears: 15, // Creates a dropdown of 15 years to control year,
   today: 'Today',
   clear: 'Clear',
   close: 'Ok',
   closeOnSelect: false // Close upon selecting a date,
 });


 setTimeout(function () {
     $(".wrong").hide()
 }, 6000);
