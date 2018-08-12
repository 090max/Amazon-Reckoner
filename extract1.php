<?php
require("PHPMailer-master/src/PHPMailer.php");
require("PHPMailer-master/src/SMTP.php");
include 'connection.php';
$q="SELECT url,email,disount FROM `cart`";
$query = @mysqli_query($hritik,$q);


 
          $discount_final=0;

      function discount_calc($discount)
     {
    preg_match('/\([^\%]+/',$discount,$disc1);
    $disc_final=str_replace("(", "", $disc1);
    $disc_final_1=(int)$disc_final[0];
    return $disc_final_1;
     } 

function setConnection($link1)
{
	$discount_final=0;

@$html = file_get_contents($link1);// for getting the htmlusing @ on starting to avoid warnings 
 $link= new DOMDocument();
libxml_use_internal_errors(TRUE);//disable libxml errors
if(!empty($html)){//check whether the html is returned or not
              $link->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html
	
	$link_xpath = new DOMXPath($link);
	
	
        
          
          
            
    	$percent=$link_xpath->query('//tr[@id="dealprice_savings"]/td[@class="a-span12 a-color-price a-size-base"]');
        $percent_books=$link_xpath->query('//div[@id="buyNewInner"]/div[@id="buyBoxInner"]/ul[@class="a-unordered-list a-nostyle a-vertical"]/li/span[@class="a-list-item"]/span[@class="a-size-base a-color-secondary"]');
       $percent_t1=$link_xpath->query('//tr[@id="regularprice_savings"]/td[@class="a-span12 a-color-price a-size-base"]');
       


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
 }
   return $discount_final;
     

}

//main code ->

if ($query) {
    // output data of each row
    while($row = mysqli_fetch_array($query)) {
        $link=$row["url"];
        $disc_given=$row["disount"];
        $discount1=  setConnection($link);//self made function

        if($discount1>$disc_given)
        {
         
         $msg="Your product has achieved the expected Discount ... Please Buy Soon  \n".$row["url"];
        	
  

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); // enable SMTP

    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587; // or 587
    $mail->IsHTML(true);
    $mail->Username = "noreplyreckoner@gmail.com";
    $mail->Password = "reckoner@31";
    $mail->SetFrom("noreplyreckoner@gmail.com","max");
    $mail->Subject = "DISCOUNT ACHIEVED :RECKONER";
    $mail->Body = $msg;
    $mail->AddAddress($row["email"]);

     if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
     } 

    $delete="DELETE FROM `cart` WHERE url = '$link' AND disount='$disc_given'";
    $del_query= @mysqli_query($hritik,$delete);
    if($del_query) {
               echo "DELETED SUCCESS";
            }
            
            
}
}
}




 else {
    echo "0 results";
}


?>