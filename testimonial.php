<?php
//connect the database
require_once "dbconnection.php";


if (isset($_POST['testsubmit'])) {
    //check if required field is filled in
    if ((isset($_POST['name'],$_POST['rating'], $_POST['comment']))
        && !empty($_POST['name']) && !empty($_POST['rating'])){

        //set id as current timestamp
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $testid = date("ymdHis");

        $name = $_POST['name'];
        $rating = $_POST['rating'];
        $comment = $_POST['comment'];

    try{

        //insert into database
        $sql = "INSERT INTO `testimonial`(`testId`, `name`, `rate`, `comment`) 
                VALUES('$testid', '$name', '$rating', '$comment')";
        $result = mysqli_query($conn, $sql);

        //alert if insert successful
        if (mysqli_affected_rows($conn) == 1) {
            echo "<script>alert('Thank you! We\'ve received your review!');</script>";
        
        }else{
            echo "<script>alert('Sorry, we didn\'t receive your quote. Please try again');</script>";
        }
        // echo "<script>alert('$contact is numeric')</script>";

    }catch(Exception $e){
        //catch and display exception
        echo "<script>alert(Error: $e->getMessage());</script>";
    }
        //end database connection
        //mysqli_close($conn);
    }
    else {
        //alert if any field left empty
        echo "<script>alert('Please insert all field');</script>";
    }
}

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



    <title>NekoInu Veterinary | Testimonial</title>

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
                $result2 = mysqli_query($conn, $sqlreview);
            
                //retrieve data from database
                if(mysqli_num_rows($result2)>0){
                    $count = 0;
                    while($row2 = mysqli_fetch_assoc($result2)){
                        $rate2 = $row2['rate'];
                        $name2 = $row2['name'];
                        $comment2 = $row2['comment'];
                        //display review
                        echo "<div class='test-con row'>
                                <div class='col-6'>
                                    <h4 class='test-name'>$name2</h4>
                                    <p class='test-msg'>$comment2</p>
                                        
                                </div>
                                <div class='col-6'>
                                    <div class='row'>
                                        <h3>$rate2</h3>
                                        <i class='fas fa-star fa-2x'></i>
                                    </div>
                                </div>
                            </div>";
                        $count++;
                            
                        if($count == 3)
                        break;
                    }
                }
            }catch(Exception $e){
                //catch and display exception
                echo "<script>alert(Error: $e->getMessage());</script>";
            }

            ?>
                <!-- open another page to view all testimonial -->
                <a style="color: #34656d; font-size: 20px;" href="alltestimonial.php">See more...</a>
            </div>
        </div>

        <div class="emailform" data-aos="fade-up">
            <h2 id="ctitle">TELL US HOW YOU FEEL!</h2>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                <div class="form-group row">
                    <label for="name" class="col-xs-12 col-sm-12 col-lg-3 col-form-label">*Name</label>
                    <div class="col-xs-12 col-sm-12 col-lg-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rate" class="col-xs-12 col-sm-12 col-lg-3 col-form-label">*Rate</label>
                    <div class="col-xs-12 col-sm-12 col-lg-9 row" >
                        <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
                            <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 star"></label>
                            <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 star"></label>
                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 star"></label>
                            <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 star"></label>
                            <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star"></label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="msg" class="col-xs-12 col-sm-12 col-lg-3 col-form-label">Comment</label>
                    <div class="col-xs-12 col-sm-12 col-lg-9">
                        <textarea class="form-control" id="msg" name="comment" placeholder="Comment"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                        <input type="submit" name="testsubmit" class="btn btnsubmit" value="Submit">
                    </div>
                </div>
            </form>
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