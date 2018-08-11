
<html>
    <head>
        <style>
            input[type=number], input[type=email],input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
        </style>
    </head>
<body>
<center><form method="GET">
<input id="name" type="text" name="search" placeholder="ENTER URL"><br><br>
<input type="submit" id="sub">
</form>
</center>
    <script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
   
       
function disply()
        {
            document.getElementById('id01').style.display='block';
            var url = "<?php $q=$_GET['search']; echo $q; ?>"
            var box = document.getElementById('url');
            box.value= url;
        }
        function hide()
        {
            document.getElementById('id01').style.display='none'
        }
</script>
</body>
<html>


<!--<p id="demo">c</p>-->
<?php
if(isset($_GET['search'])){
	$name=$_GET['search'];
 @$html = file_get_contents($name);// for getting the htmlusing @ on starting to avoid warnings 
 $link= new DOMDocument();
libxml_use_internal_errors(TRUE);//disable libxml errors
if(!empty($html)){//check whether the html is returned or not
              $link->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html
	
	$link_xpath = new DOMXPath($link);
	//get all the h2's with an id

	
         
          $discount_final=0;
          $name_val="UNTITLED";
          
            
    	$image = $link_xpath->query('//div[@id="imgTagWrapperId"]/img[@id="landingImage"]');
    	//$price =$link_xpath->query('//td[@class="a-span12 a-color-secondary a-size-base"]/span[@class="a-text-strike"]');
        $price =$link_xpath->query('//td[@class="a-span12"]/span[@id="priceblock_saleprice"]');
        $price_deal=$link_xpath->query('//td[@class="a-span12"]/span[@id="priceblock_dealprice"]');
        $our_price=$link_xpath->query('//td[@class="a-span12"]/span[@id="priceblock_ourprice"]');
        $percent=$link_xpath->query('//tr[@id="dealprice_savings"]/td[@class="a-span12 a-color-price a-size-base"]');
        $price_book=$link_xpath->query('//div[@id="soldByThirdParty"]/span[@class="a-size-medium a-color-price inlineBlock-display offer-price a-text-normal price3P"]');
        $image_books = $link_xpath->query('//img[@id="imgBlkFront"]');
        $percent_books=$link_xpath->query('//div[@id="buyNewInner"]/div[@id="buyBoxInner"]/ul[@class="a-unordered-list a-nostyle a-vertical"]/li/span[@class="a-list-item"]/span[@class="a-size-base a-color-secondary"]');
       $percent_t1=$link_xpath->query('//tr[@id="regularprice_savings"]/td[@class="a-span12 a-color-price a-size-base"]');
       $name=$link_xpath->query('//span[@id="productTitle"]');
     function discount_calc($discount)
     {
    preg_match('/\([^\%]+/',$discount,$disc1);
    $disc_final=str_replace("(", "", $disc1);
    $disc_final_1=(int)$disc_final[0];
    return $disc_final_1;
     }  

     if($name->length>0)
     {
        $name_val=$name[0]->nodeValue;
     }
     if($image->length>0)
     {
        $image_src=$image[0]->getAttribute('src');
     }
    if($image_books->length>0)
     {
        $image_src=$image_books[0]->getAttribute('src');
     }
     if($price->length>0)
     {
        $price_val=$price[0]->nodeValue;
     }
     if($price_deal->length>0)
     {
        $price_val=$price_deal[0]->nodeValue;
     }
        if($our_price->length>0)
     {
        $price_val=$our_price[0]->nodeValue;
     }
    if($price_book->length>0)
     {
        $price_val=$price_book[0]->nodeValue;
     }
     if($percent->length>0)
     {
        $discount=$percent[0]->nodeValue;
        $discount_final= discount_calc($discount);
     }
    if($percent_books->length>0)
     {
        $discount=$percent_books[0]->nodeValue;
        $discount_final= discount_calc($discount);
     }
    if($percent_t1->length>0)
     {
        $discount=$percent_t1[0]->nodeValue;
        $discount_final= discount_calc($discount);
     }
     echo "NAME :".$name_val."<br>";
     echo "PRICE :".$price_val."<br>";
     echo "DISCOUNT: ".$discount_final." %"."<br>";
     echo "<img src='$image_src'>"."<br>";
     echo   '<button onclick="disply();" style="width:auto;">Manage Discount</button><div id="id01" class="modal">  <form class="modal-content animate" action="action_page.php"><div class="container"><label for="Email"><b>Email:</b></label><input type="email" placeholder="Enter email" name="email" required><label for="psw"><b>Discount Wanted</b></label><input type="number" placeholder="Enter wanted discount" name="psw" required><label for="url:"><b>url:</b></label><input type="text" id="url" placeholder="url will here in a sec" name="url" value="" required><button type="submit">Add to cart</button></div><div class="container" style="background-color:#f1f1f1"><button type="button" onclick="hide();" class="cancelbtn">Cancel</button></div></form></div>';
}
}    
?>