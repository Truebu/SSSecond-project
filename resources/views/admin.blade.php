@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200
    rounded-lg shadow-lg">

        <h1 class="text-3xl text-center font-bold">Menu</h1>

        <form class="mt-4" method="POST" action="">
            @csrf

            <a href="{{ route('admin.toCreateStudent') }}" class="rounded-md bg-indigo-500 w-full text-lg
            text-white font-semibold p-2 my-3 hover:bg-indigo-600">Create Student</a>

            <a href="{{ route('admin.toReport') }}" class="rounded-md bg-indigo-500 w-full text-lg
            text-white font-semibold p-2 my-3 hover:bg-indigo-600">Make a report</a>


        </form>

    </div>

@endsection
