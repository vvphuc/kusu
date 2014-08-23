/*

  
              ___.                                        ___.     ___.   .__        
  ____ ___.__.\_ |__   ___________          __  _  __ ____\_ |__   \_ |__ |__|_______
_/ ___<   |  | | __ \_/ __ \_  __ \  ______ \ \/ \/ // __ \| __ \   | __ \|  \___   /
\  \___\___  | | \_\ \  ___/|  | \/ /_____/  \     /\  ___/| \_\ \  | \_\ \  |/    / 
 \___  > ____| |___  /\___  >__|              \/\_/  \___  >___  / /\___  /__/_____ \
     \/\/          \/     \/                             \/    \/  \/   \/         \/

  <=======[ www.cyber-web.biz 2004-2007 ]================[ Code:Vidar Larsen ]===========>


  backward browser compatibility abolished to boost speed 
  performance ( and to avoid externat function lookups )
  

*/
//window.onerror = stopError;
/************[This function stop most errors when enabled]********/
function stopError(msg, url, lno) { 
	alert(msg+"  "+url+"  "+lno);
	return true; 
}//	(S)Smart solutions international::.

function error(message) {
	buff=' last active object = '+this.name;
	buff+=message;
	 alert(buff);
	return true;
}


if (!document.getElementById) alert("Sorry, this site is using latest javascript technologies and your browser does not support it!");

ns6 = document.getElementById; ns  = document.layers; ie  = document.all;
                




/*******************[AccessCSS]***********************************/
function accessCSS(layerID)	{    															
  if(ns6){ return document.getElementById(layerID).style;}     
   else if(ie){ return document.all[layerID].style; }        
    else if(ns){ return document.layers[layerID]; }         
}/***********************************************************/



function moveRelative(layer,x,y)  { 
	//accessCSS(layer).left=x; accessCSS(layer).top = y;
	accessCSS(Layer).moveBy(x,y);
	 
} 


function move(layer,x,y)  { document.getElementById(layer).style.left=x; document.getElementById(layer).style.top = y; } 
function imgResize(imgnm,x,y) { accessCSS(imgnm).width=x;accessCSS(imgnm).height=y; } // Only IE for fast imageresize ( old function )
function imgCrossResize(layer,imgnm,x,y) {newContent(layer,'<img src="'+imgnm+'" width="'+x+'" height="'+y+'">');}   



//>~~~~<[Change content of layer]>~~~~~~~~~~~~~~~~~~~~>
function newContent(layernm,content) { 
alert(layernm,content);
	if (ns6) document.getElementById(layernm).innerHTML=content;
	else if (ie) document.all[layernm].innerHTML=content;
	else if (ns) {					
    eval('  document.layers["'+layernm+'"].document.open();');			
    eval("  document.layers['"+layernm+"'].document.write('"+content+"');");     
    eval('  document.layers["'+layernm+'"].document.close();');		     
  } 
}





function scrollWindow(x,y) {
	//gamewindow.scrollTo(x,y);
	gamewindow.scrollTop = y;
		gamewindow.scrollLeft = x;
}

function randomize(maxNumber) { var r=Math.random()*maxNumber; r=Math.floor(r); return (r+1); }
function scrollWindowLeft(howMuch) {	window.scrollBy(howMuch,0); }
function scrollWindowRight(howMuch) {	window.scrollBy(-howMuch,0); }
function setBgColor(layernm,bcol) {if (document.layers) accessCSS(layernm).bgColor=bcol;else accessCSS(layernm).backgroundColor=bcol;}
function setHeight(layernm,nyHoyde) {	accessCSS(layernm).height=nyHoyde; }
function setWidth(layernm,nyBredde) {	accessCSS(layernm).width=nyBredde; }
function resize(layernm,w,h) {setWidth(layernm,w);setHeight(layernm,h);}
function setZ(layer,zNR) { accessCSS(layer).zIndex=zNR; }
function hide(layer) { accessCSS(layer).visibility= "hidden"  }
function show(layer) { if (ns) accessCSS(layer).visibility="show";else accessCSS(layer).visibility="visible"; }
function setAlpha(layername,filterCount) { eval(' accessCSS("'+layername+'").filter="alpha(opacity='+filterCount+')";   ');}
function mouseUp(){}
function setOverflow(layernm,scrollit) { accessCSS(layernm).overflow=scrollit; }
function setBodyBGcolor(color) {document.bgColor=color;}
function wr(stringToWrite) {document.write(stringToWrite);}
function setBodyBackground(imgNm) { if (document.body) document.body.background = imgNm; }
function addContent(layernm,content) {if (ns6) { document.getElementById(layernm).innerHTML+=content; } }
function clipObj(layerName,Ctop,Cright,Cbottom,Cleft) { document.getElementById(layerName).style.clip='rect('+Ctop+','+Cright+','+Cbottom+','+Cleft+')'; }

//>-----------------------------------=::[ Doc -> Iframe -> Div ]::=-------------------------------->
var divToLoadInto = "";wr('<iframe onLoad=bufferToDiv(); name="bufferFrame" id="bufferFrame" style="visibility:hidden;height:0px;width:0px;"></iframe>');
function bufferToDiv() { if (divToLoadInto!="") divLoadIframe(divToLoadInto,"bufferFrame"); }
function iframeLoadHTML(iframeNm,docUrl) { document.getElementById(iframeNm).src=docUrl;}
function divLoadIframe(divNm,iframeNm) {newContent(divNm,window.frames[iframeNm].document.body.innerHTML);}//external url = permission denied
function divLoadDoc(divID,docUrl) { divToLoadInto = divID; iframeLoadHTML("bufferFrame",docUrl);}
//>-------------------------------------------------------------------------------------------------->


