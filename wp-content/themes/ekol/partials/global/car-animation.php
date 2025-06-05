<?php
if (empty($args))
    return;

$svg_el = $args['svg_el'];
$mob_svg_el = $args['mob_svg_el'];
$classes = $args['classes'];
$mob_classes = $args['mob_classes'];
$is_reversed = $args['is_reversed'];
$is_reversed_mob = $args['is_reversed_mob'];

if ($svg_el) {
    ?>
    <div class="scroll-section car-animation <?= $is_reversed ? 'reverse' : ''; ?> <?= $classes; ?>">
        <?= $svg_el; ?>
    </div>
    <?php
}

if ($mob_svg_el) {
    ?>
    <div class="scroll-section car-animation <?= $is_reversed_mob ? 'reverse' : ''; ?> <?= $mob_classes; ?>">
        <?= $mob_svg_el; ?>
    </div>
    <?php
}