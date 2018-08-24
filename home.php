<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>William Schamovic | Home</title>
  <link href="css/custom.css?v=3" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <link rel="stylesheet" href="projects.css">
</head>
<body>
  <header id="top" class="header" data-parallax="scroll" data-image-src="0.jpg">
    <div class="text-vertical-center">
      <div class="header-text">
        <div class="author_image-wrapper tilt">
          <h1>William</h1>
          <div class="author_image">
            <div id ="image"></div>
            </div>
          </div>
          <h1>Schamovic</h1>
          <a href="#resume" class="btn btn-dark btn-lg">Resume</a>
          <a href="#portfolio" class="btn btn-dark btn-lg">Portfolio</a>
        </div>
    </div>
  </header>
  <section>
    <embed id="resume" src="william.pdf" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">
    </embed>
  </section>
  <section id="portfolio" class="portfolio">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-lg-offset-1 text-center">
          <div class="row">
            <div class="col-md-4 col-sm-6">
              <div class="portfolio-item">
                <div class="card">
                  <div class="card_image">
                    <img src="img/portfolio-7.png" alt="" class="image">
                    <i class="fa fa-heart-o" onclick="favorite(this);"></i>
                  </div>
                  <div class="cardContent">
                    <a href="index.php?action=map" target="_blank"><button class="cardContentButton"><i class="fa fa-external-link" aria-hidden="true"></i></button></a>
                    <p class="cardContentName">React Map Search</p>
                    <p class="cardContentJob"><a href="index.php?action=map" target="_blank">Visit Site</a></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="portfolio-item">
                <div class="card">
                  <div class="card_image">
                    <img src="img/portfolio-19.png" alt="" class="image">
                    <i class="fa fa-heart-o" onclick="favorite(this);"></i>
                  </div>
                  <div class="cardContent">
                    <a href="index.php?action=snake" target="_blank"><button class="cardContentButton"><i class="fa fa-external-link" aria-hidden="true"></i></button></a>
                    <p class="cardContentName">Snake Game</p>
                    <p class="cardContentJob"><a href="index.php?action=snake" target="_blank">Visit Site</a></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="portfolio-item">
                <div class="card">
                  <div class="card_image">
                    <img src="img/portfolio-20.png" alt="" class="image">
                    <i class="fa fa-heart-o" onclick="favorite(this);"></i>
                  </div>
                  <div class="cardContent">
                    <a href="index.php?action=crud" target="_blank"><button class="cardContentButton"><i class="fa fa-external-link" aria-hidden="true"></i></button></a>
                    <p class="cardContentName">CRUD</p>
                    <p class="cardContentJob"><a href="index.php?action=crud" target="_blank">Visit Site</a></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="portfolio-item">
                <div class="card">
                  <div class="card_image">
                    <img src="img/portfolio-18.png" alt="" class="image">
                    <i class="fa fa-heart-o" onclick="favorite(this);"></i>
                  </div>
                  <div class="cardContent">
                    <a href="index.php?action=login" target="_blank"><button class="cardContentButton"><i class="fa fa-external-link" aria-hidden="true"></i></button></a>
                    <p class="cardContentName">Log In</p>
                    <p class="cardContentJob"><a href="index.php?action=login" target="_blank">Visit Site</a></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="portfolio-item">
                <div class="card">
                  <div class="card_image">
                    <img src="img/portfolio-16.png" alt="" class="image">
                    <i class="fa fa-heart-o" onclick="favorite(this);"></i>
                  </div>
                  <div class="cardContent">
                    <a href="index.php?action=ant" target="_blank"><button class="cardContentButton"><i class="fa fa-external-link" aria-hidden="true"></i></button></a>
                    <p class="cardContentName">Ant Display</p>
                    <p class="cardContentJob"><a href="index.php?action=ant" target="_blank">Visit Site</a></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="portfolio-item">
                <div class="card">
                  <div class="card_image">
                    <img src="img/portfolio-17.png" alt="" class="image">
                    <i class="fa fa-heart-o" onclick="favorite(this);"></i>
                  </div>
                  <div class="cardContent">
                    <a href="index.php?action=youtube" target="_blank"><button class="cardContentButton"><i class="fa fa-external-link" aria-hidden="true"></i></button></a>
                    <p class="cardContentName">Mini YouTube Clone</p>
                    <p class="cardContentJob"><a href="index.php?action=youtube" target="_blank">Visit Site</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  <script src="/jquery-3.3.1.min.js"></script>
  <script src="/bootstrap-4.1.0-dist/js/bootstrap.min.js "></script>
  <script src="projects.js"></script>
</body>
</html>