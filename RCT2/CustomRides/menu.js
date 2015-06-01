function Menu(container)
{
this.container=container;


this.updateDisabled=false;
this.mouseInitialised=false;
this.mousePrevX=0;
this.mousePrevY=0;


var curMenu=this;
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

this.createCallback=function(rideIndex)
	{
	return function()
		{
			if(!curMenu.updateDisabled)
			{
			ShowItem(rideIndex);
			this.style.backgroundColor="#464660";
			}
		}
	}

var rideItems=document.getElementById("items").getElementsByTagName("div");
	for(i=0;i<rideItems.length;i++)
	{
	var listItem=document.createElement("span");
	var link=document.createElement("a");
	link.href="DATFiles/"+rideItems[i].dataset.filename;
	link.appendChild(document.createTextNode(rideItems[i].dataset.name));
	listItem.appendChild(link);
	
	
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
