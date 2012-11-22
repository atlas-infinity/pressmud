<?php
get_header ();
the_post ();
get_template_part ('content', 'header');
get_template_part ('content', 'body');
get_footer ();
