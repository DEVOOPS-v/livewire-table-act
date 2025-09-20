<tr class="{{ $post->is_archived ? 'bg-gray-200 border-black text-gray-400' : '' }}">
    <td class="py-2 px-4">{{ $post->id }}</td>
    <td class="py-2 px-4 font-semibold">{{ $post->title }}</td>
    <td class="py-2 px-4">{{ Str::limit($post->content, 50) }}</td>
    <td class="py-2 px-4">{{ $post->user?->name ?? 'N/A' }}</td>
    <td class="py-2 px-4">
        @if($post->is_archived)
            <span class="text-red-500 font-semibold">Yes</span>
        @else
            <span class="text-blue-500 font-semibold">No</span>
        @endif
    </td>
    <td class="py-2 px-4">{{ $post->created_at->format('Y-m-d') }}</td>

    <!-- Actions -->
    <td class="py-2 px-4 flex space-x-2">
        <!-- Archive button -->


        <a 
            href="#"
            wire:click.prevent="archive({{ $post->id }})" 
            onclick="return confirm('Are you sure?')"
            class="px-3 py-1 rounded border cursor-pointer transition 
           {{ $post->is_archived 
               ? 'bg-gray-600 text-gray-300 opacity-50 pointer-events-none' 
               : 'bg-blue-600 text-white hover:bg-blue-500' }}">
    Archive
        </a>

       

        <!-- Delete link -->
        <a 
            href="#"
            wire:click.prevent="delete({{ $post->id }})"
            onclick="return confirm('Are you sure you want to delete this post?')"
            class="text-red-600 border px-3 py-1 rounded bg-red-100 hover:bg-red-200"
        >
            Delete
        </a>
    </td>
</tr>
