
  
  $(document).ready(function() {

   //Useful functions 
   
   // Scrolls to top when clicking Header Button
   $("#scrollTop").click(function () {
     // Scrolls to the top of the page
     $( "html,body" ).animate({
       scrollTop: $("body").offset().top
       }, 200, function() {
       // Animation complete.
     });
   });

 });

 function isEmptyOrSpaces(str){
  return str === null || str.match(/^ *$/) !== null;
}
