jQuery(document).ready(function($){
    $(window).scroll( function(e) {
        if ((window.innerHeight + window.scrollY) > document.body.offsetHeight) {
            e.preventDefault();
            var ajax_section =$(".grid__template.newsList__grid"); // zone ou renvoyer le contenu de l'AJAX
            jQuery.post(
                ajaxurl, // url du fichier admin-ajax.php,
                {
                    'action': 'ajax-lirelasuite', // nom de l'action à créer
                    'paged': current_page // exemple de variable à envoyer.
                },
                function(response){
                    current_page++;
                    ajax_section.append(response);
                    gridInit()                
                    if(current_page >= max_paged)
                        $('.button_more .button').hide();
                }
            );
        }
    });
});