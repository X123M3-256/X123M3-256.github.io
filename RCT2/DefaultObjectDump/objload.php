<?php

//00 00 00 00 00 00 00 00 00 38 00 00 13 FF FF 03 08 FF 01 00 01 00 FF 02 FF 00

set_time_limit(0);

function tag_source($source,&$tags)
{
	switch($source)
	{
	case 1:
	array_push($tags,"expansion");
	break;
	case 8:
	array_push($tags,"default");
	break;
	default:
	array_push($tags,"custom");
	break;
	}
}

function tag_type($type,&$tags)
{
	if($type===1||$type===2||$type===3)array_push($tags,"scenery");
	switch($type)
	{
	case 1:
	array_push($tags,"small scenery");
	break;
	case 2:
	array_push($tags,"large scenery");
	break;
	case 3:
	array_push($tags,"wall");
	break;
	case 4:
	array_push($tags,"path banner");
	break;
	case 5:
	array_push($tags,"path");
	break;
	case 6:
	array_push($tags,"path object");
	break;
	case 7:
	array_push($tags,"scenery group");
	break;
	case 8:
	array_push($tags,"park entrance");
	break;
	case 9:
	array_push($tags,"water palette");
	break;
	case 10:
	array_push($tags,"scenario text");
	break;
	}
}

function tag_base($base,&$tags)
{
	switch($base)
	{
	case 0x0://Spiral Roller coaster
	array_push($tags,"spiral coaster track");
	break;
	case 0x1://Stand Up Coaster
	array_push($tags,"stand up coaster track");
	break;
	case 0x2://Suspended Swinging
	array_push($tags,"suspended swinging track");
	array_push($tags,"inverted");
	break;
	case 0x3://Inverted Coaster
	array_push($tags,"inverted coaster track");
	array_push($tags,"inverted");
	break;
	case 0x4://Steel Mini Coaster
	array_push($tags,"steel mini coaster track");
	break;
	case 0x5://Mini Railroad
	array_push($tags,"miniature railway track");
	break;
	case 0x6://Monorail
	array_push($tags,"monorail track");
	break;
	case 0x7://Mini Suspended Coaster
	array_push($tags,"mini suspended track");
	array_push($tags,"inverted");
	break;
	case 0x9://Wooden Wild Mine/Mouse
	array_push($tags,"wooden wild mouse track");
	array_push($tags,"wooden");
	break;
	case 0xa://Steeplechase/Motorbike/Soap Box Derby
	array_push($tags,"steeplechase track");
	break;
	case 0xb://Car Ride
	array_push($tags,"car ride track");
	break;
	case 0xc://Launched Freefall
	array_push($tags,"3x3");
	array_push($tags,"launched freefall track");
	break;
	case 0xd://Bobsleigh Coaster
	array_push($tags,"bobsled track");
	break;
	case 0xe://Observation Tower
	array_push($tags,"3x3");
	array_push($tags,"observation tower track"); //CHECKTHIS
	break;
	case 0xf://Looping Roller Coaster
	array_push($tags,"looping coaster track"); //CHECKTHIS
	break;
	case 0x10://Dinghy Slide
	array_push($tags,"dinghy slide track"); //CHECKTHIS
	break;
	case 0x11://Mine Train Coaster
	array_push($tags,"mine train coaster track");
	break;
	case 0x12://Chairlift
	array_push($tags,"chairlift track");
	break;
	case 0x13://Corkscrew Roller Coaster
	array_push($tags,"corkscrew coaster track");
	break;
	case 0x14://Maze
	array_push($tags,"maze");
	break;
	case 0x15://Spiral Slide
	array_push($tags,"spiral slide");
	break;
	case 0x16://Go Karts
	array_push($tags,"go karts track");
	break;
	case 0x17://Log Flume
	array_push($tags,"log flume track");
	break;
	case 0x18://River Rapids
	array_push($tags,"river rapids track");
	break;
	case 0x19://Bumper Cars
	array_push($tags,"4x4");
	break;
	case 0x1a://Pirate Ship
	array_push($tags,"1x5");
	break;
	case 0x1b://Swinging Inverter Ship
	array_push($tags,"1x5");
	break;
	case 0x1c://Food Stall
	array_push($tags,"1x1");
	array_push($tags,"food shop");
	break;
	case 0x1e://Drink Stall
	array_push($tags,"1x1");
	array_push($tags,"drink shop");
	break;
	case 0x21://Merry Go Round
	array_push($tags,"3x3");
	break;
	case 0x23://Information Kiosk
	array_push($tags,"1x1");
	array_push($tags,"information kiosk");
	break;
	case 0x24://Toilet
	array_push($tags,"1x1");
	array_push($tags,"toilet");
	break;
	case 0x25://Ferris Wheel
	array_push($tags,"4x1");
	break;
	case 0x26://Motion Simulator
	array_push($tags,"2x2");
	break;
	case 0x27://3D Cinema
	array_push($tags,"3x3");
	break;
	case 0x28://Topspin
	array_push($tags,"3x3");
	break;
	case 0x29://Space Rings
	array_push($tags,"3x3");
	break;
	case 0x2a://Reverse Freefall Coaster
	array_push($tags,"reverse freefall coaster track"); //CHECKTHIS
	break;
	case 0x2b://Elevator
	array_push($tags,"3x3");
	array_push($tags,"elevator track"); //CHECKTHIS
	break;
	case 0x2c://Vertical Drop Roller Coaster
	array_push($tags,"vertical drop coaster track");
	break;
	case 0x2d://ATM
	array_push($tags,"1x1");
	array_push($tags,"atm");
	break;
	case 0x2e://Twist
	array_push($tags,"3x3");
	break;
	case 0x2f://Haunted House
	array_push($tags,"3x3");
	break;
	case 0x30://First Aid
	array_push($tags,"1x1");
	array_push($tags,"first aid");
	break;
	case 0x31://Circus Show
	array_push($tags,"3x3");
	break;
	case 0x32://Ghost Train
	array_push($tags,"ghost train track"); //CHECKTHIS
	break;
	case 0x33://Twister Roller Coaster
	array_push($tags,"twister coaster track");
	break;
	case 0x34://Wooden Roller Coaster
	array_push($tags,"wooden coaster track");
	array_push($tags,"wooden");
	break;
	case 0x35://Side-Friction Roller Coaster
	array_push($tags,"side friction coaster track");
	array_push($tags,"wooden");
	break;
	case 0x36://Wild Mouse
	array_push($tags,"wild mouse track");
	break;
	case 0x37://Multi Dimension Coaster
	array_push($tags,"multi dimension coaster track");
	break;
	case 0x39://Flying Roller Coaster
	array_push($tags,"flying coaster track");
	break;
	case 0x3b://Virginia Reel
	array_push($tags,"virginia reel track");
	array_push($tags,"wooden");
	break;
	case 0x3c://Splash Boats
	array_push($tags,"splash boats");
	break;
	case 0x3d://Mini Helicopters
	array_push($tags,"mini helicopters track");
	break;
	case 0x3e://Lay-down Roller Coaster
	array_push($tags,"lay down coaster track");
	break;
	case 0x3f://Suspended Monorail
	array_push($tags,"suspended monorail track");
	array_push($tags,"inverted");
	break;
	case 0x41://Reverser Roller Coaster
	array_push($tags,"reverser coaster track");
	array_push($tags,"wooden");
	break;
	case 0x42://Heartline Twister Roller Coaster
	array_push($tags,"heartline twister coaster track");
	break;
	case 0x44://Giga Coaster
	array_push($tags,"giga coaster track");
	break;
	case 0x45://Roto-Drop
	array_push($tags,"3x3");
	array_push($tags,"roto drop track");
	break;
	case 0x46://Flying Saucers
	array_push($tags,"4x4");
	break;
	case 0x47://Crooked House
	array_push($tags,"3x3");
	break;
	case 0x48://Monorail Cycles
	array_push($tags,"monorail cycles track");
	break;
	case 0x49://Compact Inverted Coaster
	array_push($tags,"compact inverted coaster track");
	break;
	case 0x4a://Water Coaster
	array_push($tags,"water coaster track"); //CHECKTHIS
	break;
	case 0x4b://Air Powered Vertical Coaster
	array_push($tags,"air powered vertical coaster track");
	break;
	case 0x4c://Inverted Hairpin Coaster
	array_push($tags,"inverted hairpin coaster track");
	array_push($tags,"inverted");
	break;
	case 0x4d://Magic Carpet
	array_push($tags,"1x4");
	break;
	case 0x4e://Submarine Ride
	array_push($tags,"submarine ride track");
	break;
	case 0x4f://4f River Rafts
	array_push($tags,"river rafts track");
	break;
	case 0x51://Enterprise
	array_push($tags,"4x4");
	break;
	case 0x56://Inverted Impulse Coaster
	array_push($tags,"inverted impulse track");
	array_push($tags,"inverted");
	break;
	case 0x57://Mini Roller Coaster
	array_push($tags,"mini coaster track");
	break;
	case 0x58://Mine ride
	array_push($tags,"mine ride track");
	break;
	case 0x59://LIM Launched Roller Coaster
	array_push($tags,"lim launched coaster track");
	break;
	}
}

