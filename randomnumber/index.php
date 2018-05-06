<?php
    session_start();
    // form is submitted
    if (isset($_POST['modal-submit'])) {
      $min_num = $_POST['min-number'];
      $_SESSION['min_num'] = $_POST['min-number'];
      $max_num = $_POST['max-number'];
      $_SESSION['max_num'] = $_POST['max-number'];

      $rand_arr = array();
      for ($i=$min_num; $i<=$max_num; $i++) {
        $rand_arr[] = $i;
      }
      shuffle($rand_arr);
      shuffle($rand_arr);
      shuffle($rand_arr);
    }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Random Number Generator</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
    <style>
      .w3-allerta { font-family: "Allerta Stencil", Sans-serif; }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="w3-row"><br></div>
    <div class="w3-container">
      <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-green w3-large w3-allerta">Setting</button>
    </div>
    <div class="w3-row">
      <div class="w3-third w3-container">
      </div>
      <div class="w3-third w3-container w3-center">
          <br />
          <?php if (isset($_SESSION['max_num'])) {
              echo "<h4 class='w3-allerta'>Number of Random Numbers is " . $_SESSION['max_num'] . ".</h4>";
          } ?>
          <div class="w3-card-4 w3-blue-grey">
            <div class="w3-container w3-center">
              <h3 class="w3-allerta">Your Random Number <span class="w3-badge w3-white" id="display-number">0</span></h3>
              <span class="w3-badge w3-jumbo w3-red w3-padding w3-allerta" id="display-rand-number">00</span>
              <div class="w3-section w3-allerta">
                <button class="w3-button w3-green w3-large" onclick="movenext();">Next</button>
              </div>
            </div>
          </div>
      </div>
      <div class="w3-third w3-container">
      </div>
    </div>
    <br /><br />
    <footer class="w3-container w3-center w3-allerta">
      <p>&copy; 2017 bis.fms.psu.ac.th. All rights reserved.</p>
    </footer>


    <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:350px">
            <div class="w3-center"><br>
              <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
            </div>

            <form class="w3-container" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="w3-section">
                  <label><b>Minimum Number</b></label>
                  <input class="w3-input w3-border w3-margin-bottom" type="number" placeholder="Enter a minimum number" name="min-number" value="1" required>
                  <label><b>Maximum Number</b></label>
                  <input class="w3-input w3-border w3-margin-bottom" type="number" placeholder="Enter a maximum number" name="max-number" required>
                  <!-- <label><b>Number of Random Numbers</b></label>
                  <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter number of random number" name="rand_num" required> -->
                  <button class="w3-button w3-block w3-green w3-section w3-padding w3-allerta" name="modal-submit" type="submit">Generate Random Numbers</button>
                </div>
            </form>

            <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
              <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red w3-allerta">Cancel</button>
            </div>

        </div>
    </div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="jquery.fireworks.js"></script>
    <script type="text/javascript">
        var jrand_array = <?php echo json_encode($rand_arr); ?>;
        var current = 0;
        var mcurrent = 0;
        function zeropad(num, size){
          return ('000000000' + num).substr(-size);
        }
        function movenext(){
          if(current == jrand_array.length - 1) {
            current = 0;
            mcurrent = jrand_array.length;
          } else {
            current++;
            mcurrent = current;
          }
          document.getElementById("display-number").innerHTML = mcurrent;
          document.getElementById("display-rand-number").innerHTML = zeropad(jrand_array[current], 2);
        }
    </script>
    <!-- <script>
      $('.w3-row').fireworks({
        sound: false, // sound effect
        opacity: 0.2,
        width: '100%',
        height: '100%'
      });
    </script> -->

  </body>
</html>
