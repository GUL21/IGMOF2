$(document).ready(function() {

	var visible = true;
function showFun() {
    if(visible) {
        document.getElementById('block-parametr' ).style.display = 'none';
        visible = false;
    } else {
        document.getElementById('block-parametr' ).style.display = 'block';
        visible = true;
    }
}

	$('.list li').on('click', function(e) {
	  e.stopPropagation();
	  var subList = $(this).children('.list1');
	  
	  if (subList.hasClass('open')) {
	    $(this).find('.list1').removeClass('open');
	  } else {
	    subList.addClass('open');
	  }
	});

	$('#block-left .zaglavie_1, #block-content .zaglavie_1').on('click', f_acc);

	function f_acc(){
//скрываем все кроме того, что должны открыть
  $('#block-left .list_1').not($(this).next()).slideUp(1000);
// открываем или скрываем блок под заголовком, по которому кликнули
    $(this).next().slideToggle(2000);
};

});
