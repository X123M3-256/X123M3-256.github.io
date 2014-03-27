var gamediv;
function Initialise()
{
gamediv=document.getElementById("container");
document.addEventListener("keydown",HandleKeys,false);
document.addEventListener("keyup",shut,false);
document.addEventListener("click",startGame,false);
placeImage();
}




you={x:0,y:0,posX:100,posY:100}
gamestarted=false;

function Init()
{
scoretrack=0;
score=document.createElement("p");
gamediv.appendChild(score);
score.innerHTML="0";
youimage=document.createElement("img");
youimage.src="yousprite.png";
gamediv.appendChild(youimage);
}

function shut()
{
you.x=0;
you.y=0;
}

function HandleKeys(event)
{
if(!event)var event=window.event;
switch(event.keyCode){
case 37:you.x=-6;
break;
case 38:you.y=-6;
break;
case 39:you.x=6;
break;
case 40:you.y=6;
break;
alert(event.keyCode);
}
}
function placeImage()
{
background=document.createElement("img");
background.src="start.png";
gamediv.appendChild(background);
}
function generate()
{
xvel=Math.round(Math.random()*10);
yvel=Math.round(Math.random()*10);
negvel=Math.round(Math.random()*20)-10;
options=[[0,0,xvel,yvel],[0,200,xvel,negvel],[0,400,xvel,yvel*-1],[200,400,negvel,yvel*-1],[400,400,xvel*-1,yvel*-1],[400,200,xvel*-1,negvel],[400,0,xvel*-1,yvel],[200,0,negvel,yvel]];
startChoice=Math.floor(Math.random()*8);
objectArray.push({imgnm:objectArray.length,x:options[startChoice][2],y:options[startChoice][3],posX:options[startChoice][0],posY:options[startChoice][1]})
theyimage=document.createElement("img");
theyimage.src="theysprite.png";
theyimage.id="img"+objectArray[objectArray.length-1].imgnm;
gamediv.appendChild(theyimage);
}
function runMove()
{
if(you.posX+you.x>=0&&you.posX+you.x<=380)you.posX+=you.x;
if(you.posY+you.y>=0&&you.posY+you.y<=380)you.posY+=you.y;
youimage.style.left=you.posX;
youimage.style.top=you.posY;
for(i=0;i<objectArray.length;i++)
{
they=objectArray[i];
theyimage=document.getElementById("img"+they.imgnm.toString());
they.posX+=they.x;
they.posY+=they.y;
theyimage.style.left=they.posX;
theyimage.style.top=they.posY;
if(they.posX<0||they.posX>400)
{
they.x*=-1;
}
if(they.posY<0||they.posY>400)
{
they.y*=-1;
}
collide=true;
if(they.posX+20<you.posX)collide=false;
if(they.posX>you.posX+20)collide=false;
if(they.posY+20<you.posY)collide=false;
if(they.posY>you.posY+20)collide=false;
if(collide==true)
{
clearInterval(aint);
clearInterval(bint);
background.src="Gameover.png";
gamestarted=false;
}
}
score.innerHTML=scoretrack++/20;
}
function startGame()
{
if(gamestarted==false)
{
gamestarted=true;
gamediv.innerHTML="";
placeImage();
background.src="blank.png";
Init();
objectArray=[];
aint=setInterval("generate()","1000")
bint=setInterval("runMove()","50")
}
}
