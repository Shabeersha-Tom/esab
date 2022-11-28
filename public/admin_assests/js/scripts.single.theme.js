/* Dore Single Theme Initializer Script 

Table of Contents

01. Single Theme Initializer
*/

/* 01. Single Theme Initializer */

(function($) {
  if ($().dropzone) {
    Dropzone.autoDiscover = false;
  }
  var $dore = $("body").dore();
  
  $("#start_date").datepicker({
            autoclose: true,
            templates: {
                leftArrow: '<i class="simple-icon-arrow-left"></i>',
                rightArrow: '<i class="simple-icon-arrow-right"></i>'
            },
            format: 'dd-mm-yyyy',
            endDate: '+0d',
            orientation: 'bottom'
        });
        $("#end_date").datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy',
            endDate: '+0d',
            templates: {
                leftArrow: '<i class="simple-icon-arrow-left"></i>',
                rightArrow: '<i class="simple-icon-arrow-right"></i>'
            },
            orientation: 'bottom'
        });
  
})(jQuery);
