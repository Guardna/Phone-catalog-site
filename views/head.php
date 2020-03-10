<?php if(isset($_SESSION['greske'])):
			var_dump($_SESSION['greske']);
			unset($_SESSION['greske']);
		?>
		<?php endif; ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Phone Prodaja</title>
<link rel="icon" type="image/jpg" href="images/ikonica.png" />
<meta name="author" content="Stefan Popovic" />
<meta name="keywords" content="iphone,samsung,huawei,xiaomi" />
<meta name="description" content="Prodaja telefona" />
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
<script type="text/javascript" src="js/provera.js"></script>
<script type="text/javascript" src="js/poll.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="js/highslide/highslide.js"></script>
<link rel="stylesheet" type="text/css" href="js/highslide/highslide.css" />
<script>
$(document).ready(function(){
  $('#login-trigger').click(function(){
    $(this).next('#login-content').slideToggle();
    $(this).toggleClass('active');          
    
    if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
      else $(this).find('span').html('&#x25BC;')
    })
});
</script>
<script type="text/javascript">
    hs.graphicsDir = 'js/highslide/graphics/';
</script>

<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "top_nav", 
	orientation: 'h', 
	classname: 'ddsmoothmenu', 
	contentsource: "markup"
})

</script>

<link rel="stylesheet" type="text/css" media="all" href="css/jquery.dualSlider.0.2.css" />

<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="js/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="js/jquery.timers-1.2.js" type="text/javascript"></script>
<script src="js/jquery.dualSlider.0.3.min.js" type="text/javascript"></script>

<script type="text/javascript">
    
    $(document).ready(function() {
        
        $(".carousel").dualSlider({
            auto:true,
            autoDelay: 6000,
            easingCarousel: "swing",
            easingDetails: "easeOutBack",
            durationCarousel: 1000,
            durationDetails: 600
        });
        
    });
    
</script>

</head>