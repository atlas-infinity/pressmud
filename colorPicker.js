jQuery (function () {

jQuery ('#body').change (function () {
	jQuery ('body').css ('background-color', jQuery ('#body').val ());
});

jQuery ('#highlight').change (function () {
	jQuery ('h1, a').css ('color', jQuery ('#highlight').val ());
});

});
