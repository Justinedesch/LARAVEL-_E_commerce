<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Gender -->
        <x-input-label for="gender" :value="__('Genre')" />
        <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="gender" name="gender">
            <option value="">-- Choisir un genre --</option>
            <option value="Mme">Madame</option>
            <option value="Mlle">Mademoiselle</option>
            <option value="M">Monsieur</option>
        </select>
        <x-input-error :messages="$errors->get('gender')" class="mt-2" />

        <!-- Lastname -->
        <div>
            <x-input-label for="lastname" :value="__('Nom')" />
            <x-text-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required autofocus autocomplete="lastname" />
            <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
        </div>

        <!-- Firstname -->
        <div>
            <x-input-label for="firstname" :value="__('Prénom')" />
            <x-text-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required autofocus autocomplete="firstname" />
            <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('E-mail')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mot de passe')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmer mot de passe')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Address -->
        <div>
            <x-input-label for="address" :value="__('Adresse')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- Ville -->
        <div>
            <x-input-label for="town" :value="__('Ville')" />
            <x-text-input id="town" class="block mt-1 w-full" type="text" name="town" :value="old('town')" required autofocus autocomplete="town" />
            <x-input-error :messages="$errors->get('town')" class="mt-2" />
        </div>

        <!-- Code postale -->
        <div>
            <x-input-label for="department" :value="__('Code postale')" />
            <x-text-input id="department" class="block mt-1 w-full" type="number" name="department" :value="old('department')" required autofocus autocomplete="department" />
            <x-input-error :messages="$errors->get('department')" class="mt-2" />
        </div>

        <!-- Pays -->
        <div>
            <x-input-label for="country" :value="__('Pays')" />
            <x-text-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')" required autofocus autocomplete="country" />
            <x-input-error :messages="$errors->get('country')" class="mt-2" />
        </div>

        <!-- Tel fixe -->
        <div>
            <x-input-label for="phone1" :value="__('Téléphone fixe (facultatif)')" />
            <x-text-input id="phone1" class="block mt-1 w-full" type="text" name="phone1" :value="old('phone1')" autofocus autocomplete="phone1" />
            <x-input-error :messages="$errors->get('phone1')" class="mt-2" />
        </div>

        <!-- Tel port -->
        <div>
            <x-input-label for="phone2" :value="__('Téléphone portable')" />
            <x-text-input id="phone2" class="block mt-1 w-full" type="text" name="phone2" :value="old('phone2')" required autofocus autocomplete="phone2" />
            <x-input-error :messages="$errors->get('phone2')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Déjà enregistrer?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('S\'enregistrer') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
