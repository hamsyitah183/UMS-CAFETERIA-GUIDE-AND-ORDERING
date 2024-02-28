<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice #{{$booking->booking_ID}}</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>
<body>

    <table class="order-details">
        <!-- this is the header for company name and address -->
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">Sepilok Orangutan Rehabilitation Centre</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Invoice Id: #{{$booking->booking_ID}}</span> <br>
                    <span>Date: {{ date('d / m / Y') }}</span> <br>
                    <span>Address: W.D.T. 200, Sabah Wildlife Department, Jalan Sepilok, Sepilok, 90000 Sandakan, Sabah</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Order Details</th>
                <th width="50%" colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Booking Id:</td>
                <td>{{$booking->booking_ID}}</td>

                <td>Name:</td>
                <td>{{$booking->booking_Name}}</td>
            </tr>
            <tr>
                <td>Contact No.:</td>
                <td>{{$booking->booking_Contact}}</td>
                
            </tr>
            <tr>
                <td>Booking Date:</td>
                <td>{{$booking->booking_Date}}</td>

                <td>Time Slot:</td>
                <td>{{$booking->time_slot}}</td>
            </tr>
            <tr>
                <td>Payment Status:</td>
                <td>{{$booking->booking_Status}}</td>

                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Booking Ticket
                </th>
            </tr>
            <tr class="bg-blue">
                <th>Ticket Type</th>
                <th>Total Adult</th>
                <th>Total Children</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @if ($booking->booking_Nationality == 'malaysian')
                    <td width="10%">Malaysian Ticket</td>
                    <td width="10%">{{$booking->booking_Adults}} X (RM5.00)</td>
                    <td width="10%">{{$booking->booking_Children}} X (RM2.00)</td>
                @else
                    <td width="10%">Non-Malaysian Ticket</td>
                    <td width="10%">{{$booking->booking_Adults}} X (RM30.00)</td>
                    <td width="10%">{{$booking->booking_Children}} X (RM15.00)</td>
                @endif

                <td width="10%">RM {{$booking->totalPrice}}</td>
            </tr>
            
        </tbody>
    </table>

    <br>
    <p class="text-center">
        Thank you for your booking!
    </p>

</body>
</html>