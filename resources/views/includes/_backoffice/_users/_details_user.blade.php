<div class="flex flex-col justify-center">
    <div class="relative flex flex-col md:space-x-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-3 max-w-xs md:max-w-3xl mx-auto border border-white bg-white">
        <div>
            <p>Genre => {{ $user->gender }}</p>
            <p>Nom => {{ $user->lastname }}</p>
            <p>Prénom => {{ $user->firstname }}</p>
            <p>E-mail => {{ $user->email }}</p>
            <p>Tél fixe => @if(!empty($user->phone1)){{ $user->phone1 }}@else Pas de téléphone fixe. @endif</p>
            <p>Tél portable => {{ $user->phone2 }}</p>
            <p>@if(count($addressByUser) > 0)
                    <br> Adresse(s) de l'utilisateur => <br> <br>
                    @foreach($addressByUser as $address)
                        Id de l'adresse => {{ $address->id }}<br> Adresse => {{ $address->address }} <br> <br>
                    @endforeach
                @else
                    Pas d'adresse pour cet utilisateur.
                @endif
            </p>
        </div>
    </div>
</div>
