@props(['notifications' => []])
<section>

    @isset($notifications)

        @foreach ($notifications as $notification)
                <x-notification-item class="mb-2" url="{{ route('notifications.show', $notification->id) }}" message="{{ $notification->data['message'] }}" time="{{ $notification->created_at->format('H:i a') }}" duration="{{ $notification->created_at->diffForHumans() }}" />
        @endforeach

        {{ $notifications->links() }}
        
    @endisset

    @if(count($notifications) === 0)

        <div class="text-center dark:text-neutral-300">
            No Notifications At the Moment
        </div>

    @endif


</section>