<section>
  <?phP

  if (!empty($_GET['id'])) {
    $tagDao = new TagDAO;
    $tag = $tagDao->fetch($_GET['id']);

    $title = $tag->_name;
    $subtitle = "Some of my $tag->_name";
  }else{
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

  include("../model/class/Picture.php");
  include("../model/dao/PictureDAO.php");
  $pictureDAO = new PictureDAO;
  
  include("../model/class/PictureTag.php");
  include("../model/dao/PictureTagDAO.php");
  $pictureTagDAO = new PictureTagDAO; 

  if (!empty($_GET['id'])) {
    $pictureTag = $pictureTagDAO->fetch($_GET['id']);
    // var_dump($pictureTag);

    foreach ($pictureTag as $key => $value) {
      // var_dump($value->_pic);
      $picture = $pictureDAO->fetch($value->_pic);

      echo "<div class='media'>
            <a href='#'>
              <img src='/public/img/img/$picture->_link' alt='$picture->_name'></a>
  
            <div>
              <a href='#'>
                <i class='fa-solid fa-heart'></i></a>
              <a href='#'>
                <i class='fa-solid fa-share-nodes'></i></a>
            </div>
          </div>";
    }


  }else{
    $picture = $pictureDAO->fetchAll();
    foreach ($picture as $picture) {  
      $pic = $pictureDAO->fetch($picture->_id);
      echo "<div class='media'>
            <a href='#'>
              <img src='/public/img/img/$pic->_link' alt='$pic->_name'></a>
  
            <div>
              <a href='#'>
                <i class='fa-solid fa-heart'></i></a>
              <a href='#'>
                <i class='fa-solid fa-share-nodes'></i></a>
            </div>
          </div>";
    }
  }

  echo  '</div>';
  ?>
</section>