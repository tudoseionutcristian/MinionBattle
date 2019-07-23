<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8">
	<title> Arena Battle </title>
	<style>
		body, html{
			height: 100%;
			margin: 0;
			overflow: auto;
		}
		.bg{
			background-image: url("abg.png");
			height: 100%;
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
		}
		/*p{
			background-color: lightblue;
			width: 600px;
			height: 120px;
			overflow: auto;
			position: absolute;
			top: 400px;
			right: 530px;
		}*/
		.box_blue{
			position:absolute;
			top:500px;
			height: 120px;
			width:700px;
			background:lightblue;
			overflow-y: scroll;
			right: 400px;
		}
		.button{
			background-color: #4B0082;
  			border: none;
  			color: white;
  			padding: 30px 150px;
  			text-align: center;
  			text-decoration: none;
 			display: inline-block;
  			font-size: 32px;
  			margin: 4px 2px;
  			cursor: pointer;
  			position: absolute;
  			left: 520px;
  			top: 650px;
		}
	</style>
</head>
<body>
	

<?php
$html_content = '';
class Tim{
	private $Health;
	private $Strength;
	private $Defense;
	private $Speed;
	private $Luck; 

	function __construct()
	{
		$this->Health = rand(70,100);
		$this->Strength = rand(70,80);
		$this->Defense = rand(45,55);
		$this->Speed = rand(40,50);
		$this->Luck = rand(10,30);
	}
	function setHealth($newHealth)
	{
		$this->Health = $newHealth;
	}

	function getHealth()
	{
		return $this->Health;
	}

		function getStrength()
	{
		return $this->Strength;
	}

		function getDefense()
	{
		return $this->Defense;
	}

		function getSpeed()
	{
		return $this->Speed;
	}

		function getLuck()
	{
		return $this->Luck;
	}
}

class Evil{
	private $Health;
	private $Strength;
	private $Defense;
	private $Speed;
	private $Luck;

	function __construct()
	{
		$this->Health = rand(60,90);
		$this->Strength = rand(60,90);
		$this->Defense = rand(40,60);
		$this->Speed = rand(40,60);
		$this->Luck = rand(25,40);
	}

	function setHealth($newHealth)
	{
		$this->Health = $newHealth;
	}

	function getHealth()
	{
		return $this->Health;
	}

		function getStrength()
	{
		return $this->Strength;
	}

		function getDefense()
	{
		return $this->Defense;
	}

		function getSpeed()
	{
		return $this->Speed;
	}

		function getLuck()
	{
		return $this->Luck;
	}
}

class Battle
{
	function startBattle(Tim $T, Evil $E)
	{
		$nrTurns = 0;
		/*goto a;
		goto b;

		if($T->getSpeed() > $E->getSpeed())
			//
		if($E->getSpeed() > $T->getSpeed())
			//
		if($T->getSpeed() == $E->getSpeed())
		{
			if($T->getLuck() > $E->getLuck()){

			}else{

			}
		}
		*/
		$arr = array();

		while(TRUE)
		{
			
			$bananaStrike = rand(1,100);
			$bananaStrikeOn = 0;

			$timLuck = rand(1,100);
			$timLuckOn = 0;

			$evilLuck = rand(1,100);
			$evilLuckOn = 0;

			if($timLuck <= $T->getLuck())
				$timLuckOn = 1;

			if($evilLuck <= $E->getLuck())
				$evilLuckOn = 1;
			
			if($bananaStrike <= 10)
				$bananaStrikeOn = 1;

			if($bananaStrikeOn == 1)
			{
				$damagetoE = $T->getStrength() - $E->getDefense();
				$damagetoE = $damagetoE * 2;
			}else{
				$damagetoE = $T->getStrength() - $E->getDefense();
			}

			if($damagetoE > 0 && $evilLuckOn == 1)
			{
				array_push($arr, "Evil is lucky and takes no damage this turn");
			}

			if($damagetoE > 0 && $bananaStrikeOn == 1 && $evilLuckOn == 0)
			{
				$newHealth = $E->getHealth() - $damagetoE;
				$E->setHealth($newHealth);
				array_push($arr, "Tim Attacks Evil with Banana Strke and deals $damagetoE Damage to Evil. Evil has $newHealth left.");
			}

			if($damagetoE >0 && $bananaStrikeOn == 0 && $evilLuckOn == 0)
			{
				$newHealth = $E->getHealth() - $damagetoE;
				$E->setHealth($newHealth);
				array_push($arr, "Tim Attacks Evil without any skill and deals $damagetoE Damage to Evil. Evil has $newHealth Health left");
			}

			if($E->getHealth() <=0)
			{
				$hlt = $T->getHealth();
				array_push($arr, "Game Over! Tim won the game with $hlt health left.");
				return $arr;
			} 
		
			$umbrelaShield = rand(1,100);
			$umbrelaShieldOn = 0;
			if($umbrelaShieldOn <= 20)
				$umbrelaShieldOn = 1;
			
			if($umbrelaShieldOn == 1)
			{
				$damagetoT = $E->getStrength() - $T->getDefense();
				$damagetoT = $damagetoT/2;
			}else{
				$damagetoT = $E->getStrength() - $T->getDefense();
			}

			if($timLuckOn == 1)
			{
				array_push($arr, "Tim is lucky and takes no damage this turn.");
			}

			if($damagetoT > 0 && $umbrelaShieldOn == 1 && $timLuckOn == 0)
			{
				$newHealth = $T->getHealth() - $damagetoT;
				$T->setHealth($newHealth);
				array_push($arr, "Evil Attacks Tim and deals $damagetoT Damage to Tim. Tim used Umbrella Shield. Tim has $newHealth Health left");
			}
			if($damagetoT > 0 && $umbrelaShieldOn == 0 && $timLuckOn == 0)
			{
					$newHealth = $T->getHealth() - $damagetoT;
					$T->setHealth($newHealth);
					array_push($arr, "Evil Attacks Tim and deals $damagetoT Damage to Evil. Tim has $newHealth Health left. Umbrella shield has not been used this turn.");
			}
			

			$nrTurns = $nrTurns + 1;

			if($nrTurns == 20)
			{
				array_push($arr, "Game Over! Limit of turns reached. Draw.");
				return $arr;
			}

			if($T->getHealth() <=0 && $E->getHealth() <=0)
			{
				array_push($arr, "Game Over! Draw! Both minions had under 0 health");
				return $arr;
			}

			if($T->getHealth() <= 0)
			{
				$hlt = $E->getHealth();
				array_push($arr,"Game Over! Evil won the game with $hlt left.");
				return $arr;
			}
			
			if($E->getHealth() <=0)
			{
				$hlt = $T->getHealth();
				array_push($arr, "Game Over! Tim won the game with $hlt health left.");
				return $arr;
			} 
		}
	}
}

$var = rand(10,20);
$Tim = new Tim();
$Evil = new Evil();
$Battle = new Battle();

?>
<!--<input  class="button">PLAY</a> -->

<div class="bg">
	
<div class="conent">
	
	<div class="box_blue"><?php 
	$arr = $Battle->startBattle($Tim, $Evil);
	foreach ($arr as &$val){
		echo $val;
		echo "<br>";
	}
	?></div>
	<!-- <div class="button"></div> -->
	<a href="battleArena.php" class="button">PLAY AGAIN</a>
</div>

</div>




</body>

</html>