function tag_category($category,&$tags)
{
	switch($category)
	{
	case 0:
	array_push($tags,"transport ride");
	break;
	case 1:
	array_push($tags,"gentle ride");
	break;
	case 2:
	array_push($tags,"rollercoaster");
	break;
	case 3:
	array_push($tags,"thrill ride");
	break;//Don't tag water, it's handled elsewhere
	case 5:
	array_push($tags,"shop");
	break;
	}
}

function is_exportable()
{

}

function ride_header_is_exportable($data)
{

	for ($i=0;$i<4;$i++)
	{
		for($j=0;$j<62;$j++)
		{
			if(ord($data[48+$j+101*$i])!=0)return FALSE;
		}

		if ((ord($data[45+101*$i])&0x04)!=0x04)
		{
			if(ord($data[0x28+101*$i])!=0)return FALSE;
			if(ord($data[0x29+101*$i])!=0)return FALSE;
			if(ord($data[0x2a+101*$i])!=0)return FALSE;
		}
		if(ord($data[28+101*$i])!=0||ord($data[29+101*$i])!=0)return FALSE;
	}
return TRUE;
}

function tag_ride_header($data,&$tags)
{
	if(strlen($data)<0x1C2)return FALSE;
//Base rides
	if(ord($data[12])!=0xFF)tag_base(ord($data[12]),$tags);
	if(ord($data[13])!=0xFF)tag_base(ord($data[13]),$tags);
	if(ord($data[14])!=0xFF)tag_base(ord($data[14]),$tags);

//Exportability (specific to Buggy's editor because that appears to be solely responsible for this mess)
	if(!ride_header_is_exportable($data))array_push($tags,"unexportable");

//Ride flags
$tagged_as_water=FALSE;
	if(ord($data[9])&0x01)
	{
	array_push($tags,"water ride");
	$tagged_as_water=TRUE;
	}
	if(ord($data[9])&0x04)array_push($tags,"covered");
//OR the vehicle flags together so they can all be checked at once
$vehicle_flags=0;
	for($i=0;$i<4;$i++)
	{
	$vehicle_flags|=unpack("Vflags",substr($data,43+$i*101,4))["flags"];
	}
	if($vehicle_flags&0x00000001)array_push($tags,"animated");
	if($vehicle_flags&0x02000000)array_push($tags,"swinging");
	if($vehicle_flags&0x04000000)array_push($tags,"spinning");
	if($vehicle_flags&0x08000000)array_push($tags,"powered");
	if($vehicle_flags&0x00080000)array_push($tags,"self powered");
	if($vehicle_flags&0x00000400)array_push($tags,"no upstops");

//Categories
tag_category(ord($data[446]),$tags);
tag_category(ord($data[447]),$tags);
	if(!$tagged_as_water&&(ord($data[446])==4||ord($data[447])==4))array_push($tags,"water ride");
	if(ord($data[446])!=5&&ord($data[447])!=5)array_push($tags,"ride");
}

function tag_small_scenery_header($data,&$tags)
{
	if(strlen($data)<0x1C)return FALSE;
//Determine object size
	if((ord($data[6])&0x1)==0x1)array_push($tags,"1 tile");
	else if((ord($data[9])&0x1)==0x1)array_push($tags,"1/2 tile");
	else if((ord($data[7])&0x1)==0x1&&(ord($data[9])&0x2)==0)array_push($tags,"diagonal");
	else if((ord($data[7])&0x1)==0x1&&(ord($data[9])&0x2)==0x2)array_push($tags,"3/4 tile");
	else array_push($tags,"1/4 tile");
//Tag flags
	if((ord($data[6])&0x10)==0x10)array_push($tags,"animated");
	if((ord($data[6])&0x20)==0x20)array_push($tags,"needs watering");
	if((ord($data[7])&0x2)==0x2)array_push($tags,"glass");
	if((ord($data[7])&0x4)==0x4||(ord($data[8])&0x8)==0x8)array_push($tags,"recolorable");
	if((ord($data[7])&0x20)==0x20)array_push($tags,"clock");
	if((ord($data[8])&0x10)==0)array_push($tags,"supported");
}

function tag_large_scenery_header($data,&$tags)
{
	if(strlen($data)<0x1A)return FALSE;

	if((ord($data[7])&0x1)==0x1||(ord($data[7])&0x2)==0x2)array_push($tags,"recolorable");
	if((ord($data[7])&0x4)==0x4)array_push($tags,"3d text");
	if((ord($data[7])&0x8)==0x8)array_push($tags,"scrolling text");
	if((ord($data[7])&0x4)==0x4||(ord($data[7])&0x8)==0x8)array_push($tags,"sign");
}

