jQuery(document).ready(function($) {
    // Resource Page Load More Ajax 
    $( document ).on( "click", ".filter", function(e) {
        e.preventDefault();
        
        var projectType = $(this).attr("data-filter");

        $.ajax({
            type: "POST",
            url: ajax_object.restURL + 'wp-json/wp/v2/projects',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-WP-Nounce', ajax_object.restNonce);
            },
            data: {
                projectType: projectType
            },
            success: function(data){
                console.log(data);
            },
        });
        return false;
    });
});