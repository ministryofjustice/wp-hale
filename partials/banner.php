<?php

$show_banner = get_theme_mod('show_header_banner', 'no');
$banner_title = get_theme_mod('header_banner_title');
$show_banner_link = get_theme_mod('show_header_banner_link', 'no');
$banner_link_txt = get_theme_mod('header_banner_link_text');
$banner_link_url = get_theme_mod('header_banner_link_url');
$banner_link_style = get_theme_mod('banner_link_style', 'govuk-button');

if ($show_banner == 'yes' && is_front_page()) {
    ?>
    <div class="govuk-width-container govuk-!-margin-top-3">
        <div class=" govuk-grid-row">

            <div class="govuk-grid-column-two-thirds">
                    <h1 class="govuk-heading-xl"><?php echo $banner_title; ?></h1>
            </div>
            <div class="govuk-grid-column-one-third">

                <?php if ($show_banner_link == 'yes') { ?>
                    <a class="hale-banner__button govuk-button govuk-button--start <?php echo $banner_link_style; ?>"
                       href="<?php echo $banner_link_url; ?>"><?php echo $banner_link_txt; ?></a>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
