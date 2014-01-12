/* ---------------------------------------  general  ----------------------------------*/

function alertcheck()
{
	alert('alert called');
}

function alertcheckarg_one(arg)
{
	alert('arg value='+arg);
}

function alertcheckarg_two(arg1,arg2)
{
	alert('arg1 value='+arg1+'  &&  arg2 value='+arg2);
}



/* ---------------------------------------  screen  ----------------------------------*/

function get_screen_width()
{
	return screen.width;
}
function get_screen_height()
{
	return screen.height;
}

/* ---------------------------------------  HTML element  ----------------------------------*/

function clear_content(id,content_default) 
{
	//alert('chk');
	//alert('id='+id+' && content_default'+content_default);
	
	if(idvalue=document.getElementById(id).value==content_default)
	{
		document.getElementById(id).value='';
	}
	else if(document.getElementById(id).value=='')
	{
		document.getElementById(id).value=content_default;
	}
}


/*-------------------------------------- php function supporting javascirpt functions-----------------*/

// ajax photo upload

function startUpload(){
		var news=document.getElementById('news').value;
		if(news=='')
		{
			alert("News can't be empty");
			exit;
		}

      document.getElementById('f1_upload_process').style.visibility = 'visible';
      document.getElementById('f1_upload_form').style.visibility = 'hidden';
      return true;
}

function stopUpload(success,ln_cuttingpath){
	  
	  ln_upload_do(ln_cuttingpath);
		
      var result = '';
      if (success == 1){
         result = '<span>Upload succussfully!<\/span>';
		 
      }
      else {
         result = '<span class="emsg">There was an error during file upload!<\/span><br/><br/>';
      }
      document.getElementById('f1_upload_process').style.visibility = 'hidden';
      //document.getElementById('f1_upload_form').innerHTML = result + document.getElementById('f1_upload_form').innerHTML;;
      document.getElementById('f1_upload_form').style.visibility = 'visible';
      return true;   
}
// end ajax photo upload
