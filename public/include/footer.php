<?php
use photographics\env;
$env = new env;

echo "
    <footer>
        <img class='divider' src='img/divider.png'>

        <div class='footer'>
            <div class='footerleft'>
                <figure> <a href='/'> <img src='img/logo.png' alt='Logo'> </a> </figure>
                <h3> <a href='/about'> Photographer Name </a> </h3>
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. rovident fugit iure vel reprehenderit
                    laboriosam amet nihil non olestiae bcaecati ut. Similique istinctio, quibusdam nisi qui quaerat
                    oluptas! Pariatur, temporibus vel. </p>
            </div>

            <img class='divider' src='img/divider2.png'>

            <div class='footerright'>
                <div class='row'>
                    <div>
                        <h3> Photographics </h3>
                        <ul>
                            <li><a href='/'>Gallery</a></li>
                            <li><a href='/'>Gallery</a></li>
                            <li><a href='/'>Gallery</a></li>
                            <li><a href='/'>Gallery</a></li>
                            <li><a href='/'>Gallery</a></li>
                        </ul>
                    </div>

                    <div>
                        <h3> Photographer Name </h3>
                        <ul>
                            <li><a href='/about'>About</a></li>
                            <li><a href='/contact'>Contact</a></li>
                            <li><a href='/'>Social</a></li>
                            <li><a href='/'>Social</a></li>
                            <li><a href='/'>Social</a></li>
                        </ul>
                    </div>
                </div>

                <div class='copy'>
                    <p> <a href='https://github.com/AudricSan/Photographics' target='_blank'> &copy;Photographics Project - 2021 </a> </p>
                    <a href='#'>Privacy-Terms</a>
                </div>
            </div>
        </div>
    </footer>
    <script src='js/nav.js'></script>
";