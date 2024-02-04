<nav>
    <div class="logo-name">
        <!-- <div class="logo-image">
            <img src="https://images.pexels.com/photos/1870376/pexels-photo-1870376.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">

        </div> -->

        <span class="logo_name"> <i class="bi bi-egg-fried"></i> UMS Cafeteria Guide and Ordering </span>
    </div>

    <div class="menu-items">
        <ul class="nav-links">
            
            <li class="{{ $type === "Dashboard" ? "active" : "" }} " ><a href="/dashboard" >
                <i class="ri-home-8-line"></i>
                <span class="link-name" >Dashboard</span>
            </a></li>

            
            @if(Auth::user()->role == 'owner' && Auth::user()->role == 'customer')
            {
                <li class="{{ $type === "Order" ? "active" : "" }}">
                
                    <a href="/dashboard/order"  id="menu" class="menu">
                        <i class="ri-restaurant-2-line"></i>
                        <span class="link-name" >Order</span>
                               
                    </a>

                   
                    
                </li>
            }
            @endif
              
            

            
            <li class="{{ $type === "announcement" ? "active" : "" }}">
                <a href="/dashboard/announcement">
                <i class="bi bi-megaphone"></i>
                <span class="link-name">Announcement</span>
            </a></li>
            

            @if (Auth::user()->role == 'admin')
                <li class="{{ $type === "customer" ? "active" : "" }}"><a href="/dashboard/customer">
                    <i class="bi bi-person-fill"></i>
                    <span class="link-name">Customer</span>
                </a></li>
            @endif

            @if (Auth::user()->role == 'admin')
                <li class="{{ $type === "owner" ? "active" : "" }}"><a href="/dashboard/owner">
                    <i class="bi bi-person"></i>                    
                    <span class="link-name">Owner</span>
                </a></li>
            @endif

            
           
            <li class="{{ $type === "owner" ? "active" : "" }}"><a href="/dashboard/post">
                <i class="ri-article-line"></i>                  
                <span class="link-name">Post</span>
            </a></li>
           

            
                <li class="{{ $type === "foodOption" ? "active" : "" }}"><a href="/dashboard/foodOption">
                    <i class="ri-store-2-line"></i>                
                    <span class="link-name">Food Option</span>
                </a></li>
            
                

            {{-- <li class="{{ $type === "menu" ? "active" : "" }}"><a href="/dashboard/menu">
                    <i class="bi bi-journals"></i>                    
                    <span class="link-name">Menu</span>
            </a></li> --}}

            @if (auth()->user()->role == 'owner')
                <li class="{{ $type === "menu" ? "active" : "" }}">
                
                    <a href="/dashboard/menu"  id="menu" class="menu">
                        <i class="bi bi-journals"></i>
                        <span class="link-name" >Menu</span>
                                    
                    </a>

                   
                    
                </li>
            @endif
            

            <li class="{{ $type === "feedback" ? "active" : "" }}"><a href="/dashboard/feedback">
                <i class="ri-question-answer-line"></i>
                <span class="link-name">Feedback</span>
            </a></li>

            {{-- <li class="{{ $type === "report" ? "active" : "" }}"><a href="#">
                <i class="bi bi-newspaper"></i>
                <span class="link-name">Report</span>
            </a></li> --}}

            @if (auth()->user()->role == 'owner')
                <li class="{{ $type === "gallery" ? "active" : "" }}">
                    <a href="/dashboard/gallery">
                    <i class="ri-gallery-line"></i>
                    <span class="link-name">Gallery</span>
                </a></li>

                {{-- <i class="ri-map-pin-line"></i> --}}
                <li class="{{ $type === "map" ? "active" : "" }}">
                    <a href="/dashboard/map">
                    <i class="ri-map-pin-line"></i>
                    <span class="link-name">Map</span>
                </a></li>

                
            @endif
        </ul>

        <ul class="logout-mode">
            <li class="logout"><a href="#">
                <form action="/logout" method="GET">
                    @csrf
                    
                    <button type="submit" style="border: none"><span class="link-name"><i class="ri-logout-circle-r-line"></i><span>Logout</span></span></button>
                </form>
                

            </a></li>

            <li class="mode">
                <a href="#">
                    <i class="ri-moon-line"></i>                    
                    <span class="link-name">Dark Mode</span>
                </a>
           

                <div class="mode-toggle">
                    <span class="switch"></span>
                </div> 
            </li>
        </ul>
    </div>
</nav>

<script>
    let menu = document.querySelector('#menu');
    let menuList = document.querySelector('ul#menu-list.menu-list');
    // console.log(menuIcon);
    menu.addEventListener('click', () => {
        menu.classList.toggle('appear');
        menuList.classList.toggle('appear');
    });


    
</script>