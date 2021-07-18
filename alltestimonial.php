<?php
//connect the database
require_once "dbconnection.php";

?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=Lato|Raleway&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ea7f63cfa7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/otherstyle.css">
    <script type="text/javascript" src="js/style.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <title>NekoInu Veterinary | Testimonial</title>

    <script>
       
    </script>
</head>
<body>
    <div class="header header-larger">
        <div class="row">

            <div class="logo-bar col-3">
                <a href="index.html"><img src="assets/logo.png" id="logo"></a>
            </div>
            <ul class="nav-bar col-9">
                    <li class="btnnav"><a href="index.html" >HOME</a></li>
                    <li class="btnnav"><a href="aboutus.html" >ABOUT US</a></li>
                    <li class="btnnav"><a href="service.html">OUR SERVICES</a></li>
                    <li class="btnnav"><a href="quote.php">GET QUOTE</a></li>
                    <li class="btnnav"><a href="testimonial.php">TESTIMONIAL</a></li>
                    <li class="btnnav"><a href="gallery.html">GALLERY</a></li>
            </ul>
        </div>
    </div>

    <div class="header header-mobile">
        <div class="row">
            <div class="logo-bar">
                <a href="index.html"><img src="assets/logo.png" id="logo"></a>
            </div>

            <div id="smmenu-bar">
                <i class="fas fa-bars fa-2x"></i> 
            </div>
        </div>

        <div class="hid-bar">
            <ul class="">
                <li class="btnnav"><a href="index.html" >HOME</a></li>
                <li class="btnnav"><a href="aboutus.html" >ABOUT US</a></li>
                <li class="btnnav"><a href="service.html">OUR SERVICES</a></li>
                <li class="btnnav"><a href="quote.php">GET QUOTE</a></li>
                <li class="btnnav"><a href="testimonial.php">TESTIMONIAL</a></li>
                <li class="btnnav"><a href="gallery.html">GALLERY</a></li>
            </ul>
        </div>
    </div>

    <div class="content">
        <h1>TESTIMONIAL</h1>
        <!-- <div class=" imgslider" data-aos="fade-left"> -->
        <div>
            <?php
            try{

            
                $sqlreview = "SELECT * FROM testimonial WHERE comment IS NOT NULL OR comment != '' ";
                $result = mysqli_query($conn, $sqlreview);
            
                //retrieve data from database
                if(mysqli_num_rows($result)>0){
                    $count = 0;
                    while($row = mysqli_fetch_assoc($result)){

                    //display review
                    echo "<div class='test-con row'>
                            <div class='col-9'>
                                <div class='row'>
                                    <i class='fas fa-user'></i>    
                                    <h4 class='test-name'>$row[name]</h4>
                                </div>
                                <p class='test-msg'>$row[comment]</p>
                                        
                            </div>
                            <div class='col-3'>
                                <div class='row'>
                                    <h3>$row[rate]</h3>
                                    <i class='fas fa-star fa-2x'></i>
                                </div>
                            </div>
                        </div>";
                         
                    }
                }
            }catch(Exception $e){
                //catch and display exception
                echo "<script>alert(Error: $e->getMessage());</script>";
            }

            ?>

            </div>
            <a style="color: #34656d; font-size: 20px;" href="testimonial.php">Back ...</a>
        </div>

       

    </div>    


    <button id="btnTop" onclick="topFunction()">Go To Top</button>
    <div class="footer row">
        <div class="col-sm-12 col-lg-4 ">
            <p><b>Neko Inu Veterinary Clinic</b></p>
            <p>72-1-71 Arena Curve,
                <br>
                Jalan Mahsuri,
                <br>
                11900 Bayan Baru, Penang.</p>
        </div>
        <div class="col-sm-12 col-lg-4 ">
           <p>04-611 9600</p>
           <p>nekoinu@info.com</p>
        </div>
        <div class="col-sm-12 col-lg-4">
            <p>2021 © NekoInu</p>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="slick/slick.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>

        $(window).on('load', function() {
            //transition
            AOS.init({
                duration: 1500,
                easing: 'ease'
            });
           
            AOS.refresh();
            
        });

    </script>
</body>
</html>