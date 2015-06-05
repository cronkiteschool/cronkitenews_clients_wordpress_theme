/**
 * move-by-line.js
 *
 * move post by-line to footer.
 */

( function( $ ) {
	$('#main article').each(function(index, value) { 
		var byLine = $( value ).find('span.byline').detach();
		$( value ).find('.entry-footer').prepend( byLine );
		var postedOn = $( value ).find('span.posted-on').detach();
		$( value ).find('.entry-footer').prepend( postedOn );
	})
} )( jQuery );
