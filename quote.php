<?php
//connect the database
require_once "dbconnection.php";


if (isset($_POST['quotesubmit'])) {
    //check if required field is filled in
    if ((isset($_POST['name'],$_POST['contact'], $_POST['email'], $_POST['pet'], $_POST['gender']))
        && !empty($_POST['name']) && !empty($_POST['contact']) && !empty($_POST['email']) && !empty($_POST['pet']) && !empty($_POST['gender']) ){

        //initialise error checker
        $emailerror = false;
        $contacterror = false;

        //set id as current timestamp
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $quoteid = date("ymdHis");

        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $pet = $_POST['pet'];
        $gender = $_POST['gender'];
        $msg = $_POST['msg'];

        
        //validate email
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        if (filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
            $emailerror = false;
        }
        else{
            $emailerror = true;
            $eemsg = "Please enter a valid email.";
        }

        //validate contact
        if(filter_var($_POST["contact"], FILTER_VALIDATE_INT)){
            $contacterror = false;
        }
        else{
            $contacterror = true;
            $cemsg = "Please enter a valid contact number.";
        }


        //if no error, insert into database
        if ($emailerror == false || $contacterror == false) {
            $sql = "INSERT INTO `quote`(`quoteId`, `name`, `contact`, `email`, `petType`, `petGender`, `message`) 
                    VALUES('$quoteid', '$name', '$contact', '$email', '$pet', '$gender', '$msg')";
            $result = mysqli_query($conn, $sql);

            if (mysqli_affected_rows($conn) == 1) {
                echo "<script>alert('Thank you! We\'ve received your quote!');</script>";
               
            }else{
                echo "<script>alert('Sorry, we didn\'t receive your quote. Please try again');</script>";
            }
            
        }
        else{
            //alert if validation returns error
            if ($emailerror == true){
                echo "<script>alert('$eemsg')</script>";
            }
            if ($contacterror == true){
                echo "<script>alert('$cemsg')</script>";
            }
        }

        //end connection
        mysqli_close($conn);
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/otherstyle.css">
    <script type="text/javascript" src="js/style.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <title>My Software Solution | Contact Us</title>

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

    <div class="content" style="text-align: left;">
        
        <div class="emailform" data-aos="fade-up">
            <h2 id="ctitle">GET QUOTE!</h2>
            <form name="myForm" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" autocomplete="off">
                <div class="form-group row">
                    <label for="name" class="col-xs-12 col-sm-12 col-lg-3 col-form-label">*Name</label>
                    <div class="col-xs-12 col-sm-12 col-lg-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-xs-12 col-sm-12 col-lg-3 col-form-label">*Contact No.</label>
                    <div class="col-xs-12 col-sm-12 col-lg-9">
                        <input type="text" class="form-control" id="phone" name="contact" placeholder="Contact No. (example. 0123456789)">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-xs-12 col-sm-12 col-lg-3 col-form-label">*E-mail</label>
                    <div class="col-xs-12 col-sm-12 col-lg-9">
                        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="type" class="col-xs-12 col-sm-12 col-lg-3 col-form-label">*Type of Pet</label>
                    <div class="col-xs-12 col-sm-12 col-lg-9">
                        <input type="text" class="form-control" id="type" name="pet" placeholder="Type of Pet (example. dog/cat/rabbit)">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="gender" class="col-xs-12 col-sm-12 col-lg-3 col-form-label">*Pet's Gender</label>
                    <div class="col-xs-12 col-sm-12 col-lg-9 group-checkbox">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender-male" value="male">
                            <label for="gender-male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender-female" value="female">
                            <label for="gender-female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender-notsure" value="not sure">
                            <label for="gender-notsure">Not sure</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="msg" class="col-xs-12 col-sm-12 col-lg-3 col-form-label">Message</label>
                    <div class="col-xs-12 col-sm-12 col-lg-9">
                        <textarea class="form-control" id="msg" name="msg" placeholder="Please state your problem"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                        <input type="submit" name="quotesubmit" class="btn btnsubmit" value="Submit">
                        <!-- <a class="btn btnlearn btnsubmit" id="submit" role = "button"><span>Submit</span></a> -->
                    </div>
                </div>
            
            </form>
        <!-- <h3 id="success-msg" style="text-align: center !important; margin-top:190px !important;  color:#2e3363">Your details has been recorded successfully!</h3> -->
        </div>
        

    </div>    


    <button id="btnTop" onclick="topFunction()">Go To Top</button>
    <div class="footer row">
        <div class="col-sm-12 col-lg-6 sm-about">
            <!-- <h4>My Software Solution</h4> -->
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sollicitudin ex quis tellus porta varius. Ut a purus aliquet tellus imperdiet dictum vehicula et velit. Aliquam maximus est ante, non rhoncus nunc pulvinar gravida. Sed eget libero nec mi bibendum semper eu ac lorem. Duis ac pharetra massa. Donec pharetra sapien id nibh ornare lobortis. Cras dui massa, malesuada in lacus non, lacinia dapibus metus. Sed nec tellus sed justo dictum luctus.</p>
        </div>
        <div class="col-sm-12 col-lg-2 list">
            <!-- <ul>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Contact Us</a></li>
                <li><a href="location.html">Location</a></li>
            </ul> -->
        </div>
        <div class="col-sm-12 col-lg-4 social-media">
            <h6>Follow Us</h6>
            <br>
            <a href="#"><i class="fab fa-facebook fa-2x"></i></a>
            <a href="#"><i class="fab fa-google-plus-g fa-2x"></i></a>
            <a href="#"><i class="fab fa-youtube fa-2x"></i></a>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        $(document).ready(function() {
            //transition
            AOS.init({
                duration: 1500,
                easing: 'ease',
            });
        });
        
        $("#submitfail").click(function(){
                alert("The form is currently under maintenance.");
        });

        
    </script>
</body>
</html>