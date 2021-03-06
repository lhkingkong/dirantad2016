<link href="css/flexisel.css" rel="stylesheet" type="text/css" /> 
<ul id="flexiselDemo3">
    <li><img src="images/logos/100x100/walmart.jpg" style="height: 100px; width: 100px" /></li>                                                 
    <li><img src="images/logos/100x100/viana.jpg"  style="height: 100px; width: 100px" /></li>                                                 
    <li><img src="images/logos/100x100/zara.jpg"  style="height: 100px; width: 100px" /></li>                                                 
    <li><img src="images/logos/100x100/terra.jpg"  style="height: 100px; width: 100px" /></li>                                                 
    <li><img src="images/logos/100x100/waldos.jpg"  style="height: 100px; width: 100px" /></li>                                                 
    <li><img src="images/logos/100x100/sumesa.jpg"  style="height: 100px; width: 100px" /></li>                                                 
    <li><img src="images/logos/100x100/smart.jpg"  style="height: 100px; width: 100px" /></li>                                                 
    <li><img src="images/logos/100x100/soriana.jpg"  style="height: 100px; width: 100px" /></li>                                                 
    <li><img src="images/logos/100x100/ley.jpg"  style="height: 100px; width: 100px" /></li>                                                 
    <li><img src="images/logos/100x100/milano.jpg"  style="height: 100px; width: 100px" /></li>                                                 
    <li><img src="images/logos/100x100/merco.jpg"  style="height: 100px; width: 100px" /></li>                                                 
    <li><img src="images/logos/100x100/merza.jpg"  style="height: 100px; width: 100px" /></li>                                                 
    <li><img src="images/logos/100x100/klyns.jpg"  style="height: 100px; width: 100px" /></li>                                                 
    <li><img src="images/logos/100x100/heb.jpg"  style="height: 100px; width: 100px" /></li>                                                 
    <li><img src="images/logos/100x100/mz.jpg"  style="height: 100px; width: 100px" /></li>                                                 
    <li><img src="images/logos/100x100/ofix.jpg"  style="height: 100px; width: 100px" /></li>                                                 
    <li><img src="images/logos/100x100/pitico.jpg"  style="height: 100px; width: 100px" /></li>                                                 
    <li><img src="images/logos/100x100/recubre.jpg"  style="height: 100px; width: 100px" /></li>                                                 
    <li><img src="images/logos/100x100/sams.jpg"  style="height: 100px; width: 100px" /></li>                                                 
    <li><img src="images/logos/100x100/mambo.jpg"  style="height: 100px; width: 100px" /></li>                                                 
</ul>    

<script type="text/javascript" src="http://code.jquery.com/jquery-1.12.1.min.js"></script>
<script type="text/javascript" src="js/jquery.flexisel.js"></script>

<script type="text/javascript">

$(window).load(function() {
	
    $("#flexiselDemo3").flexisel({
        visibleItems: 8,
        animationSpeed: 800,
        autoPlay: true,
        autoPlaySpeed: 800,            
        pauseOnHover: true,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: { 
            portrait: { 
                changePoint:480,
                visibleItems: 1
            }, 
            landscape: { 
                changePoint:640,
                visibleItems: 2
            },
            tablet: { 
                changePoint:768,
                visibleItems: 3
            }
        }
    });
    
});
</script>