//var $j = jQuery.noConflict();
(document).ready(function(){

   $("a#page").click( function()
   {
      $j.ajax(
      {
        url:'b.php',
        success: function(resultado)
        {
          $j('#contenido').html(resultado);
          //$j.getScript('js/b.js');
    }
 });
 return false;
 }
 );
});