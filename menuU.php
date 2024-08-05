
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Menu</title>
	<link rel="stylesheet" type="text/css" href="style4.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<nav id="nav" role="navigation" class="icon-bar">
    <!--<a href="#nav" title="Show navigation">Show navigation</a>
    <a href="#" title="Hide navigation">Hide navigation</a>-->
    <ul>
        <li>
            <a href="/" aria-haspopup="true" class="tt"><i class="fa fa-bus"></i>Lignes</a>
            <ul>
                <li class="hh"><a href="listeligneC.php" class="A">Liste lignes</a></li>
                <li class="hh"><a href="passage.php" class="A">lignes passe par X</a></li>
                
            </ul>
        </li>
        <li><a href="listestationC.php" class="tt"><i class="fa fa-female"></i>Station</a></li>
        <li><a href="listevoyageC.php" class="tt"><i class="fa fa-suitcase"></i>Voyage</a></li>
    </ul>
</nav>


<!--barre recherche



<input type="search" id="site-search" name="q"
       aria-label="Search through site content" style="float: right; margin-right: 50px; height: 30px;">

<button style="float: right; height: 30px; background-color: orange;">Rechercher</button>-->




<form method="POST" action= "sedeplacer.php">
		<div class="D">
			<legend class="Cs" style="margin-top:0px; padding-top:9px;">Se déplacer</legend>
			<label class="leb">Station d'épart:</label><br>
			<select name="Deppart" class="sel">
				   			<?php
				
				 $bd=new mysqli('localhost','root','','kenibus')   or die ("unable to connect"); 
				$sql = "SELECT * FROM station";
				$result= mysqli_query($bd,$sql)or die("bad query");
				while($row = mysqli_fetch_assoc($result))
				{
				?>

				    <option type="text"  style="font-size: 15px;"><?php echo $row['StationLib'];?></option>
			       
				<?php
				}
				?>
				    
			        </select><br>
			
				   
			     
				 
			        <label class="leb">Station arrive:</label><br>
			        <select name ="Arriver"  class="sel"><br>
							<?php
				
				 $bd=new mysqli('localhost','root','','kenibus')   or die ("unable to connect"); 
				$sql = "SELECT * FROM station";
				$result= mysqli_query($bd,$sql)or die("bad query");
				while($row = mysqli_fetch_assoc($result))
				{
				?>

				    <option  type ="text" style="font-size: 15px;"><?php echo $row['StationLib'];?></option>
			       
				<?php
				} 
				
				?>
				     
			        </select><br>
					
					
			<div class="D1">
			<input type="submit" name="SDP" value="Lignes" class="int" id="recherche">
			</div>
			
			<div class="D2">
			<input type="submit" value="P.C.chemin" class="int" id="chemin">
			</div>

			</div>
			</form>	
			<div class="chemain"></div>

<!--<div class="cart">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d105513.00215437527!2d-6.6704208316938285!3d34.26687787948347!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7575f8a6d8643%3A0xc7050653c05e128b!2zS8Opbml0cmE!5e0!3m2!1sfr!2sma!4v1622330443337!5m2!1sfr!2sma" width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy">
   </iframe>
</div>-->
</body>
<script src="jquery-3.4.1.min.js"></script>
	<script>

		$(function() {
			$("#chemin").click(function() {
				
			$.ajax({
  url: "chemin.php",
  method: "POST",
  data: {'data': $("form").serialize()},
}).done(function(response) {
	//console.log("data",response);
	$(".r").remove();
	 $(".chemain").append( response );

}).fail(function( jqXHR, textStatus ) {
 
});
return false;
			});	       


			$("#recherche").click(function() {
			$.ajax({
  url: "sedeplacer.php",
  method: "POST",
  data: {'data': $("form").serialize()},
}).done(function(response) {
	//console.log("data",response);
	$(".r").remove();
	 $(".chemain").append( response );

}).fail(function( jqXHR, textStatus ) {
 
});
return false;
			});
		});
	</script>
</html>