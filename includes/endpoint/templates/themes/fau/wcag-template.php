<?php

/* Quit */
defined('ABSPATH') || exit;

if(function_exists('fau_initoptions')) {
    $options = fau_initoptions();
} else {
    $options = array();
}

$breadcrumb = '';
if (isset($options['breadcrumb_root'])) {
    if ($options['breadcrumb_withtitle']) {
        $breadcrumb .= '<h3 class="breadcrumb_sitetitle" role="presentation">'.get_bloginfo('title').'</h3>';
        $breadcrumb .= "\n";
    }
    $breadcrumb .= '<nav aria-labelledby="bc-title" class="breadcrumbs">'; 
    $breadcrumb .= '<h4 class="screen-reader-text" id="bc-title">'.__('Sie befinden sich hier:','fau').'</h4>';
    $breadcrumb .= '<a data-wpel-link="internal" href="' . site_url('/') . '">' . $options['breadcrumb_root'] . '</a>';
}

$values = get_option('rrze_wcag');

get_header(); ?>

    <section id="hero" class="hero-small">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <?php echo $breadcrumb; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <h1><?php echo (isset($values['rrze_wcag_field_1']) ? $values['rrze_wcag_field_1'] : 'Barrierefreiheitserklärung') ?></h1>
                </div>
            </div>
        </div>
    </section>

    <div id="content">
        <div class="container">

            <div class="row">
                <div class="col-xs-12">
                    <main>                        
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
                                <p>Bei Problemen mit der Bedienung der Webseite schreiben Sie eine E-Mail an <a href="mailto:<?php echo $values['rrze_wcag_field_16'] ?>?subject=<?php echo (!empty($values['rrze_wcag_field_19']) ? $values['rrze_wcag_field_19'] : 'Feedback zur Barrierefreiheit des Webauftritts') ?>"><?php echo $values['rrze_wcag_field_16'] ?></a> oder füllen Sie das Feedback-Formular aus!</p>
                                <h3>Feedback-Formular</h3>
                        
                        <?php echo do_shortcode('[contact field-one="name,text,name-id" '
                                . 'field-two="email,text,email-id" '
                                . 'field-three="feedback,textarea,textarea-id" '
                                . 'field-four="captcha,text,captcha-id" '
                                . 'field-five="answer,hidden,hidden-id" '
                                . 'field-six="timeout,hidden,timeout-id"]'); ?>
                                 <p class="complaint">Sollten Sie den Eindruck haben, dass Ihnen nicht geholfen wird, können Sie sich an die <a href="https://www.behindertenbeauftragte.de/DE/SchlichtungsstelleBGG/SchlichtungsstelleBGG_node.html">Schiedsstelle</a> wenden.<p>
                        
                    </main>
                </div>

            </div>

        </div>
    </div>

<?php get_footer(); ?>
