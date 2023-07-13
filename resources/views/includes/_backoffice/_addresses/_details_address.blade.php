<div class="flex flex-col justify-center">
    <div class="relative flex flex-col md:space-x-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-3 max-w-xs md:max-w-3xl mx-auto border border-white bg-white">
        <div>
            <p>Nom => {{ $address->name }}</p>
            <p>Adresse => {{ $address->address }}</p>
            <p>
                <br>
                Utilisateur => {{ $user->gender }} {{ $user->lastname }} {{ $user->firstname }} <br>
                E-mail => {{ $user->email }} <br>
                Tél fix => @if(!empty($user->phone1)) {{ $user->phone1 }} @else Pas de téléphone fixe. @endif <br>
                Tél portable => {{ $user->phone2 }}
            </p>
        </div>
    </div>
</div>
