<?php

namespace App\Http\Livewire;

use App\Models\Image;
use App\Models\Product;
use Livewire\Component;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\File;

class FormEditProduct extends Component
{
    use WithFileUploads;

    public $idProduct;
    public $title;
    public $body;
    public $price;
    public $category_id;
    public $temporary_images = [];
    public $images = [];
    

    protected $rules = [
        'title' => 'required|min:5',
        'body' => 'required|min:10',
        'price' => 'required|numeric|min:1',
        'category_id' => 'required',
        'temporary_images.*' => 'image|max:1024',
    ];

    protected $messages = [
        'title.required' => 'Il titolo è richiesto!',
        'body.required' => 'La descrizione è richiesta!',
        'price.required' => 'Inserisci il prezzo del tuo Prodotto!',
        'title.min' => 'Il titolo è troppo corto!',
        'body.min' => 'La descrizione è troppo corta!',
        'price.min' => 'Il prezzo minimo è di 1€',
        'price.numeric' => 'Il prezzo deve essere un numero!',
        'category_id.required' => 'Devi selezionare una categoria!',
        'temporary_images.*.image' => 'I file devono essere immagini',
        'temporary_images.*.max' => "L'immagine dev'essere massimo di 1mb",
    ];

    public function render()
    {
        return view('livewire.form-edit-product');
    }

    public function mount($idProduct)
    {
        $product = Product::findOrFail($idProduct);
        $this->title = $product->title;
        $this->body = $product->body;
        $this->price = $product->price;
        $this->category_id = $product->category->id;
        $this->idProduct = $product->id;
        $this->images = $product->images->pluck('path')->toArray();

    }

    public function updateProduct()
    {
        $product = Product::findOrFail($this->idProduct); 
        
        $product->setAccept(null);

        $product->update([
            'title' => $this->title,
            'body' => $this->body,
            'price' => $this->price,
            'category_id' => $this->category_id,
        ]);


        $this->validate();

        //  dd($this->temporary_images);
        $newImages = [];
        if (count($this->temporary_images)) {
            foreach ($this->temporary_images as $key => $image) {
                $newFileName = "products/{$product->id}";
                $newImagePath = $image->storeAs($newFileName, $image->getClientOriginalName(), 'public');
                $newImages[] = $newImagePath;
            }
        }
        // dd($newImages);

        $allImages = array_merge($this->images, $newImages);

     
      
        $product->images()->delete();
        foreach ($allImages as $imagePath){
            $product->images()->create(['path' =>$imagePath]);

        }
        
        // $product->images()->createMany($allImages);

        foreach ($allImages as $imagePath  ) {
            // dd($imagePath);
            $this->processImage($imagePath);
        }

       return redirect()->route('product.user')->with('message', 'Annuncio modificato correttamente!');
        // $this->cleanForm();
    }

    private function processImage($imagePath)
    {
        $imageId= Image::where('path', $imagePath)->first()->id;
     
        GoogleVisionLabelImage::dispatch($imageId);
        GoogleVisionSafeSearch::dispatch($imageId);
        RemoveFaces::dispatch($imageId);
        ResizeImage::dispatch($imagePath, 500, 450);
        
    }

    public function cleanForm()
    {
        $this->title = '';
        $this->body = '';
        $this->category_id = '';
        $this->images = [];
        $this->temporary_images = [];
        $this->price = '';
    }

    public function removeImage($key , $array)
    {
        if (array_key_exists($key, $this->$array)) {
            unset($this->$array[$key]);
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images.*' => 'image|max:1024',
        ]));
            }
}

