$ = jQuery
$ ->

	exits = "<aside class='exits'><a rel='tooltip' title='A list of exits from this room'><i class='icon-sitemap'></i></aside>"
	$('ul.roomNavigation').before exits

	$('[rel="tooltip"]').tooltip
		placement: 'bottom'