function tag_wall_header($data,&$tags)
{
	if(strlen($data)<0xE)return FALSE;

	if((ord($data[7])&0x1)==0x1||(ord($data[7])&0x40)==0x40||(ord($data[7])&0x80)==0x80)array_push($tags,"recolorable");
	if((ord($data[9])&0x10)==0x10)array_push($tags,"animated");
	if((ord($data[7])&0x2)==0x2)array_push($tags,"glass");
	if((ord($data[7])&0x8)==0x8)array_push($tags,"double sided");
	if((ord($data[7])&0x10)==0x10)array_push($tags,"door");
}

function tag_path_banner_header($data,&$tags)
{
	if(strlen($data)<0xC)return FALSE;

	if((ord($data[7])&0x1)==0x1)array_push($tags,"recolorable");
}

function tag_path_object_header($data,&$tags)
{
	if(strlen($data)<0xE)return FALSE;

	if((ord($data[6])&0x1)==0x1)array_push($tags,"litter bin");
	if((ord($data[6])&0x2)==0x2)array_push($tags,"bench");
	if((ord($data[6])&0x8)==0x8)array_push($tags,"light");
	if((ord($data[6])&0x10)==0x10||(ord($data[6])&0x20)==0x20)array_push($tags,"jumping fountain");
	if((ord($data[7])&0x1)==0x1)array_push($tags,"queue line tv");
}



function ride_scan_optional($data,&$pos)
{
$length=strlen($data);

	if($pos>=$length)return FALSE;
$num_default_colors=ord($data[$pos]);
	if($num_default_colors==0xFF)
	{
	$num_default_colors=32;
	}
$pos+=1+3*$num_default_colors;

	for($i=0;$i<4;$i++)
	{
		if($pos>=$length)return FALSE;
	$structure_length=ord($data[$pos]);
	$pos++;
		if($structure_length==0xFF)
		{
			if($pos>=$length-1)return FALSE;
		$structure_length=ord($data[$pos])+(ord($data[$pos+1])*256);
		$pos+=2;
		}
	$pos+=$structure_length;
	}
}

function small_scenery_scan_optional($data,&$pos)
{
$length=strlen($data);

	if((ord($data[7])&0x80)==0x80)
	{
		if($pos>=$length)return FALSE;
		while(ord($data[$pos])!=0xFF)
		{
		$pos++;
			if($pos>=$length)return FALSE;
		}
	$pos++;
		if($pos>=$length)return FALSE;
	}
}

function large_scenery_scan_optional($data,&$pos)
{
$length=strlen($data);
	if($length<8)return FALSE;
	if((ord($data[7])&0x4)==0x4)
	{
	$pos+=0x40E;
	}

$tile_info=Array();

	if($pos>=$length-1)return FALSE;

	while((ord($data[$pos])!=0xFF)||(ord($data[$pos+1])!=0xFF))
	{
	$tile["x"]=unpack("scoord",substr($data,$pos,2))["coord"];
	$tile["y"]=unpack("scoord",substr($data,$pos+2,2))["coord"];
	$tile["z"]=unpack("scoord",substr($data,$pos+4,2))["coord"];
	array_push($tile_info,$tile);
	$pos+=9;
		if($pos>=$length-1)return FALSE;
	}
$pos+=2;
return $tile_info;
}

function scenery_group_scan_optional($data,&$pos)
{
$length=strlen($data);

	if($pos>=$length)return FALSE;

$members=Array();
	while(ord($data[$pos])!=0xFF)
	{
	array_push($members,substr($data,$pos+4,8));
	$pos+=16;
		if($pos>=$length)return FALSE;
	}
$pos++;
return $members;
}



function ride_get_preview($data,$pos)
{
	if(ord($data[12])!=0xFF)return read_image($data,$pos,0,TRUE)["image"];
	if(ord($data[13])!=0xFF)return read_image($data,$pos,1,TRUE)["image"];
	if(ord($data[14])!=0xFF)return read_image($data,$pos,2,TRUE)["image"];
return FALSE;
}

function small_scenery_get_preview($data,$pos)
{
$preview=read_image($data,$pos,0);
	if($preview===FALSE)return FALSE;
	
	if((ord($data[7])&0x2)==0x2)
	{
	$transparent_part=read_image($data,$pos,4);
		if($transparent_part===FALSE)return FALSE;
	$preview=composite_transparency($preview,$transparent_part);
	}

return $preview["image"];
}

function large_scenery_get_preview($data,$pos,$tile_info)
{
$images=Array();
$xs=Array();
$ys=Array();
	for($i=0;$i<count($tile_info);$i++)
	{
	$images[$i]=read_image($data,$pos,4+4*$i);
		if($images[$i]===FALSE)return FALSE;
	$xs[$i]=$tile_info[$i]["y"]-$tile_info[$i]["x"];
	$ys[$i]=0.5*($tile_info[$i]["y"]+$tile_info[$i]["x"])-$tile_info[$i]["z"];
	}

return composite_image($images,$xs,$ys)["image"];
}

function wall_get_preview($data,$pos)
{
$preview=read_image($data,$pos,0);
	if($preview===FALSE)return FALSE;
	
	if((ord($data[7])&0x2)==0x2)
	{
	$transparent_part=read_image($data,$pos,6);
		if($transparent_part==FALSE)return FALSE;
	$preview=composite_transparency($preview,$transparent_part);
	}
	if((ord($data[7])&0x10)==0x10)
	{
	$part2=read_image($data,$pos,1);
		if($part2==FALSE)return FALSE;
	$preview=composite_image(Array($preview,$part2),Array(0,0),Array(0,0));
	}
	
return $preview["image"];
}

function path_banner_get_preview($data,$pos)
{
$img1=read_image($data,$pos,0);
	if($img1===FALSE)return FALSE;
$img2=read_image($data,$pos,1);
	if($img2===FALSE)return FALSE;

return composite_image(Array($img1,$img2),Array(0,0),Array(0,0))["image"];
}

function path_get_preview($data,$pos)
{
$img1=read_image($data,$pos,71);
	if($img1===FALSE)return FALSE;
$img2=read_image($data,$pos,72);
	if($img2===FALSE)return FALSE;

return composite_image(Array($img1,$img2),Array(0,45),Array(0,0))["image"];
}

function path_object_get_preview($data,$pos)
{
$img=read_image($data,$pos,0);
	if($img===FALSE)return FALSE;
return $img["image"];
}

function park_entrance_get_preview($data,$pos)
{
$img1=read_image($data,$pos,0);
	if($img1===FALSE)return FALSE;
$img2=read_image($data,$pos,1);
	if($img2===FALSE)return FALSE;
$img3=read_image($data,$pos,2);
	if($img3===FALSE)return FALSE;

return composite_image(Array($img1,$img2,$img3),Array(0,-32,32),Array(0,-16,16))["image"];
}

