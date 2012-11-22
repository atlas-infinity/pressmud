jQuery (function () {

var exits = "<p class='exits'><a title='Exits'><i class='icon-share'></i></p>"
jQuery ('ul.nav').before (exits);

jQuery ('#body').change (function () {
	jQuery ('body').css ('background-color', jQuery ('#body').val ());
});

jQuery ('#highlight').change (function () {
	jQuery ('h1, a').css ('color', jQuery ('#highlight').val ());
});

});
