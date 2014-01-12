<?php
//functions to loop day,month,year
$month_arr=array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');

function month_arr($m){
	if($m)
	{
		
		echo $month_arr[$m];
	}
	else
	{
		$month='';
		foreach($month_arr as $key=>$value){
			
			$month .='<option value='.$key.'>'.$value.'</option>'."\n";
		}
		return $month;
	}
    
}

function month_num_to_alpha($num)
{
	global $month_arr;
	$num=( (int)$num )-1;
		return $month_arr[$num];
		
}
	

function formDay(){
    for($i=1; $i<=31; $i++){
        $selected = ($i==date('n'))? ' selected' :'';
        echo '<option'.$selected.' value="'.$i.'">'.$i.'</option>'."\n";
    }
}
//with the -8/+8 month, meaning june is center month
function formMonth(){
    $month = strtotime(date('Y').'-'.date('m').'-'.date('j').' - 8 months');
    $end = strtotime(date('Y').'-'.date('m').'-'.date('j').' + 8 months');
    while($month < $end){
        $selected = (date('F', $month)==date('F'))? ' selected' :'';
        echo '<option'.$selected.' value="'.date('F', $month).'">'.date('F', $month).'</option>'."\n";
        $month = strtotime("+1 month", $month);
    }
}

function formYear(){
    for($i=1980; $i<=date('Y'); $i++){
        $selected = ($i==date('Y'))? ' selected' :'';
        echo '<option'.$selected.' value="'.$i.'">'.$i.'</option>'."\n";
    }
}

function date_selection($day_id,$month_id,$year_id){
   ?>
   <select id="<?php echo $day_id;?>" name="<?php echo $day_id;?>" style="width:60px">
		<option value="01">01</option>
		<option value="02">02</option>
		<option value="03">03</option>
		<option value="04">04</option>
		<option value="05">05</option>
		<option value="06">06</option>
		<option value="07">07</option>
		<option value="08">08</option>
		<option value="09">09</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
		<option value="13">13</option>
		<option value="14">14</option>
		<option value="15">15</option>
		<option value="16">16</option>
		<option value="17">17</option>
		<option value="18">18</option>
		<option value="19">19</option>
		<option value="20">20</option>
		<option value="21">21</option>
		<option value="22">22</option>
		<option value="23">23</option>
		<option value="24">24</option>
		<option value="25">25</option>
		<option value="26">26</option>
		<option value="27">27</option>
		<option value="28">28</option>
		<option value="29">29</option>
		<option value="30">30</option>
		<option value="31">31</option>
	</select>
	&nbsp;&nbsp;
	
	<select id="<?php echo $month_id;?>" name="<?php echo $month_id;?>" style="width:60px">
	<?php 
	  global $month_arr;
	  foreach($month_arr as $key=>$value){
			$key=$key+1;
			echo '<option value='.$key.'>'.$value.'</option>'."\n";
		} ?>
	</select>  
                   
                &nbsp;&nbsp;
              
                    <select id="<?php echo $year_id;?>" name="<?php echo $year_id;?>" style="width:100px">
		
		<option value="2012">2011</option>
		<option value="2012">2012</option>
		<option value="2013" selected="selected">2013</option>
		<option value="2014">2014</option>
		<option value="2015">2015</option>
		<option value="2016">2016</option>
		<option value="2017">2017</option>
		<option value="2018">2018</option>

	</select>
   <?php
}
?>