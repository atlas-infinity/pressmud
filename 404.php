<?php
get_header ();
get_template_part ('content', 'header');
?>
<div class='err404'>
<h1>404</h1>
<p><a class="fullLoad" href="<?= bloginfo ('siteurl') ?>">Return to the entrance</a></p>
</div> <!-- /theContent -->
<?php
get_footer ();
