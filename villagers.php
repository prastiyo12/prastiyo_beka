<?php

class Vilagers {
	function get_year_death (int $total) {
		$data = [];

		if ($total < 0) {
			return $data; 
		}
		for ($i = 1; $i <= $total; $i++) {
			if ($i < 2) {
				$number = $i;
			} else {
				$number = @$data[$i - 2] + @$data[$i - 3];
			}
			array_push($data, $number);
		}
		return $data;
	}


	function getTable (int $total_years) {
		$html = '<table style="border:1px solid #444444;width:100%;border-collapse: collapse;padding:4px;">';
		$html .= '<tr>';
		$html .= '<td align="center" style="border:1px solid #000000;padding:4px;" width="80">Year of-</td>';
		$html .= '<td colspan="'.$total_years.'" style="border:1px solid #000000;padding:4px;" align="center">Formula Of Death in '.$total_years.' years</td>';
		$html .= '<td align="center" width="120" style="border:1px solid #000000;padding:4px;" >Total Death</td>';
		$html .= '</tr>';
		$html .= '<body>';
		for($i=1; $i<=$total_years; $i++){
			$html .= '<tr>';
			$html .= '<td align="center" style="border:1px solid #000000;padding:2px;">'.$i.'</td>';

			$get_year = $this->get_year_death($i);
			$count_get_year = count($get_year);
			for($x=0; $x < $count_get_year; $x++){
				$html .= '<td style="border:1px solid #000000;padding:2px;">'.$get_year[$x].'</td>';
				if((($x + 1) == $count_get_year) && $count_get_year < $total_years){
					$html .= '<td style="background-color:#444444;padding:2px;border:1px solid #000000;" colspan="'.($total_years - $count_get_year).'">&nbsp;</td>';
				}
				if(($x + 1) == $count_get_year){
					$html .= '<td align="right" style="border:1px solid #444444;padding:2px;">'.array_sum($get_year).'</td>';
				}
			}
			$html .= '</tr>';
		}
		$html .= '</body>';
		$html .= '</table>';
		$html .= '<br><br>';

		return $html;
	}


	function get_averate () {
		$age_of_death_a  = @$_POST['age_of_death_a'];
		$year_of_death_a = @$_POST['year_of_death_a'];
		$age_of_death_b  = @$_POST['age_of_death_b'];
		$year_of_death_b = @$_POST['year_of_death_b'];
		$person_a = $year_of_death_a - $age_of_death_a;
		$person_b = $year_of_death_b - $age_of_death_b;
		if(($year_of_death_a < 0 || $age_of_death_a < 0) || ($year_of_death_b < 0 || $age_of_death_b < 0)) {
			echo 'invalid data, the result is -1';
		}else{
			$killed_on_year_a = array_sum($this->get_year_death($person_a));
			$killed_on_year_b = array_sum($this->get_year_death($person_b));
			echo '<b>Answer :</b><br/><br/>';
			echo 'Person A born on Year = '.$year_of_death_a.' - '.$age_of_death_a.' = '.$person_a.', number of people killed on year '.$person_a.' is '.$killed_on_year_a.'.<br/>';
			echo 'Person B born on Year = '.$year_of_death_b.' - '.$age_of_death_b.' = '.$person_b.', number of people killed on year '.$person_b.' is '.$killed_on_year_b.'.<br/><br/>';
			$average = ($killed_on_year_b + $killed_on_year_a) / 2;
			echo 'So the average is ('.$killed_on_year_b.' + '.$killed_on_year_a.') / 2 = '.$average.' <br/><br/><br/>';
		}
	}

}

?>
