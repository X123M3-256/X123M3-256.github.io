//This data may need to be loaded at runtime


var player={x:1,y:1,dx:0,dy:0};
var level=
{
name:"",
startpos:null,
startbox:null,
endbox:null,
vectorField:null
}
var isTiming=false;
var time=0;
var fieldWidth=0;
var fieldHeight=0;
var canvasRect=null;
var keys={up:false,down:false,left:false,right:false};
var icons=null;
var gamemode=0;


var context=null;
var vectorSpacing=40;

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
function resetLevel()
{
player.x=level.startpos[0];
player.y=level.startpos[1];
player.dx=0;
player.dy=0;
gamemode=1;
time=0;
isTiming=false;
}
function loadLevel(levelNum)
{
level=levels[levelNum];
fieldWidth=level.vectorField[0].length;
fieldHeight=level.vectorField.length;
resetLevel();
}
function HandleClick(event)
{
var clickX=(event.pageX-canvasRect[0]);
var clickY=(event.pageY-canvasRect[1]);
switch(gamemode)
{
case 0:
var index=Math.floor(clickY/40);
if(index<levels.length)
{
loadLevel(index);
}
break;
case 1:
var i;

if(isInBox(clickX,clickY,[icons[0][0],icons[0][1],100,20]))resetLevel();
if(isInBox(clickX,clickY,[icons[1][0],icons[1][1],100,20]))gamemode=0;

break;
case 2:
resetLevel();
break;
}
}
function Init()
{
document.body.addEventListener("keydown",HandleKeyDown);
document.body.addEventListener("keyup",HandleKeyUp);
document.body.addEventListener("click",HandleClick);
var canvas=document.getElementById("display");
	if(canvas)
	{
	var rect=canvas.getBoundingClientRect();
	canvasRect=[rect.left,rect.top,rect.right-rect.left,rect.bottom-rect.top];
	icons=[[canvasRect[2]-110,5,"Reset Level"],[canvasRect[2]-220,5,"Level Select"]];
	context=canvas.getContext('2d');
		if(context)
		{
		setInterval(mainLoop,50);
		}
		else{alert("Failed to get context")}
	}
	else{alert("Failed to locate canvas element")}
}
function setVectorLength(vector,targetLength)
{
var multiplier=targetLength/Math.sqrt((vector[0]*vector[0])+(vector[1]*vector[1]));
return [vector[0]*multiplier,vector[1]*multiplier];
}
function mainLoop()
{
if(gamemode==1)
{
runTiming();
render();
runPhysics();
renderText();
renderIcons();
}
else if(gamemode==0)
{
renderLevelSelect();
}
else if(gamemode==2)
{
renderGameOver();
}
}
function runTiming()
{
	if(isTiming)
	{
	time+=0.05;
		if(isInBox(player.x,player.y,level.endbox))
		{
		isTiming=false;
		gamemode=2;
		}
	}
	else
	{
	if(!isInBox(player.x,player.y,level.startbox))
	{
	isTiming=true;
	}
	}
}
function renderLevelSelect()
{
context.beginPath();
context.rect(0,0,canvasRect[2],canvasRect[3]);
context.fillStyle="#FFFFFF";
context.fill();
var i;
y=0;
context.font='20px Arial';
for(i=0;i<levels.length;i++)
{
renderLevelIcon(i,y);
y+=40;
}
}
function renderIcons()
{
renderIcon(icons[0]);
renderIcon(icons[1]);
}
function renderIcon(icon)
{
context.strokeStyle="red";
context.fillStyle="#2266FF";
context.lineWidth=1;
context.beginPath();
context.rect(icon[0],icon[1],100,20);
context.fill()
context.stroke();
context.fillStyle="#CCCCCC";
context.fillText(icon[2],icon[0]+10,icon[1]+15);
}
function renderLevelIcon(levelindex,y)
{
context.strokeStyle="red";
context.fillStyle="#3355FF";
context.lineWidth=4;
context.beginPath();
context.rect(10,y,canvasRect[2]-20,30);
context.fill()
context.stroke();
context.fillStyle="black";
context.fillText(levels[levelindex].name,20,y+23);
}
function isInBox(x,y,box)
{
if(x>box[0]&&x<box[0]+box[2]&&y>box[1]&&y<box[1]+box[3])return true;
return false;
}
function renderGameOver()
{
context.font='40px Arial';
context.fillStyle='black';
context.lineWidth=1;
var pos=[(canvasRect[2]/2)-100,(canvasRect[3]/2)-50];
var message="";
if(time<level.targettimes[0])
message="Very good!";
else if(time<level.targettimes[1])
message="Good.";
else if(time<level.targettimes[2])
message="OK.";
else
message="Fail.";
context.fillText(message,pos[0],pos[1]);
context.fillText("Time: "+time,pos[0],pos[1]+50);
}
function renderText()
{
context.font='15px Arial';
context.fillStyle='black';
context.lineWidth=1;
context.fillText(level.name+" Time: "+time,5,20);
}
function runPhysics()
{
var playerForce=GetInterpolatedVector(player.x,player.y);
if(keys.up)playerForce[1]-=10;
if(keys.down)playerForce[1]+=10;
if(keys.left)playerForce[0]+=10;
if(keys.right)playerForce[0]-=10;
playerForce[0]-=player.dx*50;
playerForce[1]-=player.dy*50;
player.dx+=playerForce[0]/500;
player.dy+=playerForce[1]/500;
var nextx=player.x+player.dx;
var nexty=player.y+player.dy;
if((nextx<0&&player.dx<0)||(nextx>=fieldWidth-1&&player.dx>0)){player.dx*=-1;player.x=Math.round(player.x)}
if((nexty<0&&player.dy<0)||(nexty>=fieldHeight-1&&player.dy>0)){player.dy*=-1;player.y=Math.round(player.y)}
player.x=nextx;
player.y=nexty;
}

