<section>
  <?php

  if (!empty($_GET['id'])) {
    $tagDao = new TagDAO;
    $tag = $tagDao->fetch($_GET['id']);
    $title = $tag->_name;
    $subtitle = "Some of my $tag->_name";

  } else {
    $title = 'Gallery';
    $subtitle = 'Some of my Work';

  }

  echo "
    <div class='title'>
      <h2>$title</h2>
      <h3>$subtitle</h3>
    </div>
  ";

  echo "<div class='gallery'>";

  $pictureDAO = new PictureDAO;
  $pictureTagDAO = new PictureTagDAO;

  if (!empty($_GET['id'])) {
    $pictureTag = $pictureTagDAO->fetch($_GET['id']);
    foreach ($pictureTag as $key => $value) {
      $picture = $pictureDAO->fetch($value->_pic);

      echo "<div class='media'>
            <a href='/see/$picture->_id'>
              <img src='/public/images/img/$picture->_link' alt='$picture->_name'></a>
  
            <div>
              <a href='/love/$picture->_id'>
                <i class='fa-solid fa-heart'></i></a>";

      if ($picture->_sharable) {
        echo "<a href='/share/$picture->_id'><i class='fa-solid fa-share-nodes'></i></a>";
      }
      echo "</div></div>";
    }
  } else {
    $picture = $pictureDAO->fetchAll();
    foreach ($picture as $picture) {
      $pic = $pictureDAO->fetch($picture->_id);

      echo "<div class='media'>
            <a href='/see/$picture->_id'>
              <img src='/public/images/img/$pic->_link' alt='$pic->_name'></a>
  
              <div>
              <a href='/love/$picture->_id'>
                <i class='fa-solid fa-heart'></i></a>";

      if ($picture->_sharable) {
        echo "<a href='/see/$picture->_id'><i class='fa-solid fa-share-nodes'></i></a>";
      }

      echo "</div></div>";
    }
  }

  echo  '</div>';
  ?>
</section>