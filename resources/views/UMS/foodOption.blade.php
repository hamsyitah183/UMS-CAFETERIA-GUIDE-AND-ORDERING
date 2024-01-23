@extends('UMS.layout.main')

@section('container')
     <!-- hero dining option -->
     <section class="hero__dining" id="hero">
        <div class="hero__container container">
            <h2 class="small__title">dining option</h2>
            <h1 class="big__title">
                <span class="highlight">Dining Diversity:</span> Explore <br>Your Options
            </h1>
        </div>
    </section>


    <section class="dining__option" id="dining">
        <div class="dining__container container">

            <div class="dining">
                <div class="dinings cafeteria">
                    <img src="https://images.pexels.com/photos/2067638/pexels-photo-2067638.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" srcset="">
                    <p class="paragraph">Cafeteria</p>
                </div>

                <div class="dinings kiosk">
                    <img src="https://static.wixstatic.com/media/beaaa8_b6c286b4e81c4e2da5e97218b1cb8009~mv2.jpg/v1/fill/w_740,h_493,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/beaaa8_b6c286b4e81c4e2da5e97218b1cb8009~mv2.jpg" alt="" srcset="">
                    <p class="paragraph">Kiosk</p>
                </div>

                <div class="dinings market">
                    <img src="https://www.ums.edu.my/v5/images/stories/berita_attach/tam.JPG" alt="" srcset="">
                    <p class="paragraph">Market</p>
                </div>

                <div class="dinings vendor">
                    <img src="https://bloximages.chicago2.vip.townnews.com/theeagle.com/content/tncms/assets/v3/editorial/6/2c/62c395ea-6e95-11e5-aa75-07e781912c59/55a89333954d2.image.jpg?resize=1200%2C793" alt="" srcset="">
                    <p class="paragraph">Food vendor</p>
                </div>
            </div>
        </div>
    </section>

    <section class="top_places">
        <div class="topPlaces__container container">
            <div class="topPlaces__title">
                <h3 class="small__title">top rated places</h3>
                <h2 class="medium__title">Eats Excellence: Best-Rated Dining Destinations</h2>
            </div>

            <div class="topPlaces__place">
                <div class="places">
                    <img src="https://fastly.4sqi.net/img/general/width960/507488789_FpQZIGaFHojmv46THn9byyYSBXxuHher7wkcKkcfYx8.jpg" alt="" srcset="">
                    <p>Marina Cafe</p>
                </div>

                <div class="places">
                    <img src="https://scontent.fkul5-2.fna.fbcdn.net/v/t1.6435-9/71231462_2417015145083806_7625113009777541120_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=810d5f&_nc_ohc=YJlr9xydM4AAX9eeqlU&_nc_ht=scontent.fkul5-2.fna&oh=00_AfCYAVSoe-lfK9xkPnt6DjZuvA8dbZQbneuExgHvW3wmKA&oe=6570EA69" alt="" srcset="">
                    <p>Kak Kiah</p>
                </div>

                <div class="places">
                    <img src="https://www.everydayonsales.com/wp-content/uploads/sites/5/2020/09/thumbs-1024x1024.jpg" alt="">
                    <p>Cafeteria XYZ</p>
                </div>

                <div class="places">
                    <img src="https://www.everydayonsales.com/wp-content/uploads/sites/5/2020/09/51128855_1230438787111368_8558496857756117561_n-1024x1024-1-1024x1024.jpg" alt="">
                    <p>Cafeteria ABC</p>
                </div>
            </div>
        </div>
    </section>
@endsection