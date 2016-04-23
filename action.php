<?php 
	$date = $_POST["dates"];

//	die(copy(makeApiStr($date,11) , 'E:/dawnPpr/'.imageName($date,11).'.jpg'));

	for($i=1;;$i++){
		if(copy(makeApiStr($date,$i) , 'E:/dawnPpr/'.imageName($date,$i).'.jpg')){
			echo imageName($date,$i);
			makeDateStrArticle($date,$i);
		}else{
			break;
		}
	}
?>



<?php 
	function makeDateStr($date){
		$date = date('Y', strtotime($date)).'/'.date('m', strtotime($date)).'/'.date('d', strtotime($date));
		$dateStr = date('d', strtotime($date)).'_'.date('m', strtotime($date)).'_'.date('Y', strtotime($date));
		return $date .'/pages/'.$dateStr.'_';
	}
	function makeDateStrArticle($date,$pg){
		$date = date('Y', strtotime($date)).'/'.date('m', strtotime($date)).'/'.date('d', strtotime($date));
		$dateStr = date('d', strtotime($date)).'_'.date('m', strtotime($date)).'_'.date('Y', strtotime($date));
				if($pg<10){
					$pg = "00".$pg;
				}else if($pg<100){
					$pg= "0".$pg;
				}

		 mkdir("E:/dawnPpr/Article".$dateStr.$pg);
				$artileFolder =	"E:/dawnPpr/Article".$dateStr.$pg;
			for($i=1;;$i++){
				$counter = null;
				if($i<10){
					$counter = "00".$i;
				}else if($i<100){
					$counter = "0".$i;
				}
				$articleUrl = 'http://e.dawn.com/'.$date .'/stories/'.$dateStr.'_'.$pg.'_'.$counter.'.jpg';
				if(copy($articleUrl , $artileFolder.'/'.imageNameArticle($i).'.jpg')){
					echo imageName($date,$i);
				}else{
					break;
				}
			}
	}


	function makeApiStr($date,$ct){
		$dateStr = makeDateStr($date);
		$counter = null;
		if($ct<10){
			$counter = "00".$ct;
		}else if($ct<100){
			$counter = "0".$ct;
		}
		$apiStr = 'http://e.dawn.com/'.$dateStr.$counter.'.jpg';
		return $apiStr;
	}
	function imageName($date,$ct){
		return "Paper".$date."PAGE".$ct;
	}
	function imageNameArticle($ct){
		return "Article#".$ct;
	}

	function makeApiArticle(){
		http://e.dawn.com/2016/03/16/stories/{day-2}_{month-2}_{year-4}_{page number-3}_{article number-3}.jpg
	}


?>