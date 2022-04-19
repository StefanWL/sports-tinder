@foreach($conversation->messages as $message)
    @if($message->user->id === auth()->user()->id)
    <div class="mt-1 d-flex justify-content-end">
        <span class="message py-2 px-3 rounded-pill text-end">{{ $message->content }}</span>
    </div>
    @else
    <div class="mt-1 d-flex">
        <span class="bg-light rounded-pill text-black py-2 px-3 rounded">{{ $message->content }}</span>
    </div>
    @endif
@endforeach