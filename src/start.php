<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="./img/icon_main.png">
  <link rel="stylesheet" type="text/css" href="./styles/start_style.css" />
  <title>Reckoner</title>

</head>

<body>
  <script>
    function urlGetter1() {
      var a = document.getElementById('search-bar1').value;

      window.location.href = "index.php?search=" + a;
    }
  </script>

  <header>
    <div id="img">
      <img src="img/logo3.png">
    </div>
    <div id="form">
      <form method="GET">

        <input type="text" id="search-bar1" name="search" placeholder="Enter The Url of the item">
        <img onclick="urlGetter1();" id="butt" class="search-icon" src="./img/icon.png">
      </form>
    </div>
  </header>

  <main>
  </main>