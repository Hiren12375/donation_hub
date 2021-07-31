$(document).ready(function () {
   // alert("hh");
    $("#myform").validate({
debug:true,
   rules:{
       "area":{
           required:"THIS FIELD REQUIRED",
           digits:true
       }
   },
   message:
       {
           "area":{
               required:"THIS FIELD REQUIRED",
               digits: "ONLY DIGITS ARE ALLOWED"
           }
       }
    })
});