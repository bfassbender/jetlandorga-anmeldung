
<style>
/* About */
/*    background: #e4e4e4;*/
#confirmation{
	background: rgba(0,0,0,0.7);
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
	margin: 20px 0;
	text-align: center;
	padding-bottom: 20px;
}

.confirmation-box {
	text-align: left;
	background: rgba(255,255,255,0.2);
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
		<div class="confirmation-box-container">
			<div class="row">
				<h1 class="confirmation-title text-success">Die Anmeldung wurde erfolgreich im System erfasst.</h3>
			</div>
			<div class="row">
				<p>Hinweis: Es wurde <b>keine</b> Mail an den Teilnehmer verschickt.</p>
				<form class="form-horizontal" role="form">
					<button type='button' class="btn btn-success" onClick="self.location.href = '<? echo $_SERVER['PHP_SELF']?>?action=overview'">OK</button>
				</form>
			</div>
		</div>
	</div>
</section>