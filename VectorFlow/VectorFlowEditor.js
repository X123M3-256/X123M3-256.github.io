//This data may need to be loaded at runtime



var level={
vectorField:[
[[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10]],
[[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10]],
[[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10]],
[[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10]],
[[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10]],
[[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10]],
[[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10]],
[[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10]],
[[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10]],
[[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10]],
[[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10]],
[[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10]],
[[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10]],
[[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10]],
[[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10],[0,-10]],
]
};

var vectorSpacing=40;
var fieldWidth=level.vectorField[0].length;
var fieldHeight=level.vectorField.length;
var keys={up:false,down:false,left:false,right:false};
var mouse={x:0,y:0,clicked:false,motionvector:[0,0]};

var toolsize=1;
var magnitude=10;
//If your browser does not follow the standard, fuck you

var context=null;
var canvas=null;

function HandleKeyDown(event)
{
switch(event.keyCode)
{
case 38:
keys.up=true;
break;
case 40:
keys.down=true;
break;
case 37:
keys.right=true;
break;
case 39:
keys.left=true;
}
}

function HandleKeyUp(event)
{
switch(event.keyCode)
{
case 38:
keys.up=false;
break;
case 40:
keys.down=false;
break;
case 37:
keys.right=false;
break;
case 39:
keys.left=false;
}
}

function HandleMouseMove(event)
{
var rect=canvas.getBoundingClientRect();
var canvasx=(event.pageX-rect.left)/vectorSpacing;
var canvasy=(event.pageY-rect.top)/vectorSpacing;
mouse.motionvector=[canvasx-mouse.x,canvasy-mouse.y];
mouse.x=canvasx;
mouse.y=canvasy;
}

function increaseToolSize(){toolsize+=0.1;};
function decreaseToolSize(){toolsize-=0.1;};
function increaseMagnitude(){magnitude+=1;};
function decreaseMagnitude(){magnitude-=1;};

function Init()
{
document.body.addEventListener("keydown",HandleKeyDown);
document.body.addEventListener("keyup",HandleKeyUp);
canvas=document.getElementById("display");
	if(canvas)
	{
	canvas.addEventListener("mousemove",HandleMouseMove);
	canvas.addEventListener("mousedown",function(){mouse.click=true;});
	canvas.addEventListener("mouseup",function(){mouse.click=false;});
	context=canvas.getContext('2d');
		if(context)
		{
		setInterval(mainLoop,50);
		}
		else{alert("Failed to get context")}
	}
	else{alert("Failed to locate canvas element")}
}

function mainLoop()
{
render();
runEdit();
}


function runEdit()
{
if(mouse.click)
{
	var setVec=setVectorLength(mouse.motionvector,magnitude);
	var x,y;
	for(x=0;x<fieldWidth;x++)
	for(y=0;y<fieldHeight;y++)
	{
		if(GetLength([mouse.x-x,mouse.y-y])<toolsize)
		{
		level.vectorField[y][x]=setVec;
		}
	}
}
}


function render()
{
context.clearRect(0,0,800,600);
renderField();
renderTool();
context.fillText("Vector magnitude: "+Math.round(magnitude).toString()+" | Tool size: "+toolsize.toString(),0,20);
}

function renderTool()
{
context.beginPath();
context.arc(mouse.x*vectorSpacing,mouse.y*vectorSpacing,toolsize*vectorSpacing,0,2*Math.PI,false);
context.stroke();
}

function dumpJSON()
{
var json="";
var i,j;
json+="[";
	for(i=0;i<fieldHeight;i++)
	{
	if(i!=0)json+="\n,";
	json+="[";
		for(j=0;j<fieldWidth;j++)
		{
		if(j!=0)json+=",";
		json+="["+Math.round(level.vectorField[i][j][0]).toString()+","+Math.round(level.vectorField[i][j][1]).toString()+"]";
		}
	json+="]";
	}
json+="]";
alert(json);
}

