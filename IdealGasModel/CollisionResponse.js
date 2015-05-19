function ElasticCollisionResponse(contacts)
{
	for(i=0;i<contacts.length;i++)
	{
	ElasticCollision(contacts[i]);
	}	
}
function ElasticCollision(contact)
{
	//Calulate normal unit vector
	var norm=[contact.objA.x-contact.objB.x,contact.objA.y-contact.objB.y];
	Normalize(norm);
	//Adjust positions so objects are not intersecting
	contact.objA.x-=norm[0]*contact.penetration/2;
	contact.objA.y-=norm[1]*contact.penetration/2;
	contact.objB.x+=norm[0]*contact.penetration/2;
	contact.objB.y+=norm[1]*contact.penetration/2;
	//Calculate normal velocities
	var A_normal_velocity=DotProduct([contact.objA.dx,contact.objA.dy],norm);
	var B_normal_velocity=DotProduct([contact.objB.dx,contact.objB.dy],norm);
	//Remove them
	contact.objA.dx-=norm[0]*A_normal_velocity;
	contact.objA.dy-=norm[1]*A_normal_velocity;
	contact.objB.dx-=norm[0]*B_normal_velocity;
	contact.objB.dy-=norm[1]*B_normal_velocity;
	/* I'll be fucked if I know what this does. The internet says it works!*/
	var center_of_mass_velocity=((A_normal_velocity*contact.objA.mass)+(B_normal_velocity*contact.objB.mass))/(contact.objA.mass+contact.objB.mass);
	A_normal_velocity=(2*center_of_mass_velocity)-A_normal_velocity;
	B_normal_velocity=(2*center_of_mass_velocity)-B_normal_velocity;
	/*Now apply the new normal velocities to the objects*/
	contact.objA.dx+=norm[0]*A_normal_velocity;
	contact.objA.dy+=norm[1]*A_normal_velocity;
	contact.objB.dx+=norm[0]*B_normal_velocity;
	contact.objB.dy+=norm[1]*B_normal_velocity;
}