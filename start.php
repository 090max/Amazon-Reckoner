<!DOCTYPE html>
<html>
    <head>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="icon" href="icon.png">
        <title>Reckoner</title>
        <style>
            body{
                margin: 0;
                width:100vw;

                }



input#search-bar1{
  
  width: 40vw;
  height: 6vh;
  overflow: hidden;
  position: relative;
    z-index:0;
    padding-right: 5vw;
  font-size: 1rem;
  border: 1px solid #D0CFCE;
  outline: none;

 }
.search-icon{
  position: relative;
  float: right;
  width: 4vw;
  height: 6vh;
  margin-top:2.2vh;
   margin-right:2vw;
    z-index: 1;
}
#img{
  
  margin-left: 3vw;
  height:20vh;
  position: relative;
  float: left;
  overflow-y: hidden;
}
#img img{
height: 20vh;
width:20vh;

}
            header{
                position: absolute;
                width: 100vw;
                height: 20vh;
                top: 0px;
                left: 0px;
                background-color: #83aff7;
              

            } 
            header div{
                display:inline-block;
            }
            #form{
              float: right;
              width:40vw;
                float: right;
             display: inline-block;
             margin-top:7vh;
             overflow: hidden;
             margin-right: 10vw;
             height: 8vh;
            }















            
            @media only screen and (max-width: 480px)
            {
                body{
                    
                    overflow: hidden;
                    width:100vw;
                    margin:0;

                }
                header{
                    width: 100vw;
                    display: flex;
                   height:25vh;
                }
                header div{
                          display: block;

                }
                #img{
                  top:0;
                  width: 100vw;
                  height:12vh;
                  margin-left:0;
                  flex: 1;
                  position: relative;
                  z-index: 0;
                   position: absolute;
                }
                #img img{
                  margin-left: 30vw;
                  height:12vh;
                  z-index: 0;
                  
                }

                   #show_product{
                             margin-left:1vw;
                            display:flex;
                            flex-direction: column; 
                           padding: 0px;
                           margin-top: 6vh;
                           width: 100vw;
                         }



              input#search-bar1{
  
  width: 80vw;
  height: 6vh;
  margin-left: 10vw;
  position: relative;
    z-index:0;
  
  font-size: 0.8em;
  border: 1px solid #D0CFCE;
  outline: none;

 }
            
            #form{
              float: left;
              width:100vw;
                height: 13vh;
                position: relative;
             
             margin-top: 13vh;
            padding: 0px;
            z-index: 0;
            flex: 1;
            }
            .prod_info{
              font-size: 0.8em;
              width:100vw;
              word-wrap: break-word;
              float:none;
              clear: both;
              
            }
            .img_info{
              float: none;
              margin-left:10vw;
              margin-top: 3vh;
            }
                .search-icon{
                      position: absolute;
                      
                      width: 5.5vw;
                      height: 5.5vh;
                     margin-top:11vh;
                     
                     z-index: 1;
                }

                
              
            }


            @media only screen and (max-width: 900px) and (min-width: 480px)
            {
                body{
                    
                    overflow: auto;
                    width:100vw;
                    margin:0;

                }
                header{
                    width: 100vw;
                    display: flex;
                   height:25vh;
                }
                header div{
                          display: block;

                }
                #img{
                  top:0;
                  width: 100vw;
                  height:12vh;
                  margin-top:0.5vh;
                  margin-left:0;
                  flex: 1;
                  position: relative;
                  z-index: 0;
                   position: absolute;
                }
                #img img{
                  margin-left: 50vw;
                  height:12vh;
                  z-index: 0;
                  
                }

                   #show_product{
                             margin-left:1vw;
                            display:flex;
                            flex-direction: column; 
                           padding: 0px;
                           margin-top: 6.5vh;
                           width: 100vw;
                         }



              input#search-bar1{
  
  width: 80vw;
  height: 6vh;
  margin-left: 10vw;
  position: relative;
    z-index:0;
  
  font-size: 0.8em;
  border: 1px solid #D0CFCE;
  outline: none;

 }
            
            #form{
              float: left;
              width:100vw;
                height: 13vh;
                position: relative;
             
             margin-top: 13vh;
            padding: 0px;
            z-index: 0;
            flex: 1;
            }
            .prod_info{
              font-size: 0.8em;
              width:100vw;
              word-wrap: break-word;
              float:none;
              clear: both;
              
            }
            .img_info{
              float: none;
              margin-left:10vw;
              margin-top: 3vh;
            }
                .search-icon{
                      position: relative;
                      
                      width: 5.5vw;
                      height: 8vh;
                     margin-top:8vh;
                     
                     z-index: 1;
                }

                
              
            }
        </style>
    </head>
    <body>
<script>
             function urlGetter1()
        {
            var a = document.getElementById('search-bar1').value;
            
            window.location.href="index.php?search="+a;
        }
</script>

        <header>
        <div id="img">
           <img src="img/logo3.png">
           </div>
       <div id="form">
        <form method="GET" >
    
    <input type="text" id="search-bar1" name="search" placeholder="Enter The Url of the item">
    <img onclick="urlGetter1();" id="butt" class="search-icon" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png">
  </form>
            </div>
        </header>

      <main>
      </main>
  