function composite_transparency($image,$transparency)
{
$left=min($image["x_offset"],$transparency["x_offset"]);
$right=max($image["x_offset"]+$image["width"],$transparency["x_offset"]+$transparency["width"]);
$top=min($image["y_offset"],$transparency["y_offset"]);
$bottom=max($image["y_offset"]+$image["height"],$transparency["y_offset"]+$transparency["height"]);
$background["width"]=$right-$left;
$background["height"]=$bottom-$top;
$background["x_offset"]=$left;
$background["y_offset"]=$top;
$background["image"]=rct_image_create($background["width"],$background["height"],$colors,$indices_by_color);
$background["indices_by_color"]=$indices_by_color;

imagecopy($background["image"],$image["image"],$image["x_offset"]-$background["x_offset"],$image["y_offset"]-$background["y_offset"],0,0,$image["width"],$image["height"]);

$transparency_remap=Array(63,63,63,63,63,63,63,63,63,63,63,59,60,61,62,63,64,65,66,67,68,69,58,59,60,61,62,63,64,65,66,67,68,69,58,59,60,61,62,63,64,65,66,67,68,69,58,59,60,61,62,63,64,65,66,67,68,69,58,59,60,61,62,63,64,65,66,67,68,69,58,59,60,61,62,63,64,65,66,67,68,69,58,59,60,61,62,63,64,65,66,67,68,69,58,59,60,61,62,63,64,65,66,67,68,69,58,59,60,61,62,63,64,65,66,67,68,69,58,59,60,61,62,63,64,65,66,67,68,69,58,59,60,61,62,63,64,65,66,67,68,69,58,59,60,61,62,63,64,65,66,67,68,69,58,59,60,61,62,63,64,65,66,67,68,69,58,59,60,61,62,63,64,65,66,67,68,69,58,59,60,61,62,63,64,65,66,67,68,69,58,59,60,61,62,63,64,65,66,67,68,69,58,59,60,61,62,63,64,65,66,67,68,69,58,59,60,61,62,63,64,65,66,67,68,69,60,67,68,69,58,58,58,58,58,58,58,58,58,58,61,62,63,58,58,58,58,58,58,58,58,58,58,58,58);
$transparency_offset_x=$transparency["x_offset"]-$background["x_offset"];
$transparency_offset_y=$transparency["y_offset"]-$background["y_offset"];
	for($x=0;$x<$transparency["width"];$x++)
	for($y=0;$y<$transparency["height"];$y++)
	{
	$background_color=$background["indices_by_color"][imagecolorat($background["image"],$x+$transparency_offset_x,$y+$transparency_offset_y)];
	$transparency_color=$transparency["indices_by_color"][imagecolorat($transparency["image"],$x,$y)];
		if($transparency_color!=0)
		{
		$remapped_color=$transparency_remap[$background_color];
		imagesetpixel($background["image"],$x+$transparency_offset_x,$y+$transparency_offset_y,$remapped_color);
		}
	}
return $background;
}

function composite_image($images,$xs,$ys)
{
$left=$xs[0]+$images[0]["x_offset"];
$right=$xs[0]+$images[0]["x_offset"]+$images[0]["width"];
$top=$ys[0]+$images[0]["y_offset"];
$bottom=$ys[0]+$images[0]["y_offset"]+$images[0]["height"];

	for($i=1;$i<count($images);$i++)
	{
		if($xs[$i]+$images[$i]["x_offset"]<$left)$left=$xs[$i]+$images[$i]["x_offset"];
		if($xs[$i]+$images[$i]["x_offset"]+$images[$i]["width"]>$right)$right=$xs[$i]+$images[$i]["x_offset"]+$images[$i]["width"];
		if($ys[$i]+$images[$i]["y_offset"]<$top)$top=$ys[$i]+$images[$i]["y_offset"];
		if($ys[$i]+$images[$i]["y_offset"]+$images[$i]["height"]>$bottom)$bottom=$ys[$i]+$images[$i]["y_offset"]+$images[$i]["height"];
	}

$background["width"]=$right-$left;
$background["height"]=$bottom-$top;
$background["x_offset"]=$left;
$background["y_offset"]=$top;
$background["image"]=rct_image_create($background["width"],$background["height"],$colors,$indices_by_color);
$background["indices_by_color"]=$indices_by_color;

	for($i=0;$i<count($images);$i++)
	{
	imagecopy($background["image"],$images[$i]["image"],$xs[$i]+$images[$i]["x_offset"]-$background["x_offset"],$ys[$i]+$images[$i]["y_offset"]-$background["y_offset"],0,0,$images[$i]["width"],$images[$i]["height"]);
	}
return $background;
}


