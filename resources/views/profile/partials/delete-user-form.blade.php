<section class="space-y-6">
    <header>
        <h2 class="text-lg font-semibold text-black-600 dark:text-red-400">
            {{ __('Eliminar cuenta') }}
        </h2>
        <p class="mt-1 text-sm text-black-600 dark:text-gray-400">
            {{ __('Una vez eliminada tu cuenta, todos tus datos y recursos se borrarán permanentemente. Esta acción no se puede deshacer. Antes de continuar, descarga cualquier información que desees conservar.') }}
        </p>
    </header>

    <!-- Botón principal -->
    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-red-600 hover:bg-red-700 text-black px-6 py-2 rounded-md shadow"
    >
        {{ __('Eliminar cuenta') }}
    </x-danger-button>

    <!-- Modal de confirmación -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                {{ __('¿Estás seguro de que deseas eliminar tu cuenta?') }}
            </h2>

            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Una vez eliminada tu cuenta, todos tus datos se borrarán permanentemente. Ingresa tu contraseña para confirmar esta acción irreversible.') }}
            </p>

            <!-- Campo contraseña -->
            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Contraseña') }}" class="sr-only" />
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4 rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500"
                    placeholder="{{ __('Contraseña') }}"
                />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <!-- Botones -->
            <div class="mt-6 flex justify-end gap-3">
                <x-secondary-button x-on:click="$dispatch('close')" class="px-4 py-2">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-md shadow">
                    {{ __('Eliminar cuenta') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>