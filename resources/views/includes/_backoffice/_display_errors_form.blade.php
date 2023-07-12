@if ($errors->any())
    <div class="py-12">
        <div class="container mx-auto flex justify-center items-center">
            <div class="alert alert-danger">
                <strong>Oups!</strong> Il y a un soucis avec un champ du formulaire.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
