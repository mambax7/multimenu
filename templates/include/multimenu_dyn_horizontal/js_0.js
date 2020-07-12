
/***********************************************
* AnyLink Drop Down Menu- Dynamic Drive (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

// Edit settins here
var menuwidth_{id}='200'; 		//default menu width
var menubgcolor_{id}='#616E8E';	//menu bgcolor
var disappeardelay_{id}='2000';  	//menu disappear speed onMouseout (in miliseconds)
var hidemenu_onclick_{id}='yes'; 	//hide menu when user clicks within menu?



///// No further editting needed

var ie4=document.all
var ie5_5=typeof dropmenuiframe_{id}=='undefined'? 0 : 1
var ns6=document.getElementById&&!document.all

if (ie4||ns6)
document.write('<div id="dropmenudiv_{id}" style="z-index:100;visibility:hidden;width:'+menuwidth_{id}+';background-color:'+menubgcolor_{id}+'" onMouseover="clearhidemenu_{id}()" onMouseout="dynamichide_{id}(event)"></div>')


function getposOffset_{id}(what, offsettype_{id}){
var totaloffset_{id}=(offsettype_{id}=="left")? what.offsetLeft : what.offsetTop;
var parentEl_{id}=what.offsetParent;
while (parentEl_{id}!=null){
totaloffset_{id}=(offsettype_{id}=="left")? totaloffset_{id}+parentEl_{id}.offsetLeft : totaloffset_{id}+parentEl_{id}.offsetTop;
parentEl_{id}=parentEl_{id}.offsetParent;
}
return totaloffset_{id};
}

function showhide_{id}(obj, e, visible, hidden, menuwidth_{id}){
if (ie4||ns6)
dropmenuobj_{id}.style.left=dropmenuobj_{id}.style.top=-500
if (menuwidth_{id}>=0){
dropmenuobj_{id}.widthobj=dropmenuobj_{id}.style
dropmenuobj_{id}.widthobj.width=menuwidth_{id}
}
if (menuwidth_{id}<0){
dropmenuobj_{id}.widthobj=dropmenuobj_{id}.style
dropmenuobj_{id}.widthobj.width=-0.8*menuwidth_{id}
}
if (e.type=="click" && obj.visibility==hidden || e.type=="mouseover"){
obj.visibility=visible
unhideIframe_{id}()
} 
else if (e.type=="click"){
setTimeout("hideIframe_{id}();",0);
obj.visibility=hidden
}
}

function iecompattest_{id}(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function clearbrowseredge_{id}(obj, whichedge_{id}){
var edgeoffset_{id}=0
if (whichedge_{id}=="rightedge"){
var windowedge_{id}=ie4 && !window.opera? iecompattest_{id}().scrollLeft+iecompattest_{id}().clientWidth-15 : window.pageXOffset+window.innerWidth-15
dropmenuobj_{id}.contentmeasure=dropmenuobj_{id}.offsetWidth
if (windowedge_{id}-dropmenuobj_{id}.x < dropmenuobj_{id}.contentmeasure)
edgeoffset_{id}=dropmenuobj_{id}.contentmeasure-obj.offsetWidth
}
else{
var topedge_{id}=ie4 && !window.opera? iecompattest_{id}().scrollTop : window.pageYOffset
var windowedge_{id}=ie4 && !window.opera? iecompattest_{id}().scrollTop+iecompattest_{id}().clientHeight-15 : window.pageYOffset+window.innerHeight-18
dropmenuobj_{id}.contentmeasure=dropmenuobj_{id}.offsetHeight
if (windowedge_{id}-dropmenuobj_{id}.y < dropmenuobj_{id}.contentmeasure){ //move up?
//edgeoffset_{id}=dropmenuobj_{id}.contentmeasure+obj.offsetHeight
edgeoffset_{id}=dropmenuobj_{id}.contentmeasure-23 //gere la hauteur d'affichage du menu deroulant
if ((dropmenuobj_{id}.y-topedge_{id})<dropmenuobj_{id}.contentmeasure) //up no good either?
edgeoffset_{id}=dropmenuobj_{id}.y+obj.offsetHeight-topedge_{id}
}
}
return edgeoffset_{id}
}

function populatemenu_{id}(what){
if (ie4||ns6)
dropmenuobj_{id}.innerHTML=what.join("")
}


function dropdownmenu_{id}(obj, e, menucontents, menuwidth_{id}){
if (window.event) event.cancelBubble=true
else if (e.stopPropagation) e.stopPropagation()
clearhidemenu_{id}()

dropmenuobj_{id}=document.getElementById? document.getElementById("dropmenudiv_{id}") : dropmenudiv_{id}
populatemenu_{id}(menucontents)

if (ie4||ns6){
showhide_{id}(dropmenuobj_{id}.style, e, "visible", "hidden", menuwidth_{id})
dropmenuobj_{id}.x=getposOffset_{id}(obj, "left")
dropmenuobj_{id}.y=getposOffset_{id}(obj, "top")
dropmenuobj_{id}.style.left=dropmenuobj_{id}.x-clearbrowseredge_{id}(obj, "rightedge")+"px"
dropmenuobj_{id}.style.top=dropmenuobj_{id}.y-clearbrowseredge_{id}(obj, "bottomedge")+obj.offsetHeight+"px"
unhideIframe_{id}()
}

return clickreturnvalue_{id}()
}

function clickreturnvalue_{id}(){
if (ie4||ns6) return false
else return true
}

function contains_ns6(a, b) {
while (b.parentNode)
if ((b = b.parentNode) == a)
return true;
return false;
}

function dynamichide_{id}(e){
if (ie4&&!dropmenuobj_{id}.contains(e.toElement))
delayhidemenu_{id}()
else if (ns6&&e.currentTarget!= e.relatedTarget&& !contains_ns6(e.currentTarget, e.relatedTarget))
delayhidemenu_{id}()
}

function hidemenu_{id}(e){
if (typeof dropmenuobj_{id}!="undefined"){
if (ie4||ns6)
dropmenuobj_{id}.style.visibility="hidden"
hideIframe_{id}()
}
}

function delayhidemenu_{id}(){
if (ie4||ns6)
delayhide_{id}=setTimeout("hidemenu_{id}()",disappeardelay_{id})
}

function clearhidemenu_{id}(){
if (typeof delayhide_{id}!="undefined")
clearTimeout(delayhide_{id})
}

if (hidemenu_onclick_{id}=="yes")
document.onclick=hidemenu_{id}

// Hide IFrame
function hideIframe_{id}() {
if (ie5_5){
var theIframe_{id} = document.getElementById("dropmenuiframe_{id}")
theIframe_{id}.style.display = "none";
}
}

// Unhide IFrame
function unhideIframe_{id}() {
if (ie5_5){
var theIframe_{id} = document.getElementById("dropmenuiframe_{id}")
var theDiv_{id} = document.getElementById("dropmenudiv_{id}");
theIframe_{id}.style.width = theDiv_{id}.offsetWidth+'px';
theIframe_{id}.style.height = theDiv_{id}.offsetHeight+'px';
theIframe_{id}.style.top = theDiv_{id}.offsetTop+'px';
theIframe_{id}.style.left = theDiv_{id}.offsetLeft+'px';
theIframe_{id}.style.display = "block";
}
}
