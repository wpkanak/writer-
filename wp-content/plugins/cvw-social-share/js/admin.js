jQuery(document).ready(function() {
    //Sortable
    jQuery(function() {
    	jQuery( "#sortList" ).sortable();
    });
    
    //Add sort list to input
    jQuery('#cvw-social-order').val(jQuery('#sortList li').map(function() {    
        return jQuery(this).attr('id');
    }).get());
    
    
    jQuery('#sortList').mouseout(function() {
    	jQuery('#cvw-social-order').val(jQuery('#sortList li').map(function() {    	
    	   return jQuery(this).attr('id');
    	}).get());
    });
});