function rct_image_create($x,$y,&$colors,&$indices_by_color,$is_preview=FALSE)
{
$image=imagecreate($x,$y);
$colors=Array();
$colors[0]=imagecolorallocate($image,0,0,0);
$colors[1]=imagecolorallocate($image,0,0,0);
$colors[2]=imagecolorallocate($image,0,0,0);
$colors[3]=imagecolorallocate($image,0,0,0);
$colors[4]=imagecolorallocate($image,0,0,0);
$colors[5]=imagecolorallocate($image,0,0,0);
$colors[6]=imagecolorallocate($image,0,0,0);
$colors[7]=imagecolorallocate($image,0,0,0);
$colors[8]=imagecolorallocate($image,0,0,0);
$colors[9]=imagecolorallocate($image,0,0,0);
$colors[10]=imagecolorallocate($image,23,35,35);
$colors[11]=imagecolorallocate($image,35,51,51);
$colors[12]=imagecolorallocate($image,47,67,67);
$colors[13]=imagecolorallocate($image,63,83,83);
$colors[14]=imagecolorallocate($image,75,99,99);
$colors[15]=imagecolorallocate($image,91,115,115);
$colors[16]=imagecolorallocate($image,111,131,131);
$colors[17]=imagecolorallocate($image,131,151,151);
$colors[18]=imagecolorallocate($image,159,175,175);
$colors[19]=imagecolorallocate($image,183,195,195);
$colors[20]=imagecolorallocate($image,211,219,219);
$colors[21]=imagecolorallocate($image,239,243,243);
$colors[22]=imagecolorallocate($image,51,47,0);
$colors[23]=imagecolorallocate($image,63,59,0);
$colors[24]=imagecolorallocate($image,79,75,11);
$colors[25]=imagecolorallocate($image,91,91,19);
$colors[26]=imagecolorallocate($image,107,107,31);
$colors[27]=imagecolorallocate($image,119,123,47);
$colors[28]=imagecolorallocate($image,135,139,59);
$colors[29]=imagecolorallocate($image,151,155,79);
$colors[30]=imagecolorallocate($image,167,175,95);
$colors[31]=imagecolorallocate($image,187,191,115);
$colors[32]=imagecolorallocate($image,203,207,139);
$colors[33]=imagecolorallocate($image,223,227,163);
$colors[34]=imagecolorallocate($image,67,43,7);
$colors[35]=imagecolorallocate($image,87,59,11);
$colors[36]=imagecolorallocate($image,111,75,23);
$colors[37]=imagecolorallocate($image,127,87,31);
$colors[38]=imagecolorallocate($image,143,99,39);
$colors[39]=imagecolorallocate($image,159,115,51);
$colors[40]=imagecolorallocate($image,179,131,67);
$colors[41]=imagecolorallocate($image,191,151,87);
$colors[42]=imagecolorallocate($image,203,175,111);
$colors[43]=imagecolorallocate($image,219,199,135);
$colors[44]=imagecolorallocate($image,231,219,163);
$colors[45]=imagecolorallocate($image,247,239,195);
$colors[46]=imagecolorallocate($image,71,27,0);
$colors[47]=imagecolorallocate($image,95,43,0);
$colors[48]=imagecolorallocate($image,119,63,0);
$colors[49]=imagecolorallocate($image,143,83,7);
$colors[50]=imagecolorallocate($image,167,111,7);
$colors[51]=imagecolorallocate($image,191,139,15);
$colors[52]=imagecolorallocate($image,215,167,19);
$colors[53]=imagecolorallocate($image,243,203,27);
$colors[54]=imagecolorallocate($image,255,231,47);
$colors[55]=imagecolorallocate($image,255,243,95);
$colors[56]=imagecolorallocate($image,255,251,143);
$colors[57]=imagecolorallocate($image,255,255,195);
$colors[58]=imagecolorallocate($image,35,0,0);
$colors[59]=imagecolorallocate($image,79,0,0);
$colors[60]=imagecolorallocate($image,95,7,7);
$colors[61]=imagecolorallocate($image,111,15,15);
$colors[62]=imagecolorallocate($image,127,27,27);
$colors[63]=imagecolorallocate($image,143,39,39);
$colors[64]=imagecolorallocate($image,163,59,59);
$colors[65]=imagecolorallocate($image,179,79,79);
$colors[66]=imagecolorallocate($image,199,103,103);
$colors[67]=imagecolorallocate($image,215,127,127);
$colors[68]=imagecolorallocate($image,235,159,159);
$colors[69]=imagecolorallocate($image,255,191,191);
$colors[70]=imagecolorallocate($image,27,51,19);
$colors[71]=imagecolorallocate($image,35,63,23);
$colors[72]=imagecolorallocate($image,47,79,31);
$colors[73]=imagecolorallocate($image,59,95,39);
$colors[74]=imagecolorallocate($image,71,111,43);
$colors[75]=imagecolorallocate($image,87,127,51);
$colors[76]=imagecolorallocate($image,99,143,59);
$colors[77]=imagecolorallocate($image,115,155,67);
$colors[78]=imagecolorallocate($image,131,171,75);
$colors[79]=imagecolorallocate($image,147,187,83);
$colors[80]=imagecolorallocate($image,163,203,95);
$colors[81]=imagecolorallocate($image,183,219,103);
$colors[82]=imagecolorallocate($image,31,55,27);
$colors[83]=imagecolorallocate($image,47,71,35);
$colors[84]=imagecolorallocate($image,59,83,43);
$colors[85]=imagecolorallocate($image,75,99,55);
$colors[86]=imagecolorallocate($image,91,111,67);
$colors[87]=imagecolorallocate($image,111,135,79);
$colors[88]=imagecolorallocate($image,135,159,95);
$colors[89]=imagecolorallocate($image,159,183,111);
$colors[90]=imagecolorallocate($image,183,207,127);
$colors[91]=imagecolorallocate($image,195,219,147);
$colors[92]=imagecolorallocate($image,207,231,167);
$colors[93]=imagecolorallocate($image,223,247,191);
$colors[94]=imagecolorallocate($image,15,63,0);
$colors[95]=imagecolorallocate($image,19,83,0);
$colors[96]=imagecolorallocate($image,23,103,0);
$colors[97]=imagecolorallocate($image,31,123,0);
$colors[98]=imagecolorallocate($image,39,143,7);
$colors[99]=imagecolorallocate($image,55,159,23);
$colors[100]=imagecolorallocate($image,71,175,39);
$colors[101]=imagecolorallocate($image,91,191,63);
$colors[102]=imagecolorallocate($image,111,207,87);
$colors[103]=imagecolorallocate($image,139,223,115);
$colors[104]=imagecolorallocate($image,163,239,143);
$colors[105]=imagecolorallocate($image,195,255,179);
$colors[106]=imagecolorallocate($image,79,43,19);
$colors[107]=imagecolorallocate($image,99,55,27);
$colors[108]=imagecolorallocate($image,119,71,43);
$colors[109]=imagecolorallocate($image,139,87,59);
$colors[110]=imagecolorallocate($image,167,99,67);
$colors[111]=imagecolorallocate($image,187,115,83);
$colors[112]=imagecolorallocate($image,207,131,99);
$colors[113]=imagecolorallocate($image,215,151,115);
$colors[114]=imagecolorallocate($image,227,171,131);
$colors[115]=imagecolorallocate($image,239,191,151);
$colors[116]=imagecolorallocate($image,247,207,171);
$colors[117]=imagecolorallocate($image,255,227,195);
$colors[118]=imagecolorallocate($image,15,19,55);
$colors[119]=imagecolorallocate($image,39,43,87);
$colors[120]=imagecolorallocate($image,51,55,103);
$colors[121]=imagecolorallocate($image,63,67,119);
$colors[122]=imagecolorallocate($image,83,83,139);
$colors[123]=imagecolorallocate($image,99,99,155);
$colors[124]=imagecolorallocate($image,119,119,175);
$colors[125]=imagecolorallocate($image,139,139,191);
$colors[126]=imagecolorallocate($image,159,159,207);
$colors[127]=imagecolorallocate($image,183,183,223);
$colors[128]=imagecolorallocate($image,211,211,239);
$colors[129]=imagecolorallocate($image,239,239,255);
$colors[130]=imagecolorallocate($image,0,27,111);
$colors[131]=imagecolorallocate($image,0,39,151);
$colors[132]=imagecolorallocate($image,7,51,167);
$colors[133]=imagecolorallocate($image,15,67,187);
$colors[134]=imagecolorallocate($image,27,83,203);
$colors[135]=imagecolorallocate($image,43,103,223);
$colors[136]=imagecolorallocate($image,67,135,227);
$colors[137]=imagecolorallocate($image,91,163,231);
$colors[138]=imagecolorallocate($image,119,187,239);
$colors[139]=imagecolorallocate($image,143,211,243);
$colors[140]=imagecolorallocate($image,175,231,251);
$colors[141]=imagecolorallocate($image,215,247,255);
$colors[142]=imagecolorallocate($image,11,43,15);
$colors[143]=imagecolorallocate($image,15,55,23);
$colors[144]=imagecolorallocate($image,23,71,31);
$colors[145]=imagecolorallocate($image,35,83,43);
$colors[146]=imagecolorallocate($image,47,99,59);
$colors[147]=imagecolorallocate($image,59,115,75);
$colors[148]=imagecolorallocate($image,79,135,95);
$colors[149]=imagecolorallocate($image,99,155,119);
$colors[150]=imagecolorallocate($image,123,175,139);
$colors[151]=imagecolorallocate($image,147,199,167);
$colors[152]=imagecolorallocate($image,175,219,195);
$colors[153]=imagecolorallocate($image,207,243,223);
$colors[154]=imagecolorallocate($image,63,0,95);
$colors[155]=imagecolorallocate($image,75,7,115);
$colors[156]=imagecolorallocate($image,83,15,127);
$colors[157]=imagecolorallocate($image,95,31,143);
$colors[158]=imagecolorallocate($image,107,43,155);
$colors[159]=imagecolorallocate($image,123,63,171);
$colors[160]=imagecolorallocate($image,135,83,187);
$colors[161]=imagecolorallocate($image,155,103,199);
$colors[162]=imagecolorallocate($image,171,127,215);
$colors[163]=imagecolorallocate($image,191,155,231);
$colors[164]=imagecolorallocate($image,215,195,243);
$colors[165]=imagecolorallocate($image,243,235,255);
$colors[166]=imagecolorallocate($image,63,0,0);
$colors[167]=imagecolorallocate($image,87,0,0);
$colors[168]=imagecolorallocate($image,115,0,0);
$colors[169]=imagecolorallocate($image,143,0,0);
$colors[170]=imagecolorallocate($image,171,0,0);
$colors[171]=imagecolorallocate($image,199,0,0);
$colors[172]=imagecolorallocate($image,227,7,0);
$colors[173]=imagecolorallocate($image,255,7,0);
$colors[174]=imagecolorallocate($image,255,79,67);
$colors[175]=imagecolorallocate($image,255,123,115);
$colors[176]=imagecolorallocate($image,255,171,163);
$colors[177]=imagecolorallocate($image,255,219,215);
$colors[178]=imagecolorallocate($image,79,39,0);
$colors[179]=imagecolorallocate($image,111,51,0);
$colors[180]=imagecolorallocate($image,147,63,0);
$colors[181]=imagecolorallocate($image,183,71,0);
$colors[182]=imagecolorallocate($image,219,79,0);
$colors[183]=imagecolorallocate($image,255,83,0);
$colors[184]=imagecolorallocate($image,255,111,23);
$colors[185]=imagecolorallocate($image,255,139,51);
$colors[186]=imagecolorallocate($image,255,163,79);
$colors[187]=imagecolorallocate($image,255,183,107);
$colors[188]=imagecolorallocate($image,255,203,135);
$colors[189]=imagecolorallocate($image,255,219,163);
$colors[190]=imagecolorallocate($image,0,51,47);
$colors[191]=imagecolorallocate($image,0,63,55);
$colors[192]=imagecolorallocate($image,0,75,67);
$colors[193]=imagecolorallocate($image,0,87,79);
$colors[194]=imagecolorallocate($image,7,107,99);
$colors[195]=imagecolorallocate($image,23,127,119);
$colors[196]=imagecolorallocate($image,43,147,143);
$colors[197]=imagecolorallocate($image,71,167,163);
$colors[198]=imagecolorallocate($image,99,187,187);
$colors[199]=imagecolorallocate($image,131,207,207);
$colors[200]=imagecolorallocate($image,171,231,231);
$colors[201]=imagecolorallocate($image,207,255,255);
	if($is_preview)
	{
	$colors[202]=imagecolorallocate($image,63,0,27);
	$colors[203]=imagecolorallocate($image,103,0,51);
	$colors[204]=imagecolorallocate($image,123,11,63);
	$colors[205]=imagecolorallocate($image,143,23,79);
	$colors[206]=imagecolorallocate($image,163,31,95);
	$colors[207]=imagecolorallocate($image,183,39,111);
	$colors[208]=imagecolorallocate($image,219,59,143);
	$colors[209]=imagecolorallocate($image,239,91,171);
	$colors[210]=imagecolorallocate($image,243,119,187);
	$colors[211]=imagecolorallocate($image,247,151,203);
	$colors[212]=imagecolorallocate($image,251,183,223);
	$colors[213]=imagecolorallocate($image,255,215,239);
	}
	else
	{
	$colors[202]=imagecolorallocate($image,71,27,0);
	$colors[203]=imagecolorallocate($image,95,43,0);
	$colors[204]=imagecolorallocate($image,119,63,0);
	$colors[205]=imagecolorallocate($image,143,83,7);
	$colors[206]=imagecolorallocate($image,167,111,7);
	$colors[207]=imagecolorallocate($image,191,139,15);
	$colors[208]=imagecolorallocate($image,215,167,19);
	$colors[209]=imagecolorallocate($image,243,203,27);
	$colors[210]=imagecolorallocate($image,255,231,47);
	$colors[211]=imagecolorallocate($image,255,243,95);
	$colors[212]=imagecolorallocate($image,255,251,143);
	$colors[213]=imagecolorallocate($image,255,255,195);
	}
$colors[214]=imagecolorallocate($image,39,19,0);
$colors[215]=imagecolorallocate($image,55,31,7);
$colors[216]=imagecolorallocate($image,71,47,15);
$colors[217]=imagecolorallocate($image,91,63,31);
$colors[218]=imagecolorallocate($image,107,83,51);
$colors[219]=imagecolorallocate($image,123,103,75);
$colors[220]=imagecolorallocate($image,143,127,107);
$colors[221]=imagecolorallocate($image,163,147,127);
$colors[222]=imagecolorallocate($image,187,171,147);
$colors[223]=imagecolorallocate($image,207,195,171);
$colors[224]=imagecolorallocate($image,231,219,195);
$colors[225]=imagecolorallocate($image,255,243,223);
$colors[226]=imagecolorallocate($image,55,75,75);
$colors[227]=imagecolorallocate($image,255,183,0);
$colors[228]=imagecolorallocate($image,255,219,0);
$colors[229]=imagecolorallocate($image,255,255,0);
$colors[230]=imagecolorallocate($image,39,143,135);
$colors[231]=imagecolorallocate($image,7,107,99);
$colors[232]=imagecolorallocate($image,7,107,99);
$colors[233]=imagecolorallocate($image,7,107,99);
$colors[234]=imagecolorallocate($image,27,131,123);
$colors[235]=imagecolorallocate($image,155,227,227);
$colors[236]=imagecolorallocate($image,55,155,151);
$colors[237]=imagecolorallocate($image,55,155,151);
$colors[238]=imagecolorallocate($image,55,155,151);
$colors[239]=imagecolorallocate($image,115,203,203);
$colors[240]=imagecolorallocate($image,67,91,91);
$colors[241]=imagecolorallocate($image,83,107,107);
$colors[242]=imagecolorallocate($image,99,123,123);
/*
	$colors[243]=imagecolorallocate($image,8,67,8);
	$colors[244]=imagecolorallocate($image,16,85,16);
	$colors[245]=imagecolorallocate($image,24,103,24);
	$colors[246]=imagecolorallocate($image,32,121,32);
	$colors[247]=imagecolorallocate($image,40,139,40);
	$colors[248]=imagecolorallocate($image,48,157,48);
	$colors[249]=imagecolorallocate($image,56,175,56);
	$colors[250]=imagecolorallocate($image,64,193,64);
	$colors[251]=imagecolorallocate($image,72,211,72);
	$colors[252]=imagecolorallocate($image,80,219,80);
	$colors[253]=imagecolorallocate($image,88,237,88);
	$colors[254]=imagecolorallocate($image,92,255,92);
*/
	if($is_preview)
	{
	$colors[243]=imagecolorallocate($image,11,43,15);
	$colors[244]=imagecolorallocate($image,15,55,23);
	$colors[245]=imagecolorallocate($image,23,71,31);
	$colors[246]=imagecolorallocate($image,35,83,43);
	$colors[247]=imagecolorallocate($image,47,99,59);
	$colors[248]=imagecolorallocate($image,59,115,75);
	$colors[249]=imagecolorallocate($image,79,135,95);
	$colors[250]=imagecolorallocate($image,99,155,119);
	$colors[251]=imagecolorallocate($image,123,175,139);
	$colors[252]=imagecolorallocate($image,147,199,167);
	$colors[253]=imagecolorallocate($image,175,219,195);
	$colors[254]=imagecolorallocate($image,207,243,223);
	}
	else
	{
	$colors[243]=imagecolorallocate($image,35,0,0);
	$colors[244]=imagecolorallocate($image,79,0,0);
	$colors[245]=imagecolorallocate($image,95,7,7);
	$colors[246]=imagecolorallocate($image,111,15,15);
	$colors[247]=imagecolorallocate($image,127,27,27);
	$colors[248]=imagecolorallocate($image,143,39,39);
	$colors[249]=imagecolorallocate($image,163,59,59);
	$colors[250]=imagecolorallocate($image,179,79,79);
	$colors[251]=imagecolorallocate($image,199,103,103);
	$colors[252]=imagecolorallocate($image,215,127,127);
	$colors[253]=imagecolorallocate($image,235,159,159);
	$colors[254]=imagecolorallocate($image,255,191,191);
	}
$colors[255]=imagecolorallocate($image,0,0,0);

/*As far as I can tell the imagecolorallocate function doesn't guarantee that image colors are allocated sequentially, so I define a mapping
between the RCT2 palette and the GD image palette. This should always be the identity mapping, but I don't want the script to break if the 
two palettes don't match*/
$indices_by_color=Array();
	for($i=0;$i<255;$i++)
	{
	$indices_by_color[$colors[$i]]=$i;
	}

imagecolortransparent($image,$colors[0]);
return $image;
}

