<style>
.level
{
	display: inline-block;
	background-color: white;
	color: black;

 /*   width: 300px;
    height: 110px;*/
    /*overflow-x: scroll;*/
    /*overflow-y: hidden;*/   
    margin: 5px;
    padding: 5px;
    white-space: nowrap;
}

.container
{
	display: inline-block;
	background-color: #425F9C;
	color: white;

 /*   width: 300px;
    height: 110px;*/
    /*overflow-x: scroll;*/
    /*overflow-y: hidden;*/   
    margin: 5px;
    padding: 5px;
    white-space: nowrap;
}
.blok
{
    display: inline-block;
    /*width: 100px;
    height: 100px;*/
    background-color: #E9EAED;
    color: black;
    margin: 5px;
    padding: 5px;
     /*white-space: nowrap;*/
    /*float: left;*/
}
.item
{
    display: inline-block;
    color: black;
    /*width: 100px;
    height: 100px;*/
    background-color: white;
    margin: 5px;
    padding: 5px;
    /*float: left;*/
}
.solution
{
    display: inline-block;
    color: white;
    /*width: 100px;
    height: 100px;*/
    font-weight:bold; 
    background-color: #783903;
    margin: 5px;
    padding: 5px;
    /*float: left;*/
}
</style>
<!-- <div class="container">
	<div class="blok">
		<div class="item">1</div>
		<div class="item">2</div>
		<div class="item">3</div>
		<div class="item">4</div>
	</div>
	<div class="blok">
		<div class="item">1</div>
		<div class="item">2</div>
		<div class="item">3</div>
		<div class="item">4</div>
	</div>
</div>
<div class="container">
	<div class="blok">
		<div class="item">1</div>
		<div class="item">2</div>
		<div class="item">3</div>
		<div class="item">4</div>
	</div>
	<div class="blok">
		<div class="item">1</div>
		<div class="item">2</div>
		<div class="item">3</div>
		<div class="item">4</div>
	</div>
</div> -->

<?php 

$x=0;
$y=0;

//nilai awal
$x_target=htmlspecialchars($_GET["x_target"]);
$y_target=htmlspecialchars($_GET["y_target"]);
$debug=htmlspecialchars($_GET["debug"]);
$limit=$_GET["limit"];
$limit=$limit+1;
$x_level=0;
$y_level=0;
$aturan=0;

