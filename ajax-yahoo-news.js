console.log("ajax script here");

// ajax that gets JSON via JQuery
/* this gets the data from a json encoded object

$("#mainTagline").html("Dynamically Changed");


$.ajax({
    type:"POST",
    contentType:"application/json; charset=UTF-8",
    url:"dynamic/service1.php",
    dataType:"JSON",
    success: function(result) {
        console.log(result);
        var text = "<ul>Product List from JSON";
        for (i = 0; i < result.length; i++) {
	    text = text + "<li>" + result[i][1] + "</li>";
            console.log(text);
	    }
        text = text + "</ul>";
        console.log(text);
        $("#products").html(text);
    },
    error:function(e) {
         console.log(e);
    },
    complete:function() {
         console.log("complete function will fire automatically");
    }    
});

*/

nocache = "&nocache=" + Math.random() * 1000000
url     = "rss.news.yahoo.com/rss/topstories"
out     = ""

request = new ajaxRequest()
request.open("GET", "xmlget.php?url=" + url + nocache, true)

request.onreadystatechange = function()
    {
        if (this.readyState == 4)
        {
            if (this.status == 200)
            {
                if (this.responseText != null)
                    {
                        titles = this.responseXML.getElementsByTagName('title')
                        links  = this.responseXML.getElementsByTagName('link')
                        
                        for (j = 1; j < 15 ; ++j)
                        {
                            out += '<a href="' + // open paragraph tag, link tag
                                    links[j].childNodes[0].nodeValue + // link target
                                    '">' + // end open link tag
                                    titles[j].childNodes[0].nodeValue + // article title, which is also link text
                                    '</a><br>'  // end link tag, paragraph tag
                        }
                        document.getElementById('info').innerHTML = '<p>' + out + '</p>'
                    }
                else alert("Ajax error: No data received")
            }
            else alert("Ajax error: " + this.statusText)
        }
    }

request.send(null)

function ajaxRequest()
{
    try
    {
        var request = new XMLHttpRequest ();
    }
    catch(e1)
    {
        try
        {
            request = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch(e2)
            {
                try
                    {
                        request = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    catch(e3)
                    {
                        request = false;
                    }
            }
    }
    return request;
}
