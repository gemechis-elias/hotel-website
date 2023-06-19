
<?php

require_once "connection2.php";if(isset($_REQUEST['form_id']))
{
	try
	{
		$id = $_REQUEST['form_id']; //get "update_id" from admin.php page through anchor tag operation and store in "$id" variable
		$select_stmt = $db->prepare('SELECT * FROM reg WHERE id =:id'); //sql select query
		$select_stmt->bindParam(':id',$id);
		$select_stmt->execute(); 
		$row = $select_stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
	}
	catch(PDOException $e)
	{
		$e->getMessage();
	}
	
}

	
if(isset($_REQUEST['delete_id']))
{
    // select image from db to delete
    $id=$_REQUEST['delete_id'];	//get delete_id and store in $id variable
    
    $select_stmt= $db->prepare('SELECT * FROM auditorium WHERE id =:id');	//sql select query
    $select_stmt->bindParam(':id',$id);
    $select_stmt->execute();
    $row=$select_stmt->fetch(PDO::FETCH_ASSOC);
    unlink("upload/".$row['image']); //unlink function permanently remove your file
    
    //delete an orignal record from db
    $delete_stmt = $db->prepare('DELETE FROM auditorium WHERE id =:id');
    $delete_stmt->bindParam(':id',$id);
    $delete_stmt->execute();
    
    header("Location:./bh-auditorium-res.php");
}
	
?>
<?php 

require_once "connection2.php";

error_reporting(0); // For not showing any error




