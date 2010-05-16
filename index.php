<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="apple-touch-icon" href="apple-touch-icon.png" />
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript"> google.load("jquery", "1.4"); </script>
    <script src="jqtouch/jqtouch.min.js" type="application/x-javascript" charset="utf-8"></script>
    <style type="text/css" media="screen">@import "jqtouch/jqtouch.min.css";</style>
    <style type="text/css" media="screen">@import "themes/jqt/theme.css";</style>

<title><?=htmlspecialchars($_SERVER["HTTP_HOST"])?></title>
<style type="text/css">
</style>
<meta name = "viewport" content = "width = device-width">
<script>
    $.jQTouch({
        icon: 'apple-touch-icon.png',
        statusBar: 'black-translucent',
        preloadImages: [
            'themes/jqt/img/chevron_white.png',
            'themes/jqt/img/bg_row_select.gif',
            'themes/jqt/img/back_button_clicked.png',
            'themes/jqt/img/button_clicked.png'
            ]
    });

function myinit()
{
	changepace();
}

function setTmill()
{
	element=document.getElementbyID("treadmill");
	element.innerHTML="hey";
}

function changepace()
{
	var minutes=document.getElementsByName('minutes')[0].value;
	var seconds=document.getElementsByName('seconds')[0].value;
	var mph = 3600/(parseFloat(minutes)*60+parseFloat(seconds));


	$('#speed').html('Speed:<br>'+mph.toFixed(2)+' MPH');
}

function changeinterval()
{
	var minutes=document.getElementsByName('intervalminutes')[0].value;
	var seconds=document.getElementsByName('intervalseconds')[0].value;
	var meters=document.getElementsByName('intervaldistance')[0].value;
	var mph = 3600/(parseFloat(minutes)*60+parseFloat(seconds))*parseFloat(meters)/1609.344;


	$('#intervalmph').html('Speed:<br>'+mph.toFixed(2)+' MPH');
}

function changemph()
{
	var mph=document.getElementsByName('mph')[0].value;
	var seconds = 36000/parseFloat(mph);
	var minutes = seconds / 60;
	seconds = seconds % 60;
	minutes = minutes.toFixed(0);
	seconds = seconds.toFixed(1);
	
	if(seconds >= 10)
	{
		$('#pace').html('Pace:<br>'+minutes+':'+seconds);
	}
	else
	{
		$('#pace').html('Pace:<br>'+minutes+':0'+seconds);
	}
}

</script>
</head>
<body onload="myinit()">
  <div id="home">
		<div class="toolbar">
			<h1>Treadmillr</h1>
		</div>
		<ul class="edgetoedge">
			<li class="arrow"><a href="#pacetomph">Mile Pace to Speed (MPH)</a></li>
			<li class="arrow"><a href="#mphtopace">Speed (MPH) to Mile Pace</a></li>
			<li class="arrow"><a href="#intervaltimetomph">Interval time to MPH</a></li>
			<li class="arrow"><a href="#racetimetomph">Race Time to MPH</a></li>
			<li class="arrow"><a href="#walkbreakimpact">Walk Break Impact</a></li>
			<li class="arrow"><a href="#buildintervalplan">Build Interval Plan</a></li>
		</ul>
		<div>
			<script type="text/javascript"><!--
			window.googleAfmcRequest = {
			  client: 'ca-mb-pub-3833861330075529',
			  ad_type: 'text_image',
			  output: 'html',
			  channel: '8645826497',
			  format: '320x50_mb',
			  oe: 'utf8',
			  color_border: '000000',
			  color_bg: '000000',
			  color_link: 'FFFFFF',
			  color_text: 'CCCCCC',
			  color_url: '999999',
			};
			//--></script>
			<script type="text/javascript" 
			   src="http://pagead2.googlesyndication.com/pagead/show_afmc_ads.js"></script>
		</div>
  </div>
  <div id="pacetomph">
		<div class="toolbar">
			<h1>MPH to Pace</h1>
			 <a class="button back" href="#">Back</a>
		</div>
		<ul>
			<li class="fields">
				<?
