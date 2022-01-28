
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">

  <div >
    <?php
    $beken_image_id1 = get_option('beken_settings_image_uploader_field1');
    $beken_image_id2 = get_option('beken_settings_image_uploader_field2');
    $beken_image_id3 = get_option('beken_settings_image_uploader_field3');
    $beken_image_id4 = get_option('beken_settings_image_uploader_field4');
    
     ?>
  </div>

  <?php if(isset($beken_image_id1))
  {
    ?>

<div class="carousel-item active">
      <img class="d-block w-100" src="<?php echo esc_url(wp_get_attachment_url(isset($beken_image_id1) ? (int) $beken_image_id1 : 0)); ?>" alt="First slide">
    </div>
<?php
  } 
?>

<?php if(isset($beken_image_id2))
  {
    ?>

<div class="carousel-item ">
      <img class="d-block w-100" src="<?php echo esc_url(wp_get_attachment_url(isset($beken_image_id2) ? (int) $beken_image_id2 : 0)); ?>" alt="First slide">
    </div>

<?php
  } 
?>

<?php if(isset($beken_image_id3))
  {
    ?>

<div class="carousel-item ">
      <img class="d-block w-100" src="<?php echo esc_url(wp_get_attachment_url(isset($beken_image_id3) ? (int) $beken_image_id3 : 0)); ?>" alt="First slide">
    </div>
<?php
  } 
?>

<?php if(isset($beken_image_id4))
  {
    ?>

<div class="carousel-item ">
      <img class="d-block w-100" src="<?php echo esc_url(wp_get_attachment_url(isset($beken_image_id4) ? (int) $beken_image_id4 : 0)); ?>" alt="First slide">
    </div>
<?php
  } 
?>


  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
      

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




 
