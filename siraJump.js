function Initialise()
{
document.addEventListener("keydown",handleKeys,false);
document.addEventListener("keyup",handleKeyUps,false);
Init();
}


function refreshBorder()
{
border=document.createElement("img");
border.src="siraBorder.png";
border.style.top=0;
border.style.left=0;
document.body.appendChild(border);
}

function handleKeys(event)
{
if(!event)event=window.event;
if(event.keyCode==38&&grounded==true)
{
deltaY=-10;
grounded=false;
keydown=true;
setTimeout("handleKeyUps()","1000");
}
}
function handleKeyUps(event)
{
if(!event)event=window.event;
keydown=false;
}
function displayPlatforms()
{
document.body.innerHTML="";
if(platArray[platArray.length-1].offset[platArray[platArray.length-1].offset.length-1]<600)randomPlatform();
for(i=0;i<platArray.length;i++)
{
if(platArray[i].offset[0]<35)
{
if(platArray[i].offset[platArray[i].width-1]>=50)curplatheight=platHeights[platArray[i].height];
}
for(j=0;j<platArray[i].width;j++)
{
curPlat=document.createElement("img");
curPlat.style.top=0;
curPlat.src="plat"+platArray[i].height+".png";
curPlat.style.left=platArray[i].offset[j];
document.body.appendChild(curPlat);
platArray[i].offset[j]-=5+Math.floor(distance/20);
}
}
sira=document.createElement("img");
sira.src="sirasprite"+distance%5+".png";
sira.style.top=siraY;
sira.style.left=20;
document.body.appendChild(sira);
if(siraY>curplatheight||siraY==380){gameOver()}
if(siraY+(deltaY)<curplatheight&&keydown==false)
{
siraY+=deltaY++;
grounded=false;
}
else if(siraY+(deltaY)<curplatheight)
{
siraY+=deltaY;
}
else
{
grounded=true;
deltaY=0;
siraY=curplatheight;
}
score=document.createElement("p");
score.innerHTML=Math.round(Math.abs(platArray[0].offset[0])/0.3)/100;
document.body.appendChild(score);
}
function randomPlatform()
{
curoffset=platArray[platArray.length-1].offset[platArray[platArray.length-1].offset.length-1];
if(platArray[platArray.length-1].height>0)
{
gap=Math.floor(distance/20)+(Math.ceil(Math.random()*(5+Math.floor(distance/20)))-Math.floor(distance/20))
platArray.push({height:0,width:gap,offset:[]});
for(i=0;i<gap;i++)
{
platArray[platArray.length-1].offset.push(curoffset+(i*30))
}
}
else
{
gap=Math.abs(Math.ceil(Math.random()*10/(Math.floor(distance/160)+1)))+1
platArray.push({height:Math.ceil(Math.random()*9),width:gap,offset:[]});
for(i=0;i<gap;i++)
{
platArray[platArray.length-1].offset.push(curoffset+(i*30))
}
}
}
function Init()
{
platArray=[{height:5,width:10,offset:[0,30,60,90,120,150,180,210,240,270]},{height:0,width:5,offset:[300,330,360,390,420]},{height:4,width:5,offset:[450,480,510,540,570]}]
platHeights=[380,340,300,260,220,180,140,100,60,20]
distance=0;
siraY=180;
deltaY=0;
grounded=true;
keydown=false;
curplatheight=195;
aint=setInterval("displayPlatforms();refreshBorder();distance++","50");
}
function gameOver()
{
clearInterval(aint);
gameover=document.createElement("img");
gameover.src="siraend.png";
document.onclick=function(){document.body.removeChild(gameover);Init()}
document.body.appendChild(gameover);
}
