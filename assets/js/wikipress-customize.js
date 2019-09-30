(function($){
    
    wp.customize( 'wikipress_theme_color', function( value ) {
        value.bind( function( newval ) {
            /* front-page.php */
            $('header, [data-theme-color="bg"]').css('background-color', newval);
            
            $('.card a, [data-theme-color="text"]').css('color', newval);
                
            /* single.php */
            $('blockquote').css('border-left-color', newval);
                
            $('.wp-block-button a').css('background-color', newval);
                
            $('#before-elements')
                .text('ul li:before, ol li:before{color:' + newval + '}');
                
            $('figure.wp-block-pullquote')
                .css({
                    'border-top-color': newval,
                    'border-bottom-color': newval
                });
                
            $('cite.fn a').css('color', newval);
                
            $('div.wikipress-list-comments a').css('color', newval);
                
            $('#submit').css('background-color', newval);
            
            $('.wikipress-post-navigation a').css('color', newval);
        } );
    } );
    
    wp.customize( 'wikipress_text_H1', function( value ) {
        value.bind( function( newval ) {
            $('#text-h1').text( newval );
        } );
    } );
    
})(jQuery);