<?php
//Bengtson-Fu 13 3 |\| ( ][ 5 () |\| - |= |_|!!!!!!

/*created by Jason Bengtson, MLIS, MA : Available under Creative Commons non-commercial share alike open source license*/

/*Bengtson-Fu is the best Kung Fu!!!*/
error_reporting(E_ALL);
ini_set('display_errors', 1);

$begin='<div id="s-lg-content-11463527" class=" clearfix">';
$end='</div>';
//$cutter="$begin./[\s\S]+?/.$end";
$cutter='/<div id="s-lg-content-10141133" class="  clearfix">[\s\S]+?<\/div>/';
$cutter2='/<div id="s-lg-content-15790241" class="  clearfix">[\s\S]+?<\/div>/';
$cutter3='/<div id="s-lg-content-15790251" class="  clearfix">[\s\S]+?<\/div>/';
$getconfig='/<div id="s-lg-content-11110366" class="  clearfix">[\s\S]+?<\/div>/';
$stripconfig='/<div id="s-lg-content-11110366" class="  clearfix">[\s\S]+?<p>/';
$effecto='/<div id="s-lg-content-11463530" class="  clearfix">[\s\S]+?<\/div>/';
$stripeffecto='/<div id="s-lg-content-11463530" class="  clearfix">/';
$stripeffecto2='/<\/div>/';
$stripconfig2='/<\/p>[\s\S]+?<\/div>/';
$getcolor='/<div id="s-lg-content-11111955" class="  clearfix">[\s\S]+?<\/div>/';
$actualcolor='/<span style="color:[\s\S]+?>/';
$hexcolor='/\#[0-9A-F]{6,6}/';

$content = curl_init();
curl_setopt($content, CURLOPT_URL, "YOUR LIBGUIDE URL");
curl_setopt($content, CURLOPT_HEADER, 0);
curl_setopt($content, CURLOPT_RETURNTRANSFER, 1);
$alert = curl_exec($content);
curl_close($content);


preg_match($getcolor, $alert, $thiscolor);
preg_match($actualcolor, $thiscolor[0], $colortag);
preg_match($hexcolor, $colortag[0], $color);


preg_match($cutter, $alert, $alert1whole);
preg_match($cutter2, $alert, $alert2whole);
preg_match($cutter3, $alert, $alert3whole);
preg_match($getconfig, $alert, $varvalarr);
preg_match($effecto, $alert, $daeffect1);
$varval=str_replace("'","\'", $varvalarr[0]);
$varval=str_replace(array("\r", "\n"), "", $varval);
$varval=preg_replace($stripconfig, "", $varval);
$varval=preg_replace($stripconfig2, "", $varval);

$daeffect=str_replace(array("\r", "\n"), "", $daeffect1[0]);
$daeffect=preg_replace($stripeffecto, "", $daeffect);
$daeffect=preg_replace($stripeffecto2, "", $daeffect);
$daeffect=preg_replace('/\s/', "", $daeffect);
$daeffect=preg_replace('/<p>/', "", $daeffect);
$daeffect=preg_replace('/<\/p>/', "", $daeffect);


$colorit=str_replace("'","\'", $color[0]);
$colorit=str_replace(array("\r", "\n"), "", $colorit);

$alertwholex1=str_replace("'","\'",$alert1whole[0]);
$alertwholex1=str_replace(array("\r", "\n"), "", $alertwholex1);

$alertwholex2=str_replace("'","\'",$alert2whole[0]);
$alertwholex2=str_replace(array("\r", "\n"), "", $alertwholex2);

$alertwholex3=str_replace("'","\'",$alert3whole[0]);
$alertwholex3=str_replace(array("\r", "\n"), "", $alertwholex3);
$js="var alert1contents='".$alertwholex1."';"."var alert2contents='".$alertwholex2."';"."var alert3contents='".$alertwholex3."';"."var alerttest='".$varval."';var alertcolor='".$colorit."';var alerteffect='".$daeffect."';";
$js .= <<<'EOT'

if((alert1contents.length>67)||(alert2contents.length>67)||(alert3contents.length>67))
{
    //set count var
    counto=3;
    //create holding array
    holdster=[];
    //see which vars are empty
    if(alert1contents.length<68)
    {
        delete window.alert1contents;
        counto--;
    }
    else
    {
      holdster.push(alert1contents);  
    }
    if(alert2contents.length<68)
    {
        delete window.alert2contents;
        counto--;
    }
        else
    {
      holdster.push(alert2contents);  
    }
    if(alert3contents.length<68)
    {
        delete window.alert3contents;
        counto--;
    }
        else
    {
      holdster.push(alert3contents);  
    }
   //get pseuorandom number 
    var rando=Math.floor((Math.random() * counto) + 1);
   rando--;
    
var datop= document.createElement("div");
datop.className="alert";
datop.id="alert";
datop.innerHTML=holdster[rando];
datop.style.overflow="hidden";




if(alerttest==2)
{

document.getElementById("dalast").appendChild(datop);

}
else if(alerttest==3)
{
//datop.className = 'columns';
datop.style.display="block";
datop.style.float="right";
datop.style.width="31.5%";
datop.style.marginRight="10px";

document.getElementById("special").style.width="65%";
document.getElementById("special").style.float="left";
document.getElementById("special").style.marginRight="0px";
document.getElementById("container").appendChild(datop);

///add survey buttons

document.getElementById("container").appendChild(surveyme);
surveyme.style.display="block";
surveyme.style.float="right";
surveyme.style.width="31.5%";
surveyme.style.marginRight="10px";
}
else
{
document.getElementById("daLogo").appendChild(datop);

}
if(alertcolor.length>1)
{
datop.style.backgroundColor=alertcolor;

}
//console.log(alertcontents.length);
if(alerteffect=="1")
{
var daTimer=setInterval(function () {Timer()}, 8000);
function Timer(){

$(".alert").animate({
  	height: "toggle"
    }, 700, function() {
    	$(this).animate({
    height: "toggle"

    });
  });
}
}
else if(alerteffect=="2")
{
	var daTimer=setInterval(function () {Timer2()}, 8000);
function Timer2(){

$(".alert").css(
  	"border-color", "green"
    );
setTimeout( function(){
$(".alert").css(
    "border-color", "orange"
);
  },1000);

setTimeout( function(){
$(".alert").css(
    "border-color", "dimgray"
);
  },2000);

}
}




///////////////
}
var findo=-1;
var daurl=window.location.href;
var findo=daurl.search("txori=this");
if(findo>-1)
{

$("#daLogo").after("<span id='damessage'>You've Taken the First Step; now just log in below to be taken to our featured content</span>");

}


//add http var to any urls
$(".alert a").each(function() {

var tool=$(this).attr("href");
var check1=tool.indexOf("?");
var check2=tool.lastIndexOf("?");
if(check2>check1)
{
check=1;

}
else
{
check=0;
}
var checktoo=tool.indexOf("ezproxyhost");
if(checktoo)
{
if(check>0)
{

$(this).attr("href", tool+"&txori=this");
}
else
{
$(this).attr("href", tool+"?txori=this");
}
}
});




EOT;

$new_js=fopen("alert.js", "w");
fwrite($new_js, $js);
fclose($new_js);



?>