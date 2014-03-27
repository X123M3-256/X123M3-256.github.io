function GetLength(vector)
{
return Math.sqrt((vector[0]*vector[0])+(vector[1]*vector[1]));
}

function setVectorLength(vector,targetLength)
{
var multiplier=targetLength/Math.sqrt((vector[0]*vector[0])+(vector[1]*vector[1]));
return [vector[0]*multiplier,vector[1]*multiplier];
}

function renderField()
{
context.beginPath();
context.rect(0,0,canvasRect[2],canvasRect[3]);
context.fillStyle="#FFFFFF";
context.fill();
context.lineWidth=1;
var x,y;
for(x=0;x<fieldWidth;x++)
for(y=0;y<fieldHeight;y++)
{
renderVector(x*vectorSpacing,y*vectorSpacing,level.vectorField[y][x]);
}
}

function renderVector(x,y,vector)
{
var fraction=GetLength(vector)/50;
var blue=Math.floor(fraction*256);
var red=255-blue;
var redstring=red.toString(16);
var bluestring=blue.toString(16);
if(redstring.length<2)redstring="0"+redstring;
if(bluestring.length<2)bluestring="0"+bluestring;
context.strokeStyle="#"+redstring+"00"+bluestring;
var angle=Math.atan(vector[1]/vector[0]);
if(vector[0]<0)angle+=Math.PI;
context.beginPath();
var halfvec=[vector[0]/2,vector[1]/2];
context.moveTo(x-halfvec[0],y-halfvec[1]);
context.lineTo(x+halfvec[0],y+halfvec[1]);
arrowhead=[Math.cos(angle-2.5)*10,Math.sin(angle-2.5)*10];
context.lineTo(x+halfvec[0]+arrowhead[0],y+halfvec[1]+arrowhead[1])
context.moveTo(x+halfvec[0],y+halfvec[1]);
arrowhead=[Math.cos(angle+2.5)*10,Math.sin(angle+2.5)*10];
context.lineTo(x+halfvec[0]+arrowhead[0],y+halfvec[1]+arrowhead[1]);

context.stroke();
}
