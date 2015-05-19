var timeStep=0.03;
var screenWidth=700;
var screenHeight=screenWidth;
var context;
var balls=[];

/*This simply initialises the canvas and creates some objects
in random places*/
function Init()
{
context=document.getElementById("screen").getContext("2d");
	for(var i=0;i<400;i++)
	{
	balls.push(new Ball(Math.random()*screenWidth,Math.random()*screenHeight,10));
	balls[i].dx=(Math.random()*800)-400;
	balls[i].dy=(Math.random()*800)-400;
	}
InitCollisions(screenWidth,3);
setInterval("Render()",50);//Render at 20 fps
setInterval("RunPhysics()",timeStep*1000);
}

function IntroduceGas()
{
	for(var i=0;i<10;i++)	
	for(var j=0;j<10;j++)
	{
	var ball=new Ball(i*10,j*10,10);
	ball.color="#FF0000"
	balls.push(ball);
	}
}

function Render()
{
context.clearRect(0,0,screenWidth,screenHeight);
context.fillStyle = 'blue';
	for(var i=0;i<balls.length;i++)
	{
	context.fillStyle=balls[i].color;
	context.beginPath();
      	context.arc(balls[i].x,balls[i].y,balls[i].r,0,2*Math.PI,false);
      	context.fill();
	}
}
function Magnitude(a)
{
return Math.sqrt((a[0]*a[0])+(a[1]*a[1]));	
}
function DotProduct(a,b)
{
return (a[0]*b[0])+(a[1]*b[1]);
}
function Normalize(vec)
{
var magnitude=Magnitude(vec);
vec[0]/=magnitude;
vec[1]/=magnitude;
}


/*This function runs the demo physics. Each ball is advanced by one step,
then collision detection is run and collision response is calculated*/
function RunPhysics()
{
//Basic motion of the balls
	for(var i=0;i<balls.length;i++)
	{
	balls[i].x+=balls[i].dx*timeStep;
	balls[i].y+=balls[i].dy*timeStep;
	//balls[i].dy+=500*timeStep;
	/*Collision detection is only applied for spheres, so the following lines 
	ensure objects bounce off the border as well. This is inefficient as
	every object is checked, regardless of it's position in the tree*/
	if((balls[i].x<balls[i].r)&&balls[i].dx<0)balls[i].dx*=-1;
	if((balls[i].x>(screenWidth-balls[i].r))&&balls[i].dx>0)balls[i].dx*=-1;
	if((balls[i].y<balls[i].r)&&balls[i].dy<0)balls[i].dy*=-1;
	if((balls[i].y>(screenHeight-balls[i].r))&&balls[i].dy>0)balls[i].dy*=-1;
	}
//var contacts=ShittyCollisionDetection(balls); //Use whichever you want- I can't find a difference
var contacts=DetectCollisions(balls);
ElasticCollisionResponse(contacts);
}
