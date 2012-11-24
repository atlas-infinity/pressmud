<?php
/**
 * Prints 404 and a link back to the front page
 */
get_header ();
?>
<div class='err404'>
<h1>404</h1>
<p><a class="fullLoad" href="<?= bloginfo ('siteurl') ?>">Return to the entrance</a></p>
</div> <!-- /theContent -->
<?php
get_footer ();
