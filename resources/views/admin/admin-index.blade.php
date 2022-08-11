@extends('layout.default')
@section('content')
    <section class="text-gray-600">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                <div class="flex items-center justify-between mb-2">
                    <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">Produtos</h1>
                    <a href="{{ route('admin.products.create') }}"
                        class="flex ml-auto text-white bg-indigo-500 border-0 py-1.5 px-3 text-sm focus:outline-none hover:bg-indigo-600 rounded">Adicionar</a>
                </div>
                <table class="table-auto w-full text-left whitespace-no-wrap">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                #
                            </th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100"
                                style="width: 150px">Imagem</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Nome</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Valor</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Estoque</th>
                            <th
                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 text-right">
                                Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @foreach ($products as $product)
                            <tr @if ($loop->even) class="bg-gray-100" @endif>
                                <td class="px-4 py-3">{{ $product->id }}</td>
                                <td class="px-4 py-3">
                                    @if ($product->cover)
                                        <img alt="product-image" class="object-cover object-center w-full h-full block"
                                            src="{{ \Illuminate\Support\Facades\Storage::url($product->cover) }}">
                                    @else
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url('product/ySyWGI9qqEEhOy0Yv9l4EFIlcKhrWDR7vhsi0oFv.png') }}" />
                                    @endif
                                </td>
                                <td class="  px-4 py-3">
                                    <a href="{{ route('product', $product->slug) }}"
                                        class="mt-3 text-indigo-500 inline-flex items-center">{{ $product->name }}
                                    </a>
                                </td>
                                <td class="   px-4 py-3">R${{ $product->price }}
                                </td>
                                <td class="px-4 py-3">{{ $product->stock }}</td>
                                <td class="px-4 py-3 text-sm text-right space-x-3 text-gray-900">
                                    <a href="{{ route('admin.product.edit', $product->id) }}"
                                        class="mt-3 text-indigo-500 inline-flex items-center">Editar</a>
                                    <a href="{{ route('admin.product.destroy', $product->id) }}"
                                        class="mt-3 text-indigo-500 inline-flex items-center">Deletar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
