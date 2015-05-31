function ShowItem(index)
{
var items=document.getElementById("items").getElementsByTagName("div");
	for(i=0;i<items.length;i++)
	{
		if(i==index)items[i].style.display="block";
		else items[i].style.display="none";
	}
}