function read_image($data,$graphic_base,$index,$is_preview=FALSE)
{
$length=strlen($data);
	if($graphic_base>=$length-3)return FALSE;
$num_images=unpack("Vimages",substr($data,$graphic_base,4))["images"];

$bitmap_base=8+$graphic_base+16*$num_images;
	if($bitmap_base>=$length)return FALSE;
$record=unpack("Loffset/swidth/sheight/sx_offset/sy_offset/Sflags",substr($data,8+$graphic_base+16*$index,14));


$image=rct_image_create($record["width"],$record["height"],$colors,$indices_by_color,$is_preview);

	if($record["flags"]&0x4)
	{
	$graphic_base=$bitmap_base+$record["offset"];
		if($graphic_base+2*$record["height"]>=$length)return FALSE;
		for($row=0;$row<$record["height"];$row++)
		{
		$row_data=$graphic_base+unpack("Srowdata",substr($data,$graphic_base+$row*2,2))["rowdata"];

		$last=0;
			do
			{
				if($row_data>=$length)return FALSE;

			$seg_length=ord($data[$row_data])&0x7F;
			$last=ord($data[$row_data])&0x80;
			$row_data++;
				if($row_data>=$length)return FALSE;

			$x_offset=ord($data[$row_data]);
			$row_data++;
				for($x=0;$x<$seg_length;$x++)
				{
					if($row_data>=$length)return FALSE;
				imagesetpixel($image,$x+$x_offset,$row,$colors[ord($data[$row_data])]);
				$row_data++;
				}			
			}while($last!=0x80);	
	
		}
	}
	else
	{
	$pixel=$bitmap_base+$record["offset"];
		if($pixel+$record["width"]*$record["height"]>=$length)return FALSE;
		for($y=0;$y<$record["height"];$y++)
		{
			for($x=0;$x<$record["width"];$x++)
			{
			imagesetpixel($image,$x,$y,$colors[ord($data[$pixel])]);
			$pixel++;
			}
		}

	}



$result=Array();
$result["image"]=$image;
$result["width"]=$record["width"];
$result["height"]=$record["height"];
$result["x_offset"]=$record["x_offset"];
$result["y_offset"]=$record["y_offset"];
$result["indices_by_color"]=$indices_by_color;
return $result;
}


