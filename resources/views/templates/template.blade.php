<!DOCTYPE html>
<html lang="en">
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
<body>
    
    @yield('content')

    @vite('resources/js/app.js')

    <script>
        const dropdownBtn = document.getElementById("dropdownChef");
        const dropdownList = document.getElementById("dropdown");
        const dropdownIcon = document.querySelector('.dropdown-profile svg');
        dropdownBtn.addEventListener('click', function(){
            dropdownList.classList.toggle('hidden');
            dropdownIcon.classList.toggle('-rotate-90');
        });

        const dropdownBtnCard = document.querySelectorAll('.dropdown-btn-card');
        const dropdownListCard = document.querySelectorAll('#dropdown-card');
        dropdownBtnCard.forEach((e, i) => {
            e.addEventListener('click', function(){
                for(let j = 0; j < dropdownListCard.length; j++){
                    if(dropdownBtnCard[j] == e){
                        continue;
                    }
                    dropdownListCard[j].classList.add('hidden');
                }
                dropdownListCard[i].classList.toggle('hidden');
            });
        });

        const msgButton = document.querySelector('.msg-button');
        const msgParent = document.querySelector('.msg-parent');
        msgButton.addEventListener('click', function(){
            msgParent.classList.add('hidden');
        });
    </script>
</body>
</html>

