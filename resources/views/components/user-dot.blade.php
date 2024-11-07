@php
    $remarks = $getState()['remarks'];
    $status = $getState()['status'];

    
    $getColor = function ($email) {
        // dd($email);
        return (config("email_colors")[$email] ?? "bg-gray-500");
    };

    $statusColor = $status === 'Selected' ? 'bg-green-900' : null;
@endphp

<div class="flex gap-2">
    @foreach ($remarks as $remark)
        @php
            $email = $remark['email'] ?? 'unknown@example.com';
            $emailColor = $getColor($email);
        @endphp
        <div class="flex items-center space-x-2">
            <span class="inline-block w-2 h-2 rounded-full {{ $emailColor }}"></span>
            {{-- <span>{{ $remark['remark'] }}</span> --}}
        </div>
    @endforeach
    @if ($statusColor)
        <span class="inline-block w-2 h-2 rounded-full {{ $statusColor }}"></span>
    @endif
</div>
