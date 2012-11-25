##
# Adds a header to roomNavigation
# Calls prepareAjax ()
##

loadNav = ->
	exits = "
		<aside class='exits'>
			<a rel='tooltip' data-placement='right' title='A list of exits from this room'>
				<i class='icon-sitemap'>
			</i>
		</aside>
		"
	$('ul.roomNavigation').before exits
	prepareAjax()
	console.log 'rewrite links'

##
# Activates tooltip/popover for the new loaded data
# Rewrites the links to use ajax loads
# Needs to be separated because it needs to run in order
##

prepareAjax = ->
	$("[rel='tooltip']").tooltip
		placement: 'bottom'
	$("[rel='popover']").popover
		placement: 'bottom'
	$('.ajaxLoad').click (event) ->
		event.preventDefault()
		url = $(this).attr 'href'
		url += '?ajax'
		$('.theContent').load url, ->
			loadNav()

$ = jQuery
$ ->
	loadNav()
