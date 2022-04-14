<div id="top"></div>

<!--
    [![Contributors][contributors-shield]][contributors-url]
    [![Forks][forks-shield]][forks-url]
    [![Stargazers][stars-shield]][stars-url]
    [![Issues][issues-shield]][issues-url]
    [![MIT License][license-shield]][license-url]
    [![LinkedIn][linkedin-shield]][linkedin-url]
-->

<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/AudricSan/Photographics/">
    <img src="public/images/logo.png" alt="Logo">
  </a>

<h3 align="center">Photographics</h3>
  <p align="justify">
Photographics is a free and open source project for photographers who want to swiftly submit their photos to the internet. This project seeks to make managing your photographs as simple and quick as possible.
It gives the photographer total control over his images by allowing him to tag and share them.
Photographics is an open source project that is completely free!
A site where you may save all of your images in one location.
<br />

  <p align="center">
    <a href="https://github.com/AudricSan/Photographics"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="http://photo.audricrosier.be">View Demo</a>
    ·
    <a href="https://github.com/AudricSan/Photographics/issues">Report Bug</a>
    ·
    <a href="https://github.com/AudricSan/Photographics/issues">Request Feature</a>
  </p>
</div>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

[![Product Name Screen Shot][product-screenshot]](https://photo.audricrosier.be)

Here's a blank template to get started: To avoid retyping too much info. Do a search and replace with your text editor for the following: `AudricSan`, `Photographics`, `AudricSan`, `audricrosier`, `audricrosier@gmail.com_client`, `audricrosier@gmail.com`, `photographics`, `project_description`

<p align="right">(<a href="#top">back to top</a>)</p>

### Built With
* [PHP](https://php.net/)
* [JavaScript](https://www.javascript.com/)
* [HTML](https://html.com/)
* [CSS](https://developer.mozilla.org/fr/docs/Web/CSS)
* [SCSS](https://sass-lang.com/)

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started
This is an example of how you can give instructions on setting up your project locally or online.
To set up a local copy and get it running, follow the steps below.

### Prerequisites
It is a list of the elements necessary to use the software and to install them.
* 
  ```sh
  php 7.4
  MYSQL v.5.6
  ```

### Installation
1. Install Wamp local sever.
   ```sh
   https://www.wampserver.com/
   ```
1. Clone the repo.
   ```sh
   git clone https://github.com/AudricSan/Photographics.git
   ```
1. Put photographics in Wamp www folder.
   ```sh
   C:\wamp64\www\[PHOTOGRAPHICS FOLDER]
   ```
1. Create a Vhost in Wamp to use Photographics.

1. Create the Database in PHP my admin
   ```sh
   [PHOTOGRAPHICS FOLDER]\model\sql\db.sql
   ```

1. Edit Env.php with your Database info
   ```sh
   [PHOTOGRAPHICS FOLDER]\model\class\env.php
   ```
   ```php
        private $env = [
        //APP
        'APP_NAME' => 'photographics',
        'APP_KEY' => '',

        //DATABASE
        'DB_HOST' => 'localhost',
        'DB_USERNAME' => 'root',
        'DB_PASSWORD' => 'root',
        'DB_NAME' => 'photographics',
        'DB_PORT' => 3306
        ];
   ```
1. You can now Connect to the Admin platform
   ```sh
   [YOUR VHOST LINK]/admin
   ```
   ```sh
   Login: admin
   password: password
   ```
1. Add a new admin and Remove de Default Admin

<p align="right">(<a href="#top">back to top</a>)</p>

<!-- USAGE -->
## Usage
This project was designed so that the photographer's cache can with a minimum of knowledge easily host his photos online via a turnkey site!

these person uses the project !
<div align="center">
	<img src="/public/images/docs/audricsan.png" alt="friends">
	<img src="/public/images/docs/audricsan.png" alt="friends">
	<img src="/public/images/docs/audricsan.png" alt="friends">
</div>

_For more examples, please refer to the [Documentation](https://example.com)_

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- ROADMAP -->
## Roadmap
- [ ] Feature 1
- [ ] Feature 2
- [ ] Feature 3
    - [ ] Nested Feature

See the [open issues](https://github.com/AudricSan/Photographics/issues) for a full list of proposed features (and known issues).

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- CONTRIBUTING -->
## Contributing
Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE.txt` for more information.

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- CONTACT -->
## Contact

Your Name - [@AudricSan](https://twitter.com/AudricSan) - audricrosier@gmail.com@audricrosier@gmail.com_client.com

Project Link: [https://github.com/AudricSan/Photographics](https://github.com/AudricSan/Photographics)

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- ACKNOWLEDGMENTS -->
## Acknowledgments

* []()
* []()
* []()

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/AudricSan/Photographics.svg?style=for-the-badge
[contributors-url]: https://github.com/AudricSan/Photographics/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/AudricSan/Photographics.svg?style=for-the-badge
[forks-url]: https://github.com/AudricSan/Photographics/network/members
[stars-shield]: https://img.shields.io/github/stars/AudricSan/Photographics.svg?style=for-the-badge
[stars-url]: https://github.com/AudricSan/Photographics/stargazers
[issues-shield]: https://img.shields.io/github/issues/AudricSan/Photographics.svg?style=for-the-badge
[issues-url]: https://github.com/AudricSan/Photographics/issues
[license-shield]: https://img.shields.io/github/license/AudricSan/Photographics.svg?style=for-the-badge
[license-url]: https://github.com/AudricSan/Photographics/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/audricrosier
[product-screenshot]: public/images/logo2.png
[product-logo]: public/images/logo.png
