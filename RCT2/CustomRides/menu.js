function Menu(container)
{
this.container=container;


this.updateDisabled=false;
this.mouseInitialised=false;
this.mousePrevX=0;
this.mousePrevY=0;


var curMenu=this;
this.container.style.position="relative";
this.container.style.width="220px";
this.container.style.height="140px";
this.container.addEventListener("mousemove",function(event)
	{
		if(curMenu.mouseInitialised)
		{
		var dx=event.clientX-curMenu.mousePrevX;
		var dy=event.clientY-curMenu.mousePrevY;
			if(Math.abs(dx)>Math.abs(dy))curMenu.updateDisabled=true;
			else curMenu.updateDisabled=false;
		}
		else curMenu.mouseInitialised=true;
	curMenu.mousePrevX=event.clientX;
	curMenu.mousePrevY=event.clientY;
	});

//this.container.addEventListener("mouseleave",function(event){alert("hello");curMenu.updateDisabled=false;});

this.createCallback=function(rideIndex)
	{
	return function()
		{
			if(!curMenu.updateDisabled)
			{
			ShowItem(rideIndex);
			this.style.backgroundColor="#5b7373";
			}
		}
	}

var rideItems=document.getElementById("items").getElementsByTagName("div");
	for(i=0;i<rideItems.length;i++)
	{
	var listItem=document.createElement("span");
	listItem.style.width="220px";
	var itemName=document.createTextNode(rideItems[i].dataset.name);
		if(rideItems[i].dataset.filename)
		{
		var link=document.createElement("a");
		link.href="Files/"+rideItems[i].dataset.filename;
		link.appendChild(itemName);
		listItem.appendChild(link);
		}
		else listItem.appendChild(itemName);

	listItem.style.position="absolute";
	listItem.style.top=12*i+2+"px";
		if(rideItems[i].dataset.offset)listItem.style.left="0.5px";
		else listItem.style.left="0px";
	
	listItem.addEventListener("mouseover",this.createCallback(i));
	listItem.addEventListener("mouseout",function(){this.style.backgroundColor="";});

	this.container.appendChild(listItem);
	}
ShowItem(0);
}

var menu=null;

function InitMenu()
{
var rideList=document.getElementById("ridelist");
menu=new Menu(rideList);
}
