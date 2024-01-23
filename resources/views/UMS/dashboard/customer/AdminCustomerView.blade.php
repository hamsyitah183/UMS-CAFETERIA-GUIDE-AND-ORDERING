@extends('UMS.dashboard.layouts.main')

@section('dash-content')
<div class="overview">
    <!-- search box and title -->
    <div class="topContent">
        <div class="icon">
            <button class="back">
                <a href="/dashboard/customer">
                    <i class="bi bi-arrow-90deg-left"></i>
                    <span class="word">Return to list</span>
                </a>
            </button>
        </div>

    </div>
{{-- @dd($customer) --}}
    <!-- content -->
    <div class="content">
        <div class="box1">
            <div class="profile">
                <div class="image">
                    <img src="https://t4.ftcdn.net/jpg/00/11/19/77/360_F_11197782_qFvjFMJO62N8alNaTBn0REuBhlVwxM1d.jpg" alt="" srcset="">

                </div>
                <div class="text__box">
                    <div class="name flex">
                        <p style="width:250px; word-wrap:break-word" >{{ $customer->username }}</p>
                        <div class="status active">
                            <i class="bi bi-circle-fill"></i>
                        </div>
                    </div>

                    <div class="name2 flex">
                        <div class="username flex">
                            <i class="bi bi-person"></i>
                                <div style="width:100px; word-wrap: break-word;">
                                    {{ $customer->username }}
                                </div>
                        </div>

                        <div class="noPhone flex">
                            <i class="bi bi-telephone"></i>
                            {{ $customer->no_phone }}
                        </div>
                    </div>

                    <div class="email flex">
                        <i class="bi bi-envelope"></i>

                        <p>
                            {{ $customer->email }}
                        </p>
                    </div>

                    <div class="email id flex">
                        <i class="bi bi-person-vcard"></i>
                        <p>
                            {{ $customer->id }}
                        </p>
                    </div>

                    

                    <div class="address flex">
                        <div class="logo">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="addressLine">
                            <p class="line1">{{ $customer->addressLine1 }}</p>
                        <p class="line2">{{ $customer->addressLine2 }}</p>
                        <p class="line3">{{ $customer->addressLine3 }}</p>
                        </div>
                    </div>

                    <div class="dateJoined flex">
                        <i class="bi bi-calendar"></i>
                        <p>{{ $customer->created_at }}</p>
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
                                <th>Order id</th>
                                <th>Details</th>
                                <th>Status</th>
                                <th>Price</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>20343</td>
                                <td>Chicken goreng</td>
                                <td>Paid</td>
                                <td>RM 9.00</td>
                                <td>2023-09-14 9:00 AM</td>
                            </tr>

                            
                        </tbody>
                    </table>
                </div>
            </div>

            
        </div>

        
        
    </div>

    <div class="box3">
        <h1>Review and Rating</h1>
        <div class="reviewAndRating">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Review id</th>
                        <th>Comment</th>
                        <th>Food Place</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>2345</td>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, alias?</td>
                        <td>Cafeteria XYZ</td>
                        <td>2023-09-23 10.00 PM</td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>2345</td>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, alias?</td>
                        <td>Cafeteria XYZ</td>
                        <td>2023-09-23 10.00 PM</td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>2345</td>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, alias?</td>
                        <td>Cafeteria XYZ</td>
                        <td>2023-09-23 10.00 PM</td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>2345</td>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, alias?</td>
                        <td>Cafeteria XYZ</td>
                        <td>2023-09-23 10.00 PM</td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>2345</td>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, alias?</td>
                        <td>Cafeteria XYZ</td>
                        <td>2023-09-23 10.00 PM</td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>2345</td>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, alias?</td>
                        <td>Cafeteria XYZ</td>
                        <td>2023-09-23 10.00 PM</td>
                    </tr>

                    
                </tbody>
            </table>
        </div>
    </div>
    <div class="container">
        <a href="#hero" class="scrollup" id="scroll-up">
            <i class="ri-arrow-up-line"></i>
        </a>
     </div>
</div>
@endsection