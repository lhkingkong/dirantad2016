// JavaScript Document

var xhr = null;
function getXhr()
{
     if(window.XMLHttpRequest)xhr = new XMLHttpRequest();
	else if(window.ActiveXObject)
	{
		try{
			xhr = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e)
		{
			xhr = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	else
	{
		alert("Su navigador no soporta los objetos XMLHTTPRequest...");
		xhr = false;
	}
}

function ShowZona(zona)
{
	getXhr()
	xhr.onreadystatechange = function()
    {
  		if(xhr.readyState == 4 && xhr.status == 200)
		{
			document.getElementById('zona').innerHTML=xhr.responseText;
		}
    }
	xhr.open("GET","zona.php?zona="+zona,true);
	xhr.send(null);
}

function ShowEstado(estado)
{
	getXhr()
	xhr.onreadystatechange = function()
    {
  		if(xhr.readyState == 4 && xhr.status == 200)
		{
			document.getElementById('estado').innerHTML=xhr.responseText;
		}
    }
	xhr.open("GET","estado.php?estado="+estado,true);
	xhr.send(null);
}

function ShowFormato(formato_tienda)
{
        getXhr()
        xhr.onreadystatechange = function()
    {
                if(xhr.readyState == 4 && xhr.status == 200)
                {
                        document.getElementById('formato_tienda').innerHTML=xhr.responseText;
                }
    }
        xhr.open("GET","formato_tienda.php?formato_tienda="+formato_tienda,true);
        xhr.send(null);
}

