<div class="flex flex-col justify-center">
    <div class="relative flex flex-col md:space-x-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-3 max-w-xs md:max-w-3xl mx-auto border border-white bg-white">
        <div>
            <p>Nom => {{ $category->name }}</p>
            <p>Image => @if(!empty($category->image)){{ $category->image }}@else Pas d'image de catégorie @endif</p>
            <p>Alt de l'image => @if(!empty($category->image)){{ $category->alt }}@else Pas d'image de catégorie @endif</p>
            <p>Description => {{ $category->description }}</p>
            <p>Texte du lien => {{ $category->link }}</p>
        </div>
    </div>
</div>
