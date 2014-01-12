<?php
include('skin.php');

/*--------------------------------- js and css, require for this library-----------------------------*/

function getjscss()
{?>
	<script type="text/javascript" src="/reuse/jquery.min.js"></script>
	<script type="text/javascript" src="/reuse/vlib.js"></script>
	<link href="/reuse/vlib.css" type="text/css" rel="stylesheet" media="all" />
	<?php
}

function ajaxuploader()
{?>
	<span id="v_upload">
	    <label> 
              <input name="myfile" type="file" size="30" />
        </label>
    </span>
	<!--find form and then set in target frame id and if target is already set in form the get target value and set in iframe id/name
	 and on submit call startupload fucntion -->
	<iframe id="vtarget" name="vtarget" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
	<?php
}

/* ---------------------------------------  global  ----------------------------------*/

function toarg($string)
{
	// sample input='arg1,arg2,arg3'
	// output = convert into arfument form require in function input
	$string=explode(',',$string);
	//echo 'string in toarg='.$string;
	$arg='';
	foreach($string as $key=>$value)
	{	
		if($key>0)
			$arg.=',';
		
		$arg.='\''.$value.'\'';
	}
	return $arg;
}

/* ---------------------------------------  calender  ----------------------------------*/
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













/* ---------------------------------------  HTML element  ----------------------------------*/

function get_browse1($file_name){
	
    ?><input type="file" name="<?php echo $file_name;?>" id="<?php echo $file_name;?>" class="browse"/><?php
}

function create_css($id, $css_default, $css, $css_add_default, $css_add, $css_event, $css_event_add_default, $css_event_add)
{
	$id=$a[0]; $a=explode('[]',$id);
	$css_name=$css.$id;
	//echo $css_name.'---'.$css_event;
		// creating css
		$ca=$css_add_default.$css_add;
		if($css==$css_default)
		{
			$css_event_arr=explode("::",$css_event);
			$css_event_add_arr=explode("::",$css_event_add);
			
			echo '<style type="text/css">';	
			echo '.'.$css_name.'{ '.$ca.' }';
			foreach($css_event_arr as $key=>$value)
			{
				echo '.'.$css_name.':'.$css_event_arr[$key].'{ '.$css_event_add_default.$css_event_add_arr[$key].' }';
			}
			echo '</style>';
		}
		return $css_name;
}

class textbox
{
//$pieces = explode(",", $mystring);
	var $name;
	var $id;

	var $content_default;
	var $css_default='textbox_default';
	var $css_add_default;
	var $css_event_default='hover';
	var $css_event_add_default;
	var $event_default='onclick::onblur';
	var $event_function_default="clear_content::clear_content";
	var $event_functionarg_default='';
	
	var $content;
	var $css='textbox_default';
	var $css_add;
	var $css_event='hover';
	var $css_event_add;
	var $event='onclick::onblur';
	var $event_function="clear_content::clear_content";
	var $event_functionarg='';
	
