@extends('layout.app')
@section('content')
    <div class="bg-gray-100 flex flex-col h-screen">
        <!-- Navbar -->
        <nav class="bg-blue-500 text-white p-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold">Chat Application</h1>
            <form action="/logout" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="bg-red-500 px-4 py-2 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">
                    Logout
                </button>
            </form>
        </nav>

        <!-- Chat Container -->
        <div class="flex flex-1 overflow-hidden">
            <!-- Chat Messages -->
            <div class="flex-1 p-4 overflow-auto">
                @foreach ($chat as $item)
                    <div class="space-y-4 ">
                        <!-- Message from user -->
                        <div class="flex justify-end">
                            <div class="bg-blue-500 text-white p-3 rounded-lg max-w-xs flex gap-2">
                                <div class="flex flex-col">
                                    <div class="flex gap-5 items-center  ">
                                        <p class="text-[10px]">{{ Auth::user()->name }}</p>
                                        <form action="/deleteMessage/{{ $item->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <button type="submit"
                                                class="px-2 text-center bg-red-500 text-[10px] text-white rounded-xl">Delete</button>
                                        </form>
                                    </div>
                                    <p>{{ $item->message }}</p>
                                </div>

                            </div>
                        </div>

                        <!-- Message from other user -->
                        <div class="flex justify-start">
                            <div class="bg-gray-300 text-gray-800 p-3 rounded-lg max-w-xs">
                                <div class="flex flex-col ">
                                    <p class="text-[10px]">Noni BOT</p>
                                    <p>{{ $item->answer }}</p>
                                </div>

                            </div>
                        </div>

                        <!-- Add more messages here -->
                    </div>
                @endforeach
            </div>

            <!-- Chat Input -->
            <div class="bg-white p-4 border-t border-gray-200">
                <form action="/sendMessage" method="POST" class="flex items-center" id="chatForm">
                    @csrf
                    @method('POST')
                    <input type="text" name="message" required placeholder="Type a message..."
                        class="flex-1 px-4 py-2 border border-gray-300 rounded-lg mr-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Send
                    </button>
                </form>
                <!-- Loading Indicator -->
                <div id="loadingIndicator" class="mt-2 text-blue-500" style="display: none;">
                    Sending...
                </div>
            </div>
        </div>
    </div>
     <!-- Footer -->
     @include('layout.footer')

    <script>
        document.getElementById('chatForm').addEventListener('submit', function() {
            document.getElementById('loadingIndicator').style.display = 'block';
        });
    </script>

    
@endsection
