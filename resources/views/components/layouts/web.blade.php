<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ env('APP_NAME') }}</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body class="bg-zinc-50 text-base min-h-screen flex flex-col justify-between">

    <div class="mb-12">

         <!-- Header -->
         <div class="container mx-auto flex justify-between p-4 items-center">
            <!-- Logo -->
            <div class="flex flex-row items-center">
                <img src="images/logo.png" alt="" style="width:52px;height:60px;">
                <span class="text-2xl font-medium text-neutral-500 ml-4">Blog</span>
            </div>
            <!-- Navigation -->
            <div class="space-x-12">
                <a href="#" class="font-medium text-neutral-500 hover:text-sky-500 ease-in duration-300">Home</a>
                <a href="#" class="font-medium text-neutral-500 hover:text-sky-500 ease-in duration-300">About</a>
                <a href="#" class="font-medium text-neutral-500 hover:text-sky-500 ease-in duration-300">Contact</a>
            </div>
        </div>
        
        
        {{ $slot }}


    </div>

    <!-- Footer -->
    <div class="flex flex-col bg-white bg-right-top bg-no-repeat" style="background-image: url({{ asset('images/footer-bg-image.png') }})">
        <div style="height:5px;" class="bg-sky-500 w-100"></div>
            <div class="flex flex-row justify-between container mx-auto py-8">
            <div class="text-neutral-400">Copyright © 2022 Blog</div>
                <div class="space-x-12">
                    <a href="#" class="font-medium text-neutral-400 hover:text-sky-500 ease-in duration-300">Home</a>
                    <a href="#" class="font-medium text-neutral-400 hover:text-sky-500 ease-in duration-300">About</a>
                    <a href="#" class="font-medium text-neutral-400 hover:text-sky-500 ease-in duration-300">Contact</a>
                </div>
        </div>
    </div>


</body>
</html>
        