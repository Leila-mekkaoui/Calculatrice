<!doctype html>
<!-- calculatrice.php -->
<html>
	<head>
		<meta charset="utf-8" />
		<title> Ma petite calculatrice </title>
		
		<style type="text/css"> 
		
		body
		{
				text-align : center;
				width: 500px;
				margin : auto;
				font-family: "Gill Sans", sans-serif;
		}
		h1{
			border: 2px solid rgb(75, 70, 74);
			border-radius: 0.5em;
			height: 150px;
			width: 500px;
			display: flex;
			align-items: center;
			justify-content: center;
			background-color : #c1dff0;
        }
		p{
			width: 500px;
			}
		.calculatrice{
			border: 2px solid rgb(75, 70, 74);
			border-radius: 0.5em;
			background-color : #c1dff0;
			width: 500px;
			}
			
		p.param{
			background-color: #c6c1f0;
			border-radius: 0.3em;
			}
		p.err{
			color:#CD5C5C;
			font-size: 25px;

		}
		</style>
	</head>
	
	<?php 
	
	$bool = isset($_GET["nombre1"]) ;
	if($bool)
	{
		$nba = $_GET["nombre1"];
		$nbb = $_GET["nombre2"];
		$opp = $_GET["choix"];

	}
	

	if($bool and is_numeric($nba) and is_numeric($nbb))
	{
		function calculatrice($nba, $nbb, $opp)
		{
				switch($opp)
				{
					case "plus":
						$res = $nba + $nbb ;
						break;

					case "moins":
						$res = $nba - $nbb ;
						break;

					case "div":
						if($nbb == 0)
							{break;}
						else{$res = $nba / $nbb ;}
						break;

					case "mult":
						$res = $nba * $nbb;
						break;

				}

				return($res);
		}	
	}
	

	?>
            
	<body>	
		<h1>Calculatrice</h1>
		
		<p class="param">
			Une petite calculatrice minimaliste pour pratiquer la programmation web !
			Vous ne pouvez faire qu'une opération entre les 2 nombres.
		</p>
		
		<div class="calculatrice">
			<p> Entrez deux nombres et l'opération choisie : </p>
			<form name="calculatrice" method="get" action="calculatrice.php">
				<p>Nombre 1 :</p> 
				<input type="text" name="nombre1" value="<?php if(isset($_GET['nombre1'])) {echo $_GET['nombre1'];} ?>"> 
				</br></br>
					<select name="choix">
						<option value="plus" <?php if(isset($_GET['choix']) && $_GET['choix']=="plus") {echo("SELECTED");} ?>>+</option>
						<option value="moins" <?php if(isset($_GET['choix']) && $_GET['choix']=="moins") {echo("SELECTED");} ?>>-</option>
						<option value="div" <?php if(isset($_GET['choix']) && $_GET['choix']=="div") {echo("SELECTED");} ?>>/</option>
						<option value="mult" <?php if(isset($_GET['choix']) && $_GET['choix']=="mult") {echo("SELECTED");} ?>>*</option>
					</select> 
				</br>
				<p class="espace">Nombre 2</p>
				<input type="text" name="nombre2" value="<?php if(isset($_GET['nombre2'])) {echo $_GET['nombre2'];} ?>">
				</br></br>
				
				<input type="submit" name="action" value="Calculez" />
			</form>
			
			<?php 
				
				if($bool and is_numeric($nba) and is_numeric($nbb))
				{
					if(($opp == "div") and ($nbb==0))
					{
						echo("<p class='err'> On ne peut pas diviser un chiffre par 0 !!</p>");
					}
					else
					{
						$resu = calculatrice($nba, $nbb, $opp);
						echo("Le résultat est : \n $nba $opp $nbb est égal à $resu");
					}
				}
				elseif($bool)
				{echo("<p class='err'> On ne calcul que des nombres !</p>");}

			?>

		</div>
		
		
		</br>
		
		<p class="param">Les paramètres transmis : </br>


		<?php 
		foreach ($_GET as $k => $v) { echo "$k : $v<br />\n"; }
		?>
		
		</p>
	</body>
</html>	
