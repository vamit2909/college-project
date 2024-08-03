<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/intro.jpg" />
        <title>Music instruments store</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <div>
           <?php
            require 'header.php';
           ?>
           <div id="bannerImage1">
               <div class="container">
                   <center>
                   <div id="bannerContent">
                       <h1><b>WELCOME</b></h1>
                       <h1>We sell .</h1>
                       <p>Flat 40% OFF on all premium Music brands.</p>
                       <a href="products.php" class="btn btn-danger">Shop Now</a>
                   </div>
                   </center>
               </div>
           </div>
           <div class="container">
               <div class="row">
                   <div class="col-xs-200">
                       <div  class="thumbnail">
                           <a href="products.php">
                                <img src="img/image.jpg" alt="Bg_image">
                           </a>
                           <center>
                                <div class="caption">
                                        <p id="autoResize"></p>
                                       
                                </div>
                           </center>
                       </div>
                   </div>
                   
               </div>
           </div>
            <br><br> <br><br><br><br>

            <br>
    <br><br><br><br><br><br><br><br>
    <footer class="footer-section">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="widget company-intro-widget">
                            <a href="index.html" class="site-logo">

                            <div class="col-lg-6 col-md-6 col-sm-6">
                            <img src="img/logo.jpg" alt="logo"></a>
                        </div>
                            <p>Welcome to Musical store and accessories where the melody meets passion and innovation harmonizes with excellence. 
                                Founded by a team of music enthusiasts with a shared love for rhythm and harmony, our store is more than just a
                                 destination for musical instruments and accessories; it's a celebration of the artistry and creativity that music inspires. From guitars to keyboards,
                                 . </p>
                            
                        </div>
                    </div><!-- widget end -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="widget course-links-widget">
                            <h4 class="widget-title">Products</h4>
                            <ul class="courses-link-list">
                                <li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Pianos</a></li>
                                <li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Keyboard Instruments</a></li>
                                <li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Guitars & Bassess</a></li>
                                <li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Brass & Woodwinds</a></li>
                                <li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Percussion</a></li>
                                <li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Electronic Entertainment Instruments</a></li>
                                <li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Synthesizers & Music Production Tools</a></li>
                                <li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Professional Audio</a></li>
                                <li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Audio & Visual</a></li>
                            </ul>
                        </div>
                    </div><!-- widget end -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="widget latest-news-widget">
                            <h4 class="widget-title">Ordering Info</h4>
                            <ul class="courses-link-list">
                                       <li><a href="#" class="fas fa-long-arrow-alt-right">Return Policy</a></li>
                                       <li> <a href="#" class="fas fa-long-arrow-alt-right">Payment Enquiry</a></li>
                                       <li> <a href="#" class="fas fa-long-arrow-alt-right">Delivery Information</a></li>
                                       <li> <a href="#" class="fas fa-long-arrow-alt-right">Stock Enquiry</a></li>
                                       <li><a href="#" class="fas fa-long-arrow-alt-right">Price Match</a></li>
                                
                                       
                            </ul>
                          </div>
                    </div>             
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="widget latest-news-widget"> 
                                        <h4 class="widget-title">Customer Support </h4>
                                        
                                       <ul class="company-footer-contact-list"> 
                                <li><i class="fas fa-phone"></i>012****789</li><br>
                                <li><i class="fas fa-clock"></i>Mon - Sat 8.00 - 18.00</li><br>
                                <input type="email" name="news-email" id="news-email"
                                        placeholder="Your email address">
                                    <input type="submit" value="Send">
                            </ul>
                                    </div>
                                
                    </div><!-- widget end -->
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 text-sm-left text-center">
                        
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <ul class="terms-privacy d-flex justify-content-sm-end justify-content-center">
                        
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                          
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- footer-bottom end -->
    </footer>
