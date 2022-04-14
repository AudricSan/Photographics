<section class='contact'>
<?php
  echo "
        <div class='contact'>
            <h2>Title</h2>
            <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. amet consectetur adipisicing.</p>

            <form class=''  method='POST' action='/email/send'  target='_self'>
                <label for='name'> Name:</label>
                <input type='name' id='name' name='name'>

                <label for='mail'> Mail:</label>
                <input type='mail' id='mail' name='mail'>

                <label for='sujet'> Sujet:</label>
                <input type='sujet' id='sujet' name='sujet'>

                <label for='message'>Votre message:</label>
                <textarea id='message' name='message' rows='2' cols='5'></textarea>

                <input class='btn validate' type='submit' value='Submit'>
            </form>
        </div>
  ";


$basicinfoDAO = new BasicInfoDAO;
$basicInfo = $basicinfoDAO->fetchAll();

foreach($basicInfo as $key => $value){  
    if ($value->_name === 'Contact Picture') {
        $pictureDAO = new PictureDAO; 
        $picture = $pictureDAO->fetch($value->_content);
    }
}

?>
</section>

<script>
var ImgRoot = "<?php echo $_SESSION['imgroot']; ?>";
var img = "<?php echo $picture->_link; ?>";
const section = document.getElementsByTagName('section');

ImgRoot = ImgRoot + "/img/";
link = ImgRoot + img;

section[0].style.backgroundImage = 'url(' + link + ')';
console.log(section)
console.log(link)
</script>