// fill_option_int over range of [$low,$high)
function fill_option_int($low, $high, $default, $value_format, $display_format)
{
	for($i=$low; $i<$high; $i++)
	{
		if($i==$default)
		{
			printf("<option value\"".$value_format."\" selected=\"true\">".$display_format."</option>\n", $i, $i);
		}
		else
		{
			printf("<option value\"".$value_format."\">".$display_format."</option>\n", $i, $i);
		}
	}
}
				echo 'Select Mile Pace [MM:SS]<br><select class="numbers" onchange="changepace()" name="minutes">';
				fill_option_int(3,20,10,"%d","%d");

				echo '</select> : <select class="numbers" onchange="changepace()" name="seconds">';
				fill_option_int(0,60,0, "%d", "%02d");
				echo '</select>'
				?>
			</li>
			<li class="fields" id="speed">
				Speed:<br>6.00 MPH
			</li>
		</ul>
  </div>
  <div id="mphtopace">
		<div class="toolbar">
			<h1>Pace to MPH</h1>
			<a class="button back" href="#">Back</a>
		</div>
		<ul>
			<li class="fields">
				<?
				echo 'Select Speed (in MPH)<br><select class="numbers" onchange="changemph()" name="mph">';
				for($i=10; $i<150; $i++)
				{
					if($i==60)
					{
						echo "<option value=\"$i\" selected=\"true\">".(int)($i/10).".".($i%10)."</option>";
					}
					else
					{
						echo "<option value=\"$i\">".(int)($i/10).".".($i%10)."</option>";
					}
				}
				echo '</select>';
				?>
			</li>
			<li class="fields" id="pace">
				Pace:<br>10'00"
			</li>
		</ul>
	</div>
	<div id="intervaltimetomph">
		<div class="toolbar">
			<h1>Interval Time to MPH</h1>
			<a class="button back" href="#">Back</a>
		</div>
		<ul>
			<li class="fields">
			<? 			
				$distances = array(50, 100, 200, 300, 400, 500, 600, 800, 1000, 1200, 1500, 1600);
				echo 'Select Interval Distance<br><select class="numbers" onchange="changeinterval()" name="intervaldistance">';
				foreach ($distances as $distance)
				{
					if($distance==800)
					{
						echo "<option value=\"$distance\" selected=\"true\">".$distance."m</option>";					
					}
					else
					{
						echo "<option value=\"$distance\">".$distance."m</option>";					
					}
				}
				echo '</select>';
			?>
			</li>
			<li class="fields">
				<?
				echo 'Select Interval Time<br><select class="numbers" onchange="changeinterval()" name="intervalminutes">';
				for($i=0; $i<10; $i++)
				{
					if($i==5)
					{
						echo "<option value=\"$i\" selected=\"true\">$i</option>";
					}
					else
					{
						echo "<option value=\"$i\">$i</option>";
					}

				}
				echo '</select> : <select class="numbers" onchange="changeinterval()" name="intervalseconds">';
				for($i=0; $i<60; $i++)
				{
					printf("<option value=\"%d\">%02d</option>", $i, $i);
				}
				echo '</select>'
				?>
			</li>
			<li class="fields" id="intervalmph">
				Speed:<br>6.00 MPH
			</li>
		</ul>
    </div>
	<div id="racetimetomph">
		<div class="toolbar">
			<h1>Race Time to MPH</h1>
			<a class="button back" href="#">Back</a>
		</div>
		<ul>
			<li class="fields">
				<?
				$distances = array("5k", "8k", "5 Mile", "10k", "15k", "10 Mile", 
											"Half-Marathon", "30k", "Marathon", "50k", "50 Mile", "100 Mile");
				echo 'Select Race Distance<br><select class="numbers" onchange="changerace()" name="racedistance">';
				foreach ($distances as $distance)
				{
					if($distance=="5k")
					{
						echo "<option value=\"$distance\" selected=\"true\">".$distance."</option>";
					}
					else
					{
						echo "<option value=\"$distance\">".$distance."</option>";
					}
				}
				echo '</select>';
				?>
			</li>
		</ul>
	</div>
	<div id="walkbreakimpact">
		<div class="toolbar">
			<h1></h1>
			<a class="button back" href="#">Back</a>
		</div>
		<ul class="fields">
	</div>
	<div id="buildintervalplan">
		<div class="toolbar">
			<h1>Build Interval Plan</h1>
			<a class="button back" href="#">Back</a>
		</div>
		<ul class="edgetoedge">
			<li class="arrow">Under</li>
			<li class="arrow">Construction</li>
		</ul>
  </div>
  <div>
<script type="text/javascript"><!--
window.googleAfmcRequest = {
  client: 'ca-mb-pub-3833861330075529',
  ad_type: 'text_image',
  output: 'html',
  channel: '8645826497',
  format: '320x50_mb',
  oe: 'utf8',
  color_border: '000000',
  color_bg: '000000',
  color_link: 'FFFFFF',
  color_text: 'CCCCCC',
  color_url: '999999',
};
//--></script>
<script type="text/javascript" 
   src="http://pagead2.googlesyndication.com/pagead/show_afmc_ads.js"></script>
</div>
<div>
<?
echo 'Pace <br><select>';
for($i=3; $i<20; $i++)
{
if($i==10)
{
echo "<option value=\"$i\" selected=\"true\">$i</option>";
}
else
{
echo "<option value=\"$i\">$i</option>";
}

}
echo '</select> : <select>';
for($i=0; $i<60; $i++)
{
printf("<option value=\"%d\">%02d</option>", $i, $i);
}
echo '</select>'

?>
<div>

</div>
</div>

</body>
</html>
