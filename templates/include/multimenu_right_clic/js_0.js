/*
SCRIPT EDITE SUR L'EDITEUR JAVASCRIPT
http://www.editeurjavascript.com
*/


var link_color= 'Black';
var background_color= 'White';
var link_hover= 'DarkGrey';
var background_hover= 'Grey';

function ejs_context_position(e)
	{
	ejs_context_x = (navigator.appName.substring(0,3) == "Net") ? e.pageX : event.x+document.body.scrollLeft;
	ejs_context_y = (navigator.appName.substring(0,3) == "Net") ? e.pageY : event.y+document.body.scrollTop;
	}

function ejs_context_open()
	{
	document.getElementById("ejs_context_box").style.top = ejs_context_y + "px";
	document.getElementById("ejs_context_box").style.left = ejs_context_x + "px";
	document.getElementById("ejs_context_ombre").style.top = ejs_context_y+2 + "px";
	document.getElementById("ejs_context_ombre").style.left = ejs_context_x+2 + "px";
	document.getElementById("ejs_context_box").style.visibility = "visible";
	document.getElementById("ejs_context_ombre").style.visibility = "visible";
	return(false);
	}

function ejs_context_close()
	{
	if (document.getElementById)
		{
		document.getElementById("ejs_context_box").style.top = 0;
		document.getElementById("ejs_context_box").style.left = 0;
		document.getElementById("ejs_context_ombre").style.top = 0;
		document.getElementById("ejs_context_ombre").style.left = 0;
		document.getElementById("ejs_context_box").style.visibility = "hidden";
		document.getElementById("ejs_context_ombre").style.visibility = "hidden";
		}
	}

function ejs_context_hl(mode, element)
	{
	if(mode == 1)
		{
		element.style.background = background_hover;
		element.style.color = link_hover;
		}
	else
		{
		element.style.background =background_color;
		element.style.color = link_color;
		}
	}

if(navigator.appName.substring(0,3) == "Net")
	{ document.captureEvents(Event.MOUSEMOVE); }



ejs_context_ombre_txt = '';
for(a=0;a<ejs_context_elemt.length;a++)
	{

	if(ejs_context_elemt[a].indexOf("|") > 0)
		{
		splited = new Array;
		splited = ejs_context_elemt[a].split("|");
		if( splited[3] ) { image = '<img class="ejs_img" src="'+splited[3]+'" align="absmiddle" />'; } else { image=''; }
		document.write('<div class="ejs_context_menuitems_'+splited[1]+'" onClick="'+splited[2]+'" onMouseOver="ejs_context_hl(1, this)" onMouseOut="ejs_context_hl(0, this)">'+image+splited[0]+'</div>');
		ejs_context_ombre_txt += '<div class="ejs_context_menuitems_'+splited[1]+'">'+splited[0]+'</div>';
		}
	else
		{
		document.write('<div class="ejs_context_menuitems_'+splited[1]+'" onClick="'+splited[2]+'" onMouseOver="ejs_context_hl(1, this)" onMouseOut="ejs_context_hl(0, this)"><hr width="100%" size="1" color="9D9DA1" /></div>');
		ejs_context_ombre_txt += '<div class="ejs_context_menuitems_'+splited[1]+'"><hr width="100%" size="1" color="9D9DA1" /></div>';
		}
	}
document.write('</div><div id="ejs_context_ombre">'+ejs_context_ombre_txt+'</div>');

// EVENTS
document.onmousemove = ejs_context_position;
document.oncontextmenu = ejs_context_open;
document.onclick = ejs_context_close;