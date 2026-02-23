<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'inline-flex items-center px-6 py-2 bg-red-600 hover:bg-red-700
                text-black rounded-md font-semibold shadow transition ease-in-out duration-150'
]) }}>
    {{ $slot }}
</button>
