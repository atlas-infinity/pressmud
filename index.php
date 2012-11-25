<?php
/**
 * Checks for ajax loads, which don't load header/footer
 */
get_header ();
the_post ();
?>
<div class='theContent'>
</div> <!-- /theContent -->
<?php get_footer () ?>
