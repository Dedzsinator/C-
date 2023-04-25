<?php 
  session_start();
  include_once "config.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>C++++</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</head>

<body>

<header>
    <ul class="list">
        <li><a href="index.php">Compiler</a></li>
        <li><a href="library.php">Program könyvtár</a></li>
        <li><a href="ask.php">Kérdezés</a></li>
        <h1 class="text-center title">C++++</h1>
        <div class="text-center">
        <?php 
            if(isset($_SESSION['unique_id']) == true){
              echo "<a href=\"./php/logout.php\" class=\"btn btn-danger \">Kijelentkezés</a>";
            }
          ?>
        </div>
        
        <div class="toggle-container">
        <input type="checkbox" id="switch" name="theme" />
        <label class="toggle" for="switch"></label>
      </div>

    </ul>
        
        
</header>
    <div class="row cspace">
      <div class="col-sm-8"><br><br>
      <?php
            $query = "select * from codes where 1 order by name asc";
            $codes = mysqli_query($db, $query);
            $num_row = mysqli_num_rows($codes);
            if ( $num_row === 0){
                echo"
                <br>
                <div class=\" text-center\">
                    <h1 style=\"text-align: center;\">Nincsenek Programok feltöltve!</h1>
                </div>
                ";
            } else {
                foreach($codes as $code){
                    $id = (int)$code["id"];
                    $name = $code["name"];
                    $prog = nl2br($code["code"]);
                    echo "
                    <button class=\"collapsible\">$name</button>
                    <div class=\"content\">
                    <p class=\"code\">$prog</p>
                    </div>
                    ";
                }
            }
        ?>
    </div>

  </div>
  <footer>
  <div class="container footerContainer">
    <div class="footer-nav flex flex-around flex-start flex-g-1">
      <div class="col flex flex-column flex-start flex-g-1">
        <span class="logo-holder">
        </span>
        <div class="social-medias flex flex-g-1">
          <a href="https://www.instagram.com/nandor_degi/" class="social-media flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
              <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
            </svg>
          </a>
          <a href="https://www.facebook.com/nandor.degi/" class="social-media flex">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" x="0px" y="0px" fill="currentColor" width="50" height="50" class="bi bi-facebook" viewBox="0 0 50 50" >
                <path d="M40,0H10C4.486,0,0,4.486,0,10v30c0,5.514,4.486,10,10,10h30c5.514,0,10-4.486,10-10V10C50,4.486,45.514,0,40,0z M39,17h-3 c-2.145,0-3,0.504-3,2v3h6l-1,6h-5v20h-7V28h-3v-6h3v-3c0-4.677,1.581-8,7-8c2.902,0,6,1,6,1V17z"></path>
            </svg>
          </a>
          <a href="https://github.com/Dedzsinator" class="social-media flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
              <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
            </svg>
          </a>
        </div>
      </div>
      
    </div>
    <div class="copyright">A teljes project elérhető githubon <a href="https://github.com/Dedzsinator/C-">ezen a linken</a>. </div>
  </div>
</footer>
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>
<script src="./js/app.js"></script>
</body>
</html>