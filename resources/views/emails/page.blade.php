<x-app-layout>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <div class="px-4 sm:px-0 flex">
                            <div class="flex-1 w-64">
                                <h3 class="text-base font-semibold leading-7 text-gray-900">Subject</h3>
                                <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">{{$email['subject']}}</p>
                            </div>
                            <div class="flex-2 w-70 text-end">
                                <h3 class="text-base font-semibold leading-7 text-gray-900">Created date</h3>
                                <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">{{$email['createdDateTime']}}</p>
                            </div>
                        </div>
                        <div class="mt-6 border-t border-gray-100">
                            <dl class="divide-y divide-gray-100">
                                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">Email Body</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$email['bodyPreview']}}...</dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
