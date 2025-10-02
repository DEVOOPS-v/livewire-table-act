<tr class="{{ $post->is_archived ? 'bg-gray-200 text-gray-400' : 'hover:bg-gray-50 transition-colors' }}">
    <td class="py-2 px-4">{{ $post->id }}</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold">
        {{ Str::limit($post->title, 30) }}
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        {{ Str::limit($post->content, 50) }}
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm">
        {{ $post->user?->name ?? 'N/A' }}
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm">
        @if($post->is_archived)
            <span class="text-amber-400 font-semibold">Yes</span>
        @else
            <span class="text-blue-500 font-semibold">No</span>
        @endif
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm">
        {{ $post->created_at->format('Y-m-d') }}
    </td>

    <!-- Actions -->
    <td class="px-6 py-4 whitespace-nowrap text-sm flex space-x-2">
        <!-- Archive -->
        <flux:link
            href="#"
            wire:click.prevent="archive({{ $post->id }})"
            onclick="return confirm('Are you sure?')"
            :disabled="$post->is_archived"
            class="px-3 py-1 rounded border cursor-pointer transition
                {{ $post->is_archived 
                    ? 'bg-gray-400 text-gray-200 opacity-50 pointer-events-none' 
                    : 'bg-blue-600 text-white hover:bg-blue-500' }}"
        >
            Archive
        </flux:link>

        <!-- Delete -->
        <flux:link  
            wire:click.prevent="delete({{ $post->id }})"
            onclick="return confirm('Are you sure you want to delete this post?')"
            variant="danger"
            class="px-3 py-1 rounded border border-red-400 text-white cursor-pointer bg-red-500 hover:bg-red-600 transition"
        >
            Delete
        </flux:link>
    </td>
</tr>
