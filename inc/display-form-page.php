<!-- Add from setting display page. -->
<div class="vnx-table-of-contents-form-display">
    <h1>Display</h1>
    <form action="options.php" method="POST">
        <?php
        settings_fields('display_toc_plugin');
        do_settings_sections('display-work-plugin-options');
        submit_button(); ?>
    </form>
</div>