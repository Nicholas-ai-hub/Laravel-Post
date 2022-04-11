@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-kg">
            <!-- გადავდივართ posts მარშრუტზე,რადგან პოსტების შესაქმნელად(დასაწერად) იგივე პოსტ კონტროლერი უნდა გამოვიყენოთ-->
            <form action="{{ route('posts') }}" method="POST" class="mb-4">
            @csrf <!-- აუცილებლად form-ის ქვეშ დავწეროთ ეს ბრძანება-->
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full rounded-lg
                    @error('body') border-red-500 @enderror">
                    </textarea>

                    @error('body')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div>
                    <button 
                        type="submit" 
                        class="bg-blue-500 text-white px-4 py-2 rounded font-medium"
                    >
                        Post 
                    </button>
                </div>
            </form>
            
            @forelse($posts as $post)
                <div class="mb-4 mt-4">
                    <a href="" class="font-bold">{{ $post->user->name }} </a>
                    <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }} </span>

                    <p class="mb-2">{{ $post->body}} </p>
                </div>
            @empty
                <p class="mt-4">There are no posts yet</p>
            @endforelse

            {{ $posts->links() }}
        </div>
    </div>
@endsection