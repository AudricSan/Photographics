<section>
<?php
$a = 50;

$img = [
  '1.jpg',
  '2.jpg',
  '3.jpg',
  '4.jpg',
  '5.jpg',
  '6.jpg'
];

$title = 'Title Pages';
$subtitle = 'Sub Title Pages';

echo "  <div class='title'>
          <h2>$title</h2>
          <h3>$subtitle</h3>
          </div>
";

echo "<div class='gallery'>";

for ($i=0; $i < $a; $i++) { 
  $z = random_int(1,5);
  $p = $img[$z];

  echo "<div class='media'>
          <a href='#'>
            <img src='/public/img/img/$p' alt=''></a>

          <div>
            <a href='#'>
              <i class='fa-solid fa-heart'></i></a>
            <a href='#'>
              <i class='fa-solid fa-share-nodes'></i></a>
          </div>
        </div>";
}

echo "</div>";
?>
</section>