<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Card') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-authentication-card>
                    <x-slot name="logo">
                        <!-- <x-jet-authentication-card-logo /> -->
                    </x-slot>

                    <x-jet-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('register-card') }}">
                        @csrf

                        <div class="mt-4">
                            <x-jet-label for="address" value="{{ __('Address') }}" />
                            <x-jet-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="dob" value="{{ __('Date Of Birth') }}" />
                            <x-jet-input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="old('dob')" required autofocus autocomplete="dob" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="memberType" value="{{ __('Membership Type') }}" />
                            <select name="member_type" id="member_type">
                              <option value="silver">Silver</option>
                              <option value="gold">Gold</option>
                              <option value="platinum">Platinum</option>
                              <option value="black">Black</option>
                              <option value="vip">VIP</option>
                              <option value="vvip">VVIP</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <div class="mt-4">
                                <x-jet-label for="number" value="{{ __('Number') }}" />
                                <x-jet-input id="number" class="block mt-1" type="number" min=0 name="number" required autocomplete="number" />
                            </div>
                            
                            <div class="mt-4">
                                <x-jet-label for="type_card" value="{{ __('Type') }}" />
                                <x-jet-input id="type_card" class="block mt-1" type="text" name="type_card" required autocomplete="type_card" />
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="expired_date" value="{{ __('Expired Date') }}" />
                                <x-jet-input id="expired_date" class="block mt-1" type="date" name="expired_date" required autocomplete="expired_date" />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                         
                            <x-jet-button class="ml-4">
                                {{ __('Add Card') }}
                            </x-jet-button>
                        </div>
                    </form>
                </x-jet-authentication-card>
            </div>
        </div>
    </div>
</x-app-layout>
