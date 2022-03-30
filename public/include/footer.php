<?php
use photographics\env;
$env = new env;

echo "
    <footer>
        <img class='divider' src='img/divider.png'>

        <div class='footer'>
            <div class='footerleft'>
                <figure> <img src='img/logo.png' alt='Logo'> </figure>
                <h3> Photographer Name </h3>
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. rovident fugit iure vel reprehenderit
                    laboriosam amet nihil non olestiae bcaecati ut. Similique istinctio, quibusdam nisi qui quaerat
                    oluptas! Pariatur, temporibus vel. </p>
            </div>

            <img class='divider' src='img/divider2.png'>

            <div class='footerright'>
                <div class='row'>
                    <div>
                        <p> Photography </p>
                        <ul>
                            <li>Gallery</li>
                            <li>Gallery</li>
                            <li>Gallery</li>
                            <li>Gallery</li>
                            <li>Gallery</li>
                        </ul>
                    </div>

                    <div>
                        <p> Photographer Name </p>
                        <ul>
                            <li>About</li>
                            <li>Contact</li>
                            <li>Social</li>
                            <li>Social</li>
                            <li>Social</li>
                        </ul>
                    </div>
                </div>

                <div class='copy'>
                    <p> &copy;Photographics Project - 2021 </p>
                    <a href='#'>Privacy-Terms</a>
                </div>
            </div>
        </div>
    </footer>
    <script src='js/nav.js'></script>
";