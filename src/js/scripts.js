// Функционал для реализации адаптивности
$(function () {
  $(window).bind('resize', function () {   
      if ($(this).width() > 768) {
        $('body').removeClass('body--mobile');
        $('.aside').removeClass('aside--mobile');
								$('.aside-element__logo').removeClass('aside-element__logo--mobile');
								$('.logo-link').removeClass('logo-link--mobile');
      }  
  }).resize();
})

// Функционал появления/скрытия меню
$('.top-panel__icon').on('click',function(){
  $('.aside').toggleClass('aside--mobile');
  $('body').toggleClass('body--mobile');
});


// Функционал разворачивания/сворачивания элементов меню
$('.aside-menu__navigation').on('click',function(){
  $('.aside-menu__list', this).slideToggle(280);
  $('.aside-menu-navigation__title', this).toggleClass('aside-menu-navigation__title--active');
  $('img', this).toggleClass('aside-menu-navigation__img--rotated');    
});

// $('.aside-menu__start').on('click',function(){
//   $('.aside-menu-start__list').slideToggle(280);
//   $('.aside-menu-start__title').toggleClass('aside-menu-navigation__title--active');
//   $('.aside-menu-start__img').toggleClass('aside-menu-navigation__img--rotated');    
// });

// $('.aside-menu__setting').on('click',function(){
//   $('.aside-menu-setting__list').slideToggle(280);
//   $('.aside-menu-setting__title').toggleClass('aside-menu-navigation__title--active');
//   $('.aside-menu-setting__img').toggleClass('aside-menu-navigation__img--rotated');  
// });

jQuery(document).ready(function($){
	$('.header-input__search-field').keyup(function(eventObject){
		var searchTerm = $(this).val();
		// проверим, если в поле ввода более 2 символов, запускаем ajax
		if(searchTerm.length > 0){
			$.ajax({
				url : '/wp-admin/admin-ajax.php',
				type: 'POST',
				data:{
					'action':'wikipress_ajax_search',
					'term'  :searchTerm
				},
				success:function(result){
					$('.header-input__search-result').fadeIn().html(result);
				}
			});
		}
	});
	$('*').click(function(){
    $('.header-input__search-result').hide();
    $('.header-input__search-field').val('');
	});
});

jQuery(document).ready(function($){
	$('.aside__search-field').keyup(function(eventObject){
		var searchTerm = $(this).val();
		// проверим, если в поле ввода более 1 символа, запускаем ajax
		if(searchTerm.length > 1){
			$.ajax({
				url : '/wp-admin/admin-ajax.php',
				type: 'POST',
				data:{
					'action':'wikipress_ajax_search',
					'term'  :searchTerm
				},
				success:function(result){
					$('.aside__search-result').fadeIn().html(result);
				}
			});
		}
	});
	$('*').click(function(){
    $('.aside__search-result').hide();
    $('.aside__search-field').val('');
	});
});





