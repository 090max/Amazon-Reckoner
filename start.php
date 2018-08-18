<!DOCTYPE html>
<html>
    <head>
        <title>Reckoner</title>
        <style>
            body{
  padding-top: 60px;
}

.search-container{
  width: 40%;;
  display: block;
margin: 2em;
    padding-top: 1.5em;
}

input#search-bar{
  margin: 0 auto;
  width: 100%;
  height: 45px;
  padding: 0 20px;
  font-size: 1rem;
  border: 1px solid #D0CFCE;
  outline: none;
  &:focus{
    border: 1px solid #008ABF;
    transition: 0.35s ease;
    color: #008ABF;
    &::-webkit-input-placeholder{
      transition: opacity 0.45s ease; 
  	  opacity: 0;
     }
    &::-moz-placeholder {
      transition: opacity 0.45s ease; 
  	  opacity: 0;
     }
    &:-ms-placeholder {
     transition: opacity 0.45s ease; 
  	 opacity: 0;
     }    
   }
 }
.search-icon{
  position: relative;
  float: right;
  width: 75px;
  height: 75px;
  top: -62px;
  right: -10px;
}
            #abs{
                position: absolute;
                width: 100%;
                max-height: 20%;
                top: 0px;
                left: 0px;
                background-color: #83aff7;
                display: inline-flex;
            } 
            #right{
                margin-left: auto;
                margin-right: 5em;
                
            }
        </style>
    </head>
    <body>
        <div id="abs">
           
        <form class="search-container" method="get" >
    <input type="text" id="search-bar" name="search" placeholder="Enter The Url of the item">
    <a href="" name="sub"><img class="search-icon" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
  </form>
            <img src="img/logo3.png" id="right">
        </div>
  <?php
        if(isset($_GET['sub']))
        {
            $a=$_GET['search'];
            header("location:index.php/?search=$a");
        }
        ?>