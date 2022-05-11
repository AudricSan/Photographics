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

  include_once('../model/class/Tag.php');
  include_once('../model/dao/TagDAO.php');
  $tagDAO = new TagDAO;
  
  include_once("../model/class/Picture.php");
  include_once("../model/dao/PictureDAO.php");
  $pictureDAO = new PictureDAO;
  
  include_once("../model/class/PictureTag.php");
  include_once("../model/dao/PictureTagDAO.php");
  $pictureTagDAO = new PictureTagDAO;

  $pictureDAO = new PictureDAO;
  
  if (!empty($_GET['id'])) {
    $pictureByTag = $pictureDAO->fetchByTag($_GET['id']);
  
    foreach ($pictureByTag as $key => $value) {
      $picture = $pictureDAO->fetch($value['picture_id']);

      echo "<div class='media'>
            <a href='/see/$picture->_id'>
              <img src='/public/images/img/$picture->_link' alt='$picture->_name'></a>
  
            <div>
              <a id='$picture->_id' onclick='love(this, event)'>
                <i class='fa-solid fa-heart'></i></a>";

      if ($picture->_sharable) {
        echo "<a id='$picture->_id' onclick='share(this, event)'><i class='fa-solid fa-share-nodes'></i></a>";
      }

      echo "</div></div>";
    }
    
  } else {
    $picture = $pictureDAO->fetchAll();
    foreach ($picture as $picture) {
      $pic = $pictureDAO->fetch($picture->_id);

      echo "<div class='media'>
            <a href='/see/$pic->_id'>
              <img src='/public/images/img/$pic->_link' alt='$pic->_name'></a>
  
              <div>
              <a id='$picture->_id' onclick='love(this, event)'><i class='fa-solid fa-heart'></i></a>";

      if ($picture->_sharable) {
        echo "<a id='$picture->_id' onclick='share(this, event)'><i class='fa-solid fa-share-nodes'></i></a>";
      }

      echo "</div></div>";
    }
  }

  echo  '</div>';
  ?>
</section>