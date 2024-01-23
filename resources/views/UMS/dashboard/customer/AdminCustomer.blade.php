@extends('UMS.dashboard.layouts.main')

@section('dash-content')
<div class="topContent">
    <div class="title">
        <i class="bi bi-people"></i>                    
        <span class="text">Customer</span>

        
    </div>

    <div class="form">
        <form action="">
            <input type="text" name="announcement" id="" placeholder="search for customer">
            <button type="submit" class="btn"><i class="bi bi-search"></i></button>
        </form>
    </div>

</div>

<!-- add new announcement -->
<div class="newAnnouncement">
    <ul id="accordion">
        <li>
            <label for="first"><h1>New Customer</h1><span>&#x3e</span></label>
            <input type="radio" name="accordion" id="first" >
            <div class="content">
                <form action="/dashboard/customer" method="post" enctype="multipart/form-data">
                    @csrf
                    <table>
                        <!-- <h1>New announcement</h1> -->
                        <div class="input titles">
                            <tr>
                                <td>
                                    <label for="title">Name</label>
                                </td>
                                <td>
                                    <input type="text" name="name" id="title" 
                                    placeholder="Kento Sakaguchi" @error('name') is-invalid @enderror value="{{ old('name') }}">

                                    @error('name')
                                            <div class="invalid">
                                                {{ $message }}
                                            </div>
                                    @enderror
                                </td>
                            </tr>
                        </div>

                        <div class="input username">
                            <tr>
                                <td>
                                    <label for="title">Username</label>
                                </td>
                                <td>
                                    <input type="text" name="username" id="title" 
                                    placeholder="Kentos" @error('username') is-invalid @enderror value="{{ old('username') }}">

                                    @error('username')
                                        <div class="invalid">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </td>
                            </tr>
                        </div>
    
                        <div class="input start">
                            <tr>
                                <td>
                                    <label for="email">Email</label>
                                </td>

                                <td>
                                    <input type="email" name="email" id="email" 
                                    placeholder="kento@gmail.com" @error('email') is-invalid @enderror value="{{ old('email') }}">

                                    @error('email')
                                        <div class="invalid">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </td>
                            </tr>
                        </div>
    
                        <div class="input end">
                            <tr>
                                <td>
                                    <label for="noPhone">No Phone</label>
                                </td>
                                <td>
                                    <input type="text" name="no_phone" id="noPhone" 
                                    placeholder="0143899212" @error('no_phone') is-invalid @enderror value="{{ old('no_phone') }}">

                                    @error('no_phone')
                                        <div class="invalid">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </td>
                            </tr>
                        </div>
    
                        <div class="input image">
                            <tr>
                                <td>
                                    <label for="image">Image</label>
                                </td>
                                <td>
                                    <img src="" alt="" srcset="" class="img-preview img">

                                    <input type="file" name="image" id="image"  @error('image')
                                    is-invalide
                                    @enderror value="{{ old('image') }}" onchange='previewImage()'>

                                    @error('image')
                                        <div class="invalid">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </td>
                            </tr>
                        </div>
    
                        <div class="input content">
                            <tr>
                                <td>
                                    <label for="address">Address</label>

                                </td>
                                <td class="addressLine">
                                    <input type="text" name="addressLine1" id="" 
                                    placeholder="Address line 1" @error('addressLine1') 
                                    is-invalid @enderror value="{{ old('addressLine1') }}">

                                    @error('addressLine1')
                                        <div class="invalid">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    <input type="text" name="addressLine2" id="" 
                                    placeholder="Address line 2" @error('addressLine2') 
                                    is-invalid @enderror value="{{ old('addressLine2') }}">

                                    @error('addressLine2')
                                        <div class="invalid">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    <input type="text" name="addressLine3" id="" 
                                    placeholder="Address line 3" @error('addressLine3') 
                                    is-invalid @enderror value="{{ old('addressLine3') }}">

                                    @error('addressLine3')
                                        <div class="invalid">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    

                                </td>
                            </tr>
                        </div>

                        <div class="input">
                            <tr>
                                <td>
                                    <label for="role">Role</label>
                                </td>
                                <td>
                                    <select id="role" name="role">
                                        <option value="customer">Customer</option>
                                        <option value="owner">Owner</option>
                                    </select>
                                </td>
                            </tr>
                        </div>
                    </table>
                    <div class="submit">
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </li>
    </ul>
    
</div>

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

<!-- content -->
<div class="content">
    <div class="announcement">
        <h2 class="titles">List of user</h2>

    <div class="announcementList">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th >Username</th>
                    <th>Date Joined</th>
                    <th>Activity</th>
                </tr>
            </thead>

            <tbody>
                
                {{-- @dd($customers) --}}
                @if($customers->count() > 0) 
                @foreach ($customers as $customer)
                    
                        <tr>
                            <td>
                                {{ $customer->id  }}
                            </td>
                            <td>
                                {{ $customer->name }}
                            </td>
                            <td>
                                {{ $customer->email }}
                            </td>
                            <td>
                                <div style="width:100px; word-wrap: break-word;">
                                    {{ $customer->username }}
                                </div>
                            </td>
                            
                            <td>
                                {{ $customer->created_at }}
                            </td>
                            <td>
                                <ul class="activity">
                                    <li class="view"><a href="/dashboard/customer/{{ $customer->id }}"><button><i class="bi bi-eye"></i></button></a></li>
                                    <li class="edit"><a href="/dashboard/customer/{{ $customer->id }}/edit"><button><i class="bi bi-pencil-square"></i></button></a></li>
                                    <form action ="/dashboard/customer/{{ $customer->id }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <li class="delete" onclick="return confirm('are you sure?')"><button type="submit"><i class="bi bi-trash"></i></button></a></li>
                                    </form>
                                </ul>
                            </td>
                        </tr>
                    
                @endforeach
                
                

               
                
                    
                @else
                    
                @endif
            </tbody>

           
        </table>

        
    </div>
    
    </div>

    <div class="mt-5">
        {{ $customers->links() }}
    </div>
</div>

<div class="container">
    <a href="#hero" class="scrollup" id="scroll-up">
        <i class="ri-arrow-up-line"></i>
    </a>
 </div>

 <script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');


        imgPreview.style.display = 'block';

        const oFReader = new FileReader();

        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

 <script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/announcement/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
</script>
@endsection