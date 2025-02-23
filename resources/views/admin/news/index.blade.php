<x-app-layout>
    @section('breadcrumb')
    <nav>
        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="text-sm leading-normal">
                <a class="text-black opacity-50" href="{{route('dashboard')}}">Dashboard</a>
            </li>
            <li class="text-sm pl-2 capitalize leading-normal text-black before:float-left before:pr-2 before:text-black before:content-['/']"
                aria-current="page">News Management
            </li>
        </ol>
        <h6 class="mb-0 font-bold text-black capitalize">News Management</h6>
    </nav>
    @endsection

    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 mt-0 mb-6">
                <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                    <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                        <div class="flex justify-between">
                            <h6 class="mb-0 dark:text-white">News List</h6>
                            <a href="{{ route('admin.news.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Add News
                            </a>
                        </div>
                    </div>
                    <div class="flex-auto p-6 px-0 pb-2">
                        <div class="overflow-x-auto">
                            <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                <thead class="align-bottom">
                                    <tr>
                                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Title</th>
                                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status</th>
                                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Published Date</th>
                                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($news as $item)
                                    <tr>
                                        <td class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                @if($item->image)
                                                <div class="w-12 h-12 mr-4">
                                                    <img src="{{ asset($item->image) }}" class="w-full h-full rounded-lg object-cover" alt="">
                                                </div>
                                                @endif
                                                <div class="flex flex-col justify-center">
                                                    <h6 class="mb-0 text-sm leading-normal dark:text-white">{{ $item->title }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent text-center">
                                            <span class="px-2 py-1 rounded {{ $item->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                                {{ ucfirst($item->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent text-center">
                                            {{ $item->published_at ? $item->published_at->format('d M Y') : 'Not Published' }}
                                        </td>
                                        <td class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent text-center">
                                            <a href="{{ route('admin.news.edit', $item->id) }}" class="text-blue-500 hover:text-blue-700 mr-2">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('admin.news.delete', $item->id) }}" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure you want to delete this news?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center">No news found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $news->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 