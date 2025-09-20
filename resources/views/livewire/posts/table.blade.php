<div class="p-6">
    <div class="mb-8">
            <h1 class="text-3xl font-bold text-blue-500 mb-2">Welcome back</h1>
            <p class="text-lg text-gray-600">Employee Information</p>
        </div>
    <h1 class="text-2xl font-bold mb-4">Posts</h1>

    <!-- Search box -->
    <div class="mb-4">
        <input 
            type="text" 
            wire:model="search" 
            placeholder="Search Unavailable" 
            class="border rounded px-3 py-2 w-full"
        >
    </div>

    <!-- Posts table -->
    <table class="min-w-full bg-white border rounded shadow">
        <thead>
            <tr class="bg-gray-100 border-b">
                <th class="py-2 px-4 text-left">ID</th>
                <th class="py-2 px-4 text-left">Title</th>
                <th class="py-2 px-4 text-left">Content</th>
                <th class="py-2 px-4 text-left">Author</th>
                <th class="py-2 px-4 text-left">Archived</th>
                <th class="py-2 px-4 text-left">Created At</th>
            </tr>
        </thead>
        <tbody>
        @forelse($posts as $post)
        {{-- @include('livewire.posts.table-row', :posts=$posts) --}}
        @include('livewire.posts.table-row', ['posts' => $posts])

        @empty
        <tr>
            <td colspan="6" class="py-4 text-center text-gray-500">
                No posts found.
            </td>
        </tr>
     @endforelse
</tbody>

    </table>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $posts->links() }}
    </div>
</div>
