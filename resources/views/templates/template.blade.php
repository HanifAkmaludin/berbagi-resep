<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>@yield('title')</title>
</head>
<body id="home">
    
    @yield('content')

    @vite('resources/js/app.js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/flowbite.min.js"></script>

    <script>
        const dropdownBtnCard = document.querySelectorAll('.dropdown-btn-card');
        const dropdownListCard = document.querySelectorAll('#dropdown-card');
        dropdownBtnCard.forEach((e, i) => {
            e.addEventListener('click', function(){
                console.log(e)
                for(let j = 0; j < dropdownListCard.length; j++){
                    if(dropdownBtnCard[j] == e){
                        continue;
                    }
                    dropdownListCard[j].classList.add('hidden');
                }
                dropdownListCard[i].classList.toggle('hidden');
            });
        });

        
        const hamburger = document.querySelector('.hamburger');
        const navbarLinks = document.querySelector('.navbar-links');
        const navbarLinksHome = document.querySelector('.navbar-links-home');
        const line1 = document.querySelector(".hamburger span:nth-child(1)");
        const line2 = document.querySelector(".hamburger span:nth-child(2)");
        const line3 = document.querySelector(".hamburger span:nth-child(3)");
        hamburger.addEventListener('click', function(){
            navbarLinks.classList.toggle('bottom-0');
            navbarLinks.classList.toggle('-bottom-52');
            navbarLinks.classList.toggle('h-0');
            navbarLinks.classList.toggle('h-[210px]');
            line1.classList.toggle("rotate-span-1");
            line2.classList.toggle("animation-span-2");
            line3.classList.toggle("rotate-span-3");
        });

        const dropdownBtn = document.getElementById("dropdownChef");
        const dropdownList = document.getElementById("dropdown");
        const dropdownIcon = document.querySelector('.dropdown-profile svg');
        dropdownBtn.addEventListener('click', function(){
            dropdownList.classList.toggle('hidden');
            dropdownIcon.classList.toggle('-rotate-90');
        });

        const msgButton = document.querySelector('.msg-button');
        const msgParent = document.querySelector('.msg-parent');
        msgButton.addEventListener('click', function(){
            msgParent.classList.add('hidden');
        });
    </script>
</body>
</html>

