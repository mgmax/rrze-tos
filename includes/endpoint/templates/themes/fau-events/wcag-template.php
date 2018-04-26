<?php
/* Quit */
defined('ABSPATH') || exit;

$values = get_option('rrze_wcag');

get_header();

?>

<div class="content-wrap">
    <div id="blog-wrap" class="blog-wrap cf">
        <div id="primary" class="site-content cf rrze-calendar" role="main">
           <h2>WCAG-Prüfung der Website</h2>
                <p>Die öffentlichen Stellen sind gemäß der <a href="http://eur-lex.europa.eu/legal-content/DE/TXT/HTML/?uri=CELEX:32016L2102&rid=1">EU-Richtline</a> über den barrierefreien Zugang zu den Webseites und mobilen Anwendungen öffentlicher Stellen
                   verpflichtet Ihre Websites entsprechend den WCAG Kriterien umzusetzen.
                Diese Webseite wurde gemäß den Konformitätsbedingungen der WCAG geprüft.</p>
                <h3>Sind die Konformitätskriterien derzeit erfüllt?</h3>
                <?php  

                if(isset($values['rrze_wcag_field_2']) && $values['rrze_wcag_field_2'] == 1) { ?>
                    <p class="wcag-pass">Die Kriterien werden erfüllt.</p>
                <?php } else { ?>
                    <p class="wcag-fail">Die Kriterien werden nicht erfüllt.</p>
                    <p style="margin-top:20px;margin-bottom:20px"><strong>Begründung:</strong></p>
                    <?php echo $values['rrze_wcag_field_3']; ?>
                   <?php } ?>
                    <h3>Probleme bei der Bedienung der Seite?</h3>
                    <h4 class="wcag-h3">Für diesen Webauftritt sind folgende Personen verantwortlich:</h4>
                    <?php echo do_shortcode('[admins]'); ?>
                    <p>Bei Problemen mit der Bedienung der Webseite schreiben Sie eine E-Mail an muster@fau.de oder füllen Sie das Feedback-Formular aus!</p>
                    <h3>Feedback-Formular</h3>
                <?php echo do_shortcode('[contact field-one="name,text,name-id" '
                    . 'field-two="email,text,email-id" '
                    . 'field-three="feedback,textarea,textarea-id" '
                    . 'field-four="captcha,text,captcha-id" '
                    . 'field-five="answer,hidden,hidden-id" '
                    . 'field-six="timeout,hidden,timeout-id"]'); ?>
             <p class="complaint">Sollten Sie den Eindruck haben, dass Ihnen nicht geholfen wird, können Sie sich an die <a href="https://www.behindertenbeauftragte.de/DE/SchlichtungsstelleBGG/SchlichtungsstelleBGG_node.html">Schiedsstelle</a> wenden.<p>
                        
        </div><!-- end #primary -->

        <?php get_sidebar(); ?>

    </div><!-- end .blog-wrap -->
</div><!-- end .content-wrap -->

<?php get_footer(); ?>
