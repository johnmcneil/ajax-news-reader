<?php get_header(); ?>

<div id="mainContainer">
<section id="mainContent">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h2><?php the_title(); ?></h2>       
<?php the_content(); ?>
<?php wp_link_pages(); ?>
<?php edit_post_link(); ?>

<?php endwhile; ?>

<?php
    if ( get_next_posts_link() ) {
        next_posts_link();
    }
?>
<?php
    if ( get_previous_posts_link() ) {
        previous_posts_link();
    }
?>
        
<?php else: ?>
        <p>No posts found.</p>
<?php endif; ?>

</section>
</div>

<?php get_sidebar(); ?>

<?php
//javascript for the ajax page
function my_wp_footer_registration_JavaScript()
{
?>
<script>
// the name of the rss feed selected is passed into the function as str
function showRSS(str) {
     //if nothing is selected, put nothing in the rss output div
    if (str.length==0) {
        jQuery("#rssOutput").html("");
        return;
    //if one of the actual options is selected, pass that through jQuery/Ajax
    } else {
    jQuery.ajax({
        url: ajaxurl,
        type:'GET',
        timeout:5000,
        dataType:'html',
        data: "action=load_news&q=" + str,
        error: function(xml){
        },
        success: function(response){
            if (str == "Google") {jQuery("#rss-slide-output-google").html(response);}
            if (str == "Democracy Now") {jQuery("#rss-slide-output-democracy-now").html(response);}
            if (str == "BBC News - World") {jQuery("#rss-slide-output-bbc-news-world").html(response);}
            if (str == "Deutsche Welle - Nachrichten") {jQuery("#rss-slide-output-deutsche-welle-nachrichten").html(response);}
            if (str == "Spiegel Online Schlagzeilen") {jQuery("#rss-slide-output-spiegel-schlagzeilen").html(response);}
            if (str == "Spiegel Online Politik-Nachrichten aus Deutschland") {jQuery("#rss-slide-output-spiegel-deutschland").html(response);}
            if (str == "Star Tribune Local News") {jQuery("#rss-slide-output-star-tribune-local").html(response);}
        },
    });
    }
}

// this toggles the rss feeds when you click on the titles
jQuery('#rss-title-google').click(function(){
    jQuery('#rss-slide-output-google').slideToggle("slow");
    showRSS("Google");
});

jQuery('#rss-title-democracy-now').click(function(){
    jQuery('#rss-slide-output-democracy-now').slideToggle("slow");
    showRSS("Democracy Now");
});

jQuery('#rss-title-bbc-news-world').click(function(){
    jQuery('#rss-slide-output-bbc-news-world').slideToggle("slow");
    showRSS("BBC News - World");
});
    
jQuery('#rss-title-deutsche-welle-nachrichten').click(function(){
    jQuery('#rss-slide-output-deutsche-welle-nachrichten').slideToggle("slow");
    showRSS("Deutsche Welle - Nachrichten");
});

jQuery('#rss-title-spiegel-schlagzeilen').click(function(){
    jQuery('#rss-slide-output-spiegel-schlagzeilen').slideToggle("slow");
    showRSS("Spiegel Online Schlagzeilen");
});

jQuery('#rss-title-spiegel-deutschland').click(function(){
    jQuery('#rss-slide-output-spiegel-deutschland').slideToggle("slow");
    showRSS("Spiegel Online Politik-Nachrichten aus Deutschland");
});

jQuery('#rss-title-star-tribune-local').click(function(){
    jQuery('#rss-slide-output-star-tribune-local').slideToggle("slow");
    showRSS("Star Tribune Local News");
});

// this creates the keyboard shortcuts 1-8 for toggling the 8 rss fields
jQuery('body').bind('keydown', '1',
    function() {
        jQuery('#rss-slide-output-google').slideToggle('slow');
        showRSS('Google');
    }           
);


jQuery('body').bind('keydown', '2',
    function() {
        jQuery('#rss-slide-output-democracy-now').slideToggle('slow');
        showRSS('Democracy Now');
    }           
);

jQuery('body').bind('keydown', '3',
    function() {
        jQuery('#rss-slide-output-bbc-news-world').slideToggle('slow');
        showRSS('BBC News - World');
    }           
);

jQuery('body').bind('keydown',  '4',
    function() {
        jQuery('#rss-slide-output-deutsche-welle-nachrichten').slideToggle('slow');
        showRSS('Deutsche Welle - Nachrichten');
    }           
);

jQuery('body').bind('keydown', '5',
    function() {
        jQuery('#rss-slide-output-spiegel-schlagzeilen').slideToggle('slow');
        showRSS('Spiegel Online Schlagzeilen');
    }           
);

jQuery('body').bind('keydown', '6',
    function() {
        jQuery('#rss-slide-output-spiegel-deutschland').slideToggle('slow');
        showRSS('Spiegel Online Politik-Nachrichten aus Deutschland');
    }           
);

jQuery('body').bind('keydown', '7',
    function() {
        jQuery('#rss-slide-output-star-tribune-local').slideToggle('slow');
        showRSS('Star Tribune Local News');
    }           
);

// this function is called when a letter key is pressed. it opens the link for the correct article.
function openLink (letter) {
    letterSpans = document.getElementsByClassName('rss-article-letter');
    var i;
    for (i = 0; i < letterSpans.length; i++) {
        if (letterSpans[i].innerHTML == [letter]) {
            thisSpan = letterSpans[i];
            if (jQuery(thisSpan).parent().parent().parent().attr("style") !== "display: none;") {
                linkUrl = jQuery(thisSpan).parent().attr('href');
                window.open(linkUrl);    
            }            
        }
    }
}

// this binds the shortcut keys a-j and for each calls the function that will open the correct link.
jQuery('body').bind('keydown','a', function () {openLink(' [a] '); });
jQuery('body').bind('keydown','b', function () {openLink(' [b] '); });
jQuery('body').bind('keydown','c', function () {openLink(' [c] '); });
jQuery('body').bind('keydown','d', function () {openLink(' [d] '); });
jQuery('body').bind('keydown','e', function () {openLink(' [e] '); });
jQuery('body').bind('keydown','f', function () {openLink(' [f] '); });
jQuery('body').bind('keydown','g', function () {openLink(' [g] '); });
jQuery('body').bind('keydown','h', function () {openLink(' [h] '); });
jQuery('body').bind('keydown','i', function () {openLink(' [i] '); });
jQuery('body').bind('keydown','j', function () {openLink(' [j] '); });


</script>
<?php
}
add_action('wp_footer', 'my_wp_footer_registration_JavaScript');
?>

<?php get_footer(); ?>