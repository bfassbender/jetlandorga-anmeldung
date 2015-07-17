
<style>
/* About */
/*    background: #e4e4e4;*/
#confirmation{
	background: rgba(0,0,0,0.8);
}

#confirmation h1,
#confirmation h2,
#confirmation h3,
#confirmation h4,
#confirmation h5,
#confirmation h6 {
	text-align: center;
}


.confirmation-box-container {
	margin: 60px 0;
	text-align: center;
	padding-bottom: 20px;
}

.confirmation-box-container:last-child{
	margin-bottom: 0;
}

.confirmation-box {
	text-align: left;
	background: rgba(255,255,255,0.2);
}

.confirmation-box .icon i {
	font-size: 35px;
	padding-top: 12px;
	display: block;
}

.confirmation-box .description {
	padding: 20px 15px 10px;
}

.confirmation-box .description p {
	font-size: 16px;
}

/* Small devices (tablets, 768px and up) */
@media (min-width: 768px) { 
	.confirmation-box-container{
		margin: 0;
	}
}

</style>

<!-- About -->
<section id="confirmation" class="section">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 center">
				<h3 class="confirmation-title">Du hast dich erfolgreich für das Con angemeldet.</h3>
				<div class="confirmation-title-border"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 confirmation-box-container">
				<div class="description">
					<p>Vielen Dank für Deine Anmeldung. Wir freuen uns auf Dich!</p>
					<p>Bitte überweise nun Deinen Teilnahmebeitrag auf das folgende Konto.</p>
				</div>
				<div class="row">
					<div class="col-sm-12 confirmation-box-container">
						<div class="col-sm-4"></div>
						<div class="col-sm-4 confirmation-box">
							<p><b>Inhaber:</b> Christoph Platt<br/>
								<b>Institut:</b> Sparkasse München<br/>
								<b>IBAN:</b> DE26 7015 0000 1000 5296 75<br/>
								<b>BIC:</b> SSKMDEMMXXX<br/>
								<b>Verwendungszweck:</b> &lt;SC oder NSC&gt;, J11, &lt;Realname&gt;</p>
						</div>
						<div class="col-sm-4"></div>
					</div>
					<div class="row">
						<div class="col-sm-12 confirmation-box-container">
							<div class="col-sm-12">
								<p>Beachte bitte außerdem, dass wir Deine Anmeldung erst dann weiter bearbeiten, wenn Dein Beitrag bei uns eingegangen ist.</p>
								<form class="form-horizontal" role="form">
									<button type='button' class="btn btn-success" onClick="self.location.href = '<? echo $_SERVER['PHP_SELF']?>?action=teilnehmer'">OK</input>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>