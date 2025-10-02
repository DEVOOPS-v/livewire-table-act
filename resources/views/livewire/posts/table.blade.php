<div class="p-6">
    <div class="max-w-auto mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-18 relative" 
         x-data="{ showHeader: false }" 
         x-init="setTimeout(() => showHeader = true, 200)">
         
        <!-- Animated heading -->
        <h1 
            x-show="showHeader"
            x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            class="text-3xl font-bold text-blue-500 mb-2"
        >
            Welcome back, Admin!
        </h1>

        <!-- Animated subheading -->
        <p 
            x-show="showHeader"
            x-transition:enter="transition ease-out duration-1000"
            x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            class="text-lg text-gray-600"
        >
            Employee Information
        </p>

        <!-- Notification -->
        <div 
            x-data="{ show: false, message: '' }"
            x-on:notify.window="message = $event.detail; show = true; setTimeout(() => show = false, 2000)"
            x-show="show"
            x-transition.opacity.duration.500ms
            x-transition.opacity.out.duration.500ms
            class="absolute top-20 mx-auto w-full p-3 bg-green-100 text-green-800 rounded-lg shadow-md"
        >
            <span x-text="message"></span>
        </div>
    </div>

    <!-- Animated posts section -->
    <div x-data="{ showPosts: false }" x-init="setTimeout(() => showPosts = true, 800)">
        <h1 
            x-show="showPosts"
            x-transition:enter="transition ease-out duration-700"
            x-transition:enter-start="opacity-0 translate-y-6"
            x-transition:enter-end="opacity-100 translate-y-0"
            class="text-2xl font-bold mb-4"
        >
            Posts
        </h1>

        <!-- Search box -->
        <div 
            x-show="showPosts"
            x-transition:enter="transition ease-out duration-800"
            x-transition:enter-start="opacity-0 translate-y-6"
            x-transition:enter-end="opacity-100 translate-y-0"
            class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4"
        >
            <div class="relative w-full sm:w-64">
                <input 
                    wire:model.debounce.500ms="search"
                    type="text" 
                    placeholder="Search employees..." 
                    class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg shadow-sm 
                           focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                >
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
            <button 
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow-md transition-colors"
            >
                Create
            </button>
        </div>  

        <!-- Posts table -->
        <div 
            x-show="showPosts"
            x-transition:enter="transition ease-out duration-900"
            x-transition:enter-start="opacity-0 translate-y-6"
            x-transition:enter-end="opacity-100 translate-y-0"
            class="bg-white shadow-md rounded-lg overflow-hidden"
        >
            <table class="min-w-full bg-white border rounded shadow">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500">ID</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500">Title</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500">Content</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500">Author</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500">Archived</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500">Created At</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($posts as $post)
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
        </div>

        <!-- Pagination -->
        <div 
            x-show="showPosts"
            x-transition:enter="transition ease-out duration-1000"
            x-transition:enter-start="opacity-0 translate-y-6"
            x-transition:enter-end="opacity-100 translate-y-0"
            class="mt-4"
        >
            {{ $posts->links() }}
        </div>
    </div>
    </div>
</div>
