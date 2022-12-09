<x-app-layout>
    <x-slot name="slot">
        <div class="min-h-screen bg-gray-200 flex justify-center items-center">
            <div class="p-12 m-10 bg-white rounded-2xl shadow-xl z-20">
                <form method="POST" style="padding: 50px;" action="{{ route('logout') }}">
                    @csrf
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-20 h-20 mx-auto text-green-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div class="text-center font-bold my-3 text-3xl w-full">
                            Thank you for taking the test!
                        </div>
                        <p class="text-xl max-w-2xl text-left pt-3">
                            We want to reassure you that the actions taken during the test will not have any consequence for you,
                            as all the emails have been manually produced by our team and are not harmful.
                            <br><br>
                            For any further information, you can contact us at the email address <a href="mailto:francesco.greco@uniba.it">francesco.greco@uniba.it</a>.
                            <br><br>
                            Goodbye!<br>
                            IVU Lab Team, University of Bari
                        </p>
                    </div>
                    <div class="text-center mt-10">
                        <div class="w-full">
                            <div>
                                <button type="submit" id="logout"
                                        class="py-3 w-64 text-lg text-white bg-blue-500 hover:bg-blue-800 rounded-2xl">
                                    Logout
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-app-layout>
