<?php
/**
 * This example shows how to handle a simple contact form.
 */
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$msg = '';
//Don't run this unless we're handling a form submission
if (array_key_exists('email', $_POST)) {
    date_default_timezone_set('Etc/UTC');
    require 'vendor/autoload.php';
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    //Tell PHPMailer to use SMTP - requires a local mail server
    //Faster and safer than using mail()
    $mail->isSMTP();
    $mail->Host = "tls://smtp.gmail.com";

    $mail->Port = 587;  

    $mail->SMTPAuth = true;
    $mail->Username = 'mskc999@gmail.com';
    $mail->Password = '9908547266msk';
    $mail->SMTPSecure = 'tls';
    $mail->smtpConnect(
        array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        )
    );
    
    // $mail->Port = 25;
    //Use a fixed address in your own domain as the from address
    //**DO NOT** use the submitter's address here as it will be forgery
    //and will cause your messages to fail SPF checks
    $mail->setFrom('mskc999@gmail.com', 'First Last');
    //Send the message to yourself, or whoever should receive contact for submissions
    $mail->addAddress('mskc999@gmail.com', 'John Doe');
    //Put the submitter's address in a reply-to header
    //This will fail if the address provided is invalid,
    //in which case we should ignore the whole request
    if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
        $mail->Subject = 'PHPMailer contact form';
        //Keep it simple - don't use HTML
        $mail->isHTML(false);
        //Build a simple message body
        $mail->Body = <<<EOT
