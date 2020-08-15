<!DOCTYPE html>
<!--
	Transit by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Resepin - Prescription on the cloud</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
    <script src="js/jquery.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    <noscript>
        <link rel="stylesheet" href="css/skel.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-xlarge.css" />
    </noscript>
</head>

<body class="landing">

  

    <!-- Header -->
    <header id="header">
        <h1><a href="index.html">Resepin</a></h1>
        <nav id="nav">
            <ul>
                @if (Route::has('login'))
                @auth
                <li><a href="{{ url('/home') }}" class="button">Home</a></li>
                @else
                <li><a href="{{ route('login') }}" class="button">Login</a></li>

                @if (Route::has('register'))
                <li> <a href="{{ route('register') }}" class="button">Register</a></li>
                @endif
                @endauth
                @endif
               
            </ul>
        </nav>
    </header>

    <!-- Banner -->
    <section id="banner">
        <h2>Welcome to Resepin!</h2>
        <p>Prescription on the cloud</p>
        <p style="margin: 0px 75px 0px 75px; font-size: 1.25em;">This website will help standardise doctors' prescriptions for patients, in order to ensure that the use of drugs is in accordance to the recommended dosage.</p><br/>
        <p style="margin: 0px 75px 0px 75px; font-size: 1.25em;">Our database is also integrated with patients, doctors and pharmacies all over Indonesia. With only your identity card number, your doctor could digitally prescribe your medication, for you to collect from any pharmacy.</p>
        <!-- <ul class="actions">
            <li>
                <a href="#" class="button big">Enter</a>
            </li>
        </ul> -->
    </section>

    <!-- One -->
    <section id="one" class="wrapper style1 special">
        <div class="container">
            <header class="major">
                <h2>Are you a patient, a doctor or a pharmacist?</h2>
            </header>
            <div class="row 150%">
                <div class="4u 12u$(medium)">
                    <section class="box">
                        <i class="icon big rounded color1 fa fa-user"></i>
                        <h3>Patient</h3>
                        <p>As a patient, you will have access to records and history of your doctor prescribed medications, and collect them for any pharmacy of choice.</p>
                    </section>
                </div>
                <div class="4u 12u$(medium)">
                    <section class="box">
                        <i class="icon big rounded color9 fa fa-user-md"></i>
                        <h3>Doctor</h3>
                        <p>As a doctor, you will be able to input prescription data for your patients, and ensure that the pharmacists only give the drugs with respected dosage.</p>
                    </section>
                </div>
                <div class="4u$ 12u$(medium)">
                    <section class="box">
                        <i class="icon big rounded color6 fa fa-medkit"></i>
                        <h3>Pharmacist</h3>
                        <p>As a pharmacist, you could see the prescription each patient has yet to collect, and mark as collected medications that are successfully purchased.</p>
                    </section>
                </div>
            </div>
        </div>
    </section>

    <!-- Two -->
    <!-- 	<section id="two" class="wrapper style2 special">
				<div class="container">
					<header class="major">
						<h2>Lorem ipsum dolor sit</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio, autem.</p>
					</header>
					<section class="profiles">
						<div class="row">
							<section class="3u 6u(medium) 12u$(xsmall) profile">
								<img src="images/profile_placeholder.gif" alt="" />
								<h4>Lorem ipsum</h4>
								<p>Lorem ipsum dolor</p>
							</section>
							<section class="3u 6u$(medium) 12u$(xsmall) profile">
								<img src="images/profile_placeholder.gif" alt="" />
								<h4>Voluptatem dolores</h4>
								<p>Ullam nihil repudi</p>
							</section>
							<section class="3u 6u(medium) 12u$(xsmall) profile">
								<img src="images/profile_placeholder.gif" alt="" />
								<h4>Doloremque quo</h4>
								<p>Harum corrupti quia</p>
							</section>
							<section class="3u$ 6u$(medium) 12u$(xsmall) profile">
								<img src="images/profile_placeholder.gif" alt="" />
								<h4>Voluptatem dicta</h4>
								<p>Et natus sapiente</p>
							</section>
						</div>
					</section>
					<footer>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam dolore illum, temporibus veritatis eligendi, aliquam, dolor enim itaque veniam aut eaque sequi qui quia vitae pariatur repudiandae ab dignissimos ex!</p>
						<ul class="actions">
							<li>
								<a href="#" class="button big">Lorem ipsum dolor sit</a>
							</li>
						</ul>
					</footer>
				</div>
			</section> -->

    <!-- Three -->
    <!-- <section id="three" class="wrapper style3 special">
        <div class="container">
            <header class="major">
                <h2>Consectetur adipisicing elit</h2>
                <p>Lorem ipsum dolor sit amet. Delectus consequatur, similique quia!</p>
            </header>
        </div>
        <div class="container 50%">
            <form action="#" method="post">
                <div class="row uniform">
                    <div class="6u 12u$(small)">
                        <input name="name" id="name" value="" placeholder="Name" type="text">
                    </div>
                    <div class="6u$ 12u$(small)">
                        <input name="email" id="email" value="" placeholder="Email" type="email">
                    </div>
                    <div class="12u$">
                        <textarea name="message" id="message" placeholder="Message" rows="6"></textarea>
                    </div>
                    <div class="12u$">
                        <ul class="actions">
                            <li><input value="Send Message" class="special big" type="submit"></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </section> -->

    <!-- Footer -->
    <footer id="footer">
        <div class="container">
            <header class="major">
                <h2>Why use Resepin?</h2>
            </header>
            <section class="links">
                <div class="row">
                    <section class="4u 6u(medium) 12u$(small)">
                        <h3>The prescription is controlled</h3>
                        <ul class="unstyled">
                            <li>With all doctors' prescriptions digitally recorded within RESEPIN, the procedure can help ensure that the medication purchase, dosage, and quantity are as intended; which might otherwise cause serious harm to the patients.</li>
                        </ul>
                    </section>
                    <section class="4u 6u$(medium) 12u$(small)">
                        <h3>The prescription history could be monitored</h3>
                        <ul class="unstyled">
                            <li>With different access levels, stakeholders can view, filter, and analyse the prescriptions over a specific time range.</li>
                        </ul>
                    </section>
                    <section class="4u 6u(medium) 12u$(small)">
                        <h3>Integrated database</h3>
                        <ul class="unstyled">
                            <li>Our database is also integrated with patients, doctors and pharmacies all over Indonesia. The centralised and standardised system allows tracking, monitoring and analysing of the relevant prescription data.</li>
                        </ul>
                    </section>
                </div>
            </section>
            <div class="row">
                <div class="8u 12u$(medium)">
                    <ul class="copyright">
                        <li>&copy; Untitled. All rights reserved.</li>
                        <li>Design: <a href="http://templated.co">TEMPLATED</a></li>
                        <li>Images: <a href="http://unsplash.com">Unsplash</a></li>
                    </ul>
                </div>
                <!-- <div class="4u$ 12u$(medium)">
                    <ul class="icons">
                        <li>
                            <a class="icon rounded fa-facebook"><span class="label">Facebook</span></a>
                        </li>
                        <li>
                            <a class="icon rounded fa-twitter"><span class="label">Twitter</span></a>
                        </li>
                        <li>
                            <a class="icon rounded fa-google-plus"><span class="label">Google+</span></a>
                        </li>
                        <li>
                            <a class="icon rounded fa-linkedin"><span class="label">LinkedIn</span></a>
                        </li>
                    </ul>
                </div> -->
            </div>
        </div>
    </footer>

</body>

</html>