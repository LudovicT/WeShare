	<!--Start of home page-->
<div class="conteneur">
	<div class="bloc">
		<div id="homePage" tabindex="99998">
		<center>
			<form id="homeSearch" class="" action="/WeShare/Search/" method="POST">
			<div id="searchBar">
				<div class="searchBar_left"></div>
				<div class="searchBar_inner"></div>
				<div class="searchBar_right"></div>
				<div class="searchBar_inner_left"></div>
				<div class="searchBar_inner_inner"></div>
				<div class="searchBar_inner_right"></div>
				<div id="searchBar_input">
					<input name="mot" type="text" class="formulaireBoite" id="srchval" placeholder="Taper votre recherche ..." size="18">
					<span id="searchBar_precomplete" class="hint" style="display: inline;"></span>
				</div>
				<button onclick="document.getElementById('homeSearch').submit()" id="searchButton" name="Submit" type="button"></button>
			</div>
			</form>
			</center>
		</div>
	</div>
</div>
	
 <script langage="text/javascript">
function clearf(){
document.getElementById('srchval').value="";
}
</script>
	<!--End of home page-->
	