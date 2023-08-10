<x-layout>
    
    
    @if (session('message'))
    <div class="alert alert-success" id="adv">
        {{ session('message') }}
    </div>
    @endif
    
    
    @if (session('access.denied'))
    <div class="alert alert-danger" id="adv">
        {{ session('access.denied') }}
    </div>
    @endif
    
    
    @if ($errors->any())
    <div class="alert alert-danger" id="adv">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif 
    
    <section class="container mt-5 py-5 section-custom">
        <div class="row wrapper-login d-flex justify-content-center">  
            <div class="col-12 col-md-6 form-box">
                <h2 class="text-white pt-0">{{__('ui.login')}}</h2>

                <form method="POST" action="{{route('login')}}" class="my-5">
                    @csrf
                    <div class="input-box">
                        <label class="form-label label-color text-white">Email</label>
                        <i class="fa fa-regular fa-envelope" style="color: #fff;"></i>
                        <input type="email" class="input-box2" name="email">
                    </div>
                    <div class="input-box">
                        <label class="form-label label-color  text-white">Password</label>
                        <i class="fa fa-solid fa-lock" style="color: #fff;"></i>
                        <input type="password" class="input-box2" name="password">
                    </div>
                    <button type="submit" class="button1">{{__('ui.login')}}</button> 
                </form>

                
                <div class="container-fluid">
                    <div class="logreg-link  text-white">
                        <p>{{__('ui.notYetRegister')}} 
                            <a href="{{route('register')}}" class="register-link">{{__('ui.register')}}</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 ">
                <div class="container">
                    <div class="row flex-column justify-content-center align-content-center">
                        <div class="col-6 text-white positionh2login text-center">
                            <h5 class="">{{__('ui.welcomeBack')}}</h5>                
                        </div> 
                        <div class="col-6 mb-5 positiontextlogin">
                            <p class="text-white text-end">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde pariatur ipsum in.</p>  
                        </div>                    
                    </div>
                </div>
            </div>   
        </div>   
    </section>
</x-layout>

