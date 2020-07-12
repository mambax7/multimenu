
/***********************************************
* AnyLink Drop Down Menu- © Dynamic Drive (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/
///// No further editting needed

var ie4=document.all
var ie5_5=typeof dropmenuiframe_#=='undefined'? 0 : 1
var ns6=document.getElementById&&!document.all

if (ie4||ns6)
document.write('<div id="dropmenudiv_#" style="z-index:100;visibility:hidden;width:'+menuwidth_#+';background-color:'+menubgcolor_#+'" onMouseover="clearhidemenu_#()" onMouseout="dynamichide_#(event)"></div>')


function getposOffset_#(what, offsettype_#){
var totaloffset_#=(offsettype_#=="left")? what.offsetLeft : what.offsetTop;
var parentEl_#=what.offsetParent;
while (parentEl_#!=null){
totaloffset_#=(offsettype_#=="left")? totaloffset_#+parentEl_#.offsetLeft : totaloffset_#+parentEl_#.offsetTop;
parentEl_#=parentEl_#.offsetParent;
}
return totaloffset_#;
}

function showhide_#(obj, e, visible, hidden, menuwidth_#){
if (ie4||ns6)
dropmenuobj_#.style.left=dropmenuobj_#.style.top=-500
if (menuwidth_#>=0){
dropmenuobj_#.widthobj=dropmenuobj_#.style
dropmenuobj_#.widthobj.width=menuwidth_#
}
if (menuwidth_#<0){
dropmenuobj_#.widthobj=dropmenuobj_#.style
dropmenuobj_#.widthobj.width=-0.8*menuwidth_#
}
if (e.type=="click" && obj.visibility==hidden || e.type=="mouseover"){
obj.visibility=visible
unhideIframe_#()
} 
else if (e.type=="click"){
setTimeout("hideIframe_#();",0);
obj.visibility=hidden
}
}

function iecompattest_#(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function clearbrowseredge_#(obj, whichedge_#){
var edgeoffset_#=0
if (whichedge_#=="rightedge"){
var windowedge_#=ie4 && !window.opera? iecompattest_#().scrollLeft+iecompattest_#().clientWidth-15 : window.pageXOffset+window.innerWidth-15
dropmenuobj_#.contentmeasure=dropmenuobj_#.offsetWidth
if (windowedge_#-dropmenuobj_#.x < dropmenuobj_#.contentmeasure)
edgeoffset_#=dropmenuobj_#.contentmeasure-obj.offsetWidth
}
else{
var topedge_#=ie4 && !window.opera? iecompattest_#().scrollTop : window.pageYOffset
var windowedge_#=ie4 && !window.opera? iecompattest_#().scrollTop+iecompattest_#().clientHeight-15 : window.pageYOffset+window.innerHeight-18
dropmenuobj_#.contentmeasure=dropmenuobj_#.offsetHeight
if (windowedge_#-dropmenuobj_#.y < dropmenuobj_#.contentmeasure){ //move up?
//edgeoffset_#=dropmenuobj_#.contentmeasure+obj.offsetHeight
edgeoffset_#=dropmenuobj_#.contentmeasure-23 //gère la hauteur d'affichage du menu déroulant
if ((dropmenuobj_#.y-topedge_#)<dropmenuobj_#.contentmeasure) //up no good either?
edgeoffset_#=dropmenuobj_#.y+obj.offsetHeight-topedge_#
}
}
return edgeoffset_#
}

function populatemenu_#(what){
if (ie4||ns6)
dropmenuobj_#.innerHTML=what.join("")
}


function dropdownmenu_#(obj, e, menucontents, menuwidth_#){
if (window.event) event.cancelBubble=true
else if (e.stopPropagation) e.stopPropagation()
clearhidemenu_#()

dropmenuobj_#=document.getElementById? document.getElementById("dropmenudiv_#") : dropmenudiv_#
populatemenu_#(menucontents)

if (ie4||ns6){
showhide_#(dropmenuobj_#.style, e, "visible", "hidden", menuwidth_#)
dropmenuobj_#.x=getposOffset_#(obj, "left")
dropmenuobj_#.y=getposOffset_#(obj, "top")
dropmenuobj_#.style.left=dropmenuobj_#.x-clearbrowseredge_#(obj, "rightedge")+"px"
dropmenuobj_#.style.top=dropmenuobj_#.y-clearbrowseredge_#(obj, "bottomedge")+obj.offsetHeight+"px"
unhideIframe_#()
}

return clickreturnvalue_#()
}

function clickreturnvalue_#(){
if (ie4||ns6) return false
else return true
}

function contains_ns6(a, b) {
while (b.parentNode)
if ((b = b.parentNode) == a)
return true;
return false;
}

function dynamichide_#(e){
if (ie4&&!dropmenuobj_#.contains(e.toElement))
delayhidemenu_#()
else if (ns6&&e.currentTarget!= e.relatedTarget&& !contains_ns6(e.currentTarget, e.relatedTarget))
delayhidemenu_#()
}

function hidemenu_#(e){
if (typeof dropmenuobj_#!="undefined"){
if (ie4||ns6)
dropmenuobj_#.style.visibility="hidden"
hideIframe_#()
}
}

function delayhidemenu_#(){
if (ie4||ns6)
delayhide_#=setTimeout("hidemenu_#()",disappeardelay_#)
}

function clearhidemenu_#(){
if (typeof delayhide_#!="undefined")
clearTimeout(delayhide_#)
}

if (hidemenu_onclick_#=="yes")
document.onclick=hidemenu_#

// Hide IFrame
function hideIframe_#() {
if (ie5_5){
var theIframe_# = document.getElementById("dropmenuiframe_#")
theIframe_#.style.display = "none";
}
}

// Unhide IFrame
function unhideIframe_#() {
if (ie5_5){
var theIframe_# = document.getElementById("dropmenuiframe_#")
var theDiv_# = document.getElementById("dropmenudiv_#");
theIframe_#.style.width = theDiv_#.offsetWidth+'px';
theIframe_#.style.height = theDiv_#.offsetHeight+'px';
theIframe_#.style.top = theDiv_#.offsetTop+'px';
theIframe_#.style.left = theDiv_#.offsetLeft+'px';
theIframe_#.style.display = "block";
}
}