$level=0;
$langkah=$level+1;
$buntu=0;
$sudahpernah=array();
$levelvalue=array();
$sudahpernah[0]['x']=$x;
$sudahpernah[0]['y']=$y;
$levelkondisi_sementara_index=0;

	$levelkondisi=array();
	$levelkondisi[0][0]['x']=0;
	$levelkondisi[0][0]['y']=0;
	$levelkondisi[0][0]['aturan']=0;
	// $levelkondisi[0][0]['x']=4;
	// $levelkondisi[0][0]['y']=0;
	// $levelkondisi[0][0]['aturan']=1;
	// $levelkondisi[0][1]['x']=0;
	// $levelkondisi[0][1]['y']=3;
	// $levelkondisi[0][1]['aturan']=2;
	// $levelkondisi_next=array();



	function aturan1($x,$y){ 
		global $x;
		global $y;
		if ($x<4) {
			$x=4;
		     // echo "(".$x.",".$y.")";
		} else {
			$x=5;
			$y=5;
		}

	}

	function aturan2($x,$y){
		global $x;
		global $y;
		if ($y<3) {
			$y=3;
		     // echo "(".$x.",".$y.")";
		} else {
			$x=5;
			$y=5;
		}	
	}

	function aturan3($x,$y){
		global $x;
		global $y;
		if ($x>0 AND $x==4) {
			$x=$x/2;
		     // echo "(".$x.",".$y.")";
		} else {
			$x=5;
			$y=5;
		}	
	}

	function aturan4($x,$y){
		global $x;
		global $y;
		if ($y>0 AND $y==3) {
			$y=$y/2;
		     // echo "(".$x.",".$y.")";
		} else {
			$x=5;
			$y=5;
		}	
	}

	function aturan5($x,$y){
		global $x;
		global $y;
		if ($x>0) {
			$x=0;
		     // echo "(".$x.",".$y.")";
		} else {
			$x=5;
			$y=5;
		}	
	}

	function aturan6($x,$y){
		global $x;
		global $y;
		if ($y>0) {
			$y=0;
		     // echo "(".$x.",".$y.")";
		} else {
			$x=5;
			$y=5;
		}	
	}

	function aturan7($x,$y){
		global $x;
		global $y;
		if ($y>0 AND $x+$y >= 4) {
			$y=$y-(4-$x);
			$x=4;
		     // echo "(".$x.",".$y.")";
		} else {
			// echo "bah";
			$x=5;
			$y=5;
		}	
	}

	function aturan8($x,$y){
		global $x;
		global $y;
		if ($x>0 AND $x+$y >= 3) {
			$x=$x-(3-$y);
			$y=3;
		     // echo "(".$x.",".$y.")";
		} else {
			$x=5;
			$y=5;
		}	
	}

	function aturan9($x,$y){
		global $x;
		global $y;
		if ($y>0) {
			if ($x+$y <= 4) {
				$x=$x+$y;
				$y=0;	
			     // echo "(".$x.",".$y.")";
			} else {
			$x=5;
			$y=5;
			}	
						
		} else {
			$x=5;
			$y=5;
		}	
	}

	function aturan10($x,$y){
		global $x;
		global $y;

		if ($x>0) {
			if ($x+$y <= 3) {
				$y=$x+$y;
				$x=0;
			     // echo "(".$x.",".$y.")";
			} else {
			$x=5;
			$y=5;
			}	
			
		} else {
			$x=5;
			$y=5;
		}	
	}
	function aturan11($x,$y){
		global $x;
		global $y;

		if ($x=0) {
			if ($y == 2) {
				$y=0;
				$x=2;
			     // echo "(".$x.",".$y.")";
			} else {
			$x=5;
			$y=5;
			}	
			
		} else {
			$x=5;
			$y=5;
		}	
	}


	function netral(){
		global $x;
		global $y;
		global $aturan;
		global $x_level;
		global $y_level;

		$x=$x_level;
		$y=$y_level;
		$aturan=0;
	}
	echo "<div class=\"page\" style=\"text-align:center;font-family:monospace\">";
	echo "<div style=\"text-align:left\"><strong>chocolate-bread first search </strong></div><br>";
	echo "<div style=\"background-color:#FDF5CF;padding:10px;width:70px;text-align:center\">target :<br>";
	echo "x = ".$x_target."<br>";
	echo "y = ".$y_target."<br></div>";
	echo "The solution is marked in <div class=\"solution\">chocolate square</div>. It isnt there? Try to increase the limit.";
	
	
	echo "<br>";	

	while ($langkah < $limit) {
		echo "<p>"; 
		echo "<div class=\"level\">";
		// echo "<pre>";
		// print_r($levelkondisi);
		// echo "<br>";
		$kondisi_index=0;
		$levelkondisi_next_index=0;
		foreach ($levelkondisi as $yek) {
		echo "<div class=\"container\">";
			foreach ($yek as $key) {
			
			$levelkondisi_next_index_=0;
			echo "<div class=\"blok\">";
			$x=$key['x'];
			$y=$key['y'];
			$x_level=$key['x'];
			$y_level=$key['y'];
			
			echo "kondisi (".$x.",".$y.")<sup>".$key['aturan']."</sup><br>";

			aturan1($x,$y);
			$levelkondisi_sementara[0]['x']=$x;
			$levelkondisi_sementara[0]['y']=$y;
			$levelkondisi_sementara[0]['aturan']=1;
			netral();
			aturan2($x,$y);
			$levelkondisi_sementara[1]['x']=$x;
			$levelkondisi_sementara[1]['y']=$y;
			$levelkondisi_sementara[1]['aturan']=2;
			netral();
			aturan3($x,$y);
			$levelkondisi_sementara[2]['x']=$x;
			$levelkondisi_sementara[2]['y']=$y;
			$levelkondisi_sementara[2]['aturan']=3;
			netral();
			aturan4($x,$y);
			$levelkondisi_sementara[3]['x']=$x;
			$levelkondisi_sementara[3]['y']=$y;
			$levelkondisi_sementara[3]['aturan']=4;
			netral();
			aturan5($x,$y);
			$levelkondisi_sementara[4]['x']=$x;
			$levelkondisi_sementara[4]['y']=$y;
			$levelkondisi_sementara[4]['aturan']=5;
			netral();
			aturan6($x,$y);
			$levelkondisi_sementara[5]['x']=$x;
			$levelkondisi_sementara[5]['y']=$y;
			$levelkondisi_sementara[5]['aturan']=6;
			netral();
			aturan7($x,$y);
			$levelkondisi_sementara[6]['x']=$x;
			$levelkondisi_sementara[6]['y']=$y;
			$levelkondisi_sementara[6]['aturan']=7;
			netral();
			aturan8($x,$y);
			$levelkondisi_sementara[7]['x']=$x;
			$levelkondisi_sementara[7]['y']=$y;
			$levelkondisi_sementara[7]['aturan']=8;
			netral();
			aturan9($x,$y);
			$levelkondisi_sementara[8]['x']=$x;
			$levelkondisi_sementara[8]['y']=$y;
			$levelkondisi_sementara[8]['aturan']=9;
			netral();
			aturan10($x,$y);
			$levelkondisi_sementara[9]['x']=$x;
			$levelkondisi_sementara[9]['y']=$y;
			$levelkondisi_sementara[9]['aturan']=10;
			netral();
			aturan11($x,$y);
			$levelkondisi_sementara[10]['x']=$x;
			$levelkondisi_sementara[10]['y']=$y;
			$levelkondisi_sementara[10]['aturan']=11;
			netral();

			$jumlah_at=count($levelkondisi_sementara);
			for ($i=0; $i <= $jumlah_at; $i++) { 
					if ($levelkondisi_sementara[$i]['x']==5) {
						unset($levelkondisi_sementara[$i]);
						}
				}
			
			$s=0;
			foreach ($levelkondisi_sementara as $key) {
				foreach ($sudahpernah as $pernah) {
					if ($pernah['x']==$key['x'] AND $pernah['y']==$key['y']) {
						$pernahkah=1;
						}
					}
				if ($pernahkah==0) {
					if ($x_target==$key['x'] AND $y_target==$key['y']) {
						echo "<div class=\"solution\">";

						echo "(".$key['x'].",".$key['y'].")<sup>".$key['aturan']."</sup>";
						$jumlah_sudahpernah=count($sudahpernah);	
						$sudahpernah[$jumlah_sudahpernah]['x']=$key['x'];
						$sudahpernah[$jumlah_sudahpernah]['y']=$key['y'];
						$levelkondisi_next[$levelkondisi_next_index][$levelkondisi_next_index_]['x']=$key['x'];
						$levelkondisi_next[$levelkondisi_next_index][$levelkondisi_next_index_]['y']=$key['y'];
						$levelkondisi_next[$levelkondisi_next_index][$levelkondisi_next_index_]['aturan']=$key['aturan'];
						
						$levelkondisi_next_index_++;
						echo "</div>";
					} else {
						echo "<div class=\"item\">";
						echo "(".$key['x'].",".$key['y'].")<sup>".$key['aturan']."</sup>";
						$jumlah_sudahpernah=count($sudahpernah);	
						$sudahpernah[$jumlah_sudahpernah]['x']=$key['x'];
						$sudahpernah[$jumlah_sudahpernah]['y']=$key['y'];
						$levelkondisi_next[$levelkondisi_next_index][$levelkondisi_next_index_]['x']=$key['x'];
						$levelkondisi_next[$levelkondisi_next_index][$levelkondisi_next_index_]['y']=$key['y'];
						$levelkondisi_next[$levelkondisi_next_index][$levelkondisi_next_index_]['aturan']=$key['aturan'];
						
						$levelkondisi_next_index_++;
						echo "</div>";
					}

					
					}
				if ($pernahkah==1) {
					echo "<div class=\"item\">";
					echo "<strike>(".$key['x'].",".$key['y'].")<sup>".$key['aturan']."</sup></strike>";
					echo "</div>";
					}
				$pernahkah=0;
				
				}
			$levelkondisi_next_index++;
			echo "</div>";
			$at_=array_values($at);
			unset($at);
			$at=array_values($at_);


			$jumlah_at=count($at);
			$jumlah_at--;


			unset($levelkondisi);
			$levelkondisi=array_values($levelkondisi_next);
			}	
		echo "</div>";
			}
		
		$langkah++;	
	echo "</div>";
	}

	// echo "<pre>next";
	// print_r($levelkondisi_next);
echo "<br>[ endofhack ]";
?>

