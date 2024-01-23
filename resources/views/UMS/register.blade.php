<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <link rel="stylesheet" href={{ asset('css/UMS/'.$style.'.css')}}>

</head>
<body>
    <div class="container">
        <div class="left">
            <img src="https://images.pexels.com/photos/6489663/pexels-photo-6489663.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" srcset="">
        </div>
        <div class="right">
            <div class="text__box">
                <h1>Create your account</h1>
            </div>

            <form action="/register" method="POST" enctype="multipart/form-data">
                <div class="form">
                    
                    @csrf
                    
                        <div class="line">
                            <input type="text" name="name" id="" placeholder="Name" class="firstName">
                        </div>

                        
                        <div class="line">
                            <input type="text" name="username" id="" placeholder="Username" class="firstName">
                        </div>
                    
                        <div class="line">
                            <input type="email" name="email" id="" placeholder="email">
                        </div>
        
                        <div class="line">
                            <input type="password" name="password" id="" placeholder="Password">
                        </div>
        
                        <div class="line">
                            <input type="text" name="addressLine1" id="" placeholder="address Line 1" class="addressLine1">

                        </div>

                        <div class="line">
                            <input type="text" name="addressLine2" id="" placeholder="address Line 2" class="lastName">

                        </div>

                        <div class="line">

                            <input type="text" name="addressLine3" id="" placeholder="address Line 3" class="lastName">

                        </div>

                        <div class="line">

                            <input type="text" name="no_phone" id="" placeholder="Number Phone" class="lastName">

                        </div>
                        
                        <div class="line">
                            <button class="btn">Create an Account</button>
                        </div>
                    

                    <p><span class="small-word">Already have an account? <a href="/UMS/register" class="red">Login</a></span></p>
                
                </div>
            </form>
        </div>
    </div>
</body>
</html>