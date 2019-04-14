/**
 * init page 
 */
$(window).on('load', function(){
    setTimeout(function(){ $('#ajaxloader').fadeOut("slow"); }, 1800);
 });

$(document).on({
    ajaxStart: function () {
        $('#ajaxloader').show();
    },
    ajaxStop: function () {
        $('#ajaxloader').hide();
    }
});