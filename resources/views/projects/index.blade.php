<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900 bg-gray-200">

                    <a href="{{ route('projects.create') }}" class="m-4  underline"> Add New Project</a>
                    <div class="px-3 py-4 flex justify-center mt-2">
                        <table class="min-w-full divide-y divide-gray-200 ">
                            <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Assigned To</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deadline</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($projects as $project)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $project->title }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $project->user->first_name }} {{ $project->user->last_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $project->client->company_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $project->deadline_at }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                      <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ $project->status }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('projects.edit', $project) }}" class="px-4 py-2 font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 active:bg-blue-600 transition duration-150 ease-in-out inline-block">Edit</a>

                                        {{--                                         Delete project--}}
                                        <form action="{{ route('projects.destroy', $project) }}"
                                              class="inline-block"
                                              method="POST"
                                              onsubmit="return confirm('Are You Sure?')"
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="submit"
                                                class="ml-2 px-4 py-2 font-medium text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:shadow-outline-red active:bg-red-600 transition duration-150 ease-in-out">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $projects->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
