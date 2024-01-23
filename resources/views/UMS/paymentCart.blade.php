<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>


    <link rel="stylesheet" href="wajib.css">
    <link rel="stylesheet" href="payment.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    @for ($i = 0; $i < count($style); $i++)
        <link rel="stylesheet" href={{ asset('css/'.$style[$i].'.css')}}>
    @endfor
    {{-- <link rel="stylesheet" href={{ asset('css/UMS/paymentCart')}}> --}}
</head>
<body>
   
    <div class="orderContainer container" style="padding-bottom: 40px">
        <div class="top">
            <div class="title">
                <h3>My order</h3>
                <p class="date">{{ $orders->created_at->format('d M Y, h:i A') }}
                </p>
            </div>
    
            <div class="activity">
                <button class="btn"><a href="/order/detail/{{ $orders->id }}/generate">Download invoice</a></button>
                <button class="btn"><a href="/order/detail/{{ $orders->id }}" target="_blank">View invoice</a></button>
    
            </div>
        </div>

        <p>Go to my <a href="">Order details</a></p>
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Sub-total</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($orders->orderLine as $item)
                    <tr>
                        <td>{{ $item->menu->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>RM {{number_format($item->menu->price,2) }}</td>
                        <td style="text-align: start; padding-left: 90px;">RM {{ number_format($item->menu->price * $item->quantity, 2) }}</td>
                    </tr>
                @endforeach

                <!-- total price -->
                <tr>
                    <td colspan="3"><b>Total price: </b></td>
                    
                    <td>RM {{ number_format($orders->total_price, 2) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="main.js"></script>
</body>
</html>