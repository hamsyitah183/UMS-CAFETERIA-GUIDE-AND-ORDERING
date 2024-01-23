@extends('UMS.dashboard.layouts.main')

<style>
    .btn a, .btn .word{
        border-radius: 10px;
        width: fit-content;
        padding: 0 10px;
    }
</style>


@section('dash-content')
<div class="topContent">
    <div class="icon">
        <button class="btn" >
            <a href="/dashboard/payment">
                <i class="bi bi-x"></i>
                <span class="word">Back</span>
            </a>
        </button>
    </div>

</div>

<!-- content -->
<div class="content">
    <div class="editForm">
        <form action="/dashboard/payment/" method="post">
            {{-- @method('put') --}}
            @csrf
            <div class="div">
                <label for="payment">Payment type</label>
                <select name="paymentType" id="payment">
                    <option value="Cash">Cash</option>
                    <option value="Transfer">Transfer</option>
                    <option value="E-wallet">E-wallet</option>
                    <option value="Others">Others</option>
                </select>
            </div>

            <div class="div">
                <label for="">Description</label>
                <textarea name="description" id="" cols="30" rows="10" ></textarea>
            </div>

            

           

            

            <div class="div">
                <div class="icon">
                    <button type="submit" class="btn">
                        
                            
                            <span class="word">Add</span>
                       
                    </button>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection