@props(['notifications' => []])
<section>

    @isset($notifications)

        @foreach ($notifications as $notification)
                <x-notification-item class="mb-2" url="{{ route('notifications.show', $notification->id) }}" message="{{ $notification->data['message'] }}" time="{{ $notification->created_at->format('H:i a') }}" />
        @endforeach

        {{ $notifications->links() }}
        
    @endisset


</section>