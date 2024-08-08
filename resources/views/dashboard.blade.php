<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('travelWebs') }}<br>
        </h2>
    </x-slot>
    <x-navbar />

    <div class="max-w-7xl mx-auto max-h-7xl">
        <div class="my-3 p-12 rounded shadow bg-yellow-300 h-45">
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 align-text-top">
                <a href="createnew.blade.php">New Recommendation</a>
            </h1>
        </div>

        <div class="m-6">


            <div class="mb-3">
                <label class="block" for="title">Title</label>
                <input class="block w-full border-slate-300" id="title" name="title" >
            </div>
            <div class="mb-3">
                <label class="block" for="category">Categories</label>
                <select class="form-control border-slate-300"" name="category" id="category">
                    @foreach ($categories as $category )
                        <option value="{{ $category }}">{{ $category }}</option>
                    @endforeach
                </select>
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


        <div class="flex flex-wrap">
            @foreach ($travelWebs as $travelWeb)
            <div class="basis-1/3 p-2">
                <div class="bg-blue-100 rounded shadow p-6">
                    <form class="mb-5" method="POST" action="/dashboard/travelWebs/{{$travelWeb->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="block" for="title">Title</label>
                            <input class="block w-full border-slate-300" id="title" name="title" value="{{ $travelWeb->title }}">
                        </div>
                        <div class="mb-3">
                            <label class="block" for="category">Categories</label>
                            <select class="form-control border-slate-300"" name="category" id="category">
                                <label for="category">Select A Category</label>
                                @foreach ($categories as $update=>$category )
                                    <option value="{{ $update }}" {{$travelWeb->category == $update ? 'selected' : '' }}>{{ $category }}</option>
                                @endforeach
                            </select>
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
</div>
</x-app-layout>
