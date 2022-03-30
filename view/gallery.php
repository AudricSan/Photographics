<?php
$a = 50;

$img = [
  '1.jpg',
  '2.jpg',
  '3.jpg',
  '4.jpg',
  '5.jpg',
  '6.jpg',
  '7.jpg',
  '8.jpg',
  '9.jpg',
  '10.jpg',
  '11.jpg',
];


echo "<div class='gallery'>";

for ($i=0; $i < $a; $i++) { 
  $z = random_int(1,10);
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
