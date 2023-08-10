<div class="borderCustom" >
    <form wire:submit.prevent="createProduct" class="formCustom">
        @csrf
        <div class="mb-3">
            <label class="form-label text-white user-box">{{__('ui.title')}}</label>
            <input type="text" class="form-control " wire:model.lazy="title">
            @error('title') 
            <div class="error alert alert-danger">{{ $message }}</div> 
            @enderror         
        </div>
        
        <div class="mb-3">
            <label class="form-label text-white">{{__('ui.description')}}</label>
            <textarea wire:model.lazy="body" class="form-control " cols="30" rows="10"></textarea>
            @error('body') 
            <div class="error alert alert-danger">{{ $message }}</div> 
            @enderror  
            
        </div>
        <div class="mb-3">
            <label class="form-label text-white">{{__('ui.price')}}</label>
            <input type="number" class="form-control " wire:model.lazy="price">
            @error('price') 
            <div class="error alert alert-danger">{{ $message }}</div> 
            @enderror         
        </div>
        
        <div class="mb-3">
            <label class="form-label text-white">{{__('ui.category')}}</label>
            <select wire:model.defer='category_id' class="form-control">
                @foreach ($categories as $category)
                <option value="{{ $category->id}}">{{ $category->name}}</option>
                @endforeach
            </select> 
        </div>
        
        <div class="mb-3">
            <label class="form-label text-white">{{__('ui.loadImg')}}</label>
            <input wire:model='temporary_images' type="file" name="images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img"/>
            @error('temporary_images.*')
            <p class="text-danger mt-2">{{$message}}</p>
            @enderror
        </div>
        
        @if(!empty($images))

        <div class="row">
            <div class="col-12">
                <p>Photo preview:</p>
                <div class="row border border-3 border-success rounded shadow py-4">
                    @foreach ($images as $key => $image) 

                    <div class="col my-3">

                        <div class="img-preview img-fluid mx-auto my-3 shadow rounded" style="background-image: url({{$image->temporaryUrl()}});"></div>
                        
                            <button type="button" class="btn btn-success shadow d-block text-center mt-2 mx-auto" wire:click="removeImage({{$key}})">{{__('ui.delete')}}</button>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
        @endif



        @if (session('message'))
        <div class="alert alert-success" id="adv">
            {{ session('message') }}
        </div>
        @endif
        
        <button type="submit" class="btn-add mt-5">
            <div class="svg-wrap">
                <i class="bi bi-send-fill svg-add"></i>
            </div>

            <span class="span-add">
                {{__('ui.submit')}}
            </span>
        </button>
    </form>
    
</div>
