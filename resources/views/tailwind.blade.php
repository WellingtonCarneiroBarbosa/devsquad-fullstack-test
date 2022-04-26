<x-app>
    <div class="p-4 bg-gray m-10 shadow-lg text-center font-bold text-4xl">
        DevSquad Laravel Test | Tailwind Component
    </div>

    <form action="{{ route('daily-log.store') }}" method="post">
        @method('post')
        @csrf
        <input type="hidden" name="user_id" value="1">
        <input type="text" name="log" />
        <input type="date" name="day" />

        <button type="submit">Send</button>
    </form>
</x-app>