if(isset($_REQUEST['btn_update']))
{
	try
	{
        $provider =  $row['provider'];
        if(empty($provider)){
            $provider=$row['provider'];
        	}
            
        $customer  =$row['customer'];
        $type  =$row['type'];
        $lcd_projector  =$row['lcd_projector'];
        $tea_service = $row['tea_service'];
        $peoples  =$row['peoples'];
        $payment_type  =$row['payment_type'];
        $date  =$row['date'];
        $status =$_REQUEST['status'];
        
       
		$image_file=$row['file'];
	
		
		
		if(!isset($errorMsg))
		{
			$update_stmt=$db->prepare('UPDATE auditorium SET provider=:f1,customer=:f2,type=:f3,lcd_projector=:f4,tea_service=:f5,date=:f6,peoples=:f7,payment_type=:f8,file=:f9,status=:f10 WHERE id=:id'); //sql insert query						
		
             //bind all parameter 
            $update_stmt->bindParam(':f1',$provider);
            $update_stmt->bindParam(':f2',$customer);
            $update_stmt->bindParam(':f3',$type);
            $update_stmt->bindParam(':f4',$lcd_projector);
            $update_stmt->bindParam(':f5',$tea_service);
            $update_stmt->bindParam(':f6',$date);	
            $update_stmt->bindParam(':f7',$peoples);
            $update_stmt->bindParam(':f8',$payment_type);
            $update_stmt->bindParam(':f9',$image_file);
            $update_stmt->bindParam(':f10',$status);
			$update_stmt->bindParam(':id',$id);
			if($update_stmt->execute())
			{
				$insertMsg="Data Updated sucessfully........"; //execute query success message
				header("refresh:2;bh-auditorium-res.php"); //refresh 3 second and redirect to index.php page
			}
		}
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Forms - Kontoma Darimu</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <!-- Theme included stylesheets -->
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">

    <!-- Core build with no theme, formatting, non-essential modules -->
    <link href="//cdn.quilljs.com/1.3.6/quill.core.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/monokai-sublime.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.0/highlight.min.js" rel="stylesheet">

        <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <!-- Theme included stylesheets -->
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">

    <!-- Core build with no theme, formatting, non-essential modules -->
    <link href="//cdn.quilljs.com/1.3.6/quill.core.css" rel="stylesheet">
    <script src="//cdn.quilljs.com/1.3.6/quill.core.js"></script>
    <style>
        
@import url("https://fonts.googleapis.com/css?family=Montserrat:700,500,800");
        @font-face {
            font-family: customfont;
            src: url(font/gotham_light.ttf);
        }
        
        @font-face {
            font-family: customfontbold;
            src: url(font/gothambold.ttf);
        }
        
        @font-face {
            font-family: google;
            src: url(font/google_sans.ttf);
        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-inner-pages">
        <div class="container d-flex align-items-center justify-content-between">
            <h1 style="font-size:23px;" class="logo">
                <a href="index.php">KONTOMA DARIMU ADMIN</a>
            </h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul >
                    <li><a class="nav-link scrollto active" href="index.php">Admin Home</a></li>
                    <li><a class="nav-link scrollto" href="add_gallery.php">Add Gallery</a></li>
                    <li><a class="nav-link scrollto" href="forms.php">Booking</a></li>
                    <li><a class="nav-link scrollto " href="add_event.php">Add Events</a></li>
                    <li><a class="getstarted scrollto" href="logout.php">Logout</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->

        </div>
    </header>
    <!-- End Header -->
    
    <!-- ======= Hero Section ======= -->
    <!-- End Hero -->
    <main id="main">
    <section style="margin-top:80px;" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2><?php echo $row['fname']; echo $row['lname']; ?></h2>
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li>forms</li>
                    </ol>
                </div>

            </div>
        </section>

                        
                            <?php
                    if(isset($errorMsg))
                    {
                        ?>
                        <div class="alert alert-danger">
                            <strong>WRONG ! <?php echo $errorMsg; ?></strong>
                        </div>
                        <?php
                    }
                    if(isset($insertMsg)){
                    ?>
                        <div class="alert alert-success">
                            <strong>SUCCESS ! <?php echo $insertMsg; ?></strong>
                        </div>
                    <?php
                    }
                    ?>  
             
             <div class="container">
        <h1 class="mt-4">User Details</h1>
        <table class="table mt-4">
            <tbody>
                <?php
                require_once 'connection.php'; // Include the connection.php file

                if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
                    $userId = $_GET['id'];

                    // Fetch user details from the database
                    $stmt = $db->prepare("SELECT * FROM reservations WHERE id = :id");
                    $stmt->bindParam(':id', $userId);
                    $stmt->execute();
                    $reservation = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($reservation) {
                        echo '<p><strong>Name:</strong> ' . $reservation['first_name'] . ' ' . $reservation['last_name'] . '</p>';
                    echo '<p><strong>Phone:</strong> ' . $reservation['phone_number'] . '</p>';
                    echo '<p><strong>Email:</strong> ' . $reservation['email'] . '</p>';
                    echo '<p><strong>Departure Date:</strong> ' . $reservation['departure_date'] . '</p>';
                    echo '<p><strong>Arrival Date:</strong> ' . $reservation['arrival_date'] . '</p>';
                    echo '<p><strong>Guests:</strong> ' . $reservation['guests'] . '</p>';
                    echo '<p><strong>Room Type:</strong> ' . $reservation['room_type'] . '</p>';
                    } else {
                        echo '<tr><td colspan="2">User not found.</td></tr>';
                    }
                } else {
                    echo '<tr><td colspan="2">Invalid user ID.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
             
    </main>
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h4 class="logo">
                           Our Mission 
                        </h4>
                        <p>
                   TO be best hotel in Ethiopia <br>
                        </p>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="../index.php">Home Site</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Subscribe to our newsletter</h4>
                        <div class="custom-search">
                            <input type="text" class="custom-search-input" placeholder="Email">
                            <button class="custom-search-botton" type="submit">OK</button>  
                          </div>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Our Address</h4>
                        <p>Addis Ababa Science and Technology University<br>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">

            <div class="copyright-wrap d-md-flex py-4">
                <div class="me-md-auto text-center text-md-start">
                    <div class="copyright">
                        &copy;2022 <strong><span>MAREFIYA ALLIANCE</span></strong>. All Rights Reserved
                    </div>
                </div>
                <div class="social-links text-center text-md-right pt-3 pt-md-0">
                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>