	function __construct()
	{
	
		global $width_skin,$height_skin,$padding_skin,$border_skin,$border_color_skin,$shadow_color_skin,$background_color_skin;
		$this->css_add_default='width:'.$width_skin.'; height:'.$height_skin.';	padding:'.$padding_skin.'; font-size:'.$font_skin.';';
		$this->css_event_add_default='border: '.$border_skin.' solid '.$border_color_skin.'; box-shadow: 0 0 10px '.$shadow_color_skin.';';
		
	}
	function assign()
	{
		$this->event_functionarg='\''.$this->id.'\',\''.$this->content_default.'\'::\''.$this->id.'\',\''.$this->content_default.'\'';
	}
	function set_default()
	{
		$this->content_default='';
		$this->content='';
		$this->css=$this->css_default;
		$this->css_add=$this->css_add_default;
		$this->css_event=$this->css_event_default;
		$this->css_event_add=$this->css_event_add_default;
		$this->event=$this->event_default;
		$this->event_function=$this->event_function_default;
		$this->event_functionarg=$this->event_functionarg_default;
	}
	function get_css_default()
	{
		return $this->css_add_default;
	}
	function get_textbox()
	{
		//check name and id
		if($this->name=='')
			$this->name=$this->id;
		else if($this->id=='')
			$this->id=$this->name;
			
		// creating css
		$css_name=create_css($this->id,$this->css_default,$this->css,$this->css_add_default,$this->css_add,$this->css_event,$this->css_event_add_default,$this->css_event_add);
		
		//echo 'efr='.$this->event_functionarg;
		$this->content=$this->content_default;

		$event_arr=explode("::",$this->event);
		$event_function_arr=explode("::",$this->event_function);
		$event_functionarg_arr=explode("::",$this->event_functionarg);
		
		$noofevent=sizeof($event_arr);
		$fun='';
		foreach($event_arr as $key=>$value)
		{
			$fun.=$event_arr[$key]."=\"".$event_function_arr[$key]."(".$event_functionarg_arr[$key].")\" ";
		}
		//$event_function_arg_arr=explode(":",$this->event_function_arg); //$this->event_function_arg
		//echo $event_function_arg_arr[0].'<br>'.$event_function_arg_arr[1];
		
		
		if($this->event=='' || $this->event_function=='')
		{
			//echo 'in if';
			?><input type="text" value="<?php echo $this->content;?>" name="<?php echo $this->name;?>" id="<?php echo $this->id;?>" class="<?php echo $css_name;?>"/><?php
		}
		else
		{
			//echo 'else';
			?><input type="text" value="<?php echo $this->content;?>" name="<?php echo $this->name;?>" id="<?php echo $this->id;?>" class="<?php echo $css_name;?>" <?php echo $fun;?>/><?php
		}
		
	}
}

class textarea
{
	
	var $name;
	var $id;
	
	var $content_default;
	var $css_default='textarea_default';
	var $css_add_default;
	var $css_event_default='hover';
	var $css_event_add_default;
	var $event_default;
	var $event_function_default;
	var $event_functionarg_default;
	
	var $content;
	var $css='textarea_default';
	var $css_add;
	var $css_event='hover';
	var $css_event_add;
	var $event;
	var $event_function;
	var $event_functionarg;
	
	function __construct()
	{
	
		global $width_skin,$height_skin,$padding_skin,$border_skin,$border_color_skin,$shadow_color_skin,$background_color_skin;
		$this->css_add_default='width:'.$width_skin.'; height:'.$height_skin.';	padding:'.$padding_skin.';';
		$this->css_event_add_default='border: '.$border_skin.' solid '.$border_color_skin.'; box-shadow: 0 0 10px '.$shadow_color_skin.';';
		
	}
	function assign()
	{
		$this->event_functionarg='\''.$this->id.'\',\''.$this->content_default.'\'::\''.$this->id.'\',\''.$this->content_default.'\'';
	}
	function set_default()
	{
		$this->content='';
		$this->css=$this->css_default;
		$this->css_add=$this->css_add_default;
		$this->css_event=$this->css_even_default;
		$this->css_event_add=$this->css_event_add_default;
		$this->event=$this->event_default;
		$this->event_function=$this->event_function_default;
		$this->event_functionarg=$this->event_functionarg_default;
	}
	function get_css_default()
	{
		return $this->css_add_default;
	}
	
	function get_textarea()
	{
		//check name and id
		if($this->name=='')
			$this->name=$this->id;
		else if($this->id=='')
			$this->id=$this->name;
			
		// creating css
		$css_name=create_css($this->id,$this->css_default,$this->css,$this->css_add_default,$this->css_add,$this->css_event,$this->css_event_add_default,$this->css_event_add);

		$event_arr=explode("::",$this->event);
		$event_function_arr=explode("::",$this->event_function);
		$event_functionarg_arr=explode("::",$this->event_functionarg);
		
		$noofevent=sizeof($event_arr);
		$fun='';
		foreach($event_arr as $key=>$value)
		{
			$fun.=$event_arr[$key]."=\"".$event_function_arr[$key]."(".$event_functionarg_arr[$key].")\" ";
		}
		//$event_function_arg_arr=explode(":",$this->event_function_arg); //$this->event_function_arg
		//echo $event_function_arg_arr[0].'<br>'.$event_function_arg_arr[1];
		
		
		if($this->event=='' || $this->event_function=='')
		{
			//echo 'in if';
			?><textarea name="<?php echo $this->name;?>" id="<?php echo $this->id;?>" class="<?php echo $css_name;?>"></textarea><?php
		}
		else
		{
			//echo 'else';
			?><textarea name="<?php echo $this->name;?>" id="<?php echo $this->id;?>"  class="<?php echo $css_name;?>" <?php echo $fun;?>></textarea><?php
		}
		
	}
}

