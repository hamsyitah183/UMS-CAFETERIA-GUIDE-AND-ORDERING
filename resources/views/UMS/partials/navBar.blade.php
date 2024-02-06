
<header class="header" id="header">
    <div class="hello">
        <div class="nav__data">
            <a href="#" class="nav__logo">
             <i class="bi bi-egg-fried"></i> UMS Cafeteria Guide and Ordering 
            </a>

            
            
            <div class="nav__toggle" id="nav-toggle">
               <i class="ri-menu-line nav__burger"></i>
               <i class="ri-close-line nav__close"></i>
            </div>
         </div>

         <form action="/search">
            <div class="search-box">
                
                    <input type="text" name="search" id="" placeholder="FKJ or Nasi" class="search__textbox">
                
            
                <button type="submit">
                    <div class="search-logo btn">
                        <i class="ri-search-line"></i>
                    </div>
                </button>
            </div>
        </form>

    </div>


    <nav class="nav container">
        <!-- <div class="nav__data">
           <a href="#" class="nav__logo">
            <i class="bi bi-egg-fried"></i> UMS Cafeteria Guide and Ordering 
           </a>
           
           <div class="nav__toggle" id="nav-toggle">
              <i class="ri-menu-line nav__burger"></i>
              <i class="ri-close-line nav__close"></i>
           </div>
        </div> -->

        <!--=============== NAV MENU ===============-->
        <div class="nav__menu" id="nav-menu">
            
           <ul class="nav__list">
              <li><a href="/" class="nav__link">Home</a></li>

              <li><a href="/announcement" class="nav__link">Announcement</a></li>

              <li><a href="/map" class="nav__link">Map</a></li>

              <!--=============== DROPDOWN 1 ===============-->
              <li class="dropdown__item">
                 <div class="nav__link">
                    Dining Option <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                 </div>

                 <ul class="dropdown__menu">
                    <li>
                       <a href="/foodOption/cafeteria" class="dropdown__link">
                        <i class="ri-arrow-right-s-line"></i> Cafeteria
                       </a>                          
                    </li>

                    <li>
                       <a href="/foodOption/kiosk" class="dropdown__link">
                        <i class="ri-arrow-right-s-line"></i> Kiosk
                       </a>
                    </li>

                    <li>
                       <a href="/foodOption/vendor" class="dropdown__link">
                        <i class="ri-arrow-right-s-line"></i> Food vendor
                       </a>
                    </li>

                    

                 </ul>
              </li>
              
             
              
              
              

              <li><a href="/about" class="nav__link">About us</a></li>

              <!-- cart -->
              @if (auth()->check())
                @include('UMS.partials.cart')
              @endif

              {{-- profile --}}
              <li class="dropdown__item">
                <div class="nav__link">
                   User <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                </div>
                <ul class="dropdown__menu">
                    @if (!auth()->check())
                        <li>
                            <a href="/login" class="dropdown__link">
                            <i class="ri-arrow-right-s-line"></i> Login
                            </a>                          
                        </li>
                    @else
                        <li>
                            <a href="/dashboard" class="dropdown__link">
                            <i class="ri-arrow-right-s-line"></i> Dashboard
                            </a>                          
                        </li>
                        <li>
                            <a href="/logout" class="dropdown__link">
                            <i class="ri-arrow-right-s-line"></i> Logout
                            </a>                          
                        </li>
                    @endif

                   

                 </ul>

                
             </li>

              {{-- search --}}
              <li class="nav__link">
                <div class="search">
                    <i class="bi bi-search"></i>
                </div>

                <div class="searchBox">
                    <form action="/search">
                        <input type="text" name="search" id="" placeholder="Search..."> 
                        <button type="submit">Search</button>
                    </form>
                </div>
              </li>
              
           </ul>
        </div>
     </nav>
</header>