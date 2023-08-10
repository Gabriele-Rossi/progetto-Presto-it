<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class CreateProduct extends Component
{
    
    use WithFileUploads;
    
    
    public $title;
    public $body;
    public $price;
    public $temporary_images;
    public $images = [];
    
    
    public $category_id;
    
    public function render()
    {
        return view('livewire.create-product');
    }
    
    public function createProduct(){
        
        $this->validate();
        
        $category = Category::find($this->category_id);
        
        
        $product = $category->products()->create([
            'title'=>$this->title,
            'body'=>$this->body,
            'price'=>$this->price,
            'category_id'=>$this->category_id,
            'user_id'=>Auth::user()->id,
        ]);
        
        if(count($this->images)){
            foreach($this->images as $image) {
                // $product->images()->create(['path' =>$image->store('images' , 'public')]);
                $newFileName = "products/{$product->id}";
                $newImage =  $product->images()->create(['path' =>$image->store($newFileName , 'public')]);

                RemoveFaces::withChain([
                   new ResizeImage($newImage->path , 500 , 450),
                   new GoogleVisionSafeSearch($newImage->id),
                   new GoogleVisionLabelImage($newImage->id) 
                ])->dispatch($newImage->id);
                
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        
        }
        
        session()->flash('message' , 'Annuncio caricato corretamente!');
        $this->cleanForm();
        // return redirect()->route('homePage')->with('message', 'Annuncio inserito con successo, verrà revisionato a breve!');
    }
    
    
    public function cleanForm(){
        $this->title= '';
        $this->body= '';
        $this->category_id= '';
        $this->images= [];
        $this->temporary_images= [];   
        $this->price= ''; 
    }

    protected $rules = [
        
        'title'=>'required|min:5',
        'body'=>'required|min:10',
        'price'=>'required|numeric|min:1',
        'category_id'=>'required',
        'temporary_images.*' => 'image|max:1024',
        'images.*' => 'image|max:1024',
        
        
    ];
    
    protected $messages = [
        
        'title.required'=>'Il titolo è richiesto!',
        'body.required'=>'La descrizione è richiesta!',
        'price.required'=>'Inserisci il prezzo del tuo Prodotto!',
        'title.min'=>'Il titolo è troppo corto!',
        'body.min'=>'La descrizione è troppo corta!',
        'price.min'=>'Il prezzo minimo è di 1€',
        'price.numeric'=>'Il prezzo deve essere un numero!',
        'category_id.required'=>'Devi selezionare una categoria!',
        'temporary_images.required' => "L'immagine è richiesta",
        'temporary_images.*.image' => 'I file devono essere immagini',
        'temporary_images.*.max' => "L'immagine dev'essere massimo di 1mb",
        'images.image' => "Il file dev'essere un'immagine",
        'images.max' => "L'immagine dev'essere massimo di un 1mb",
        
    ];
    
    public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images.*' => 'image|max:1024',
            ])) {
                foreach ($this->temporary_images as $image) {
                    $this->images[] = $image;
                }
            }
        }
        
        public function removeImage($key){
            if(in_array($key, array_keys($this->images))) {
                unset($this->images[$key]);
            }
        }
        
        
        
        public function updated($propertyName)
        {
            $this->validateOnly($propertyName);
        }
    }
    