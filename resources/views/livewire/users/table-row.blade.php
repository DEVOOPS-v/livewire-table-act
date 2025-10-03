<tr 
    x-data="{ archived: @js($employee->is_archived) }" 
    x-bind:class="archived 
        ? 'bg-gray-200 text-gray-400 transition-colors duration-700' 
        : 'hover:bg-gray-50 transition-colors'"
    x-transition:enter="transition ease-in duration-700"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-out duration-700"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
>
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
            wire:click.prevent="archive({{ $employee->id }})"
            x-on:click="archived = true" 
            :disabled="$employee->is_archived"
            class="px-3 py-1 rounded border cursor-pointer transition
                {{ $employee->is_archived 
                    ? 'bg-gray-400 text-gray-200 opacity-50 pointer-events-none' 
                    : 'bg-blue-600 text-white hover:bg-blue-500' }}"
        >
            Archive
        </flux:link>

        <!-- Delete -->
        <flux:link  
            wire:click.prevent="delete({{ $employee->id }})"
            onclick="return confirm('Are you sure you want to delete this employee?')"
            variant="danger"
            class="px-3 py-1 rounded border border-red-400 text-white cursor-pointer bg-red-500 hover:bg-red-600 transition"
        >
            Delete
        </flux:link>
    </td>
</tr>
