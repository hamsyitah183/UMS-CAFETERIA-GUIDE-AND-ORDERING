@extends('UMS.dashboard.layouts.main')

@section('dash-content')

<style>
    .edit .btn, .btn  {
        border-radius: 10px;
        width: fit-content;
        padding: 0 10px;
    }

    .activity .btn a, .btn a {
        color: white;
    }
</style>

@if (session()->has('success'))
        <div class="success">
            {{ session('success') }}
            <i class="ri-close-line"></i>
        </div>
    
    @elseif (session()->has('delete'))
        <div class="success delete">
            {{ session('delete') }}
            <i class="ri-close-line"></i>
        </div>
    @endif
{{-- @dd($owner[0]->foodOption) --}}

<h1 class="title"><i class="ri-restaurant-2-line"></i> Food Option</h1> 

            <div class="button return">
                <ul>
                    @if (!$owner[0]->foodOption)
                        <li class="view">
                            <button class="btn"><a href="/dashboard/foodOption/create"><i class="ri-add-line"></i> Add Food Option</a></button>
                        </li>
                    @else
                        <li class="edit">
                            <button><a href="/dashboard/foodOption/{{ $owner[0]->foodOption->id }}/edit"><i class="ri-pencil-line"></i> Edit food Option</a></button>
                        </li>
                    @endif
                    
                </ul>
            </div>


            @if (!$owner[0]->foodOption)
                <div class="content">
                    <h2>Please add your place first!</h2>
                </div>
            @else
            <div class="content">
                <div class="img">
                    @php
                        $imageUrl = $owner[0]->foodOption->image
                            ? (Str::startsWith($owner[0]->foodOption->image, ['http://', 'https://'])
                                ? $owner[0]->foodOption->image
                                : asset('storage/' . $owner[0]->foodOption->image))
                            : asset('path/to/placeholder-image.jpg');
                    @endphp
                    <img src="{{ $imageUrl }}" alt="" srcset="">
                </div>

                <div class="details">
                    <div class="name">
                        <h3>{{ $owner[0]->foodOption->place_name }}</h3>
                    </div>
                    
                    @php
                        if($owner[0]->foodOption->type == 1) {
                            $type = 'Cafeteria';
                        }
                        elseif ($owner[0]->foodOption->type == 2) {
                            # code...
                            $type = 'Kiosk';

                        }
                        elseif ($owner[0]->foodOption->type == 3) {
                            # code...
                            $type = 'Vendor';

                        }
                    @endphp
    
                    <div class="type">
                        <p class="info"><i class="bi bi-shop"></i> <span class="detail">Type:</span> {{ $type }}</p>
                    </div>
    
                    <div class="address">
                        
                        <p class="info"><i class="ri-map-pin-line"></i> <span class="detail">Location: {{ $owner[0]->foodOption->addressLine1}}</span></p>
                        
    
                    </div>

                    <div class="created">

                        <p class="info"><i class="bi bi-calendar"></i> <span class="detail">Created at:</span> {{ ($owner[0]->foodOption->created_at)->format('d M Y, g:i A') }}</p>
                    </div>

                    <div class="about">
                        <p class="info">
                            <i class="ri-restaurant-2-line"></i> <span class="detail">About us</span> 
                            <br>
                            {{ $owner[0]->foodOption->description }}
                        </p>
                    </div>
                </div>
            </div>


            @endif

            @if ($owner[0]->foodOption)
            <div class="info">
                <div class="content">
                    <div class="openingHour">
                        <h1>Opening Hour</h1>
                        <button class="btn edit"><a href="/dashboard/openingHour"><i class="ri-pencil-line"></i> Edit</a></button>
                        
                        <table>
                            <tr class="bold">
                                <td >Day</td>
                                <td >Time open</td>
                            </tr>
                            
    
                            @if($owner[0]->foodOption) 
                                @foreach ($owner[0]->foodOption->openingHour as $item)
                                @php
                                    

                                    // $openTime = new DateTime($item->openTime);
                                    // $closeTime = new DateTime($item->closeTime);
                                    // $closeTime->format('g:i A') 
                                @endphp
                                    <tr>
                                        <td class="day">{{ $item->dayOfTheWeek }}</td>

                                        @if ($item->openTime != NULL || $item->closeTime != NULL)
                                            
                                            <td class="open">{{ $item->openTime }} until {{ $item->closeTime }}</td>
                                            
                                        @else

                                            <td class="open">Closed</td>
                                        
                                        @endif

                                    </tr>
                                @endforeach


                            @endif
                        </table>
                    </div>
                </div>


                <div class="content">
                    <div class="infos">
                        <div class="socialMedia">
                            <h1>Social Media</h1>
                            <button class="btn edit"><a href=""><i class="ri-pencil-line"></i> Edit</a></button>
                            <div class="media">
                                
                                    <div class="icon">
                                        <i class="ri-facebook-circle-fill"></i>
                                    </div>
                                
                                    <div class="accountName">
                                        <a href="#">Cafe XYZ</a>
                                    </div>
                                    
                            </div>
    
                            <div class="media">
                                
                                <div class="icon">
                                    <i class="ri-twitter-fill"></i>                           
                                </div>
                            
                                <div class="accountName">
                                    <a href="#">Cafe XYZ</a>
                                </div>
                                
                            </div>
    
                            <div class="media">
                                
                                <div class="icon">
                                    <i class="ri-instagram-line"></i>
                                </div>
                            
                                <div class="accountName">
                                    <a href="#">Cafe XYZ</a>
                                </div>
                                
                            </div>
    
                            <div class="media">
                                
                                <div class="icon">
                                    <i class="ri-whatsapp-line"></i>
                                </div>
                            
                                <div class="accountName">
                                    <a href="#">Cafe XYZ</a>
                                </div>
                                
                            </div>
    
                        </div>

                        <div class="payment">
                            <h1>Payment method</h1>
                            <button class="btn edit"><a href='/dashboard/payment'><i class="ri-pencil-line"></i> Edit</a></button>

                            @if ($owner[0]->foodOption)
                                @if($owner[0]->foodOption->payment)
                                    @foreach ($owner[0]->foodOption->payment as $item)
                                        <div class="method">
                                            <div class="left">
                                                @if ($item->paymentType == 'Cash')
                                                    <i class="ri-cash-line"></i>
                                                @elseif($item->paymentType == 'Transfer')
                                                    <i class="ri-exchange-dollar-line"></i>

                                                @elseif($item->paymentType == 'E-wallet')
                                                    <i class="ri-wallet-line"></i>
                                                
                                                @else 
                                                    <i class="ri-link-unlink"></i>
                                                @endif
                                                
                                            </div>

                                            <div class="right">
                                                <h3>{{ $item->paymentType }}</h3>
                                                <p class="description">{{ $item->description }}</p>
                                            </div>
                                        </div>
                                @endforeach

                                @else

                                        please add your payment method.

                                @endif
                            @endif

                            
                        </div>
                    </div>

                    
                </div>

            </div>
            @endif
            
@endsection