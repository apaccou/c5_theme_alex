//retour en haut en scroll lent
$('#back-to-top').click(function() {
$('html, body').animate({scrollTop: 0}, 800);
});
$('#back-to-bottom').click(function() {
$('html, body').animate({scrollTop: $('body').height()}, 800);
});

//insertion automatique d'une ligthbox
$( '.skin-model img' ).wrap(function() {
 	return '<a href="' + $( this ).attr( 'src') + '" data-lightbox="skin-model" data-title="' + $( this ).attr( 'alt') + '" class="ligthbox" ></a>';
});

$ ( ".skin-model").each( function() {
	$( this).find("p a.ligthbox:first").addClass("firstimage");
});

$ ( ".skin-model").each( function() {
	$( this).find("p a.ligthbox").eq( 1 ).addClass("secondimage");
});

//$( ".skin-model p a img" ).eq( 1 ).css( "border", "pink solid 10px" );