function GetInterpolatedVector(x,y)
{
var ix=Math.floor(x);
var iy=Math.floor(y);
if(ix<0)ix=0
else if(ix>=fieldWidth-2)ix=fieldWidth-2;
if(iy<0)iy=0
else if(iy>=fieldHeight-2)iy=fieldHeight-2;
var uX=x-ix;
var uY=y-iy;
return BilinearInterpolation(level.vectorField[iy][ix],level.vectorField[iy][ix+1],level.vectorField[iy+1][ix],level.vectorField[iy+1][ix+1],uX,uY);
}

function BilinearInterpolation(topright,topleft,bottomright,bottomleft,ux,uy)
{
var centreright=LinearInterpolation(topright,bottomright,uy);
var centreleft=LinearInterpolation(topleft,bottomleft,uy);
return LinearInterpolation(centreright,centreleft,ux);
}

function LinearInterpolation(vectorA,vectorB,u)
{
return [lerp(vectorA[0],vectorB[0],u),lerp(vectorA[1],vectorB[1],u)];
}

function lerp(A,B,U)
{
return ((B-A)*U)+A;
}
function render()
{
context.clearRect(0,0,800,600);
renderField();
renderPlayer();
renderBoxes();
}
function renderPlayer()
{
 context.fillStyle='blue';
 context.strokeStyle='#000088';
 context.lineWidth=5;
 context.beginPath();
 context.arc(player.x*vectorSpacing,player.y*vectorSpacing,15,0,2*Math.PI,false);
 context.fill(); 
 context.stroke();
}

function renderBoxes()
{
context.lineWidth=2;
context.strokeStyle="black";
context.rect(level.startbox[0]*vectorSpacing,level.startbox[1]*vectorSpacing,level.startbox[2]*vectorSpacing,level.startbox[3]*vectorSpacing);
context.rect(level.endbox[0]*vectorSpacing,level.endbox[1]*vectorSpacing,level.endbox[2]*vectorSpacing,level.endbox[3]*vectorSpacing);
context.stroke();
}
