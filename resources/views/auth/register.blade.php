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
      


    <section class="container section-custom mt-5 py-5 ">
        <div class="row wrapper-login d-flex justify-content-center">
            <div class="col-11 co-md-6 form-box">
                <h2 class="text-white mt-4 pt-5 mb-0 pb-0">{{__('ui.register')}}</h2>
                <form method="POST" action="{{route('register')}}" class="mt-4">
                    @csrf
                    <div class="input-box">
                      <label class="form-label">{{__('ui.nameAndSurname')}}</label>
                      <i class="fa fa-regular fa-user" style="color: #fff;"></i>
                      <input type="text" class="input-box3" name="name">
                    </div>
                    <div class="input-box">
                        <label class="form-label">Email</label>
                        <i class="fa fa-regular fa-envelope" style="color: #fff;"></i>
                        <input type="email" class="input-box3" name="email">
                    </div>
                    <div class="input-box">
                        <label class="form-label">Password</label>
                        <i class="fa fa-solid fa-lock" style="color: #fff;"></i>
                        <input type="password" class="input-box3" name="password">
                    </div>
                    <div class="input-box">
                        <label class="form-label">{{__('ui.passwordConfirmation')}}</label>
                        <i class="fa fa-solid fa-key" style="color: #fff;"></i>
                        <input type="password" class="input-box3" name="password_confirmation">
                    </div>   
                    <button type="submit" class="button2">{{__('ui.register')}}</button>
                    <div class="logreg-link1">
                        <p class="text-white my-0">{{__('ui.account')}}
                            <a href="{{route('login')}}" class="register-link">{{__('ui.login')}}</a>
                        </p>
                    </div>
                  </form>
            </div>
            <div class="col-12 col-md-6 ">
                <div class="container">
                    <div class="row flex-column justify-content-center align-content-center">
                        <div class="col-6 text-white positionh2register text-center">
                            <h5 class="">{{__('ui.welcomeUser')}}</h5>                
                        </div> 
                        <div class="col-6 mb-5 positiontextregister text-center">
                            <p class="text-white text-end">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde pariatur ipsum in.</p>  
                        </div>                    
                    </div>
                </div>
            </div>   
        </div>   
    </section>
</x-layout>

