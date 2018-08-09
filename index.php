

<p id="demo">c</p>
<?php
 @$html = file_get_contents('https://www.amazon.in/s/field-keywords=smartphones');// for getting the htmlusing @ on starting to avoid warnings 
 $pokemon_doc= new DOMDocument();
libxml_use_internal_errors(TRUE);//disable libxml errors
if(!empty($html)){//check whether the html is returned or not
              $pokemon_doc->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html
	
	$pokemon_xpath = new DOMXPath($pokemon_doc);
	//get all the h2's with an id
	$pokemon_row = $pokemon_xpath->query('//li[@id="result_0"]/div[@class="s-item-container"]/div[@class="a-fixed-left-grid"]/div[@class="a-fixed-left-grid-inner"]/div[@class="a-fixed-left-grid-col a-col-right"]/div[@class="a-row"]/div[@class="a-column a-span7"]/div[@class="a-row a-spacing-none"]/a[@class="a-link-normal a-text-normal"]');
    
   
  
  foreach($pokemon_row as $row){
    if($row->nodeValue=="prime")
          continue;
       
       $myJSON = json_encode($row->nodeValue); 
        $myJSON = str_replace("\u00a0\u00a0", "",$myJSON);
        echo $myJSON;
       $new= str_replace(",","",$myJSON);
      echo $new;
      
      echo "<script>var a=parseInt(".$new.");document.getElementById('demo').innerHTML=a+1; </script>";
  }
 
}
?>
