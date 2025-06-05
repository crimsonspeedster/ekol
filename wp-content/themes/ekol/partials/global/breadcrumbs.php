<?php

if ( function_exists('yoast_breadcrumb') ) {
    ?>
    <section class="breadcrumbs">
        <div class="container">
            <?php yoast_breadcrumb('<div class="breadcrumbs-row">','</div>'); ?>
        </div>
    </section>
    <?php
}