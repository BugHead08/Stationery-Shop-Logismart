@extends('layout.admin')
@section('title', 'Customers')

@section('content')
{{-- card container --}}
<h1 class="font-bold text-xl">Customer List</h1>


<table class="w-full text-left rtl:text-right shadow-md rounded-md overflow-clip mt-3">
    <thead class="font-medium text-white bg-rose-600">
        <tr>
            <th class="p-3">
                No
            </th>
            <th class="px-6 py-3">
                Name
            </th>
            <th class="px-6 py-3">
                Email
            </th>
            <th class="px-6 py-3">
                Phone
            </th>
            <th class="px-6 py-3">
                Address
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr class="bg-white border-b">
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ $loop->iteration }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->nama }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->email}}
                </td>
                <td class="px-6 py-4">
                    {{ $user->telp_hp}}
                </td>
                <td class="px-6 py-4">
                    {{ $user->alamat}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection