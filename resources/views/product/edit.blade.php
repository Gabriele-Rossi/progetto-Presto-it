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
      

    <section class="container-fluid pt-5">
        <div class="row">
            <div class="col-12 mt-5 ">
                <h1 class="display-5 text-center title-Custom text-shadow-bluscuro">
                    {{__('ui.editYourProduct')}}
                </h1>
            </div>
        </div>
    </section>

    <section class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 px-1">

            <livewire:form-edit-product
            idProduct="{{$product->id}}"/>

            </div>
        </div>
    </section>

</x-layout>