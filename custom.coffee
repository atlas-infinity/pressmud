##
# Adds a header to roomNavigation
# Calls prepareAjax ()
##

preparePost = ->
	exits = "
		<aside class='exits'>
			<a rel='tooltip' data-placement='right' title='A list of exits from this room'>
				<i class='icon-sitemap'>
			</i>
		</aside>
		"
	$('ul.roomNavigation').before exits
	prepareAjax()

##
# Gathers up sibling inputs and submits POST
##

ajaxSend = (element, target) ->
	url = element.attr 'href'
	siblings = $(element).siblings('input')
	$.ajax(
		type: 'POST'
		url: url
		data: siblings.serialize()
	).done (html) ->
		$(target).append html
##
# Click handler for sending post in entities
##

prepareEntity = ->
	$('.subContainer .ajaxPost').click (event) ->
		event.preventDefault()
		target = $(this).data 'target'
		target = ".#{target}"
		ajaxSend $(this), target

##
# Activates tooltip/popover for the new loaded data
# Rewrites the links to use ajax loads
# Needs to be separated because it needs to run in order
##

prepareAjax = ->
	$('.subContainer .ajaxLoad').click (event) ->
		event.preventDefault()
		url = $(this).attr 'href'
		url += '?ajax'
		$('.theContent').load url, ->
			preparePost()
	$('.subContainer .modalLoad').click (event) ->
		event.preventDefault()
		url = $(this).attr 'href'
		url += '?ajax'
		id = $(this).attr 'id'
		target = $('#' + id.replace /entity-/, 'entityHolder-')
		target.load url, ->
			target.modal()
			prepareEntity()
	$("[rel='tooltip']").tooltip
		placement: 'bottom'

##
# Document ready, prepare the first post
##

$ = jQuery
$ ->
	preparePost()
