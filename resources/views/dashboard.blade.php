<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Welcome back!") }}
                </div>

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(!$isConnected)
                        {{ __("You're not connected to Microsoft account, to do so go to your profile page and connect your account.") }}
                    @else
                        {{ __("You have successfully connected your email, please check your emails in the Emails tab.")  }}
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
