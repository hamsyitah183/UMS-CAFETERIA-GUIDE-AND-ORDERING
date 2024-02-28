<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @section('title', 'Sepilok Orangutan Rehabilitation Centre')
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>

<body>

<section class="content">
    <div class="content-page">
        <div class="content-banner">
        <img src="{{ asset('img/banner-orangutan.jpg') }}" alt="banner">
        </div>

        <div class="content-grid">
            <div class="content-container">
                <div class="content-info">
                    <div class="content-news">
                    <h3>ENTRANCE FEE</h3>
                        <!-- need to make a grid table -->
                        <div class="content-entrance">
                            <h4 class="adult">ADULTS:</h4>
                            <ul>
                                <li>RM5.00 (Malaysian)</li>
                                <li>RM30.00 (Non-Malaysian)</li>
                            </ul>
                            <h4 class="children">CHILDREN:</h4>
                            <ul>
                                <li>RM2.00 (Malaysian)</li>
                                <li>RM15.00 (Non-Malaysian)</li>
                            </ul>    
                        </div>
                    </div>
                    <div class="content-news">
                        <h3>VISITING HOURS</h3>
                        <!-- need to make a grid table -->
                        <div class="content-visit">
                            <h4 class="mon">MON-THURS</h4>
                            <h4 class="sat">SAT-SUN</h4>
                            <ul>
                                <li>9.00AM - 12.00 PM</li>
                                <li>2.00 - 4.00 PM</li>
                            </ul>    
                            <h4 class="fri">FRI</h4>
                            <ul>
                                <li>9.00AM - 11.00 PM</li>
                                <li>2.00 - 4.00 PM</li>
                            </ul> 
                        </div>
                    </div>
                </div>
                <div class="content-info">
                    <div class="content-ann">
                        <h3>ANNOUNCEMENT NEWS</h3>
                        <!-- Container for the slideshow -->
                        <div class="slideshow-container">
                            <div class="slides fades">
                                <img src="{{ asset('img/ann2.png') }}" alt="banner">
                                <h1>Don't miss out on Sepilok Jazz this Friday and Saturday!!!</h1>
                            </div>
                            <div class="slides fades">
                                <img src="{{ asset('img/ann3.jpg') }}" alt="banner">
                                <h1>Celebrating Merdeka @ Sepilok Rehabilitation Centre</h1>                            
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script></head>


    @extends('main_footer')

</body>

</html>