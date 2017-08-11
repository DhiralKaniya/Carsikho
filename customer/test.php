<html>
<head>
<?php
include("controller.php");
include("customer_head.php");
?>
<title>carsikho | <?php echo $cust_details->name; ?> | Online Test</title>
<link rel="shortcut icon" type="image/x-icon" href="../images/icon.png" />
<style type="text/css">
.heading{
	font-size: 1.2em;
	font-family: unset;
	color: #3F84B1;
}
#heading{
	font-size: 1.2em;
	font-family: unset;
	color: #3F84B1;
}
#data{
	font-size: 1.1em;
	font-family: cursive;
	color: #34ad00;
	letter-spacing: 1px;	
}
#lnk
{
	font-size: 1.0em;
	font-family: cursive;
	color: red;
	cursor: pointer;
	letter-spacing: 1.5px;	
	margin-bottom: 10px;
	margin-top: 10px;
}
</style>
<script type="text/javascript">
var HH,SS,correct,wrong;
var myVar,myVar2;
var httpObject;
var questionno;
	function startTime()
	{
		correct=0;
		wrong=0;
		MM=00;
		SS=00;
		myVar=setInterval(displayTime,500);
		document.getElementById('start').disabled=true;
		document.getElementById('stop').disabled=false;
		questionno=1;
		setOutput("controller.php?startTest=true&questionno="+questionno+"&correct="+correct+"&wrong="+wrong,"question");
		questionno++;
	}
	function nextTime()
	{
		var userAnswer,wrng;
		var trueAnswer=document.getElementById('answer').value;
		/* check for the true answer */
		if(document.getElementById('op1').checked==true)
		{
			userAnswer="1";
			if(userAnswer==trueAnswer)
			{
				document.getElementById('a1').style.backgroundColor="green";
				correct++;
				alert("Your Answer is True");
			}
			else
			{
				document.getElementById('a1').style.backgroundColor="red";	
				document.getElementById('a'+trueAnswer).style.backgroundColor="green";
				alert("Your Answer is Wrong");	
				wrong++;
			}
		}
		else if(document.getElementById('op2').checked==true)
		{
			userAnswer="2";	
			if(userAnswer==trueAnswer)
			{
				document.getElementById('a2').style.backgroundColor="green";
				correct++;
				alert("Your Answer is True");
			}
			else
			{
				document.getElementById('a2').style.backgroundColor="red";	
				document.getElementById('a'+trueAnswer).style.backgroundColor="green";
				alert("Your Answer is Wrong");	
				wrong++;
			}
		}
		else if(document.getElementById('op3').checked==true)
		{
			userAnswer="3";
			if(userAnswer==trueAnswer)
			{
				document.getElementById('a3').style.backgroundColor="green";
				correct++;
				alert("Your Answer is True");
			}
			else
			{
				document.getElementById('a3').style.backgroundColor="red";	
				document.getElementById('a'+trueAnswer).style.backgroundColor="green";
				alert("Your Answer is Wrong");	
				wrong++;

			}
		}
		else if(document.getElementById('op4').checked==true)
		{
			userAnswer="4";
			if(userAnswer==trueAnswer)
			{
				document.getElementById('a4').style.backgroundColor="green";
				correct++;
				alert("Your Answer is True");
			}
			else
			{
				document.getElementById('a4').style.backgroundColor="red";	
				wrong++;
				document.getElementById('a'+trueAnswer).style.backgroundColor="green";
				alert("Your Answer is Wrong");	
			}
		}
		else 
		{
			wrong++;
			document.getElementById('a'+trueAnswer).style.backgroundColor="green";
			alert("Your Answer is Wrong");	
			userAnswer="0";
		}
		if(questionno==16 || correct==11 || wrong==5)
		{
			stopTime();
			questionno--;
			setOutput("controller.php?result=true&question="+questionno+"&correct="+correct+"&wrong="+wrong,"question");
		}
		else
		{
			stopTime();
			MM=00;
			SS=00;
			setOutput("controller.php?startTest=true&questionno="+questionno+"&usrans="+userAnswer+"&correct="+correct+"&wrong="+wrong,"question");
			myVar=setInterval(displayTime,500);
			questionno++;
		}
	}
	function displayTime()
	{
		//alert("call");
		if(MM<10&&SS<10)
		{
			document.getElementById('txt').innerHTML="0"+MM+":0"+SS;
		}
		else
		{
			if(MM<10)
			{
				document.getElementById('txt').innerHTML="0"+MM+":"+SS;	
			}
			else if(SS<10)
			{
				document.getElementById('txt').innerHTML=MM+":0"+SS;	
			}
			else
			{
				document.getElementById('txt').innerHTML=MM+":"+SS;
			}
		}
		if(MM==1)
		{
			MM=00;
			stopTime();
			nextTime();
			//startTime();
			//alert("Your Time is Out...");
		}
		if(SS==59)
		{
			MM++;
			SS=00;
			//MM=00;
		}
		else
		{
			SS++;
		}
	}
	function stopTime()
	{
		document.getElementById('start').disabled=false;
		document.getElementById('stop').disabled=true;
		clearInterval(myVar);
	}
	function getHttpObject()
	{
		if(window.XMLHttpRequest)
		{
			httpObject=new XMLHttpRequest();
		}
		else if(window.ActiveXObject)
		{
			httpObject=new ActiveXObject("Microsoft.XMLHTTP");
		}
		else
		{
			alert("Your Browser Does not support AJAX..Please use diff Browser");
		}
	}
	function setOutput(vurl,dispid)
	{
		//alert(vurl);
		getHttpObject();
		if(httpObject!=null)
		{
			httpObject.open("GET",vurl,true);
			httpObject.send(null);
			httpObject.onreadystatechange=function()
			{
				if(httpObject.readyState==4)
				{
					document.getElementById(dispid).innerHTML=httpObject.responseText;
				}
			}
		}
	}
</script>
</head>
<body>
<?php
include("customer_menu.php")
?>
<div align="center" style="margin:20px;">
	<form name="Online Test" method="post">
		<input type="button" id="start" class="btn btn-primary" value="Start" name="Test Button" onclick="startTime()">
		<input type="button" id="stop" class="btn btn-danger" value="Stop" name="Test Button" onclick="stopTime()" disabled>
		<div id="txt" class="heading" style="margin:10px;">Click to Start</div>
	</form>
</div>
<form method="post">
<div id="question" style="margin:20px;" >
<div align="center" style="margin-bottom:200px;border-style:dashed;padding:20px;padding-bottom:100px;border-color:green;">
	<p id="data">*Practice Test will be of 15 random question</p>
	<p id="data">*Practice Test will be conducted in English Only</p>
	<p id="data">*Each Question will be granted 60 seconds to attempt</p>
	<p id="data">*You will pass if you asnwer the first 11 questions correctly</p>
</div>
</div>
</form>
<?php
include("customer_footer.php");
?>
</body>
</html>