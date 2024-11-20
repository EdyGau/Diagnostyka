@extends('base')

@section('title', 'Contact Form')

@section('content')

    <div class="max-w-lg mx-auto bg-white shadow-2xl rounded-lg p-8">

        <div class="flex justify-center mb-8">
            <img src="{{ asset('images/single_order.png') }}" alt="Logo" class="h-48" style="animation: pulse 2s infinite ease-in-out;">
        </div>

        <h1 class="text-4xl font-semibold leading-tight text-[#2D4B4F] my-0 mb-8 text-center">
            Formularz kontaktowy
        </h1>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ $formAction }}" method="POST" class="max-w-lg mx-auto bg-white shadow-2xl rounded-lg p-8">
            @csrf
            @foreach ($form->getFields() as $field)
                <div class="mb-4">
                    <label for="{{ $field['name'] }}" class="block text-gray-700 font-semibold mb-2">
                        {{ $field['label'] }}
                    </label>

                    @if ($field['type'] === 'textarea')
                        <textarea name="{{ $field['name'] }}" id="{{ $field['name'] }}"
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                  {{ $field['required'] ? 'required' : '' }}>{{ old($field['name']) }}</textarea>
                    @else
                        <input type="{{ $field['type'] }}" name="{{ $field['name'] }}" id="{{ $field['name'] }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                               value="{{ old($field['name']) }}" {{ $field['required'] ? 'required' : '' }}>
                    @endif

                    @error($field['name'])
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            @endforeach

            <div class="flex justify-center items-center">
                <button type="submit" class="bg-[#f55e32] text-white py-3 px-6 rounded-full font-semibold hover:bg-[#f39c12] focus:outline-none">
                    {{ $form->getSubmitButton() }}
                </button>
            </div>
        </form>
    </div>

@endsection
