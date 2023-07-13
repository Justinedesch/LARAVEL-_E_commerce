<div class="flex flex-col justify-center">
    <div class="relative flex flex-col md:space-x-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-3 max-w-xs md:max-w-3xl mx-auto border border-white bg-white">
        <div>
            <p>Nom => {{ $gameplay->name }}</p>
            <p>Image => @if(!empty($gameplay->image)){{ $gameplay->image }}@else Pas d'image de gameplay @endif</p>
            <p>Alt de l'image => @if(!empty($gameplay->image)){{ $gameplay->alt }}@else Pas d'image de produit @endif</p>
            <p>Produit(s) associé(s) => @if(!empty($gameplay->product_id)){{ $gameplay->product_id }}@else Pas de produit(s) @endif</p>
            <p>@if(!empty($product))
                    <br> Produit => <br> <br>
                        Image => {{ $product->image }} <br> Alt de l'image =>{{ $product->alt }} <br> <br>
                @else
                    Pas d'image de gameplay
                @endif
            </p>
        </div>
    </div>
</div>
