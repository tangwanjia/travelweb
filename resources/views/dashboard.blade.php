<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('travelWebs') }}<br>
        </h2>
    </x-slot>
    <x-navbar />
<<<<<<< HEAD
=======

>>>>>>> 86bf741e0429147b5a3ae86abbcba5bbc7fb082d

    <div class="max-w-7xl mx-auto">
        <div class="m-6">
            <div class="bg-white my-3 p-12 rounded shadow">
                <h2 class="font-bold mb-3 text-lg">New Travel Recommendation</h2>
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="block" for="title">Title</label>
                        <input class="block w-full border-slate-300" id="title" name="title" >
                    </div>
                    <div class="mb-3">
                        <label class="block" for="category">Categories</label>
                        <select class="form-control" name="category" id="category">
                            <label for="category">Select A Category</label>
                            @foreach ($categories as $category )
                                <option value="{{ $category }}">{{ $category }}</option>
                            @endforeach
                        </select></br></br>
                    </div>

                    <div class="form-group mb-3">
                        <label class="block" for="text">Text</label>
                        <textarea class="block w-full border-slate-300" id="text" name="text"></textarea>
                    </div>
                    <div>
                        <label for="image" >Image:</label>
                        <input type="file" name="image" id="image">
                    </div><br>
                    <button class="bg-sky-500 text-white p-3 font-bold">Add Note</button>
                </form>
            </div>
        </div>

        <div class="flex flex-wrap">
            @foreach ($travelWebs as $travelWeb)
            <div class="basis-1/3 p-6">
                <div class="bg-white rounded shadow p-6">
                    <form class="mb-5" method="POST" action="/dashboard/travelWebs/{{$travelWeb->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="block" for="title">Title</label>
                            <input class="block w-full border-slate-300" id="title" name="title" value="{{ $travelWeb->title }}">
                        </div>
                        <div class="form-group mb-3">
                            <label class="block" for="text">Text</label>
                            <textarea class="block w-full border-slate-300" id="text" name="text">{{ $travelWeb->text }}</textarea>
                        </div>
                        <img src="{{  $travelWeb->image }}" alt="{{ $travelWeb->image }}" style="width: 50%" >
                        <div>
                            <label for="image">Image:</label>
                            <input type="file" name="image" id="image">
                        </div><br>
                        <button type="submit" class="block w-full bg-sky-500 text-white p-3 font-bold">Update Note</button>
                    </form>


                    <form method="post" action="/dashboard/travelWebs/{{$travelWeb->id}}">
                        @csrf
                        @method('delete')
                        {{ method_field('delete') }}
                        <button class="block w-full bg-red-600 text-white p-3 font-bold">Delete Note</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
