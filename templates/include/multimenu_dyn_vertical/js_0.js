
/***********************************************
* AnyLink Drop Down Menu- © Dynamic Drive (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

// Edit settins here
var menuwidth_vert_{id}='160'; 		//default menu width
var disappeardelay_vert_{id}='2000';  	//menu disappear speed onMouseout (in miliseconds)
var hidemenu_onclick_vert_{id}='yes'; 	//hide menu when user clicks within menu?




///// No further editting needed
var ie4=document.all
var ie5_5=typeof dropmenuiframe_vert_{id}=='undefined'? 0 : 1
var ns6=document.getElementById&&!document.all

if (ie4||ns6)
document.write('<div id="dropmenudiv_vert_{id}" style="x-index:100;visibility:hidden;" onMouseover="clearhidemenu_vert_{id}()" onMouseout="dynamichide_vert_{id}(event)"></div>')


function getposOffset_vert_{id}(what, offsettype_vert_{id}){
var totaloffset_vert_{id}=(offsettype_vert_{id}=="left")? what.offsetLeft : what.offsetTop;
var parentEl_vert_{id}=what.offsetParent;
while (parentEl_vert_{id}!=null){
totaloffset_vert_{id}=(offsettype_vert_{id}=="left")? totaloffset_vert_{id}+parentEl_vert_{id}.offsetLeft : totaloffset_vert_{id}+parentEl_vert_{id}.offsetTop;
parentEl_vert_{id}=parentEl_vert_{id}.offsetParent;
}
return totaloffset_vert_{id};
}

function showhide_vert_{id}(obj, e, visible, hidden, menuwidth_vert_{id}){
if (ie4||ns6)
dropmenuobj_vert_{id}.style.left=dropmenuobj_vert_{id}.style.top=-500
if (menuwidth_vert_{id}>=0){
dropmenuobj_vert_{id}.widthobj=dropmenuobj_vert_{id}.style
dropmenuobj_vert_{id}.widthobj.width=menuwidth_vert_{id}
}
if (menuwidth_vert_{id}<0){
dropmenuobj_vert_{id}.widthobj=dropmenuobj_vert_{id}.style
dropmenuobj_vert_{id}.widthobj.width=-0.8*menuwidth_vert_{id}
}
if (e.type=="click" && obj.visibility==hidden || e.type=="mouseover"){
obj.visibility=visible
unhideIframe_vert_{id}()
} 
else if (e.type=="click"){
setTimeout("hideIframe_vert_{id}();",0);
obj.visibility=hidden
}
}

function iecompattest_vert_{id}(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function clearbrowseredge_vert_{id}(obj, whichedge_vert_{id}){
var edgeoffset_vert_{id}=0
if (whichedge_vert_{id}=="rightedge"){
var windowedge_vert_{id}=ie4 && !window.opera? iecompattest_vert_{id}().scrollLeft+iecompattest_vert_{id}().clientWidth-15 : window.pageXOffset+window.innerWidth-15
dropmenuobj_vert_{id}.contentmeasure=dropmenuobj_vert_{id}.offsetWidth
if (windowedge_vert_{id}-dropmenuobj_vert_{id}.x < dropmenuobj_vert_{id}.contentmeasure)
edgeoffset_vert_{id}=dropmenuobj_vert_{id}.contentmeasure-obj.offsetWidth
}
else{
var topedge_vert_{id}=ie4 && !window.opera? iecompattest_vert_{id}().scrollTop : window.pageYOffset
var windowedge_vert_{id}=ie4 && !window.opera? iecompattest_vert_{id}().scrollTop+iecompattest_vert_{id}().clientHeight-15 : window.pageYOffset+window.innerHeight-18
dropmenuobj_vert_{id}.contentmeasure=dropmenuobj_vert_{id}.offsetHeight
if (windowedge_vert_{id}-dropmenuobj_vert_{id}.y < dropmenuobj_vert_{id}.contentmeasure){ //move up?
//edgeoffset_vert_{id}=dropmenuobj_vert_{id}.contentmeasure+obj.offsetHeight
edgeoffset_vert_{id}=dropmenuobj_vert_{id}.contentmeasure-23 //gère la hauteur d'affichage du menu déroulant
if ((dropmenuobj_vert_{id}.y-topedge_vert_{id})<dropmenuobj_vert_{id}.contentmeasure) //up no good either?
edgeoffset_vert_{id}=dropmenuobj_vert_{id}.y+obj.offsetHeight-topedge_vert_{id}
}
}
return edgeoffset_vert_{id}
}

function populatemenu_vert_{id}(what){
if (ie4||ns6)
dropmenuobj_vert_{id}.innerHTML=what.join("")
}


function dropdownmenu_vert_{id}(obj, e, menucontents, menuwidth_vert_{id}){
if (window.event) event.cancelBubble=true
else if (e.stopPropagation) e.stopPropagation()
clearhidemenu_vert_{id}()

dropmenuobj_vert_{id}=document.getElementById? document.getElementById("dropmenudiv_vert_{id}") : dropmenudiv_vert_{id}
populatemenu_vert_{id}(menucontents)

if (ie4||ns6){
showhide_vert_{id}(dropmenuobj_vert_{id}.style, e, "visible", "hidden", menuwidth_vert_{id})
dropmenuobj_vert_{id}.x=getposOffset_vert_{id}(obj, "left")
dropmenuobj_vert_{id}.y=getposOffset_vert_{id}(obj, "top")
dropmenuobj_vert_{id}.style.left=dropmenuobj_vert_{id}.x-clearbrowseredge_vert_{id}(obj, "rightedge")+"px"
dropmenuobj_vert_{id}.style.top=dropmenuobj_vert_{id}.y-clearbrowseredge_vert_{id}(obj, "bottomedge")+obj.offsetHeight+"px"
unhideIframe_vert_{id}()
}

return clickreturnvalue_vert_{id}()
}

function clickreturnvalue_vert_{id}(){
if (ie4||ns6) return false
else return true
}

function contains_ns6(a, b) {
while (b.parentNode)
if ((b = b.parentNode) == a)
return true;
return false;
}

function dynamichide_vert_{id}(e){
if (ie4&&!dropmenuobj_vert_{id}.contains(e.toElement))
delayhidemenu_vert_{id}()
else if (ns6&&e.currentTarget!= e.relatedTarget&& !contains_ns6(e.currentTarget, e.relatedTarget))
delayhidemenu_vert_{id}()
}

function hidemenu_vert_{id}(e){
if (typeof dropmenuobj_vert_{id}!="undefined"){
if (ie4||ns6)
dropmenuobj_vert_{id}.style.visibility="hidden"
hideIframe_vert_{id}()
}
}

function delayhidemenu_vert_{id}(){
if (ie4||ns6)
delayhide_vert_{id}=setTimeout("hidemenu_vert_{id}()",disappeardelay_vert_{id})
}

function clearhidemenu_vert_{id}(){
if (typeof delayhide_vert_{id}!="undefined")
clearTimeout(delayhide_vert_{id})
}

if (hidemenu_onclick_vert_{id}=="yes")
document.onclick=hidemenu_vert_{id}

// Hide IFrame
function hideIframe_vert_{id}() {
if (ie5_5){
var theIframe_vert_{id} = document.getElementById("dropmenuiframe_vert_{id}")
theIframe_vert_{id}.style.display = "none";
}
}

// Unhide IFrame
function unhideIframe_vert_{id}() {
if (ie5_5){
var theIframe_vert_{id} = document.getElementById("dropmenuiframe_vert_{id}")
var theDiv_vert_{id} = document.getElementById("dropmenudiv_vert_{id}");
theIframe_vert_{id}.style.width = theDiv_vert_{id}.offsetWidth+'px';
theIframe_vert_{id}.style.height = theDiv_vert_{id}.offsetHeight+'px';
theIframe_vert_{id}.style.top = theDiv_vert_{id}.offsetTop+'px';
theIframe_vert_{id}.style.left = theDiv_vert_{id}.offsetLeft+'px';
theIframe_vert_{id}.style.display = "block";
}
}

