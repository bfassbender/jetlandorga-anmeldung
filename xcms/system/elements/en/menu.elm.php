<?
$active = ($_REQUEST['menu']) ? $_REQUEST['menu'] : 'index';
?>

<script>
$(document).ready(function(){
//slides the element with class "menu_body" when paragraph with class "menu_head" is clicked
	var tar = "<? echo $active;?>";
	$("#firstpane span.menu_head").each(function(){
		$(this).css({backgroundColor:"#5C6D74"});
		$(this).addClass("menuinactive");	
	});
	
	if (tar == 'chemistry' || tar == 'stations' || tar == 'nuclear' || tar == 'machines' || tar == 'securevents' || tar == 'steel'){
		$('#department').css({backgroundColor:"#99B6BE"}).next("div.menu_body").slideToggle(300).siblings("div.menu_body").slideUp("slow");	
	}	
	$("#"+tar).css({backgroundColor:"#99B6BE"}).removeClass("menuinactive").addClass("menuactive");
		$("#firstpane span.menu_head").click(function()
		{
			$("#firstpane span.menu_head").each(function(){
			$(this).css({backgroundColor:"#5C6D74"});			
		});
	$("#firstpane div.menu_body").each(function(){
		$(this).slideUp("slow");
	});

    $(this).css({backgroundColor:"#99B6BE"}).next("div.menu_body").slideToggle(300).siblings("div.menu_body").slideUp("slow");
    
});
});

</script>


<div style='height:37px;'></div>
<div id="firstpane" class="menu_list">
	<span class="menu_head" id='index' onclick="window.location.href='?menu=index'">Startpage</span>
  	<span class="menu_head" id='department'>Bussiness devisions</span>
    	<div class="menu_body">
    		<a class='menuinactive' id='stations' onclick="window.location.href='?menu=stations'">Konventionelle Kraftwerke</a>
        	<a id='chemistry' onclick="window.location.href='?menu=chemistry'">Petrochemie und chem. Anlagen</a>
        	<a id='nuclear' onclick="window.location.href='?menu=nuclear'">Kerntechnisch Anlagen</a>
        	<a id='machines' onclick="window.location.href='?menu=machines'">Sondermaschinenbau</a>
        	<a id='securevents' onclick="window.location.href='?menu=securevents'">Armaturen - Service / Sicherheitsventile</a>
        	<a id='steel' onclick="window.location.href='?menu=steel'">Stahlbau / Rohrleitungsbau - Montagen</a>
    	</div>    	
  <span class="menu_head" id='personal' onclick="window.location.href='?menu=personal'">Personal</span>  	
  <span class="menu_head" id='references' onclick="window.location.href='?menu=references'">References</span>
  <span class="menu_head" id='company' onclick="window.location.href='?menu=company'">Company</span>
  <span class="menu_head" id='jobs' onclick="window.location.href='?menu=jobs'">Jobs</span>
  <span class="menu_head" id='contact' onclick="window.location.href='?menu=contact'">Contact</span>
  <span class="menu_head" id='impressum' onclick="window.location.href='?menu=impressum'">Impressum</span>

</div> 

