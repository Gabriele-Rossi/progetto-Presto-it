<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    
</head>
<body class="">
    
    <x-sideBar/>

    <div id="main">   
      <x-navbar></x-navbar>  
       
      
  
        {{$slot}}
        {{-- <div class="min-vh-100 patchprovvisoria"></div> --}} 
        <x-footer></x-footer>
    </div>
    
    
   
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <script>

        let btnLogo= document.querySelector('.btnLogo'); 
        
        let mini = true;
        btnLogo.addEventListener("click", ()=>{
        
                if (mini) {
                    console.log("opening sidebar");
                    document.getElementById("mySidebar").style.width = "210px";
                    document.getElementById("mySidebar").style.borderRight = "2px solid var(--salmon)";
                    document.getElementById("change").style.marginLeft = "210px";
                    // document.getElementById("change1").style.marginLeft = "250px";
                    return mini = false;
                } else {
                    console.log("closing sidebar");
                    document.getElementById("mySidebar").style.width = "0px";
                    document.getElementById("mySidebar").style.borderRight = "0px solid var(--salmon)";
                    document.getElementById("change").style.marginLeft = "0px";
                    // document.getElementById("change1").style.marginLeft = "0px";
                    return  mini = true;
                }
        })  
        
        
    </script> 
    
    

    @livewireScripts
</body>
</html>



