<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href={{ asset('css/UMS/style2.css')}}>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="left">
            <img src="https://images.pexels.com/photos/6489663/pexels-photo-6489663.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" srcset="">
        </div>
        <div class="right">
            <div class="text__box">
                <h1>Welcome Back!</h1>
            </div>

            @if (session()->has('success'))
            <div class="successAlert">
                <p><span class="icon"><i class="bi bi-check"></i>
                </span>{{ session('success') }}
                <span class="icon close-button">
                    <i class="bi bi-x-lg"></i>
                </span>
                </p>
            </div>

            @endif     

            @if (session()->has('loginError'))
            <div class="loginAlert">
                <p><span class="icon"><i class="bi bi-check"></i>
                </span>{{ session('loginError') }}
                <span class="icon close-button">
                    <i class="bi bi-x-lg"></i>
                </span>
                </p>
            </div>

            @endif

            <form action="/login" method="post">
                @csrf

                <div class="form">
                    
                    
                    
                        <div class="line">
                            <input type="text" name="username" id="" placeholder="username" class="firstName">
                        </div>

                        
                    
                    
                        
        
                        <div class="line">
                            <input type="password" name="password" id="" placeholder="Password">
                        </div>
        
                       
                        
                        <div class="line">
                            <button class="btn" type="submit">Sign in</button>
                        </div>
                    

                    <p><span class="small-word">Already have an account? <a href="/register" class="red">Singup</a></span></p>
                
                </div>
            </form>
        </div>
    </div>

    <script>
         $(document).ready(function(){
        $('.close-button').click(function(){
            // $('.successAlert').fadeOut(); 
            $('.successAlert').addClass('hide');
            });
        });

    </script>
</body>
</html>