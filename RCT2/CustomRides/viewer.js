
function registerButton(button,callback)
{
button.addEventListener("mousedown",function(){this.style.borderStyle="inset"});
button.addEventListener("mouseup",function(){this.style.borderStyle="outset"});
button.addEventListener("click",callback);
}

function Viewer(prev,next,imageNum,total)
{
this.index=0;
this.total=total;
this.prevButton=prev;
this.nextButton=next;
this.imageNum=imageNum;

this.SetImage=function()
	{
	this.imageNum.innerHTML="Image "+(this.index+1)+" of "+this.total;
	ShowItem(this.index);
	}

this.NextImage=function()
	{
		if(this.index<this.total-1)this.index++
	this.SetImage();
	}

this.PrevImage=function()
	{
		if(this.index>0)this.index--;
	this.SetImage();
	}

var curViewer=this;
registerButton(nextButton,function(){curViewer.NextImage();});
registerButton(prevButton,function(){curViewer.PrevImage();});
}

var viewer=null

function InitViewer(total)
{
nextButton=document.getElementById("btnnext");
prevButton=document.getElementById("btnprev");
imageNum=document.getElementById("imagenum");
viewer=new Viewer(prevButton,nextButton,imageNum,total);
ShowItem(0);
}