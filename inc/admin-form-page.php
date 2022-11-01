<!-- Add Form Admin Page -->
<div class="vnx-table-of-contents-form">
    <h1>Vietnix Table Of Contents</h1>
    <form action="options.php" method="POST">
        <?php
        settings_fields('toc_plugin');
        do_settings_sections('work-plugin-options');
        submit_button(); ?>
    </form>
</div>