function read_string_table($data,&$pos)
{
$length=strlen($data);

$string_table=Array();
	do
	{
		if($pos>=$length-1)return FALSE;
	$language=ord($data[$pos]);
	$pos++;
	$str="";
		while(ord($data[$pos])!==0)
		{
		$str.=$data[$pos];
		$pos++;
			if($pos>=$length)return FALSE;
		}
	$pos++;
		if($pos>=$length)return FALSE;
	$string_table[$language]=$str;
	}
	while(ord($data[$pos])!==0xFF);
$pos++;
return $string_table;
}

function checksum_process_byte($checksum,$byte)
{
$checksum_higher_bits=$checksum&0xFFFFFF00;
$checksum_lower_bits=$checksum&0xFF;
$checksum_lower_bits^=$byte;
$checksum=$checksum_higher_bits|$checksum_lower_bits;
return ($checksum<<11)|(($checksum>>21)&0x000007FF);
}

function calculate_checksum($header,$data)
{
/*Check checksum*/
$checksum=0xF369A75B;

$checksum=checksum_process_byte($checksum,ord($header[0]));/*Do first byte*/
    for($i=4;$i<12;$i++)$checksum=checksum_process_byte($checksum,ord($header[$i]));/*Do filename*/
$length=strlen($data);
    for($i=0;$i<$length;$i++)$checksum=checksum_process_byte($checksum,ord($data[$i]));/*Checksum rest file*/;

return bin2hex(pack("V",$checksum));
}

function decompress_data($encoded_data)
{
$length=strlen($encoded_data);
$pos=5;
	if($pos>=$length)return FALSE;

	if(ord($encoded_data[0])==0)return substr($encoded_data,5);
	if(ord($encoded_data[0])!==1)return FALSE;

$data="";

	while($pos<$length)
	{
	$byte=ord($encoded_data[$pos]);
	$pos++;
		if(($byte&0x80)==0)
		{
		$copy=$byte+1;
			if($pos+$copy>$length)return FALSE;
		$data.=substr($encoded_data,$pos,$copy);
		$pos+=$copy;
		}
		else
		{
		$repeat=(~$byte&0xFF)+2;
		//echo "repeating $repeat";
			if($pos+1>$length)return FALSE;
		$repeated_byte=$encoded_data[$pos];
		$pos++;
			for($i=0;$i<$repeat;$i++)
			{
			$data.=$repeated_byte;
			}
		}
	}
return $data;
}

