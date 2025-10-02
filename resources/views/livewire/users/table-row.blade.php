<tr class="{{ $user->is_archived ? 'bg-gray-200 text-gray-400' : 'hover:bg-gray-50 transition-colors' }}">
    <!-- ID -->
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
        {{ $employee->id }}
    </td>

    <!-- Name -->
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
        {{ $employee->name }}
    </td>

    <!-- Email -->
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        {{ $employee->email }}
    </td>

    <!-- Created At -->
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        {{ $employee->created_at->format('Y-m-d H:i') }}
    </td>

    <!-- Actions -->
    <td class="px-6 py-4 whitespace-nowrap text-sm flex space-x-2">
        
        <!-- Archive -->
        <flux:link
            href="#"
            wire:click.prevent="archive({{ $user->id }})"
            onclick="return confirm('Are you sure?')"
            :disabled="$user->is_archived"
            class="px-3 py-1 rounded border cursor-pointer transition
                {{ $user->is_archived 
                    ? 'bg-gray-400 text-gray-200 opacity-50 pointer-events-none' 
                    : 'bg-blue-600 text-white hover:bg-blue-500' }}"
        >
            Archive
        </flux:link>

        <!-- Delete -->
        <flux:link  
            wire:click.prevent="delete({{ $user->id }})"
            onclick="return confirm('Are you sure you want to delete this user?')"
            variant="danger"
            class="px-3 py-1 rounded border border-red-400 text-white cursor-pointer bg-red-500 hover:bg-red-600 transition"
        >
            Delete
        </flux:link>
    </td>
</tr>
