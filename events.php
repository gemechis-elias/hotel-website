<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="fonts/all.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/gallery.css">
    <style>
      /* Font */
      @import url('https://fonts.googleapis.com/css?family=Quicksand:400,700');
    
      body {
        color: #272727;
        font-family: 'Quicksand', serif;
        font-style: normal;
        font-weight: 400;
        letter-spacing: 0;
      }
    
      h1 {
        font-size: 24px;
        font-weight: 400;
        text-align: center;
      }
    
      img {
        height: auto;
        max-width: 100%;
        vertical-align: middle;
      }
    
      .btn {
        color: #ffffff;
        padding: 0.8rem;
        font-size: 14px;
        text-transform: uppercase;
        border-radius: 4px;
        font-weight: 400;
        display: block;
        width: 100%;
        cursor: pointer;
        border: 1px solid rgba(255, 255, 255, 0.2);
        background: transparent;
      }
    
      .btn:hover {
        background-color: rgba(255, 255, 255, 0.12);
      }
    
      .cards {
        display: flex;
        flex-wrap: wrap;
        list-style: none;
        margin: 0;
        padding: 0;
      }
    
      .cards_item {
        display: flex;
        padding: 1rem;
      }
    
      @media (min-width: 40rem) {
        .cards_item {
          width: 50%;
        }
      }
    
      @media (min-width: 56rem) {
        .cards_item {
          width: 33.3333%;
        }
      }
    
      .card {
        border-radius: 0.25rem;
        box-shadow: 0 20px 40px -14px rgba(0, 0, 0, 0.25);
        display: flex;
        flex-direction: column;
        overflow: hidden;
      }
    
      .card_content {
        padding: 1rem;
        background: linear-gradient(to bottom left, #EF8D9C 40%, #FFC39E 100%);
      }
    
      .card_title {
        color: #ffffff;
        font-size: 1.1rem;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: capitalize;
        margin: 0px;
      }
    
      .card_text {
        color: #ffffff;
        font-size: 0.875rem;
        line-height: 1.5;
        margin-bottom: 1.25rem;
        font-weight: 400;
      }
    
      .main {
        margin-top: 100px;
        max-width: 1200px; /* set a max-width to limit the width of the element */
        margin-left: auto;
        margin-right: auto;
      }
    </style>
    
</head>
<body>
   
	<header>
		<nav class="navigation" style="top:0;">

			<div class="logo">
				<h1>MAREFIYA</h1>
			</div>
			
			<ul class="menu-list">
				<li><a href="index.php">Home</a></li>
				<li><a href="gallery.php">Gallery</a></li>
				<li><a href="reservation.php">Reservation</a></li>
				<li><a href="events.php">Events</a></li>
				<li><a href="login.php">Login</a></li>
			</ul>  

			<div class="humbarger">
				<div class="bar"></div>
				<div class="bar2 bar"></div>
				<div class="bar"></div>
			</div>
		</nav>
    

        
	</header>

  <div class="main" style="margin-top:100px;">
    <h1>Our Events</h1>
    <ul class="cards">
      <li class="cards_item">
        <div class="card">
          <div class="card_image"><img src="images/mas-gallery-2.jpg"></div>
          <div class="card_content">
            <h2 class="card_title">CEthiopian Cuisine Tastingt</h2>
            <p class="card_text">A delicious food tasting event showcasing the flavors of Ethiopia, featuring traditional dishes and modern fusion cuisine, all prepared by the hotel's top chefs.</p>
          </div>
        </div>
      </li>
      <li class="cards_item">
        <div class="card">
          <div class="card_image"><img src="https://www.kayak.com/rimg/himg/d7/b0/aa/expediav2-733040-7d76a4-108497.jpg?width=720&height=576&crop=true"></div>
          <div class="card_content">
            <h2 class="card_title">Jazz Night at Marefiya</h2>
            <p class="card_text">An evening of soulful jazz music, featuring live performances by local musicians, alongside refreshing cocktails and snacks at the hotel's rooftop lounge.</p>
          </div>
        </div>
      </li>
      <li class="cards_item">
        <div class="card">
          <div class="card_image"><img src="https://media-cdn.tripadvisor.com/media/photo-s/23/0b/09/8d/main-cover-picture.jpg"></div>
          <div class="card_content">
            <h2 class="card_title">Card Grid Layout</h2>
            <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
          </div>
        </div>
      </li>
      <li class="cards_item">
        <div class="card">
          <div class="card_image"><img src="https://picsum.photos/500/300/?image=14"></div>
          <div class="card_content">
            <h2 class="card_title">Ethiopian Coffee Ceremony</h2>
            <p class="card_text">Experience the time-honored tradition of coffee brewing in Ethiopia, with a detailed demonstration of the process and tasting of various roasts, served with light snacks and treats</p>
          </div>
        </div>
      </li>
      <li class="cards_item">
        <div class="card">
          <div class="card_image"><img src="https://picsum.photos/500/300/?image=17"></div>
          <div class="card_content">
            <h2 class="card_title">Art Exhibition and Auction</h2>
            <p class="card_text">A showcase of Ethiopian art, with works from renowned artists and rising talents, culminating in a live auction at the hotel's conference hall.</p>
          </div>
        </div>
      </li>
      <li class="cards_item">
        <div class="card">
          <div class="card_image"><img src="https://picsum.photos/500/300/?image=2"></div>
          <div class="card_content">
            <h2 class="card_title">Wellness Retrea</h2>
            <p class="card_text">A weekend-long wellness event, offering yoga and meditation sessions, wellness workshops, healthy meals, and relaxing spa treatments at the hotel's wellness center.</p>
          </div>
        </div>
      </li>
    </ul>
  </div>
  
    <footer>
        <div class="footer">
            
        </div>
        <div class="footer2">
            <span class="foo2a">&copy;<span id="currentDate"></span> Marefiya Hotels</span>
            <span class="foo2b">Section B, Group 4</span>
        </div>
    </footer>
<script src="fonts/all.js"></script>
<script>
    var currentDate = new Date();  // Create a new date object
    var options = { year: 'numeric'};  // Set the date options
    var formattedDate = currentDate.toLocaleDateString('en-US', options);  // Format the date as a string
    document.getElementById('currentDate').innerHTML = formattedDate;  // Set the formatted date as the text content of the <p> element
  
    window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.querySelector('.navigation').classList.add('scrolled');
  } else {
    document.querySelector('.navigation').classList.remove('scrolled');
  }
}
</script>
</body>
</html>