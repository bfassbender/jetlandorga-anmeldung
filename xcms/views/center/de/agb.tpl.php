<script language="javascript">
$(document).ready(function(){
	$("#faq").find("dd").hide().end().find("dt").click(function(){
		$(this).next().slideToggle();
	});	
});

function windowOpen() {
  window = window.open('views/chroniken/print.tpl.php', "Zweitfenster", "width=800,height=600,scrollbars=yes,resizable=yes");
  window.focus();
}

</script>
<style>
dl dd {
	margin-left: 10px;
	margin-right: 10px;
}

dl dt {
	font-weight: bold;
	background-color: #3F1719; 
	width: 705px; 
	height: 20px; 
	padding: 5px; 
	color: white; 
	font-size: 14px;
	border-bottom: 1px solid black; 
	cursor: pointer; 
	padding-left: 20px
}

dl {
	margin: 15px;
	width: 730px;
	background-color: #2D1112;
	text-align: justify;
	border: 1px solid black;
} 
</style>
<div id="container" >
	<div class='anmeldung'>
		<div class='heading'>
				<b>Allgemeine Veranstaltungsbedingungen</b>
		</div>
		<div>
		<dl id="faq">
			<dt id='divPrint'>1.	Vertragspartner</dt>
			<dd id='divPrint'><br>Vertragspartner sind der Falkenberg e.V. (Veranstalter) und der Teilnehmer. Die Teilnehmerzahl ist begrenzt. Der Veranstalter behält sich vor, im Vorfeld der Veranstaltung Teilnehmer ohne Angabe von  Gründen gegen Rückerstattung des Teilnahmebetrages von der Veranstaltung auszuschließen. Das Mindestalter beträgt 18 Jahre.<br>&nbsp;</dd>
	
			<dt>2.	Die Natur der Veranstaltung</dt>
			<dd><br>Der Teilnehmer ist sich der Natur der Veranstaltung und insbesondere der daraus resultierenden Gefahren (Nachtwanderungen, Geländewanderungen, Kämpfe mit Polsterwaffen etc.) bewußt. Dem Teilnehmer ist bekannt, dass Bereiche wie Tod, Religion, Esoterik, Metaphysik u.ä. thematisiert werden können. Eine Inszenierung ist nicht geschuldet.<br>&nbsp;</dd>
			
			<dt>3.	Der Teilnehmer verpflichtet sich</dt>
			<dd><br>Der Teilnehmer verpflichtet sich, nach Möglichkeit gefährliche Situationen für sich, andere Teilnehmer und die Umgebung zu vermeiden. Insbesondere zählt dazu das Klettern an ungesicherten Steilhängen und Mauern, das Entfachen von offenen Feuern außerhalb der dafür vorgesehenen Feuerstellen, das Benutzen nicht zugelassener oder beschädigter Waffen, übermäßiger Alkohol- oder Drogenkonsum. Der Teilnehmer verpflichtet sich, sich selbständig über die geltenden Sicherheitsvorkehrungen zu informieren und seine Ausrüstung einer Sicherheitsprüfung des Veranstalters zu unterziehen.<br>&nbsp;</dd>

			<dt>4.	Weisungspflicht</dt>
			<dd><br>Den Anweisungen des Veranstalters, seiner gesetzlichen Vertreter und Erfüllungsgehilfen ist Folge zu leisten. Teilnehmer, die gegen solche Anweisungen oder die Sicherheitsbestimmungen verstoßen, sich grob spielstörend verhalten, andere Teilnehmer gefährden oder in sonstiger Weise schwerwiegend in den Ablauf der Veranstaltung  eingreifen, können von der Veranstaltung verwiesen werden. Eine Pflicht zur Rückerstattung des Teilnahmebetrages besteht in diesem Fall nicht.<br>&nbsp;</dd>
			
			<dt>5.	Haftung</dt>
			<dd><br>Der Veranstalter haftet nicht für Sachschäden, es sei denn, grob fahrlässiges oder vorsätzliches Verhalten seitens des Veranstalters liegt vor. Für selbst verschuldete Schäden haftet der jeweilige Verursacher. Eine Personenhaftpflichtversicherung wird vorausgesetzt. Schadenersatzansprüche aus Unmöglichkeit der Leistung, Verzug und Verschulden bei Vertragsschluss sind bei leichter Fahrlässigkeit auf den Ersatz des vorhersehbaren Schadens beschränkt.<br>&nbsp;</dd>			

			<dt>6.	Teilnahmebetrag</dt>
			<dd><br>Der Teilnahmebetrag ist im Voraus zu entrichten. Es gilt der Staffelpreis zum Zeitpunkt des Geldeingangs. Bei einem Rücktritt des Teilnehmers wird der Teilnahmebetrag bis zwei Monate vor Veranstaltungsbeginn gegen Einbehaltung von 10 € Bearbeitungsgebühr, danach nur dann zurückerstattet, wenn der Teilnehmerplatz anderweitig vergeben werden konnte. Ein Teilnahmeplatz ist nur mit Zustimmung des Veranstalters übertragbar. Der Veranstalter behält sich vor, die Veranstaltung wegen mangelnder Teilnehmerzahl bis einen Monat vor Veranstaltungsbeginn gegen Erstattung des Teilnahmebetrags abzusagen. Weitergehende Schadenersatzansprüche sind in diesem Fall ausgeschlossen.<br>&nbsp;</dd>			
			
			<dt>7.	Ton-, Film- und Videorechte</dt>
			<dd><br>Alle Rechte an Ton-, Film- und Videoaufnahmen, an verwendeten Begriffen und Eigennamen, auch bei Übertragung, Wiedergabe und Nachbearbeitung sind dem Veranstalter vorbehalten. Aufnahmen seitens der Teilnehmer sind nur für private Zwecke zulässig.<br>&nbsp;</dd>			

			<dt>8.	Ergänzende oder abweichende Abreden</dt>
			<dd><br>Ergänzende oder abweichende Abreden bedürfen der Schriftform.<br>&nbsp;</dd>			

			<dt>9.	Gerichtsstand </dt>
			<dd><br>Gerichtsstand ist Frankfurt am Main.<br>&nbsp;</dd>			

			<dt>10.	Vertragsbestimmungen</dt>
			<dd><br>Die Unwirksamkeit einzelner Vertragsbestimmungen lässt die Gültigkeit der übrigen Vereinbarungen unberührt.<br>&nbsp;</dd>																		
		</dl>
		</div>
		<div style='text-align: right'><a href='javascript:windowOpen();' title='AGBs drucken'><img src='views/images/icons/print_big.png' border='0'></a></div>
	</div>
</div>