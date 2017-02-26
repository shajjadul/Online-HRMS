// JavaScript Document
function show(str)
{
if (str.length==0)
  {
  document.getElementById("3nd").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("3nd").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","js_identification_id.php?q="+str,true);
xmlhttp.send();
}

// JavaScript Document
