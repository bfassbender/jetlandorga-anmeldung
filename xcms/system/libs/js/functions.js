/** galerie functions **/
function slideSwitch($next2) {
    var $active = $('#slideshow IMG.active');
    var next;

    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

    // use this to pull the images in the order they appear in the markup
    if ($next2 == ''){
    	var $next =  $active.next().length ? $active.next()
        	: $('#slideshow IMG:first');
    } else {
		var $next =  $active.next().length ? $next2
        	: $('#slideshow IMG:first');
	}
    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}

function next(){
    var $active = $('#slideshow IMG.active');
	var $next = $active.next();
	slideSwitch($next);
}

function prev(){
    var $active = $('#slideshow IMG.active');
	var $next = $active.prev();
	slideSwitch($next);
}

$(function() {
    setInterval( "slideSwitch('')", 4000 );
});

/* TIPSY */
$(function() {
	$('#pipes').tipsy({
		fallback: "<b>Rohrleitungs- und Beh&auml;lterbau</b><br /><br />Unsere fachlich qualifizierten Monteure im Bereich Rohrleitungs- und Beh&auml;lterbau stellen Druckleitungen und Beh&auml;lter f&uuml;r Wasser, Gas, &ouml;l, Fernw&auml;rme und Abwasser fachgerecht her und f&uuml;hren Instandsetzungsarbeiten am Rohrleitungsnetz und Beh&auml;ltern aus.<br /><br />Die Mitarbeiter von ZIS haben Erfahrung als Schlosser und Vorrichter. Unsere Vorrichter besitzten Kenntnisse der Isometrie und sind zeichnungssicher.<br />",
		gravity: 'sw',
		html: true 
	});
	$('#pumps').tipsy({
		fallback: "<b>Armaturen, Sicherheitsventile, Pumpen</b><br /><br />Die Monteure von ZIS werden durch interne Schulungen an Armaturen, Sicherheitsventilen und Pumpen ausgebildet. Durch dieses Vorwissen und entsprechende Erfahrungen auf den unterschiedlichen Baustellen, sind unsere Monteure in der Lage Revisionen an Armaturen, Sicherheitsventilen und Pumpen selbstst&auml;ndig durchzuf&uuml;hren. Vom Ausbau &uuml;ber die Instandhaltung bis zum Einbau sind unsere Monteure mit entsprechendem Werkzeug und Know-How ausgestattet.<br />",
		gravity: 'sw',
		html: true 
	});
	$('#mr').tipsy({
		fallback: "<b>Mess-, Regel-Elktroniker</b><br /><br />Unsere Elektroniker f&uuml;r Automatisierungstechnik oder 'Prozessleitelektroniker', 'Mess- und Regelmechaniker', 'BMSR-Techniker', wie der Beruf fr&uuml;her noch bezeichnet wurde, besitzen eine gute Ausbildung und sind in der Lage alle Arbeiten an elektrischen, elektronischen, pneumatischen, hydraulischen und rein mechanischen Systemen durchzuf&uuml;hren.<br />",
		gravity: 'sw',
		html: true 
	});
	$('#ma').tipsy({
		fallback: "<b>Maschinenschlosser</b><br /><br />Die Maschinenbauer von ZIS kommen aus verschiedenen Ausbildungs-Sparten und besitzen den perfekten Mix an Kenntnissen um im Maschinenbau zu bestehen. Ihren umfangreiches Einsatzgebiet umfasst den Beha&auml;lterbau, Stahlbau, L&uuml;ftungsbau, Spezialmaschinen, sowie F&ouml;rederanlagen f&uuml;r die Automobiltechnik.<br /><br />Auch die Wartung und Instandhaltung von Pressen und der Automatiesungstechnik f&auml;llt in diesen Aufgabenbereich.",
		gravity: 'sw',
		html: true 
	});
	$('#electricians').tipsy({
		fallback: "<b>Elektriker</b><br /><br />Die Elektriker sind in den Aufgabenbereichen der Schaltschrankverdrahtung und Verdrahtung nach Stromlaufpl&auml;nen f&uuml;r Anlagen, Maschinen und Verkettungseinrichtungen eingesetzt.<br /><br />Sie sind im Leicht - Schwer - Maschinen - sowie Anlagenbau und in der Kraftwerkstechnik baustellenerfahren.",
		gravity: 'sw',
		html: true 
	});
	$('#turner').tipsy({
		fallback: "<b>Dreher / Zerspanungsmechaniker</b><br /><br />Unsere Zerspanungsmechaniker fertigen mit spanenden Verfahren, wie Drehen, Fr&auml;sen oder Schleifen Pr&auml;zisions-Bauteile aus unterschiedlichen Werkstoffen an. Unsere Zerspanungsmechaniker werden &uuml;blicherweise in metall- und kunststoffverarbeitenden Betrieben der Industrie und des Handwerks, wie im Maschinen-, Stahl- oder Leichtmetallbau, in Gie&szlig;ereien oder im Fahrzeugbau eingesetzt. Sowohl f&uuml;r die Einzel- als auch Serienfertigung konfigurieren, bedienen und kontrollieren sie konventionelle und computergesteuerte Werkzeugmaschinen wie Drehmaschinen-, Fr&auml;smaschinen-, Drehautomaten-, Schleifmaschinensysteme und Bohrwerke. Dabei beurteilen und analysieren sie die technische Umsetzbarkeit von Fertigungsauftr&auml;gen. Dazu nutzen sie Informationsquellen und technische Unterlagen und w&auml;hlen die passenden Fertigungsmethoden aus. In Folge planen sie die Fertigungsprozesse im Detail, unter Beachtung terminlicher, wirtschaftlicher und qualitativer Vorgaben. Weiters adaptieren sie die Programme f&uuml;r die numerisch gesteuerten (NC) sowie CNC- Fertigungssysteme und &uuml;berwachen die Produktion. Gefordert werden auch Kenntnisse &uuml;ber Qualit&auml;tsmanagementsysteme, Dokumentation und Sicherheitseinrichtungen. Weitere Kompetenzen sind die Wartung und Inspektion der Fertigungssysteme.",
		gravity: 'w',
		html: true 
	});	
	$('#welder').tipsy({
		fallback: "<b>Schwei&szlig;er</b><br /><br />Unsere Schwei&szlig;er sind gepr&uuml;ft nach DIN EN 287 in den Schwei&szlig;verfahren E, MAG und WIG. Sie sind entsprechend qualifiziert und mit den erforderlichen Zeugnissen versehene.<br />",
		gravity: 'sw',
		html: true 
	});	
});
$(document).ready(function() {
	$("#kontaktformular").validate({
		messages: {
			name: {
				required: 'Bitte tragen Sie ihren Namen ein.'
			},
			contact: {
				required: "Bitte tragen Sie einen Betreff ein."
			},
			email: {
				required: "Bitte tragen Sie eine valide Email ein.",
				email: "Bitte tragen Sie eine valide Email ein."
			},
			contacttext: {
				required: "Bitte tragen Sie einen Text ein."
			}
		},
		errorElement: "div"
	});
});