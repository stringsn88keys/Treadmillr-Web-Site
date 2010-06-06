function myinit()
{
	changepace();
	changemph();
	changeinterval();
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