function browserWidth() {
	if (window.innerWidth) return window.innerWidth;
	else if (document.body.clientWidth) return document.body.clientWidth;
	else return 1024;
}

function browserHeight() {

    	if (window.innerHeight) return window.innerHeight;
    	else if (document.body.clientHeight) return document.body.clientHeight;
    	else return 800;
}


function makeDiv(objName,x,y,content,w,h,overfl,parentDiv) {	  
		if (parentDiv==null) parentDiv='body';
		var oDiv = document.createElement ("DIV");
    oDiv.id = objName;
    if (w) oDiv.style.width = w;
		if (h) oDiv.style.height= h;
		if (content) oDiv.innerHTML=content;
		oDiv.style.position = "absolute";
		if (x) oDiv.style.left=x; else oDiv.style.left=-2000;
		if (y) oDiv.style.top=y; else oDiv.style.top=-2000;
		if (overfl) oDiv.style.overflow=overfl; else oDiv.style.overflow="hidden";
    eval('  document.'+parentDiv+'.appendChild (oDiv);  ');
		delete oDiv;
}





function createElementInsideDiv(parentDiv,childDiv,content,x,y) {
		var oDiv_inside= document.createElement("DIV");
		oDiv_inside.id=childDiv;
		oDiv_inside.style.position = "absolute";
    oDiv_inside.style.left=x;
		oDiv_inside.style.top=y;
	  if (content) oDiv_inside.innerHTML=content;
		document.getElementById(parentDiv).appendChild (oDiv_inside);
		delete oDiv_inside;
}


function getDistance(x1,y1,x2,y2) {	var distance = Math.sqrt((x2-x1)*(x2-x1) + (y2-y1)*(y2-y1));	return distance;}
function getAngle(fromX,fromY,toX,toY) {// ooh Yeah baby!
	  var diffX = fromX-toX;
	  var diffY = toY-fromY;
	  var tanx  = diffX/diffY;
		var  atanx = Math.atan(tanx); // (result in radians)
		var anglex = atanx * 180 / Math.PI; // converted to degrees
		if (diffY>0) anglex+=270; else anglex+=90;
		return Math.round(anglex);
}



//takes inputTxt and writes out in graphics lettering gifs
function writeGraphicTxt(x,y,txt,w,h,dirNm,totW) {// x-pos,y-pos,text,letter-width,letter-height,graphics directory,total horizontal width
	var buffer='<table cellpadding="0" cellspacing="0" border="0" height="'+h+'" width="'+totW+'"><tr>';var cX = 0;
	for (var t=0;t<txt.length;t++) {
		    cX+=w;if ((cX>(totW-200) && txt.charAt(t)==' ') || (t==(txt.length-1))) {
		    	buffer+='</tr></table>';
			  makeDiv("introTxtGr"+y,x,y,buffer);setZ("introTxtGr"+y,3);
				cX=0;t++;y+=h;buffer='<table cellpadding="0" border="0" cellspacing="0" height="'+h+'" width="'+totW+'"><tr>';
		} else if (t!=0) buffer+='<td><img src="'+dirNm+'/null.gif" width="100%" height="'+h+'"></td>';
		buffer+='<td width="'+w+'">';
		 if (txt.charAt(t)==' ') buffer+='<img src="'+dirNm+'/32.gif" width="'+w+'" height="'+h+'">';
		  else if (txt.charAt(t)=='.') buffer+='<img src="'+dirNm+'/dott.gif" width="'+w+'" height="'+h+'">';
		   else if (txt.charAt(t)=='"') buffer+='<img src="'+dirNm+'/ii.gif" width="'+w+'" height="'+h+'">';
		 	  else if (txt.charAt(t)=='/') buffer+='<img src="'+dirNm+'/zz.gif" width="'+w+'" height="'+h+'">';
		 	   else if (txt.charAt(t)==':') buffer+='<img src="'+dirNm+'/e3.gif" width="'+w+'" height="'+h+'">';	
		      // else if (txt.charAt(t)=='1' || txt.charAt(t)=='i') buffer+='<img src="'+dirNm+'/'+txt.charAt(t)+'.gif" width="'+(Math.round(w/2))+'" height="'+h+'">'; 
		        else buffer+='<img src="'+dirNm+'/'+txt.charAt(t)+'.gif" width="'+w+'" height="'+h+'">';
		buffer+='</td>';
		
	}
}

function writeGrTxt2(txt,x,y,dirNm,totW) {
	var buffer='<table cellpadding="0" cellspacing="0" border="0" width="'+totW+'"><tr>';
	var cX=0;var alignChar="left";
	for (var t=0;t<txt.length;t++) {
		cX+=16;if ((cX>(totW-200) && txt.charAt(t)==' ') || (t==txt.length)) {
			alignChar="left";cX=0;
			buffer+='</tr></table><table cellpadding="0" cellspacing="0" border="0" width="'+totW+'"><tr>';
		} else {
			if (txt.charAt(t)==' ') {
		  	if (alignChar=="left") alignChar="right";
		  	buffer+='<td><img src="'+dirNm+'/32.gif" width="13" height="21"></td>';
		  }
		   else buffer+='<td align="'+alignChar+'"><img src="'+dirNm+'/'+txt.charAt(t)+'.gif"></td>';
    }
		
	}
	makeDiv("Txt2Gr"+(x+y),x,y,buffer,totW);
	
	
}