class button
{
//$pieces = explode(",", $mystring);
	var $name;
	var $id;
	
	var $content_default='';
	var $css_default='button_default';
	var $css_add_default;
	var $css_event_default='hover';
	var $css_event_add_default;
	var $event_default='';
	var $event_function_default='';
	var $event_functionarg_default='';
	
	var $content;
	var $css='button_default';
	var $css_add;
	var $css_event='hover';
	var $css_event_add;
	var $event;
	var $event_function;
	var $event_functionarg;
	
	function __construct()
	{
	
		global $width_skin,$height_skin,$padding_skin,$border_skin,$border_color_skin,$shadow_color_skin,$background_color_skin;
		$this->css_add_default='padding:'.$padding_skin.'; text-decoration:none; border:'.$border_skin.' solid '.$border_color_skin.';';
		$this->css_event_add_default='border: '.$border_skin.' solid '.$border_color_skin.'; box-shadow: 0 0 10px '.$shadow_color_skin.';';
		
	}	
	function assign()
	{
		$this->event_functionarg='\''.$this->id.'\',\''.$this->content_default.'\'::\''.$this->id.'\',\''.$this->content_default.'\'';
	}
	function set_default()
	{
		$this->content=$this->content_default;
		$this->css=$this->css_default;
		$this->css_add=$this->css_add_default;
		$this->css_event=$this->css_even_default;
		$this->css_event_add=$this->css_event_add_default;
		$this->event=$this->event_default;
		$this->event_function=$this->event_function_default;
		$this->event_functionarg=$this->event_functionarg_default;
	}
	function get_css()
	{
		return $this->css_add_default;
	}
	function get_button()
	{
		// creating css
		$css_name=create_css($this->id,$this->css_default,$this->css,$this->css_add_default,$this->css_add,$this->css_event,$this->css_event_add_default,$this->css_event_add);
	
		//echo 'efr='.$this->event_functionarg;
		//$this->content=$this->content_default;

		$event_arr=explode("::",$this->event);
		$event_function_arr=explode("::",$this->event_function);
		$event_functionarg_arr=explode("::",$this->event_functionarg);
		
		$noofevent=sizeof($event_arr);
		$fun='';
		foreach($event_arr as $key=>$value)
		{
			$fun.=$event_arr[$key]."=\"".$event_function_arr[$key]."(".$event_functionarg_arr[$key].")\" ";
		}
		//$event_function_arg_arr=explode(":",$this->event_function_arg); //$this->event_function_arg
		//echo $event_function_arg_arr[0].'<br>'.$event_function_arg_arr[1];
		
		
		if($this->event=='' || $this->event_function=='')
		{
			//echo 'in if';
			?><input type="button" value="<?php echo $this->content;?>" name="<?php echo $this->name;?>" id="<?php echo $this->id;?>" class="<?php echo $this->css;?>"/><?php
		}
		else
		{
			//echo 'else';
			?><input type="button" value="<?php echo $this->content;?>" name="<?php echo $this->name;?>" id="<?php echo $this->id;?>"  class="<?php echo $this->css;?>" <?php echo $fun;?>/><?php
		}
		
	}
}

class buttonsubmit
{
//$pieces = explode(",", $mystring);
	var $name;
	var $id;
	
	var $content_default='';
	var $css_default='buttonsubmit_default';
	var $css_add_default;
	var $css_event_default='hover';
	var $css_event_add_default;
	var $event_default='';
	var $event_function_default='';
	var $event_functionarg_default='';
	
	var $content;
	var $css='buttonsubmit_default';
	var $css_add;
	var $css_event='hover';
	var $css_event_add;
	var $event;
	var $event_function;
	var $event_functionarg;
	
