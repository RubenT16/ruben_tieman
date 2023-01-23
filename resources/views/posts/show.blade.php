<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex">
                <p class="opacity-70">
                   <strong>Created: </strong> {{ $post->created_at->diffForHumans() }}
                </p>
                <p class="opacity-70 ml-8">
                <strong>Updated at: </strong> {{ $post->updated_at->diffForHumans() }}
                </p>
                <a href="{{ route('posts.edit', $post) }}" class="btn-link ml-auto">Edit Post</a>
                
$request->validate([
        'title' => 'required|max:120',
        'text' => 'required'
    ]);

    $post>update([
        'title' => $request->title,
        'text' => $request->text
    ]);

    return to_route('posts.show', $post);

            </div>


<div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-4xl">
                    {{ $post->title }}
                </h2>
                <p class="mt-6 whitespace-pre-wrap">
		   {{ $post->text }}
	       </p>
            </div>
        </div>
    </div>
</x-app-layout>
