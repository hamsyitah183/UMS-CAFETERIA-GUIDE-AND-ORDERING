@extends('UMS.dashboard.layouts.main')

@section('dash-content')
<div class="overview">
    <!-- search box and title -->
    <div class="topContent">
        <div class="icon">
            <button class="back">
                <a href="/dashboard/owner">
                    <i class="bi bi-arrow-90deg-left"></i>
                    <span class="word">Return to list</span>
                </a>
            </button>
        </div>

    </div>

    @if ($owner->foodOption)
          <!-- content -->
    <div class="content">
        <div class="box1">
            <div class="profile">
                <div class="image">
                    <img src="https://www.dropee.com/pages/wp-content/uploads/2022/04/sincerely-media-VNsdEl1gORk-unsplash-768x1024.jpg" alt="" srcset="">
                </div>
                <div class="text__box">
                    <div class="name flex">
                        <p>Cafeteria XYZ</p>
                        <div class="status active">
                            <i class="bi bi-circle-fill"></i>
                        </div>
                    </div>

                    <div class="name2 flex">
                        <div class="username flex">
                            <i class="bi bi-person"></i>
                            <p>{{ $owner->name }}</p>
                        </div>
                    </div>

                    <div class="noPhone flex">
                        <i class="bi bi-telephone"></i>
                        {{ $owner->no_phone }}
                    </div>

                    <div class="email flex">
                        <i class="bi bi-envelope"></i>

                        <p>
                            {{ $owner->email }}
                        </p>
                    </div>

                    <div class="type flex">
                        <i class="bi bi-shop"></i>
                        @php
                            if($owner->foodOption->type == 1) {$place = 'Cafeteria';}

                            elseif($owner->foodOption->type == 2) {$place = 'Kiosk';}

                            elseif($owner->foodOption->type == 3) {$place = 'Vendor';}
                        @endphp
                        <p>Type : <span class="bold">{{ $place }}</span></p>
                    </div>

                    <div class="address flex">
                        <div class="logo">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="addressLine">
                            <!-- CAFE TUN MUSTAPHA, Universiti Malaysia Sabah, 88400 Kota Kinabalu, Sabah -->
                            <p class="line1">{{ $owner->addressLine1 }}</p>
                            <p class="line2">{{ $owner->addressLine2 }}</p>
                            <p class="line3">{{ $owner->addressLine3 }}</p>
                        </div>
                    </div>

                    <div class="dateJoined flex">
                        <i class="bi bi-calendar"></i>
                        <p>{{ $owner->created_at }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="box2">
            <div class="order">
                <h1>Order History</h1>
                <div class="orderHistory">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Details</th>
                                <th>Status</th>
                                <th>Price</th>
                                <th>Customer No</th>
                                <th>Order ID</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Chicken goreng</td>
                                <td>Paid</td>
                                <td>RM 9.00</td>
                                <td>11</td>
                                <td>#BI9812</td>
                                <td>2023-09-14 9:00 AM</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Chicken goreng</td>
                                <td>Paid</td>
                                <td>RM 9.00</td>
                                <td>11</td>
                                <td>#BI9812</td>
                                <td>2023-09-14 9:00 AM</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Chicken goreng</td>
                                <td>Paid</td>
                                <td>RM 9.00</td>
                                <td>11</td>
                                <td>#BI9812</td>
                                <td>2023-09-14 9:00 AM</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Chicken goreng</td>
                                <td>Paid</td>
                                <td>RM 9.00</td>
                                <td>11</td>
                                <td>#BI9812</td>
                                <td>2023-09-14 9:00 AM</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Chicken goreng</td>
                                <td>Paid</td>
                                <td>RM 9.00</td>
                                <td>11</td>
                                <td>#BI9812</td>
                                <td>2023-09-14 9:00 AM</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="box3">
                <h1>Review and Rating</h1>
                <div class="reviewAndRating">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Review</th>
                                <th>Customer ID</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($owner->foodOption->reviewAndRating as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->message }}</td>
                                <td>{{ $item->user_id}}</td>
                                <td>{{ $item->created_at }}</td>
                            </tr>
                            @endforeach

                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- gallery and menu -->
    <div class="content2 flex">
        <div class="box4">
            <div class="text__box">
                <h1>Gallery</h1>
            </div>
            <div class="galleryContent mySwiper2">
                <div class="gallery swiper-wrapper">
                    @foreach ($owner->foodOption->gallery as $item)
                        <div class="images swiper-slide">
                            @php
                            $imageUrl = $item->image
                                ? (Str::startsWith($item->image, ['http://', 'https://'])
                                    ? $item->image
                                    : asset('storage/' . $item->image))
                                : asset('path/to/placeholder-image.jpg');
                            @endphp
                            <img src="{{ $imageUrl }}" alt="" srcset="">
                        </div>
                    @endforeach
                    <div class="images swiper-slide">
                        <img src="https://www.yummytummyaarthi.com/wp-content/uploads/2023/03/3f0d98a9-c59f-4dac-8071-4087d82aa365-scaled.jpeg" alt="" srcset="">
                    </div>
                </div>
                <div class="button">
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>

        <div class="box5">
            <div class="text__box flex">
                <h1>Menu</h1>
                <p class="date">23 June 2023</p>
            </div>

            <div class="menu">
                <div class="categories ">
                    @php
                        foreach($owner->foodOption->menu as $item) {
                            if($item->category == 'Breakfast') {
                                $breakfast[] = $item;
                            }

                            elseif($item->category == 'Lunch') {
                                $Lunch[] = $item;
                            }
                            elseif($item->category == 'Drink') {
                                $Drink[] = $item;
                            }
                        }

                        
                    @endphp
                    <div class="breakfast category ">
                        <h2>Breakfast</h2>
                        <div class="list">
                            @foreach ($breakfast as $item)
                                <div class="lists flex">
                                    <div class="foodName ">
                                        <h3 class="name">{{ $item->name }}</h3>
                                        <p class="description">{{ $item->description }}</p>
                                    </div>

                                    <div class="price">
                                        <p>RM {{ $item->price }}</p>
                                    </div>
                                </div>

                            @endforeach
                            

                            
                        </div>
                    </div>
                    <div class="lunch category">
                        <h2>Lunch</h2>
                        <div class="list">
                            @foreach ($Lunch as $item)
                                <div class="lists flex">
                                    <div class="foodName ">
                                        <h3 class="name">{{ $item->name }}</h3>
                                        <p class="description">{{ $item->description }}</p>
                                    </div>

                                    <div class="price">
                                        <p>RM {{ $item->price }}</p>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                    <div class="drink category">
                        <h2>Drink</h2>
                        <div class="list">
                            @foreach ($Drink as $item)
                                <div class="lists flex">
                                    <div class="foodName ">
                                        <h3 class="name">{{ $item->name }}</h3>
                                        <p class="description">{{ $item->description }}</p>
                                    </div>

                                    <div class="price">
                                        <p>RM {{ $item->price }}</p>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="button">
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>

    @else

    <h2 class="content">No food option is made</h2>

    @endif
    <div class="container">
        <a href="#hero" class="scrollup" id="scroll-up">
            <i class="ri-arrow-up-line"></i>
        </a>
     </div>
</div>
@endsection