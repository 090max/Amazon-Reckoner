<!DOCTYPE html>
<html>
    <head>
                <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Reckoner</title>
        <style>
            body{
                margin: 0;
                width:100vw;
                overflow: hidden;
}

.search-container{
  width: 30vw;;
  display: block;
margin-top:8vh;
margin-right: 10vw;
            }


input#search-bar{
  margin: 0 auto;
  width: 100%;
  height: 45px;
  padding-right:40px;
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
                width: 100vw;
                height: 20vh;
                top: 0px;
                left: 0px;
                background-color: #83aff7;
                display: inline-flex;
            } 
            #right{
                margin-left: 2em;
                margin-right: auto;
                
            }
            @media only screen and (max-width: 480px)
            {
                body{
                    overflow: hidden;
                    width:100%;
                    margin:0;
                }
                #abs{
                    width: 100%;
                    position:absolute
                }
                #right{
                    position: absolute;
                    top: -50%;
                    left: 15%;
                }
             #search-bar{
                    position: relative;
                    left: -40vw;
                    transform: scaleX(1.5);
                 width: 90%;
                    padding-right: 4vw;
                 
                    
                }
                .search-icon{
   position: relative;
  float: right;
  width: 75px;
  height: 75px;
  top: -62px;
  right: -10px;
   margin-left:80.5vw;
    z-index: 1
                }
                form{
                    width: 100%;
                }
                input#search-bar{
                    padding-right: 20px;
                    width: 180%;
                }
              
            }
        </style>
    </head>
    <body>
        <div id="abs">
           <img src="img/logo3.png" id="right">
        <form class="search-container" method="get" >
    <input type="text" id="search-bar" name="search" placeholder="Enter The Url of the item">
    <a href="<?php echo '?search='.$_GET['search'];?>" name="sub"><img class="search-icon" src="img/icon.png"></a>
  </form>
            
        </div>
  <?php
        if(isset($_GET['sub']))
        {
            $a=$_GET['search'];
            header("location:index.php/?search=$a");
        }
        ?>