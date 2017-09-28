$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });


$( document ).ready(function(){
     $(".button-collapse").sideNav();
     $(".button-collapse").click(function(){
     $('#mobile-demo').animate({left: '315px'});
     });
})
