@if ($errors->any())
    <div class="py-12">
        <div class="container mx-auto flex justify-center items-center">
            <div class="alert alert-danger bg-red-600 rounded text-white m-2 flex justify-center items-center p-4">
                <strong>Oups!</strong> Il y a un soucis avec la/les valeur(s) du formulaire.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
