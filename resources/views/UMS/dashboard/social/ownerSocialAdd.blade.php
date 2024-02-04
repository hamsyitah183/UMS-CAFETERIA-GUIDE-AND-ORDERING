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
        <form action="/dashboard/media/" method="post">
            {{-- @method('put') --}}
            @csrf
            <div class="div">
                <label for="payment">Social</label>
                <select name="socialType" id="payment">
                    <option value="facebook ">Facebook</option>
                    <option value="twitter">Twitter</option>
                    <option value="youtube">Youtube</option>
                    <option value="whatsapp">Whatsapp</option>
                    <option value="instagram">Instagram</option>
                    <option value="Others">Others</option>
                </select>
            </div>

            <div class="div">
                <label for="">Link</label>
                <input type="text" name="link" id="" placeholder="Social link">
            </div>
            
            <div class="div">
                <label for="">Name</label>
                <input type="text" name="name" id="" placeholder="Social website name eg: Cafe XYZ">
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