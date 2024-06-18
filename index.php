<?php
function get_CURL($url)
{
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec($curl);
  curl_close($curl);

  return json_decode($result, true);
}

$result = get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCFouJQdSHxGVeY4vUr63aSA&key=AIzaSyDHyMx1y9y9NnFHXeeaR6r4sNXJgcPVHYs');


$youtubeProfilePic = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
$channelName = $result['items'][0]['snippet']['title'];
$subscriber = $result['items'][0]['statistics']['subscriberCount'];

// latest video
$urlLatestVideo = 'https://www.googleapis.com/youtube/v3/search?part=snippet&key=AIzaSyD8DURuNirQIczMbaHhlRNff4YGnHfWWEI&maxResults=1&channelId=UCFouJQdSHxGVeY4vUr63aSA&order=date';

$result = get_CURL($urlLatestVideo);

$latestVideoId = $result['items'][0]['id']['videoId'];


// Instagram API
$accessToken = '2934880.f0b022f.ed7efe3174cc4a41a5fc7bf68eabd909';
$result = get_CURL('https://api.instagram.com/v1/users/self/?access_token=' . $accessToken);

// var_dump($result);

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
    integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous" />

  <!-- My CSS -->
  <link rel="stylesheet" href="css/style.css" />

  <title>Selma Portfolio</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#home">Selma Septialican</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#social">Social Media</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#portfolio">Portfolio</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="jumbotron" id="home">
    <div class="container">
      <div class="text-center">
        <img src="<?= $youtubeProfilePic; ?>" class="rounded-circle img-thumbnail" />
        <h1 class="display-4">Selma Septialican</h1>
        <h3 class="lead">Student | Programmer</h3>
      </div>
    </div>
  </div>

  <!-- About -->
  <section class="about pt-4" id="about">
    <div class="container">
      <div class="row pt-4 mb-4">
        <div class="col text-center">
          <h2>About</h2>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-5">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus,
            molestiae sunt doloribus error ullam expedita cumque blanditiis
            quas vero, qui, consectetur modi possimus. Consequuntur optio ad
            quae possimus, debitis earum.
          </p>
        </div>
        <div class="col-md-5">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus,
            molestiae sunt doloribus error ullam expedita cumque blanditiis
            quas vero, qui, consectetur modi possimus. Consequuntur optio ad
            quae possimus, debitis earum.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- YouTube & IG -->
  <section id="social" class="social bg-light pt-4">
    <div class="container">
      <div class="row pt-4 mb-4">
        <div class="col text-center">
          <h2>Social Media</h2>
        </div>
      </div>

      <div class="row align-items-center justify-content-center">
        <div class="col-md-5">
          <div class="row">
            <div class="col-md-4">
              <img src="<?= $youtubeProfilePic; ?>" width="200" class="rounded-circle img-thumbnail">
            </div>
            <div class="col-md-8">
              <h5><?= $channelName; ?></h5>
              <p><?= $subscriber; ?> Subscribers</p>
              <div class="g-ytsubscribe" data-channelid="UCFouJQdSHxGVeY4vUr63aSA" data-layout="default"
                data-count="default"></div>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="row">
            <div class="col">
              <h5 class="text-center mb-2">Latest video! 👇</h5>
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $latestVideoId; ?>"
                  allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>

  <!-- Portfolio -->
  <section class="portfolio pt-4" id="portfolio">
    <div class="container">
      <div class="row pt-4 mb-4">
        <div class="col text-center">
          <h2>Portfolio</h2>
        </div>
      </div>

      <div class="row">
        <div class="col-md mb-4">
          <div class="card">
            <img class="card-img-top" src="img/thumbs/1.png" alt="Card image cap" />
            <div class="card-body">
              <p class="card-text">
                Some quick example text to build on the card title and make up
                the bulk of the card's content.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md mb-4">
          <div class="card">
            <img class="card-img-top" src="img/thumbs/2.png" alt="Card image cap" />
            <div class="card-body">
              <p class="card-text">
                Some quick example text to build on the card title and make up
                the bulk of the card's content.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md mb-4">
          <div class="card">
            <img class="card-img-top" src="img/thumbs/3.png" alt="Card image cap" />
            <div class="card-body">
              <p class="card-text">
                Some quick example text to build on the card title and make up
                the bulk of the card's content.
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md mb-4">
          <div class="card">
            <img class="card-img-top" src="img/thumbs/4.png" alt="Card image cap" />
            <div class="card-body">
              <p class="card-text">
                Some quick example text to build on the card title and make up
                the bulk of the card's content.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md mb-4">
          <div class="card">
            <img class="card-img-top" src="img/thumbs/5.png" alt="Card image cap" />
            <div class="card-body">
              <p class="card-text">
                Some quick example text to build on the card title and make up
                the bulk of the card's content.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md mb-4">
          <div class="card">
            <img class="card-img-top" src="img/thumbs/6.png" alt="Card image cap" />
            <div class="card-body">
              <p class="card-text">
                Some quick example text to build on the card title and make up
                the bulk of the card's content.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact -->
  <section class="contact bg-light" id="contact">
    <div class="container">
      <div class="row pt-4 mb-4">
        <div class="col text-center">
          <h2>Contact</h2>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-4">
          <div class="card bg-primary text-white mb-4 text-center">
            <div class="card-body">
              <h5 class="card-title">Contact Me</h5>
              <p class="card-text">
                Some quick example text to build on the card title and make up
                the bulk of the card's content.
              </p>
            </div>
          </div>

          <ul class="list-group mb-4">
            <li class="list-group-item">
              <h3>Location</h3>
            </li>
            <li class="list-group-item">My Home</li>
            <li class="list-group-item">Jl. XXXXXXXX No. XX, Padang</li>
            <li class="list-group-item">West Sumatera, Indonesia</li>
          </ul>
        </div>

        <div class="col-lg-6">
          <form id="contactForm">
            <div class="form-group">
              <label for="nama">Name</label>
              <input type="text" class="form-control" id="nama" required />
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" required />
            </div>
            <div class="form-group">
              <label for="phone">Phone Number</label>
              <input type="tel" class="form-control" id="phone" required />
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea class="form-control" id="message" rows="3" required></textarea>
            </div>
            <div class="form-group">
              <button type="button" class="btn btn-primary" onclick="sendMessage()">Send Message</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- footer -->
  <footer class="bg-dark text-white mt-5">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <p>Copyright &copy; 2024.</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
    integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
    integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
  </script>

  <!-- button subscribe youtube -->
  <script src="https://apis.google.com/js/platform.js"></script>

  <script>
  function sendMessage() {
    var nama = document.getElementById('nama').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var message = document.getElementById('message').value;

    var whatsappNumber = '6283144588265';
    var whatsappURL = 'https://wa.me/' + whatsappNumber + '?text=' +
      'Nama: ' + encodeURIComponent(nama) + '%0A' +
      'Email: ' + encodeURIComponent(email) + '%0A' +
      'Phone: ' + encodeURIComponent(phone) + '%0A' +
      'Message: ' + encodeURIComponent(message);

    window.open(whatsappURL, '_blank');
  }
  </script>

</body>

</html>