Email: {$_POST['email']}
Name: {$_POST['name']}
Number: {$_POST['number']}
subject: {$_POST['subject']}
Message: {$_POST['message']}
EOT;
        //Send the message, check for errors
        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            //but you shouldn't display errors to users - process the error, log it on your server.
            $msg = 'Sorry, something went wrong. Please try again later.';
        } else {
            $msg = 'Message sent! Thanks for contacting us.';
        }
    } else {
        $msg = 'Invalid email address, message ignored.';
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Neuronoid</title>
    <link rel="shortcut icon" href="img/logo/neuronoidsimage.png" type="image/x-icon">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Bitter|Lato|Montserrat|Open+Sans&display=swap" rel="stylesheet">
    <!-- Font Awesome -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/responsive.css">
    <!-- owl -->
    <link rel="stylesheet" href="owl/assets/owlcarousel/assets/owl.carousel.min.css">
    <!-- owl -->
    <script src="owl/assets/vendors/jquery.min.js"></script>
    <script src="owl/assets/owlcarousel/owl.carousel.js"></script>
    <!-- ba slider -->
    <script src="src/jquery.baSlider.js"></script>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="src/jquery.baSlider.css">


    <style>
        .container-ba {
            margin: 25px auto;
            max-width: 960px;

        }

        .ba-sli {
            color: rgb(235, 223, 223)
        }

        .ba-sli .title-box {
            margin-bottom: 40px;
        }

        .wethink .title-box {
            margin-bottom: 40px;
        }

        .baslider {
            height: 300px
        }

        .frame {
            height: 100%;
        }
    </style>

</head>

<body>
    <?php
    include('db/config.php');
    ?>

    <!-- Start your project here-->
    <div id="loading">
    <div id="loading-center">
        <img src="img/logo/neuronoidsimage.png" class="load-rotate" alt="loder">
    </div>
</div>
    <!-- header -->

    <header>
        <div class="container-fluid sub-header">
            <div class="row">
                <div class="col-auto mr-auto">
                    <div class="btn-group">
                        <button class="btn btn-secondary btn-neuro btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            English
                        </button>
                    </div>
                </div>
                <div class="col-auto sub-main">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admi/index.php">Login</a></li>
                            <!-- <li class="breadcrumb-item" aria-current="page"><a href="admi/index.php">Register</a></li> -->
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container-fluid main-header">
            <div class="row">
                <div class="col-sm-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.php">
                            <img src="img/logo/logo.png" class="img-fluid logo" alt="img">
                            <img src="img/logo/logo.png" class="img-fluid logo-white" alt="img">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar" aria-controls="myNavbar" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse " id="myNavbar">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link active" href="#whowe">Who We are</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#wethink">What We Think</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#wedo">What We Do</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#career">Careers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="modal" data-target="#demo" href="#!">Demo</a>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <div class="banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-text">
                        <h5 class="main-color mb-3">Welcome to</h5>
                        <h1 class="font-weight-bold  mb-3">Neuronoids</h1>
                        <p class=" mb-4 jus">We at Neuronoids have deep roots into developing custom algorithms on the
                            need basis and building complete processing pipeline end to end. </p>
                        <div class="align-items-center d-flex">
                            <a class=" button btn br-90 cus-grad" href="#whowe">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="banner-type wow fadeInRight">
                        <img class="img-fluid banner-person" src="img/banner/03n1.png" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- baneer end -->
    <!-- services or what we think -->
    <section class="pt-0 wethink pt-5 mb-lg-5 conection-float " id="whowe">
        <div class="container pt-2">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box">
                        <h2 class="title font-weight-bold"><b class="headings">Who</b> we are</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="fully-dedicated wow slideInLeft">
                        <img src="images/wethink/04.png" class="img-fluid " alt="">
                        <!-- <img class="img-fluid " src="img/feature/teamwork.png" alt="img"> -->

                    </div>
                </div>
                <div class="col-md-6 text-left align-self-center">
                    <div class="ml-3 mt-3">
                        <!-- <h3 class="font-weight-bold">Fully dedicated to finding the best solutions.</h3> -->
                        <p class="mt-3 jus">
                            We offer services in the areas of Machine Learning, Computer Vision, Natural Language
                            Processing and Text Analytics. The team involved has vast experience in driving an idea from an
                            imagination to reality. We also provide services in accelerating the algorithms both by
                            researching alternatives in computational and functional space. We provide the custom
                            libraries on demand basis so that the clients can use the libraries to build their processing pipe
                            lines.
                        </p>
                        <p>Our Vision and Mission Statements are..</p>
                    </div>
                    
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-6 text ">
                    <div class="p-5 future-services  wow slideInUp text-center" data-wow-duration="0.5s">
                        <h4 class="font-weight-bold text-center">Our <b class="headings">Mission</b></h4>
                        <!-- <div class="future-img">
                            <img src="img/feature/mission.png" style="width:20%" class="mt-4 img-fluid mb-2" alt="">
                        </div> -->
                        <p class="mt-3 jus">Providing latest technology access in Machine Learning, computer vision and data analytics
                            space to our customers with timely execution and reasonable cost by engaging them closely
                            and making our clients excel in their business and exceeding their expectation by building more
                            customized solution for them</p>
                        <!-- <a href="#!" data-toggle="modal" data-target="#mission">Read more</a> -->
                    </div>
                </div>
                <div class="col-lg-6 text ">
                    <div class="p-5 future-services  wow slideInUp text-center" data-wow-duration="0.5s">
                        <h4 class="font-weight-bold text-center">Our <b class="headings">Vision</b></h4>
                        <!-- <div class="future-img">
                            <img src="img/feature/vision.png" style="width:20%" class="mt-4 img-fluid mb-2" alt="">
                        </div> -->
                        <p class="mt-3 jus">
                        To increase the reach and access of result oriented Insights, by reducing the research and
                            investigating time of machine learning seekers, by building unified frame works and platforms
                            to become leader and trusted solution provider in the technology of molding intelligence and
                            efficiency into the system.
                        </p>
                        <!-- <a href="#!" data-toggle="modal" data-target="#vision">Read more</a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include('modal.php'); ?>

    <section class="how-it-works left-float pt-5 pb-4" id="wethink">
        <div class="container pt-2">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box">
                        <h2 class="title font-weight-bold"><b class="headings">What</b> We Think</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="future-services text-center wow slideInUp" data-wow-duration="0.5s">
                        <div class="future-img">
                            <img src="img/feature/ad.png" class="img-fluid mb-4" alt="">
                        </div>
                        <h4 class="mb-3">Algorithm Research</h4>
                        <p class="mb-0 jus">We do research or implement the algorithms as per the need...</p>
                        <a href="#!" data-toggle="modal" data-target="#think1">Read more</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="future-services text-center wow slideInUp" data-wow-duration="1s">
                        <div class="future-img">
                            <img src="img/feature/bp.png" class="img-fluid mb-4" alt="">
                        </div>
                        <h4 class="mb-3">Building Pipeline</h4>
                        <p class="mb-0 jus">We implement the pipeline fitting into common frame work...</p>
                        <a href="#!" data-toggle="modal" data-target="#think2">Read more</a>

                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="future-services text-center wow slideInUp" data-wow-duration="1.5s">
                        <div class="future-img">
                            <img src="img/feature/dev.png" class="img-fluid mb-4" alt="">
                        </div>
                        <h4 class="mb-3">Development</h4>
                        <p class="mb-0 jus">We implement the pipeline fitting into common frame work...</p>
                        <a href="#!" data-toggle="modal" data-target="#think3">Read more</a>

                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="future-services text-center wow slideInUp" data-wow-duration="0.5s">
                        <div class="future-img">
                            <img src="img/feature/turn.png" class="img-fluid mb-4" alt="">
                        </div>
                        <h4 class="mb-3">Idea Validation</h4>
                        <p class="mb-0 jus">We encourage our clients to come up with their needs. We take...</p>
                        <a href="#!" data-toggle="modal" data-target="#think4">Read more</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="future-services text-center wow slideInUp" data-wow-duration="1s">
                        <div class="future-img">
                            <img src="img/feature/pip.png" class="img-fluid mb-4" alt="">
                        </div>
                        <h4 class="mb-3">Pipeline Architecture</h4>
                        <p class="mb-0 jus">

                            The pipeline architecture is about proposing a pipeline of the...</p>
                        <a href="#!" data-toggle="modal" data-target="#think5">Read more</a>

                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="future-services text-center wow slideInUp" data-wow-duration="1.5s">
                        <div class="future-img">
                            <img src="img/feature/ml.png" class="img-fluid mb-4" alt="">
                        </div>
                        <h4 class="mb-3">Pipeline Acceleration</h4>
                        <p class="mb-0 jus">Most of the computationally intensive tasks are...</p>
                        <a href="#!" data-toggle="modal" data-target="#think6">Read more</a>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid ba-sli bg-dark conection-float pt-4 mt-4">
        <div class="container-ba">
            <div class="">
                <div class="col-sm-12">
                    <div class="title-box pt-5">
                        <h2 class="title font-weight-bold">How neuronoids Automates Predictive Modeling</h2>
                        <p class="sub-title">Neuronoid's automated machine learning platform empowers users to quickly and easily build highly accurate predictive models with full transparency—and within minutes.</p>
                    </div>
                </div>
            </div>
            <!-- <div class="row d-none d-lg-block d-xl-block">
                <div class='baSlider '>
                    <div class='frame'>

                        <div baSlider-handler><img src="images/drag.svg" alt=""></div>

                        <div class='before'>

                            <img src='img/old1.png' style="width: 100%" baSlider-image>

                        </div>
                        <div class='after bg-dark '>
                            <div>

                                <img src='img/new1.png' style="width: 100%" baSlider-image>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row d-xl-none d-lg-none">
                <div class="col-12 ">
                    <img src='img/old1.png' style="width: 100%" baSlider-image>
                </div>
                <div class="col-12">
                    <img src='img/new1.png' style="width: 100%" baSlider-image>
                </div>
            </div> -->
            <div class="row">
                <div class="text-center col">
                    <h2 class="text-center mt-5 mb-5">
                         Coming Soon
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <section class="neu-blog pt-0 pt-5 conection-float" id="wedo">
        <div class="container pt-4">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box">
                        <h2 class="title font-weight-bold">What <b class="headings">We Do</b></h2>
                        <!-- <p class="sub-title">Simply dummy has been the industry's standard dummy text.</p> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="future-services text-center wow slideInUp" data-wow-duration="0.5s">
                        <div class="future-img">
                            <img src="img/feature/ad.png" class="img-fluid mb-4" alt="">
                        </div>
                        <h4 class="mb-3">Natural language processing (NLP)</h4>
                        <p class="mb-0 jus">We help our customers in bridging the gap between human ...</p>
                        <a href="#!" data-toggle="modal" data-target="#wedo1">Read more</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="future-services text-center wow slideInUp" data-wow-duration="1s">
                        <div class="future-img">
                            <img src="img/feature/data.png" class="img-fluid mb-4" alt="">
                        </div>
                        <h4 class="mb-3">Data Analytics</h4>
                        <p class="mb-0 jus">Neuronoids turns technology into business outcomes by delivering Information ...</p>
                        <a href="#!" data-toggle="modal" data-target="#wedo2">Read more</a>

                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="future-services text-center wow slideInUp" data-wow-duration="1.5s">
                        <div class="future-img">
                            <img src="img/feature/dev.png" class="img-fluid mb-4" alt="">
                        </div>
                        <h4 class="mb-3">Computer Vision</h4>
                        <p class="mb-0 jus">Computer Vision (CV) is a field devoted for analyzing, modifying, and ...</p>
                        <a href="#!" data-toggle="modal" data-target="#wedo3">Read more</a>

                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="future-services text-center wow slideInUp" data-wow-duration="0.5s">
                        <div class="future-img">
                            <img src="img/feature/ml.png" class="img-fluid mb-4" alt="">
                        </div>
                        <h4 class="mb-3">Machine Learning</h4>
                        <p class="mb-0 jus">Machine Learning is a part of Artificial Intelligence. It builds...</p>
                        <a href="#!" data-toggle="modal" data-target="#wedo4">Read more</a>

                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="future-services text-center wow slideInUp" data-wow-duration="1s">
                        <div class="future-img">
                            <img src="img/feature/ai.png" class="img-fluid mb-4" alt="">
                        </div>
                        <h4 class="mb-3">Deep Learning</h4>
                        <p class="mb-0 jus">To maximize your data science potential, it is necessary to determine ...</p>
                        <a href="#!" data-toggle="modal" data-target="#wedo5">Read more</a>

                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="future-services text-center wow slideInUp" data-wow-duration="1.5s">
                        <div class="future-img">
                            <img src="img/feature/turn.png" class="img-fluid mb-4" alt="">
                        </div>
                        <h4 class="mb-3">Turnkey Solutions</h4>
                        <p class="mb-0 jus">Turnkey is a product or service that is designed, supplied, built...</p>
                        <a href="#!" data-toggle="modal" data-target="#wedo6">Read more</a>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>


        <?php
        //    include('hub.php');
        ?>
    </section>

    <!-- techs -->
    <section class="iq-clients  pt-0 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box">
                        <h2 class="title font-weight-bold">Technologies <b class="headings"> We use</b></h2>
                        <p class="sub-title">We Work on Many Programming Languages and tools, Mainly on.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="owl-carousel owl-carousel2" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="6" data-items-laptop="5" data-items-tab="3" data-items-mobile="2" data-items-mobile-sm="1">
                        <div class="item">
                            <div class="clients-box">
                                <img class="img-fluid client-img" src="images/clients/py.png" alt="image" data-toggle="tooltip" title="Python">
                            </div>
                        </div>
                        <div class="item">
                            <div class="clients-box">
                                <img class="img-fluid client-img" src="images/clients/r.png" alt="image" data-toggle="tooltip" title="R language">
                            </div>
                        </div>
                        <div class="item">
                            <div class="clients-box">
                                <img class="img-fluid client-img" src="images/clients/cp.png" alt="image" data-toggle="tooltip" title="C++">
                            </div>
                        </div>
                        <div class="item">
                            <div class="clients-box">
                                <img class="img-fluid client-img" src="images/clients/tensor.png" alt="image" data-toggle="tooltip" title="Tensor Flow">
                            </div>
                        </div>
                        <div class="item">
                            <div class="clients-box">
                                <img class="img-fluid client-img" src="images/clients/cuda.png" alt="image" data-toggle="tooltip" title="Cuda">
                            </div>
                        </div>
                        <div class="item">
                            <div class="clients-box">
                                <img class="img-fluid client-img" src="images/clients/lisp.png" alt="image" data-toggle="tooltip" title="Lisp">
                            </div>
                        </div>
                        <div class="item">
                            <div class="clients-box">
                                <img class="img-fluid client-img" src="images/clients/pyt.png" alt="image" data-toggle="tooltip" title="Pytorch">
                            </div>
                        </div>
                        <div class="item">
                            <div class="clients-box">
                                <img class="img-fluid client-img" src="images/clients/keras.png" alt="image" data-toggle="tooltip" title="Keras">
                            </div>
                        </div>
                        <div class="item">
                            <div class="clients-box">
                                <img class="img-fluid client-img" src="images/clients/cffe2.png" alt="image" data-toggle="tooltip" title="Coffe 2">
                            </div>
                        </div>
                        <div class="item">
                            <div class="clients-box">
                                <img class="img-fluid client-img" src="images/clients/aws.png" alt="image" data-toggle="tooltip" title="AWS ML">
                            </div>
                        </div>
                        <div class="item">
                            <div class="clients-box">
                                <img class="img-fluid client-img" src="images/clients/big.png" alt="image" data-toggle="tooltip" title="Big ML">
                            </div>
                        </div>
                        <div class="item">
                            <div class="clients-box">
                                <img class="img-fluid client-img" src="images/clients/google.png" alt="image" data-toggle="tooltip" title="Google Cloud">
                            </div>
                        </div>
                        <div class="item">
                            <div class="clients-box">
                                <img class="img-fluid client-img" src="images/clients/tab.png" alt="image" data-toggle="tooltip" title="Tableau">
                            </div>
                        </div>
                        <div class="item">
                            <div class="clients-box">
                                <img class="img-fluid client-img" src="images/clients/lin.png" alt="image" data-toggle="tooltip" title="Linux">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="iq-clients pt-5 mt-0 " id="career">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box">
                        <h2 class="title font-weight-bold">Current <b class="headings">Openings</b></h2>
                        <p class="sub-title">Work with our amazing team.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="owl-carousel owl-carousel3" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="6" data-items-laptop="5" data-items-tab="3" data-items-mobile="2" data-items-mobile-sm="1">
                        <div class="item">
                            <div class="clients-box">
                                
                                <h4 class="h3-responsive pb-3 font-weight-bold">Software Developer</h4>
                                <p class="jus">If you posses good programming skills and to be part of the leading team in code optimization & face the most advanced challenges in the area of computer vision and machine learning, we invite you to join Neuronoids.</p>
                                <div class="text-center">
                                    <a href="" class=" mb-4 aply-a cus-grad" data-toggle="modal" data-target="#applyform">Apply Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="clients-box">
                     
                                <h4 class="h3-responsive pb-3 font-weight-bold">Devops </h4>
                                <p class="jus">If you posses good programming skills and to be part of the leading team in code optimization & face the most advanced challenges in the area of computer vision and machine learning, we invite you to join Neuronoids.</p>
                                <!-- <a href="#contact">Apply Now</a> -->


                                <div class="text-center">
                                    <a href="" class=" mb-4 aply-a cus-grad" data-toggle="modal" data-target="#applyform">Apply Now</a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- partners -->
    <section class="iq-clients left-float pt-0 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box">
                        <h2 class="title font-weight-bold">Our <b class="headings"> Partners</b></h2>
                        <!-- <p class="sub-title">We Work on Many Programming Languages and tools, Mainly on.</p> -->
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="owl-carousel owl-carousel4 " data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="6" data-items-laptop="5" data-items-tab="3" data-items-mobile="2" data-items-mobile-sm="1">

                        <div class="item align-items-center">
                            <div class="clients-box">
                                <img class="img-fluid client-img" src="img/partners/zessta.png" alt="image" data-toggle="tooltip" title="Zessta">
                            </div>
                        </div>
                        <div class="item align-items-center">
                            <div class="clients-box">
                                <img class="img-fluid client-img" src="img/partners/russel1.png" alt="image" data-toggle="tooltip" title="McLEOD Russel">
                            </div>
                        </div>
                        <div class="item align-items-center">
                            <div class="clients-box">
                                <img class="img-fluid client-img" src="img/partners/prime.png" alt="image" data-toggle="tooltip" title="Prime Classes">
                            </div>
                        </div>
                        <div class="item align-items-center">
                            <div class="clients-box">
                                <img class="img-fluid client-img" src="img/partners/karnataka1.jpg" alt="image" data-toggle="tooltip" title="Karnataka Forest Department">
                            </div>
                        </div>
                        <div class="item align-items-center">
                            <div class="clients-box">
                                <img class="img-fluid client-img bg-dark" src="img/partners/flochat1.png" alt="image" data-toggle="tooltip" title="Flowchart">
                            </div>
                        </div>
                        <div class="item align-items-center">
                            <div class="clients-box">
                                <img class="img-fluid client-img" src="img/partners/insights1.png" alt="image" data-toggle="tooltip" title="Insights Of Data">
                            </div>
                        </div>
                        <div class="item align-items-center">
                            <div class="clients-box">
                                <img class="img-fluid client-img bg-dark" src="img/partners/nviso.png" alt="image" data-toggle="tooltip" title="NVISO">
                            </div>
                        </div>
                        <div class="item align-items-center">
                            <div class="clients-box">
                                <img class="img-fluid client-img" src="img/partners/thinci.png" alt="image" data-toggle="tooltip" title="thinci">
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- contact form -->
    <!--Section: Contact v.2-->
    <section class="mb-4 pt-5" id="contact">
        <div class="container">
            <?php

            if (isset($_POST['save'])) {
                $mysqltime = date_create()->format('Y-m-d H:i:s');
                $sql = "INSERT INTO users(name, email, number, subject, message, date)
    VALUES ('" . $_POST["name"] . "','" . $_POST["email"] . "', '" . $_POST["number"] . "', '" . $_POST["subject"] . "', '" . $_POST["message"] . "', '" . $mysqltime . "')";
 
                $result = mysqli_query($conn, $sql);

                header('Location: index.php');
            }

            ?>
            <!--Section heading-->
            <h2 class="h1-responsive font-weight-bold text-center my-4">Contact <b class="headings">us</b></h2>
            <!--Section description-->
            <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
                a matter of hours to help you.</p>

            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <!--Grid column-->
                        <div class="col-md-12 mb-md-0 mb-5">
                            <?php include('contact.php'); ?>


                            <div class="status"></div>
                        </div>

                    </div>

                </div>
                <div class="col-lg-6">
                    <!--Google map-->
                    <div id="map-container-google-2" class="z-depth-1-half map-container" style="height: 400px">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.160713248447!2d78.39122601473592!3d17.452020288039904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb9165d74fbe5d%3A0x7450b684368667c3!2sNeuronoids+Private+Limited!5e0!3m2!1sen!2sin!4v1559888432652!5m2!1sen!2sin" style="width:100%;height:100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>

                    <!--Google Maps-->
                </div>
            </div>
            <div>

    </section>
    <!--Section: Contact v.2-->

    <!-- Footer -->
    <footer class="page-footer font-small bg-dark pt-4">

        <!-- Footer Links -->
        <div class="container text-center text-md-left">

            <!-- Footer links -->
            <div class="row text-center text-md-left mt-3 pb-3">

                <!-- Grid column -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <div class="footer-logo mb-3">
                        <a href="index.php"><img src="img/logo/logo.png" alt="img"></a>
                    </div>
                    <!-- <h6 class="text-uppercase mb-4 font-weight-bold">Company name</h6> -->
                    <p class="jus">We at Neuronoids have deep roots into developing custom algorithms on the need basis and building complete processing pipeline end to end.</p>
                </div>
                <!-- Grid column -->

                <hr class="w-100 clearfix d-md-none">

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Our Area of Expertise</h6>
                    <p>
                        <a href="#!">Machine Learning</a>
                    </p>
                    <p>
                        <a href="#!">Computer Vision</a>
                    </p>
                    <p>
                        <a href="#!">Natural Language Processing</a>
                    </p>
                    <p>
                        <a href="#!">Speech Recognition</a>
                    </p>
                    <p>
                        <a href="#!">Optimization</a>
                    </p>
                    <p>
                        <a href="#!">Robotics</a>
                    </p>
                    <!-- <p>
                        <a href="#!">Rule Based Systems</a>
                    </p>
                    <p>
                        <a href="#!">Expert Systems</a>
                    </p> -->
                </div>
                <!-- Grid column -->

                <hr class="w-100 clearfix d-md-none">

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Useful links</h6>
                    <p>
                        <a href="index.php">Home</a>
                    </p>
                    <p>
                        <a href="#wethink">What we think</a>
                    </p>
                    <p>
                        <a href="#wedo">What We do</a>
                    </p>
                    <p>
                        <a href="#contact">Find Us</a>
                    </p>
                </div>

                <!-- Grid column -->
                <hr class="w-100 clearfix d-md-none">

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Find Us at</h6>
                    <p>
                        <i class="fas fa-home mr-3"></i> 3rd Floor, B Block, UPTOWN Cyberabad Building, 100 Feet Road, Ayyappa Society, Madhapur, Hyderabad, </p>
                    <p>
                        <i class="fas fa-envelope mr-3"></i> info@neuronoids.com</p>
                    <p>
                        <i class="fas fa-phone mr-3"></i> 040-48531655/755</p>
                  
                </div>
                <!-- Grid column -->

            </div>
            <!-- Footer links -->

            <hr>

            <!-- Grid row -->
            <div class="row d-flex align-items-center">

                <!-- Grid column -->
                <div class="col-md-7 col-lg-8">

                    <!--Copyright-->
                    <p class="text-center text-md-left">© 2018 Copyright:
                        <a href="#!">
                            <strong> neuronoids.com</strong>
                        </a>
                    </p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-5 col-lg-4 ml-lg-0">

                    <!-- Social buttons -->
                    <div class="text-center text-md-right">
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item">
                                <a class="btn-floating btn-sm rgba-white-slight mx-1" href="https://www.facebook.com/Neuronoids-295499264297992/">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn-floating btn-sm rgba-white-slight mx-1" href="https://twitter.com/neuronoids">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn-floating btn-sm rgba-white-slight mx-1" href="https://plus.google.com/u/0/b/110116149444378768597">
                                    <i class="fab fa-google-plus-g"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn-floating btn-sm rgba-white-slight mx-1" href="https://in.pinterest.com/computers0080/pins/">
                                    <i class="fab fa-pinterest-p"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

    </footer>
    <!-- Footer -->
    <!-- Footer -->
    <div id="back-to-top">
        <a class="top" id="top" href="#top"><span>Scroll Up</span> <i class="fas fa-arrow-up"></i></a>
    </div>
    <!-- fixed form -->

    <div id="feedback">
        <a href="#!" data-toggle="modal" class="br-90 cus-grad" data-target="#contactform">Get in Touch</a>
    </div>
    <div class="modal cus-model fade " id="contactform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title text-center w-100 font-weight-bold " id="exampleModalLabel">Get In Touch</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    include('contact.php');
                    ?>
                </div>

            </div>
        </div>
    </div>
    <script>
        $('.baSlider').baSlider();
    </script>
    <!-- owl carousel script -->
    <script>
        $(document).ready(function() {
            var owl = $('.owl-carousel1');
            owl.owlCarousel({
                margin: 10,
                nav: true,
                loop: true,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 2
                    }
                }
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            var owl = $('.owl-carousel2');
            owl.owlCarousel({
                margin: 10,
                nav: true,
                loop: true,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: false,
                responsive: {
                    0: {
                        items: 3
                    },
                    600: {
                        items: 5
                    },
                    1000: {
                        items: 6
                    }
                }
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            var owl = $('.owl-carousel4');
            owl.owlCarousel({
                margin: 10,
                nav: true,
                loop: true,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: false,
                responsive: {
                    0: {
                        items: 3
                    },
                    600: {
                        items: 5
                    },
                    1000: {
                        items: 6
                    }
                }
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            var owl = $('.owl-carousel3');
            owl.owlCarousel({
                margin: 10,
                nav: true,
                loop: true,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            // Add scrollspy to <body>
            $('body').scrollspy({
                target: ".navbar",
                offset: 50
            });

            // Add smooth scrolling on all links inside the navbar
            $("#myNavbar a").on('click', function(event) {
                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 2000, function() {

                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                } // End if
            });
        });
    </script>
    <script>

$('#demo').on('hidden.bs.modal', function (e) {
  // do something...
  $('#demo iframe').attr("src", $("#demo iframe").attr("src"));
});
</script>
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->

    <!-- custom js -->

    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>

</body>

</html>