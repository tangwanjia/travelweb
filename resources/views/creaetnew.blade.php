<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('travelWebs') }}<br>
        </h2>
    </x-slot>
    <x-navbar />

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
    </div>
