<x-app-layout>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Subject
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    From
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    To
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Is Read
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Is Draft
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($emails as $email)
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-6 py-4">
                                        <a href="emails/page/{{$email['email_id']}}">{{$email['subject']}}</a>
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$email['from']}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$email['to']}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$email['isRead']}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$email['isDraft']}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
