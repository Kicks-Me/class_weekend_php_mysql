
function pwdToggle()
{

   //ປ່ຽນຮູບ Icon
   if($("#pwd").hasClass("far fa-eye"))
   {
      // will remove the class 
      $('#pwd').removeClass('far fa-eye');
      // will add the class
      $('#pwd').addClass('fas fa-eye-slash'); 
   }
   else
   {
      // will add the class
      $('#pwd').removeClass('fas fa-eye-slash');
      // will remove the class
      $('#pwd').addClass('far fa-eye');
   }

   //ປ່ຽນຮູບແບບລະຫັດ
   var type = $('#txtPassword').attr("type"); 
   // now test it's value
   if(type === 'password')
   {
      $('#txtPassword').attr("type", "text");
   }
   else
   {
      $('#txtPassword').attr("type", "password");
   } 
}