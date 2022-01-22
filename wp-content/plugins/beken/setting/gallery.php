
  <div id="carousel" class="carousel slide" data-ride="carousel">

    <ol class="carousel-indicators">

    </ol>
    <div class="carousel-inner" action="/action_page.php">
    <div class="carousel-item active">

     
              
                <?php 
          
          for($x =0 ;$x<$;$x++){
              echo '  <div class="carousel-item active">
              <img class="d-block" src="'.$urls[$x].'" >
              </div>';
          }
          ?>

    </div>
    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