	function __construct()
	{
	
		global $width_skin,$height_skin,$padding_skin,$border_skin,$border_color_skin,$shadow_color_skin,$background_color_skin;
		$this->css_add_default='padding:'.$padding_skin.'; text-decoration:none; border:'.$border_skin.' solid '.$border_color_skin.';';
		$this->css_event_add_default='border: '.$border_skin.' solid '.$border_color_skin.'; box-shadow: 0 0 10px '.$shadow_color_skin.';';
		
	}	
	function assign()
	{
		$this->event_functionarg='\''.$this->id.'\',\''.$this->content_default.'\'::\''.$this->id.'\',\''.$this->content_default.'\'';
	}
	function set_default()
	{
		$this->content=$this->content_default;
		$this->css=$this->css_default;
		$this->css_add=$this->css_add_default;
		$this->css_event=$this->css_even_default;
		$this->css_event_add=$this->css_event_add_default;
		$this->event=$this->event_default;
		$this->event_function=$this->event_function_default;
		$this->event_functionarg=$this->event_functionarg_default;
	}
	function get_css()
	{
		return $this->css_add_default;
	}
	function get_buttonsubmit()
	{
		// creating css
		$css_name=create_css($this->id,$this->css_default,$this->css,$this->css_add_default,$this->css_add,$this->css_event,$this->css_event_add_default,$this->css_event_add);
	
		//echo 'efr='.$this->event_functionarg;
		//$this->content=$this->content_default;

		$event_arr=explode("::",$this->event);
		$event_function_arr=explode("::",$this->event_function);
		$event_functionarg_arr=explode("::",$this->event_functionarg);
		
		$noofevent=sizeof($event_arr);
		$fun='';
		foreach($event_arr as $key=>$value)
		{
			$fun.=$event_arr[$key]."=\"".$event_function_arr[$key]."(".$event_functionarg_arr[$key].")\" ";
		}
		//$event_function_arg_arr=explode(":",$this->event_function_arg); //$this->event_function_arg
		//echo $event_function_arg_arr[0].'<br>'.$event_function_arg_arr[1];
		
		
		if($this->event=='' || $this->event_function=='')
		{
			//echo 'in if';
			?><input type="submit" value="<?php echo $this->content;?>" name="<?php echo $this->name;?>" id="<?php echo $this->id;?>" class="<?php echo $this->css;?>"/><?php
		}
		else
		{
			//echo 'else';
			?><input type="submit" value="<?php echo $this->content;?>" name="<?php echo $this->name;?>" id="<?php echo $this->id;?>"  class="<?php echo $this->css;?>" <?php echo $fun;?>/><?php
		}
		
	}
}

class browse
{
//$pieces = explode(",", $mystring);
	var $name;
	var $id;
	
	var $content_default='';
	var $css_default='browse_default';
	var $css_add_default='width:300px; height:30px;	padding:2px;';
	var $css_event_default='';
	var $css_event_add_default='';
	
	var $content;
	var $css='browse_default';
	var $css_add='';
	var $css_event='';
	var $css_event_add='';
	
	function __construct()
	{
	
		global $width_skin,$height_skin,$padding_skin,$border_skin,$border_color_skin,$shadow_color_skin,$background_color_skin;
		$this->css_add_default='width:'.$width_skin.'; height:'.$height_skin.';	padding:'.$padding_skin.';';
		$this->css_event_add_default='border: '.$border_skin.' solid '.$border_color_skin.'; box-shadow: 0 0 10px '.$shadow_color_skin.';';
		
	}
	function assign()
	{
	}
	function set_default()
	{
		$this->content_default='';
		$this->content='';
		$this->css=$this->css_default;
		$this->css_add=$this->css_add_default;
		$this->css_event=$this->css_event_default;
		$this->css_event_add=$this->css_event_add_default;
	}
	function get_css_default()
	{
		return $this->css_add_default;
	}
	function get_browse()
	{
		//check name and id
		if($this->name=='')
			$this->name=$this->id;
		else if($this->id=='')
			$this->id=$this->name;
			
		// creating css
		$css_name=create_css($this->id,$this->css_default,$this->css,$this->css_add_default,$this->css_add,$this->css_event,$this->css_event_add_default,$this->css_event_add);
		
		
		if($this->event=='' || $this->event_function=='')
		{
			//echo 'in if';
			?><input type="file" value="<?php echo $this->content;?>" name="<?php echo $this->name;?>" id="<?php echo $this->id;?>" class="<?php echo $this->css;?>" size="33" /><?php
		}
		else
		{
			//echo 'else';
			?><input type="file" value="<?php echo $this->content;?>" name="<?php echo $this->name;?>" id="<?php echo $this->id;?>" class="<?php echo $this->css;?>" <?php echo $fun;?> size="33" /><?php
		}
		
	}
}


