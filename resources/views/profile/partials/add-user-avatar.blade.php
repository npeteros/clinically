<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Avatar Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's avatar.") }}
        </p>
    </header>

    <img
        class="h-96 w-full rounded-t-lg object-cover md:h-auto md:w-48 md:rounded-none md:rounded-l-lg mt-6"
        src="{{ asset('storage/images/avatars/' . $user->path)}}"
        alt="Patient {{ $user->id }}" 
    />

    <form method="post" action="{{ route('avatar.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div>
            <x-input-label for="name" :value="__('Avatar')" />
            <input type="file" placeholder="Upload image" name="path" id="path" class="form-control-file" accept="image/*">
            <x-input-error class="mt-2" :messages="$errors->get('path')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'avatar-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
