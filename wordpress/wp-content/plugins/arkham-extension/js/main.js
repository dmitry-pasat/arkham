jQuery(document).ready(function(){
    jQuery('#email-icon').click(function(){
        jQuery('.email-form').show();
        jQuery('#email-icon').hide();
        jQuery("#cancel-icon").show();
    });
    jQuery('#cancel-icon').click(function(){
        jQuery('.email-form').hide();
        jQuery('#email-icon').show();
        jQuery("#cancel-icon").hide();
    });


});

jQuery(document).ready(function(){

    //fullpage method
    jQuery('#fullpage').fullpage({
        //sectionsColor: ['#1bbc9b', '#4BBFC3', '#7BAABE', 'whitesmoke', '#ccddff'],
         anchors: ['firstPage', 'secondPage', '3rdPage', '4thpage', 'lastPage'],
         menu: '#menu',
    });
});
