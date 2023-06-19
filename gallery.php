<?php
require_once 'admin/connection.php'; // Include the database connection file
// hide error
error_reporting(0);
$query = "SELECT * FROM gallery";
$stmt = $db->prepare($query);
$stmt->execute();
$portfolioItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="fonts/all.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/gallery.css">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
   
	<header>
		<nav class="navigation" style="  background-color: #0f1423dc; top:0; ">

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
    
    <section id="portfolio" class="portfoio" style="margin-top:60px;">
      <div class="container" data-aos="fade-up">
      
          <div class="section-title">
              <h2>Our Gallery</h2>
          </div>
      
          <div class="row">
              <div class="col-lg-12 d-flex justify-content-center">
                  <ul id="portfolio-flters">
                      <li data-filter="*" class="filter-active">All</li>
                      <li data-filter=".filter-app">Meal</li>
                      <li data-filter=".filter-card">Room</li>
                  </ul>
              </div>
          </div>
      
          <div class="row portfolio-container">
    <?php foreach ($portfolioItems as $item) { ?>
        <div class="col-lg-4 col-md-6 portfolio-item filter-<?php echo $item['type']; ?>">
            <img src="admin/upload/<?php echo $item['image']; ?>" class="img-fluid" alt="">
            <div class="portfolio-info">
                <h4><?php echo $item['title']; ?></h4>

                <a href="<?php echo $item['image']; ?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="<?php echo $item['title']; ?>"><i class="bx bx-plus"></i></a>
                <a href="#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
        </div>
    <?php } ?>
</div>
      </div>
      </section>
	</header>


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

 /**
     * Porfolio isotope and filter
     */
     window.addEventListener('load', () => {
      let portfolioContainer = select('.portfolio-container');
      if (portfolioContainer) {
          let portfolioIsotope = new Isotope(portfolioContainer, {
              itemSelector: '.portfolio-item'
          });

          let portfolioFilters = select('#portfolio-flters li', true);

          on('click', '#portfolio-flters li', function(e) {
              e.preventDefault();
              portfolioFilters.forEach(function(el) {
                  el.classList.remove('filter-active');
              });
              this.classList.add('filter-active');

              portfolioIsotope.arrange({
                  filter: this.getAttribute('data-filter')
              });
              portfolioIsotope.on('arrangeComplete', function() {
                  AOS.refresh()
              });
          }, true);
      }

  });

  /**
   * Initiate portfolio lightbox 
   */
  const portfolioLightbox = GLightbox({
      selector: '.portfolio-lightbox'
  });

  /**
   * Portfolio details slider
   */
  new Swiper('.portfolio-details-slider', {
      speed: 400,
      loop: true,
      autoplay: {
          delay: 5000,
          disableOnInteraction: false
      },
      pagination: {
          el: '.swiper-pagination',
          type: 'bullets',
          clickable: true
      }
  });


</script>
</body>
</html>