jQuery(function( $ ) {    
	jQuery('.social-link').click(function(event){
		event.preventDefault();
        // if it's facebook mobile
        if(jQuery(this).data('facebook') == 'mobile') {
            FB.ui({
                method: 'share',
                mobile_iframe: true,
                href: jQuery(this).data('href')
            }, function(response){});
        } else {
            // these share options don't need to have a popup
            if (jQuery(this).data('site') == 'email' || jQuery(this).data('site') == 'print' || jQuery(this).data('site') == 'pinterest') {
                // just redirect
                window.location.href = jQuery(this).attr("href");
            } else {
                // prepare popup window
                var width  = 575,
                    height = 520,
                    left   = (jQuery(window).width()  - width)  / 2,
                    top    = (jQuery(window).height() - height) / 2,
                    opts   = 'status=1' +
                        ',width='  + width  +
                        ',height=' + height +
                        ',top='    + top    +
                        ',left='   + left;
                // open the share url in a smaller window
                window.open(jQuery(this).attr("href"), 'share', opts);
            }
        }
	}); 
});