class selectbox
{
//$pieces = explode(",", $mystring);
	var $name;
	var $id;

	var $content_default;
	var $css_default='selectbox_default';
	var $css_add_default;
	var $css_event_default='hover';
	var $css_event_add_default;
	var $event_default;
	var $event_function_default;
	var $event_functionarg_default;
	
	var $content;
	var $css='selectbox_default';
	var $css_add;
	var $css_event='hover';
	var $css_event_add;
	var $event;
	var $event_function;
	var $event_functionarg;
	
	var $option;
	
	function __construct()
	{
	
		global $width_skin,$height_skin,$padding_skin,$border_skin,$border_color_skin,$shadow_color_skin,$background_color_skin;
		$this->css_add_default='width:'.$width_skin.'; height:'.$height_skin.';	padding:'.$padding_skin.'; font-size:'.$font_skin.';';
		$this->css_event_add_default='border: '.$border_skin.' solid '.$border_color_skin.'; box-shadow: 0 0 10px '.$shadow_color_skin.';';
		
	}
	function assign()
	{
		$this->event_functionarg='\''.$this->id.'\',\''.$this->content_default.'\'::\''.$this->id.'\',\''.$this->content_default.'\'';
	}
	function set_default()
	{
		$this->content_default='';
		$this->content='';
		$this->css=$this->css_default;
		$this->css_add=$this->css_add_default;
		$this->css_event=$this->css_event_default;
		$this->css_event_add=$this->css_event_add_default;
		$this->event=$this->event_default;
		$this->event_function=$this->event_function_default;
		$this->event_functionarg=$this->event_functionarg_default;
	}
	function get_css_default()
	{
		return $this->css_add_default;
	}
	function get_selectbox()
	{	
	
		//check name and id
		if($this->name=='')
			$this->name=$this->id;
		else if($this->id=='')
			$this->id=$this->name;
			
		// creating css
		$css_name=create_css($this->id,$this->css_default,$this->css,$this->css_add_default,$this->css_add,$this->css_event,$this->css_event_add_default,$this->css_event_add);
		
		//echo 'efr='.$this->event_functionarg;
		$this->content=$this->content_default;

		$event_arr=explode("::",$this->event);
		$event_function_arr=explode("::",$this->event_function);
		$event_functionarg_arr=explode("::",$this->event_functionarg);
		
		$noofevent=sizeof($event_arr);
		$fun='';
		foreach($event_arr as $key=>$value)
		{
			$fun.=$event_arr[$key]."=\"".$event_function_arr[$key]."(".$event_functionarg_arr[$key].")\" ";
		}
		//$event_function_arg_arr=explode(":",$this->event_function_arg); //$this->event_function_arg
		//echo $event_function_arg_arr[0].'<br>'.$event_function_arg_arr[1];
		$option_arr=explode("::",$this->option);
		$op='';
		foreach($option_arr as $key=>$option)
		{
			$name_value_arr=explode(":",$option);
				
				$s='';
				if($this->content_default==$name_value_arr[0]) {$s="selected=selected";}
				
			$op.='<option value='.$name_value_arr[0].' '.$s.'>'.$name_value_arr[1].'</option>';
		}
		
		if($this->event=='' || $this->event_function=='')
		{
			//echo 'in if';
			?><select name="<?php echo $this->name;?>" id="<?php echo $this->id;?>" class="<?php echo $css_name;?>"><?php
			echo $op.'</select>';
		}
		else
		{
			?><select name="<?php echo $this->name;?>" id="<?php echo $this->id;?>" class="<?php echo $css_name;?>" <?php echo $fun;?> ><?php
			echo $op.'</select>';
		}
		
	}
}



/* ---------------------------------------  procces  ----------------------------------*/

function upload_file($file,$location){   
//$file=$_FILES['name'];
//$location='photo/';
//upload_file($file,$location);

	$filename=$file['name'];
	$path=$location.time().$filename;
    if ($file["error"] > 0)
	{
		echo "Error in file : ".$file["error"];
	}
	else
	{
		$a=move_uploaded_file($file["tmp_name"], $path) or die("Error in upload : ".mysql_error());
		if($a)
		{
				return 1;			
		}
	}
	return 0;
} // end function