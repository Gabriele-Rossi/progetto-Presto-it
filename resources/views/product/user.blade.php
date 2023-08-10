<x-layout>

      

    <div class="container-fluid borderbreak bg-white min-vh-100">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="display-4 text-center mt-5 py-5 text-bluscuro loves-category2">{{__('ui.area')}}<p class="display-4 text-center text-bluscuro loves-category2">{{__('ui.user')}}</p></h2>
            </div>  
                <div class="container my-3 ">
                    <div class="row justify-content-start align-items-center ">

                        <div class="col-12">
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
                        </div>


                        <div class="col-12 col-md-10 mb-5 mx-auto bgUser">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-1 ps-0 ms-0">
                                        <div class="container-fluid">
                                            <div class="row align-content-center justify-content-center flex-wrap">
                                                <div class="col-12 break ps-0 ms-0">
                                                   <p class="pt-3 mb-3 pe-2">
                                                    <i class="fa-solid fa-user fa-xl mx-0" style="color: #ffffff;"> </i>
                                                    </p>
                                                </div>
                                                <div class="col-12 ps-0 ms-0 break">
                                                    <p class="pt-3 mt-2 ">
                                                        <i class="fa-solid  fa-envelope fa-xl" style="color: #ffffff;"> </i>
                                                    </p>
                                                </div>
                                                <div class="col-12 ps-0 ms-0">
                                                    <p class="pt-3 mt-2 ">
                                                        <i class="fa-solid fa-lock fa-xl" style="color: #ffffff;"></i>
                                                    </p>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="col-11">
                                        <div class="container-fluid">
                                            <div class="row justify-content-between">
                                                <div class="col-6 ps-2">
                                                    <p class="h5 ms-0 py-3 text-start break">Username</p>
                                                    <p class="h5 ms-0 py-3 text-start break">Email</p>
                                                    <p class="h5 ms-0 py-3 text-start">Password</p>
                                                </div>
                                                <div class="col-6 pe-0">
                                                    <p class="h5 text-end py-3 break">{{Auth::user()->name}}</p>
                                                    <p class="h5 text-end py-3 break">{{Auth::user()->email}}</p>
                                                    <p class="h5 text-end py-3 text-truncate">*********</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


             
                       
                        
                @if ($products->isNotEmpty())  
                <h3 class="mt-5 py-5 text-center text-bluscuro loves-category2">{{__('ui.myAnnouncements1')}}</h3>
                <div class="col-12">
                     <livewire:product-tabs>
                </div>    
                   
                @else
                <div class="col-12">           
                    <h3 class="mt-5 my-5 text-center loves-category2">{{__('ui.alertAnnouncements')}}</h1>  
                </div>
                <div class="col-12 d-flex justify-content-center my-5">
                        <a href="{{route('product.create')}}" class="btn btn-create-product text-white btn-create-text">{{__('ui.post')}}</a>   

                </div>
                @endif   
                    </div>
                </div>
        </div>
    </div>
</x-layout>