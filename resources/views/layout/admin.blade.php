<!DOCTYPE html>
<html>

<head>
    <title>@yield('title', 'Toko')</title>
    @vite('resources/css/admin.css')
</head>

<body>
    <div class="w-full h-dvh flex bg-white">
        <aside class="w-64 flex flex-col justify-between">
            <ul class="w-full px-3 py-2 space-y-2">
                <li class="flex">
                    <a class="flex items-center gap-2 w-full px-3 py-2 rounded {{ Request::is('admin') ? 'bg-rose-600 text-white hover:bg-rose-500' : 'bg-rose-50 hover:bg-rose-600 hover:text-white' }} transition-all hover:no-underline group "
                        href="/admin">
                        <span
                            class="{{request()->is('admin') ? 'text-white' : 'text-rose-600 group-hover:text-white'}} transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-5">
                                <path fill-rule="evenodd"
                                    d="M3 6a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V6Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3V6ZM3 15.75a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3v-2.25Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3v-2.25Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="flex">
                    <a class="flex items-center gap-2 w-full px-3 py-2 rounded {{request()->is('admin/products*') ? 'bg-rose-600 text-white hover:bg-rose-500' : 'bg-rose-50 hover:bg-rose-600 hover:text-white'}} transition-all hover:no-underline group"
                        href="/admin/products">
                        <span
                            class="{{request()->is('admin/products*') ? 'text-white' : 'text-rose-600 group-hover:text-white'}} transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-5">
                                <path
                                    d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                                <path fill-rule="evenodd"
                                    d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087Zm6.163 3.75A.75.75 0 0 1 10 12h4a.75.75 0 0 1 0 1.5h-4a.75.75 0 0 1-.75-.75Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>

                        <p>Products</p>
                    </a>
                </li>
                <li class="flex">
                    <a class="flex items-center gap-2 w-full px-3 py-2 rounded {{request()->is('admin/customers*') ? 'bg-rose-600 text-white hover:bg-rose-500' : 'bg-rose-50 hover:bg-rose-600 hover:text-white'}} transition-all hover:no-underline group"
                        href="/admin/customers">
                        <span
                            class="{{request()->is('admin/customers*') ? 'text-white' : 'text-rose-600 group-hover:text-white'}} transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-6">
                                <path
                                    d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z" />
                            </svg>
                        </span>
                        <p>Customers</p>
                    </a>
                </li>
                <li class="flex">
                    <a class="flex items-center gap-2 w-full px-3 py-2 rounded {{request()->is('admin/transaction*') ? 'bg-rose-600 text-white hover:bg-rose-500' : 'bg-rose-50 hover:bg-rose-600 hover:text-white'}} transition-all hover:no-underline group"
                        href="/admin/transaction">
                        <span
                            class="{{request()->is('admin/transaction*') ? 'text-white' : 'text-rose-600 group-hover:text-white'}} transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v7.5m2.25-6.466a9.016 9.016 0 0 0-3.461-.203c-.536.072-.974.478-1.021 1.017a4.559 4.559 0 0 0-.018.402c0 .464.336.844.775.994l2.95 1.012c.44.15.775.53.775.994 0 .136-.006.27-.018.402-.047.539-.485.945-1.021 1.017a9.077 9.077 0 0 1-3.461-.203M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
</svg>

                        </span>
                        <p>transaction</p>
                    </a>
                </li>
            </ul>
            <form method="POST" action="/admin/logout" class="flex items-center px-3 py-2">
                @method('delete')
                @csrf
                <div class="flex-1">
                    <h3 class="font-bold">{{ auth()->guard('admin')->user()->name }}</h3>
                    <small>Administrator</small>
                </div>
                <button type="submit"
                    class="flex items-center justify-center rounded-md w-9 h-9 hover:bg-zinc-300 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                        <path fill-rule="evenodd"
                            d="M7.5 3.75A1.5 1.5 0 0 0 6 5.25v13.5a1.5 1.5 0 0 0 1.5 1.5h6a1.5 1.5 0 0 0 1.5-1.5V15a.75.75 0 0 1 1.5 0v3.75a3 3 0 0 1-3 3h-6a3 3 0 0 1-3-3V5.25a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3V9A.75.75 0 0 1 15 9V5.25a1.5 1.5 0 0 0-1.5-1.5h-6Zm10.72 4.72a.75.75 0 0 1 1.06 0l3 3a.75.75 0 0 1 0 1.06l-3 3a.75.75 0 1 1-1.06-1.06l1.72-1.72H9a.75.75 0 0 1 0-1.5h10.94l-1.72-1.72a.75.75 0 0 1 0-1.06Z"
                            clip-rule="evenodd" />
                    </svg>

                </button>
            </form>
        </aside>
        <div class="flex-1 w-full h-fit max-h-dvh overflow-y-auto bg-white px-3 py-2">
            @yield('content')
        </div>
    </div>
    @error('error')
        <div class="absolute flex items-center justify-between px-3 py-2 gap-x-3 rounded-md w-auto min-w-20 max-w-lg bg-rose-400 text-white bottom-3 right-3"
            id="modalError" onclick="handleRemoveModal('modalError')">
            <p>{{ $message }}</p>
            <div
                class="w-9 h-9 rounded-md flex items-center justify-center text-white bg-rose-400 hover:bg-rose-500 transition cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                    <path
                        d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
                </svg>
            </div>
        </div>
    @enderror
    @error('success')
        <div class="absolute flex items-center justify-between px-3 py-2 gap-x-3 rounded-md w-auto min-w-20 max-w-lg bg-emerald-600 text-white bottom-3 right-3"
            id="modalSuccess" onclick="handleRemoveModal('modalSuccess')">
            <p>{{ $message }}</p>
            <div
                class="w-9 h-9 rounded-md flex items-center justify-center text-white bg-emerald-600 hover:bg-emerald-500 transition cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                    <path
                        d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
                </svg>
            </div>
        </div>
    @enderror
    <script>
        const handleRemoveModal = (modalId) => {
            const modal = document.querySelector(`#${modalId}`)
            modal.remove();
        }
    </script>
</body>

</html>