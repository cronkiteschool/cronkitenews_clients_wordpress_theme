/**
 * move-by-line.js
 *
 * move post by-line to footer.
 */

( function( $ ) {
	$('#main article').each(function(index, value) { 
		var postedOn = $( value ).find('span.posted-on').detach();
		$( value ).find('.entry-footer').prepend( postedOn );
	})
} )( jQuery );