function objdata_load($filename)
{
assert(gettype($filename)==="string");

$tags=array();



//Open file
$file=file_get_contents($filename);
	if($file==FALSE)return FALSE;
//Read DAT file header
$datHeader=substr($file,0,16);
	if($datHeader===FALSE||strlen($datHeader)!==16)return FALSE;


$result=Array();
$tags=Array();

//Read name and checksum
$result["filename"]=substr($datHeader,4,8);
$result["checksum"]=bin2hex(substr($datHeader,12,4));

//Add tags for default/custom/expansion
$source=(ord($datHeader[0])&0xF0)>>4;
tag_source($source,$tags);

//Add tags for type of DAT file
$type=ord($datHeader[0])&0x0F;
tag_type($type,$tags);

	if($type==10)
	{
	$result["tags"]=$tags;
	return $result;
	}

//Decompress remaining data
$chunk=decompress_data(substr($file,16));
	if($chunk==FALSE)return FALSE;

//Track the current position within encoded data chunk
$pos=0;

switch($type)
	{
	case 0:
		if(tag_ride_header($chunk,$tags)===FALSE)return FALSE;
	$pos+=0x1C2;
	$result["name_table"]=read_string_table($chunk,$pos);
		if($result["name_table"]===FALSE)return FALSE;
	$result["description_table"]=read_string_table($chunk,$pos);
		if($result["description_table"]===FALSE)return FALSE;
		if(read_string_table($chunk,$pos)===FALSE)return FALSE;
		if(ride_scan_optional($chunk,$pos)===FALSE)return FALSE;
	$result["image"]=ride_get_preview($chunk,$pos);
		if($result["image"]===FALSE)return FALSE;
	break;

	case 1:
		if(tag_small_scenery_header($chunk,$tags,$pos)===FALSE)return FALSE;
	$pos+=0x1C;
	$result["name_table"]=read_string_table($chunk,$pos);
		if($result["name_table"]===FALSE)return FALSE;
	//skip group info
	$pos+=16;
		if(small_scenery_scan_optional($chunk,$pos)===FALSE)return FALSE;
	$result["image"]=small_scenery_get_preview($chunk,$pos);
		if($result["image"]===FALSE)return FALSE;
	break;

	case 2:
		if(tag_large_scenery_header($chunk,$tags)===FALSE)return FALSE;
	$pos+=0x1A;
	$result["name_table"]=read_string_table($chunk,$pos);
		if($result["name_table"]===FALSE)return FALSE;
	//skip group info
	$pos+=16;
	$tile_info=large_scenery_scan_optional($chunk,$pos);
		if($tile_info===FALSE)return FALSE;
		if((ord($chunk[7])&0x4)!=0x4)
		{
		$result["image"]=large_scenery_get_preview($chunk,$pos,$tile_info);
			if($result["image"]===FALSE)return FALSE;
		}
	break;

	case 3:
		if(tag_wall_header($chunk,$tags)===FALSE)return FALSE;
	$pos+=0xE;
	$result["name_table"]=read_string_table($chunk,$pos);
		if($result["name_table"]===FALSE)return FALSE;
	//skip group info
	$pos+=16;
	$result["image"]=wall_get_preview($chunk,$pos);
		if($result["image"]===FALSE)return FALSE;
	break;

	case 4:
		if(tag_path_banner_header($chunk,$tags)===FALSE)return FALSE;
	$pos+=0xC;
	$result["name_table"]=read_string_table($chunk,$pos);
		if($result["name_table"]===FALSE)return FALSE;
	//skip group info
	$pos+=16;
	$result["image"]=path_banner_get_preview($chunk,$pos);
		if($result["image"]===FALSE)return FALSE;
	break;

	case 5:
	$pos+=0xE;
	$result["name_table"]=read_string_table($chunk,$pos);
		if($result["name_table"]===FALSE)return FALSE;
	$result["image"]=path_get_preview($chunk,$pos);
		if($result["image"]===FALSE)return FALSE;
	break;

	case 6:
		if(tag_path_object_header($chunk,$tags)===FALSE)return FALSE;
	$pos+=0xE;
	$result["name_table"]=read_string_table($chunk,$pos);
		if($result["name_table"]===FALSE)return FALSE;
	//skip group info
	$pos+=16;
	$result["image"]=path_object_get_preview($chunk,$pos);
		if($result["image"]===FALSE)return FALSE;
	break;

	case 7:
	$pos+=0x10E;
	$result["name_table"]=read_string_table($chunk,$pos);
		if($result["name_table"]===FALSE)return FALSE;
	$result["members"]=scenery_group_scan_optional($chunk,$pos);
		if($result["members"]===FALSE)return FALSE;
	$result["image"]=read_image($chunk,$pos,0,TRUE)["image"];
		if($result["image"]===FALSE)return FALSE;
	break;

	case 8:
	$pos+=0x8;
	$result["name_table"]=read_string_table($chunk,$pos);
		if($result["name_table"]===FALSE)return FALSE;
	$result["image"]=park_entrance_get_preview($chunk,$pos);
		if($result["image"]===FALSE)return FALSE;
	break;
	}

//Add tags array to result
$result["tags"]=$tags;

return $result;
}

//TEST CODE, PLEASE IGNORE

function show_data($data)
{
echo "<p>".$data["filename"]."</p>";
echo "<p>".$data["checksum"]."</p>";
	if(array_key_exists("name_table",$data))
	{
	echo "<p>".$data["name_table"][0]."</p>";
	}
	else
	{
	echo "<p>No name available</p>";
	}
	if(array_key_exists("description_table",$data))
	{
	echo "<p>".$data["description_table"][0]."</p>";
	}
	if(array_key_exists("image",$data))
	{
	$name=$data["filename"].".png";
	imagepng($data["image"],$name);
	echo "<img src=\"$name\"></img><br/>";
	}
	else
	{
	echo "<p>No preview image available</p>";
	}
	if(array_key_exists("members",$data))print_r($data["members"]);
print_r($data["tags"]);
}


$files = glob("/home/edward/.wine/drive_c/Program Files/Infogrames/RollerCoaster Tycoon 2 Clean/ObjData/*");

echo "<table border=\"1\"><thead><td>Filename</td><td>Preview image</td><td>Name</td><td>Description</td></thead>";
	for($i=0;$i<count($files);$i++)
	{
	$data=objdata_load($files[$i]);
		if($data===FALSE)echo "An error occured";
		else
		{
		echo "<tr>";
		echo "<td>".$data["filename"]."</td>";
			if(array_key_exists("image",$data))
			{
			$name=$data["filename"].".png";
			imagepng($data["image"],$name);
					echo "<td><img src=\"$name\"></img></td>";
			}
			else
			{
			echo "<td></td>";
			}

			if(array_key_exists("name_table",$data))
			{
			echo "<td>".$data["name_table"][0]."</p>";
			}
			else
			{
			echo "<td></td>";
			}
			if(array_key_exists("description_table",$data))
			{
			echo "<td>".$data["description_table"][0]."</td>";
			}
			else
			{
			echo "<td></td>";
			}
		}
	}
echo "</table>"
?>
