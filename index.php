<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="discount manager">
    <meta name="keywords" content="amazon,amazon discount,discount manager">

    <link rel="icon" href="./img/icon_main.png">
    <link rel="stylesheet" type="text/css" href="./styles/index_style.css" />
</head>

<body>
    <div id="first_one">
        <img src="img/logo3.png" id="image">
        <form class="search-container" method="get">
            <input type="text" id="search-bar" placeholder="Enter The Url of the item" name="search">
            <img onclick="urlGetter();" id="butt" class="search-icon" src="./img/icon.png">
        </form>
    </div>
    <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }


        function disply() {
            document.getElementById('id01').style.display = 'block';
            var url = "<?php $q = $_GET['search'];
                        echo $q; ?>"
            var box = document.getElementById('url');
            box.value = url;
        }

        function hide() {
            document.getElementById('id01').style.display = 'none'
        }
    </script>
    <script>
        window.onload = function() {
            document.getElementById('search-bar').focus();
        }
    </script>

    <script>
        function urlGetter() {
            var a = document.getElementById('search-bar').value;

            window.location.href = "index.php?search=" + a;
        }
    </script>
</body>
<html>


<!--<p id="demo">c</p>-->
<?php

if (isset($_GET['search'])) {
    echo "<script>
      document.getElementById('first_one').style.display='none';
    </script>";
    include 'start.php';
    $name = $_GET['search'];
    @$html = file_get_contents($name); // for getting the htmlusing @ on starting to avoid warnings 
    $link = new DOMDocument();
    libxml_use_internal_errors(TRUE); //disable libxml errors
    if (!empty($html)) { //check whether the html is returned or not
        $link->loadHTML($html);
        libxml_clear_errors(); //remove errors for yucky html

        $link_xpath = new DOMXPath($link);
        //get all the h2's with an id



        $discount_final = 0;
        $name_val = "UNTITLED";


        $image = $link_xpath->query('//div[@id="imgTagWrapperId"]/img[@id="landingImage"]');
        //$price =$link_xpath->query('//td[@class="a-span12 a-color-secondary a-size-base"]/span[@class="a-text-strike"]');
        $price = $link_xpath->query('//td[@class="a-span12"]/span[@id="priceblock_saleprice"]');
        $price_deal = $link_xpath->query('//td[@class="a-span12"]/span[@id="priceblock_dealprice"]');
        $our_price = $link_xpath->query('//td[@class="a-span12"]/span[@id="priceblock_ourprice"]');
        $percent = $link_xpath->query('//tr[@id="dealprice_savings"]/td[@class="a-span12 a-color-price a-size-base priceBlockSavingsString"]');
        $price_book = $link_xpath->query('//div[@id="soldByThirdParty"]/span[@class="a-size-medium a-color-price inlineBlock-display offer-price a-text-normal price3P"]');
        $image_books = $link_xpath->query('//img[@id="imgBlkFront"]');
        $percent_books = $link_xpath->query('//div[@id="buyNewInner"]/div[@id="buyBoxInner"]/ul[@class="a-unordered-list a-nostyle a-vertical"]/li/span[@class="a-list-item"]/span[@class="a-size-base a-color-secondary"]');
        $percent_t1 = $link_xpath->query('//tr[@id="regularprice_savings"]/td[@class="a-span12 a-color-price a-size-base priceBlockSavingsString"]');
        $name = $link_xpath->query('//span[@id="productTitle"]');



        function discount_calc($discount)
        {
            preg_match('/\([^\%]+/', $discount, $disc1);
            $disc_final = str_replace("(", "", $disc1);
            $disc_final_1 = (int) $disc_final[0];
            return $disc_final_1;
        }

        if ($name->length > 0) {
            $name_val = $name[0]->nodeValue;
        }
        if ($image->length > 0) {
            $image_src = $image[0]->getAttribute('src');
            $image_src1 = $image[0]->getAttribute('data-old-hires');
        }
        if ($image_books->length > 0) {
            $image_src = $image_books[0]->getAttribute('src');
        }
        if ($price->length > 0) {
            $price_val = $price[0]->nodeValue;
        }
        if ($price_deal->length > 0) {
            $price_val = $price_deal[0]->nodeValue;
        }
        if ($our_price->length > 0) {
            $price_val = $our_price[0]->nodeValue;
        }
        if ($price_book->length > 0) {
            $price_val = $price_book[0]->nodeValue;
        }
        if ($percent->length > 0) {
            $discount = $percent[0]->nodeValue;
            $discount_final = discount_calc($discount);
        }
        if ($percent_books->length > 0) {
            $discount = $percent_books[0]->nodeValue;
            $discount_final = discount_calc($discount);
        }
        if ($percent_t1->length > 0) {
            $discount = $percent_t1[0]->nodeValue;
            $discount_final = discount_calc($discount);
        }

        echo "<div id='show_product'>";
        echo "<div class='prod_info'>";
        echo "NAME :" . $name_val . "<br>";
        if (isset($price_val)) {
            echo "PRICE :" . $price_val . "<br>";
            // set_error_handler("customError");
            echo "DISCOUNT: " . $discount_final . " %" . "<br>";
            echo '</div>';
            echo "<div class='img_info'>";
            echo "<img height='250px' width='150px' src='$image_src1'>" . "<br>";
            echo '</div>';
            echo "<center>";
            echo "<div class='bttn_prod'>";
            echo   '<button onclick="disply();" style="width:auto;">Manage Discount</button><div id="id01" class="modal">  <form class="modal-content animate" action="action_page.php"><div class="container"><label for="Email"><b>Email:</b></label><input type="email" placeholder="Enter email" name="email" required><label for="psw"><b>Discount Wanted</b></label><input type="number" placeholder="Enter wanted discount" name="psw" required><label for="url:"><b>url:</b></label><input type="text" id="url" placeholder="url will here in a sec" name="url" value="" required readonly><button type="submit">Add to cart</button></div><div class="container" style="background-color:#f1f1f1"><button type="button" onclick="hide();" class="cancelbtn">Cancel</button></div></form></div>';
            echo '</div>';
            echo "</center>";
            echo '</div>';
        } else {
            echo "<div class='img_info'>";
            echo "<img height='250px' width='150px' src='$image_src1'>" . "<br>";
            echo '</div>';
            echo "<h1 font-color='red'>Not in stock</h1>";
        }

        //set error handler

    }
}
include 'end.php';

?>