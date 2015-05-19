var tree;
//Define a constructor for the ball object
function Ball(x,y,r)
{
//Assign properties
this.color="#0000ff";
this.x=x;
this.y=y;
this.dx=0;
this.dy=0;
this.r=r;
/*Simple calculation assuming the balls
represent spheres of constant density*/
this.mass=1.33*(r*r*r);
}

/*This structure is a quad tree. Each node represents a square
region of space. It has four children, each representing the
squares in the top right, top left, bottom right, and bottom
left. Each child has its own children, thus subdividing the
screen space into smaller and smaller areas.

                ***************
		*      |      *
		*   1  |  2   *
		*-------------*
		*      |      *
		*   3  |  4   *
		***************                             */
		
		
/* This function constructs the tree recursively, by defining each
node as a sub-tree with depth reduced by one, until depth is 0*/
	
function QuadTree(depth,x,y,size)
{
/*Define the region of space that this node represents*/
this.x=x;
this.y=y;
this.size=size;
//Now subdivide the space
var halfSize=size/2;
depth--;
if(depth>=0)
{
this.nodes=[
	new QuadTree(depth,x,y,halfSize),//There are some repeated additions here
	new QuadTree(depth,x+halfSize,y,halfSize),
	new QuadTree(depth,x,y+halfSize,halfSize),
	new QuadTree(depth,x+halfSize,y+halfSize,halfSize)
	];
}
else this.nodes=null;
/*Holds objects currently in this node. Should remain empty except during
collision detection*/
this.objects=[];
}

/* The collision detection algorithm returns an array of contacts, which
contain all the information that is needed by the collision response.
Since this will only handle circles, no collison normal is required.
*/
function Contact(x,y,objA,objB,penetration)
{
this.x=x;
this.y=y;
this.penetration=penetration;
this.objA=objA;
this.objB=objB;
}

/*All this function does is instantiate the quad tree that is required
by the collision detector*/

function InitCollisions(size,depth)
{
tree=new QuadTree(depth,0,0,size);	
}


/* This function checks for a collision between two spheres, and if one is
found, it returns a contact for the collision. */

function CheckCollision(objA,objB)
{
var distX=objB.x-objA.x;
var distY=objB.y-objA.y;
var sumOfRadii=objA.r+objB.r;
/*Now we compare the square of the distance to the square of the sum of
the radii. This avoids taking square roots, which is slow.*/
var dist2=(distX*distX)+(distY*distY);
if(dist2<=(sumOfRadii*sumOfRadii))
	{
	/*Create contact*/
	var ratio=objA.r/sumOfRadii;
	var penetration=Math.sqrt(dist2)-sumOfRadii;
	return new Contact(objA.x+(distX*ratio),objA.y+(distY*ratio),objA,objB,penetration);
	}
return null;
}



/*If an object lies entirely within a node, it cannot collide with any of the other nodes
at the same level. If it does not lie entirely within a node, it must be compared against
all the nodes at the same level(Actually, it would only need to be checked against the
nodes it overlaps, but this information is not represented in the tree). Therefore, for
each object we find the smallest node that entirely contains that object. Then, objects in
a node are checked against all objects in the same node and in all child nodes */

function DetectCollisions(objects)
{
/* This is a depth first search; it descends the tree fully for each object
before moving on to the next. When the loop is complete, all objects have
been placed in their correct position in the tree */
	for(i=0;i<objects.length;i++)
	{		
	PlaceInTree(objects[i],tree);
	}
var contacts=[];
	for(i=0;i<objects.length;i++)
	{		
	GetCollisionsForNode(tree,contacts);
	}
return contacts;
}

/*This function checks all the objects in the node for collisions, then
removes them from the tree. Then it checks all child nodes, recursively
checking the entire tree for collisions*/
function GetCollisionsForNode(node,contacts)
{
var object;
	//Iterating in reverse because objects are popped from the array after use
	for(var i=node.objects.length-1;i>=0;i--)
	{
	/*Check every object in the current node for collisions*/
	object=node.objects[i];
	/*The object is removed so that it is not checked against itself*/
	node.objects.pop();
	GetCollisionsForObject(object,node,contacts);
	}
if(node.nodes!=null)//If there are child nodes, it needs to check those as well
	{
	/*Ideally it wouldn't descend into nodes unless they contain objects,
	but it doesn't yet maintain a count of the objects each node contains
	*/
	GetCollisionsForNode(node.nodes[0],contacts);
	GetCollisionsForNode(node.nodes[1],contacts);
	GetCollisionsForNode(node.nodes[2],contacts);
	GetCollisionsForNode(node.nodes[3],contacts);
	}
}

/*This function descends the tree, checking for collisions with a specific object
It adds any detected to the list of contacts provided*/
function GetCollisionsForObject(obj,node,contacts)
{
var contact;//Local variable for storing potential contacts
/*For every object in the current node, we check against all the others
that have not yet been checked*/

//The last object in the array is the one currently being checked
	for(var i=0;i<node.objects.length;i++)
	{
	contact=CheckCollision(obj,node.objects[i]);
	if(contact!=null)contacts.push(contact);			
	}
if(node.nodes!=null)//If there are child nodes, we need to check those as well
	{
	GetCollisionsForObject(obj,node.nodes[0],contacts);
	GetCollisionsForObject(obj,node.nodes[1],contacts);
	GetCollisionsForObject(obj,node.nodes[2],contacts);
	GetCollisionsForObject(obj,node.nodes[3],contacts);
	}
}
/*This function is recursive; it determines in which child node an object
lies, then calls itself again with the new node as the argument, until the
object has been placed in the tree.*/	
	
function PlaceInTree(obj,quadtree)
{
if(quadtree.node!=null)
{
/*Determines the objects lateral placement, i.e does it lie on the left or right*/
var xRel=obj.x-(quadtree.x+(quadtree.size/2));
/*Determines the objects vertical placement, i.e does it lie in the top or bottom*/
var yRel=obj.y-(quadtree.y+(quadtree.size/2));
	if(xRel<(-obj.r))//The object lies completely in the left area
	{
		if(yRel<(-obj.r))/*The object lies completely in the top left area*/
		{
		PlaceInTree(obj,quadtree.nodes[0]);
		return;
		}
		else if(yRel>obj.r)/*The object lies completely in the bottom left area*/
		{
		PlaceInTree(obj,quadtree.nodes[2]);	
		return;
		}
	}
	else if(xRel>obj.r)//The object lies completely in the right area
	{
		if(yRel<(-obj.r))/*The object lies completely in the top left area*/
		{
		PlaceInTree(obj,quadtree.nodes[1]);
		return;
		}
		else if(yRel>obj.r)/*The object lies completely in the bottom left area*/
		{
		PlaceInTree(obj,quadtree.nodes[3]);
		return;	
		}
	}
}
/*If we are here, the object does not lie completely in any of the child nodes and must
be added to this node*/
quadtree.objects.push(obj);
}



//Naive method
function ShittyCollisionDetection(objects)
{
var contact;
var contacts=[];
for(var i=0;i<objects.length;i++)
{
	for(var j=i+1;j<objects.length;j++)
	{
	contact=CheckCollision(objects[i],objects[j]);
	if(contact!=null)contacts.push(contact);	
	}
}
return contacts;
}