<style>
     h1,
        h2,
        h3,
        h4,
        h5,
        h6 {}
        
        section {
            padding: 60px 0;
            min-height: 100vh;
        }
        
        a,
        a:hover,
        a:focus,
        a:active {
            text-decoration: none;
            outline: none;
        }
        
        a,
        a:active,
        a:focus {
            color: #6f6f6f;
            text-decoration: none;
            transition-timing-function: ease-in-out;
            -ms-transition-timing-function: ease-in-out;
            -moz-transition-timing-function: ease-in-out;
            -webkit-transition-timing-function: ease-in-out;
            -o-transition-timing-function: ease-in-out;
            transition-duration: .2s;
            -ms-transition-duration: .2s;
            -moz-transition-duration: .2s;
            -webkit-transition-duration: .2s;
            -o-transition-duration: .2s;
        }
        
        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        img {
    max-width: 100%;
    height: auto;
}.footer-section {
  background-color: #233243;
  position: relative;
  overflow: hidden;
  z-index: 9;
}
.footer-section:before {
  content: '';
  position: absolute;
  top: -146%;
  left: -18%;
  width: 44%;
  height: 257%;
  transform: rotate(54deg);
  background-color: rgb(31, 47, 64);
  -webkit-transform: rotate(54deg);
  -moz-transform: rotate(54deg);
  -ms-transform: rotate(54deg);
  -o-transform: rotate(54deg);
  z-index: -10;
}
.footer-section:after {
  position: absolute;
  content: '';
  background-color: rgb(31, 47, 64);
  top: -24%;
  right: 4%;
  width: 26%;
  height: 264%;
  transform: rotate(44deg);
  -webkit-transform: rotate(44deg);
  -moz-transform: rotate(44deg);
  -ms-transform: rotate(44deg);
  -o-transform: rotate(44deg);
  z-index: -10;
}
.footer-top {
  padding-top: 96px;
  padding-bottom: 50px;
}
.footer-top p,
.company-footer-contact-list li {
  color: #ffffff;
}
.company-footer-contact-list {
  margin-top: 10px;
}
.company-footer-contact-list li {
  display: flex;
  display: -webkit-flex;
  align-items: center;
}
.company-footer-contact-list li+li {
  margin-top: 5px;
}
.company-footer-contact-list li i {
  margin-right: 10px;
  font-size: 20px;
  display: inline-block;
}

.footer-top .site-logo {
    margin-bottom: 25px;
    display: block;
    max-width: 170px;
}
.widget-title {
  text-transform: capitalize;
}
.footer-top .widget-title {
  color: #ffffff;
  margin-bottom: 40px;
}
.courses-link-list li+li {
  margin-top: 10px;
}
.courses-link-list li a {
  color: #ffffff;
  text-transform: capitalize;
  font-family: var(--para-font);
  font-weight: 400;
}
.courses-link-list li a:hover {
  color: #ffb606;
}
.courses-link-list li i {
  margin-right: 5px;
}
.footer-top .small-post-title a {
  font-family: var(--para-font);
  color: #ffffff;
  font-weight: 400;
}
.small-post-item .post-date {
  color: #ffb606;
  margin-bottom: 3px;
  font-family: var(--para-font);
  font-weight: 400;
}
.small-post-list li+li {
  margin-top: 30px;
}
.news-letter-form {
  margin-top: 15px;
}
.news-letter-form input {
  width: 100%;
  padding: 12px 25px;
  border-radius: 5px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  -ms-border-radius: 5px;
  -o-border-radius: 5px;
  border: none;
}
.news-letter-form input[type="submit"] {
  width: auto;
  border: none;
  background-color: #ffb606;
  padding: 9px 30px;
  border-radius: 5px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  -ms-border-radius: 5px;
  -o-border-radius: 5px;
  color: #ffffff;
  margin-top: 10px;
}
.footer-bottom {
  padding: 13px 0;
  border-top: 1px solid rgba(255, 255, 255, 0.149);
}
.copy-right-text {
  color: #ffffff;
}
.copy-right-text a {
  color: #ffb606;
}
.terms-privacy li+li {
  margin-left: 30px;
}
.terms-privacy li a {
  color: #ffffff;
  position: relative;
}
.terms-privacy li a:after {
  position: absolute;
  content: '-';
  color: #ffffff;
  display: inline-block;
  top: 0;
  right: -18px;
}
.terms-privacy li+li a:after {
  display: none;
}
</style>

          
        </div>
    </body>
</html>