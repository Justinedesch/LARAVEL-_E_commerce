<div class="flex flex-col justify-center">
    <div class="relative flex flex-col md:space-x-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-3 max-w-xs md:max-w-3xl mx-auto border border-white bg-white">
        <div>
            <p>Nom => {{ $product->name }}</p>
            <p>Description titre => {{ $product->description_title }}</p>
            <p>Description => {{ $product->description }}</p>
            <p>Prix => {{ $product->price }}</p>
            <p>Disponible => {{ $product->isAvailable }}</p>
            <p>Image => @if(!empty($product->image)){{ $product->image }}@else Pas d'image de produit @endif</p>
            <p>Alt de l'image => @if(!empty($product->image)){{ $product->alt }}@else Pas d'image de produit @endif</p>
            <p>Poids => {{ $product->weight }} grammes</p>
            <p>Stock => {{ $product->stock }} unité(s)</p>
            <p>Promotion => @if(!empty($product->discount || $product->discount > 0)){{ $product->alt }}@else Pas de promotion @endif</p>
            <p>Catégorie => @if(!empty($product->category_id)){{ $product->category_id }}@else Pas de catégorie @endif</p>
            <p>@if(!empty($gameplays))
                    <br> Image(s) de gameplay => <br> <br>
                    @foreach($gameplays as $gameplay)
                        Id du gameplay => {{ $gameplay->id }}<br> Image => {{ $gameplay->image }} <br> Alt de l'image =>{{ $gameplay->alt }} <br> <br>
                    @endforeach
                @else
                    Pas d'image de gameplay
                @endif
            </p>
        </div>
    </div>
</div>
