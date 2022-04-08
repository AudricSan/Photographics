<section>
  <?php

  echo "<div class='gallery'>";

  $pictureDAO = new PictureDAO;
  $pic = $pictureDAO->fetch($id);

      echo "<div class='media see'>
        <img src='/public/images/img/$pic->_link' alt='$pic->_name'>
      <div>'</div>";
  ?>
</section>