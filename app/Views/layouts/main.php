<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css ">
  </link>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title></title>
</head>

<body>
  <style>
  * {
    font-family: 'Roboto', sans-serif;
  }
  </style>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">CWMS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav mr-auto">
          <a class="nav-item nav-link" href="<?= base_url('course')?>">Home</a>
        </div>
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="#"></a>
        </div>
      </div>
  </nav>
  <div class="container">
    <div class="d-flex justify-content-between">
      <div class='d-flex align-items-start flex-column pt-2'>
        <h3 class="m-0">Courseware System</h3>
        <small class="text-secondary m-0">A teaching and learning platform</small>
      </div>
      <!-- <div class='d-flex align-items-end flex-column pt-3'>
        <div class="" id='date-part'></div>
        <small class="text-secondary" id='time-part'></small>
      </div> -->
    </div>

    <?= $this->renderSection('content')?>
  </div>
  <script>
  $(document).ready(function() {
    var interval = setInterval(function() {
      var momentNow = moment();
      $('#date-part').html(momentNow.format('dddd').substring(0, 3).toUpperCase() + ', ' +
        momentNow.format('MMMM DD YYYY'));
      $('#time-part').html(momentNow.format('hh:mm:ss A'));
    }, 100);

    $('#stop-interval').on('click', function() {
      clearInterval(interval);
    });
  });
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
</body>

</html>