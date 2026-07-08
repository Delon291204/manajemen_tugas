<nav x-data="{ open: false }" class="bg-white shadow-sm border-b">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex justify-between items-center h-16">

            {{-- Logo --}}
            <div class="flex items-center gap-10">

                <a href="{{ Auth::user()->role == 'dosen' ? '/dashboard-dosen' : '/dashboard-mahasiswa' }}"
                   class="text-xl font-bold text-indigo-600">

                    🎓 SIM Manajemen Tugas

                </a>

                {{-- Menu Desktop --}}
                <div class="hidden md:flex items-center gap-3">

                    @if(Auth::user()->role == 'dosen')

                        <a href="/dashboard-dosen"
                           class="px-4 py-2 rounded-lg transition
                           {{ request()->is('dashboard-dosen') ? 'bg-indigo-600 text-white' : 'text-gray-700 hover:bg-indigo-100' }}">

                            Dashboard

                        </a>

                        <a href="/mata-kuliah"
                           class="px-4 py-2 rounded-lg transition
                           {{ request()->is('mata-kuliah*') ? 'bg-indigo-600 text-white' : 'text-gray-700 hover:bg-indigo-100' }}">

                            Mata Kuliah

                        </a>

                    @else

                        <a href="/dashboard-mahasiswa"
                           class="px-4 py-2 rounded-lg transition
                           {{ request()->is('dashboard-mahasiswa') ? 'bg-indigo-600 text-white' : 'text-gray-700 hover:bg-indigo-100' }}">

                            Dashboard

                        </a>

                        <a href="/mata-kuliah-mahasiswa"
                           class="px-4 py-2 rounded-lg transition
                           {{ request()->is('mata-kuliah-mahasiswa*') ? 'bg-indigo-600 text-white' : 'text-gray-700 hover:bg-indigo-100' }}">

                            Mata Kuliah Saya

                        </a>

                    @endif

                </div>

            </div>

            {{-- User Desktop --}}
            <div class="hidden md:flex items-center gap-4">

                <span class="text-gray-700">

                    👤 {{ Auth::user()->name }}

                </span>

                <a href="{{ route('profile.edit') }}"
                   class="text-indigo-600 hover:text-indigo-800">

                    Profile

                </a>

                <form method="POST"
                      action="{{ route('logout') }}">

                    @csrf

                    <button
                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">

                        Logout

                    </button>

                </form>

            </div>

            {{-- Hamburger --}}
            <button
                @click="open = !open"
                class="md:hidden text-2xl">

                ☰

            </button>

        </div>

    </div>

    {{-- Mobile --}}
    <div x-show="open"
         class="md:hidden border-t bg-white">

        <div class="p-4 space-y-2">

            @if(Auth::user()->role=='dosen')

                <a href="/dashboard-dosen"
                   class="block px-3 py-2 rounded hover:bg-indigo-100">

                    Dashboard

                </a>

                <a href="/mata-kuliah"
                   class="block px-3 py-2 rounded hover:bg-indigo-100">

                    Mata Kuliah

                </a>

            @else

                <a href="/dashboard-mahasiswa"
                   class="block px-3 py-2 rounded hover:bg-indigo-100">

                    Dashboard

                </a>

                <a href="/mata-kuliah-mahasiswa"
                   class="block px-3 py-2 rounded hover:bg-indigo-100">

                    Mata Kuliah Saya

                </a>

            @endif

            <hr>

            <a href="{{ route('profile.edit') }}"
               class="block px-3 py-2 rounded hover:bg-gray-100">

                Profile

            </a>

            <form method="POST"
                  action="{{ route('logout') }}">

                @csrf

                <button
                    class="w-full text-left px-3 py-2 text-red-600 hover:bg-red-50 rounded">

                    Logout

                </button>

            </form>

        </div>

    </div>

</nav>