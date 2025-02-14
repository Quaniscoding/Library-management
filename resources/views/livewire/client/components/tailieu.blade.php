<div class="main">
    @livewire('client.components.header')
    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-30 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <input type="text" wire:model.live="search" placeholder="Nhập tên sách"
                    class="w-full px-4 py-2 mt-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 dark:placeholder-gray-500 dark:focus:ring-blue-500 focus:outline-none" />
                <!-- Filter: TacGia -->
                <div class=" shadow-sm">
                    <button
                        class="w-full rounded-xl p-2 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 flex items-center justify-between"
                        wire:click="$toggle('showTacGias')">
                        <span class="text-gray-900 dark:text-white">Tác giả</span>
                        <span>
                            @if ($showTacGias)
                            <i class="fa-solid fa-chevron-up"></i>
                            @else
                            <i class="fa-solid fa-chevron-down"></i>
                            @endif
                        </span>
                    </button>
                    @if ($showTacGias)
                    <div x-data="{ open: @entangle('showTacGias') }" x-show="open"
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 scale-y-0" x-transition:enter-end="opacity-100 scale-y-100"
                        x-transition:leave="transition ease-in duration-300 transform"
                        x-transition:leave-start="opacity-100 scale-y-100" x-transition:leave-end="opacity-0 scale-y-0"
                        class="p-4 max-h-48 overflow-y-auto">
                        <ul>
                            @foreach ($tacgias as $tacgia)
                            <li class="flex items-center justify-between mb-2" wire:key={{$tacgia->id}}>
                                <label class="dark:text-white mr-2" for="tacgia-{{ $tacgia->id }}">{{ $tacgia->ho_ten
                                    }}</label>
                                <input type="checkbox" id="tacgia-{{ $tacgia->id }}" wire:model.live="selected_tacgias"
                                    value="{{ $tacgia->id }}" class="w-4 h-4">
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <!-- Filter: NhaXuatBan -->
                <div class="mb-6 shadow-sm">
                    <button
                        class="w-full rounded-xl p-2 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 flex items-center justify-between"
                        wire:click="$toggle('showNhaXuatBans')">
                        <span class="text-gray-900 dark:text-white">Nhà Xuất bản</span>
                        <span>
                            @if ($showNhaXuatBans)
                            <i class="fa-solid fa-chevron-up"></i>
                            @else
                            <i class="fa-solid fa-chevron-down"></i>
                            @endif
                        </span>
                    </button>
                    @if ($showNhaXuatBans)
                    <div x-data="{ open: @entangle('showNhaXuatBans') }" x-show="open"
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 scale-y-0" x-transition:enter-end="opacity-100 scale-y-100"
                        x-transition:leave="transition ease-in duration-300 transform"
                        x-transition:leave-start="opacity-100 scale-y-100" x-transition:leave-end="opacity-0 scale-y-0"
                        class="p-4 max-h-48 overflow-y-auto">
                        <ul>
                            @foreach ($nhaxuatbans as $nhaxuatban)
                            <li class="flex items-center justify-between mb-2">
                                <label class="dark:text-white mr-2" for="nhaxuatban-{{ $nhaxuatban->id }}">{{
                                    $nhaxuatban->ten_nha_xuat_ban }}</label>
                                <input type="checkbox" id="nhaxuatban-{{ $nhaxuatban->id }}"
                                    wire:model.live="selected_nhaxuatbans" value="{{ $nhaxuatban->id }}"
                                    class="w-4 h-4">
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <!-- Filter: mon -->
                <div class="mb-6 shadow-sm">
                    <button
                        class="w-full rounded-xl p-2 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 flex items-center justify-between"
                        wire:click="$toggle('showMons')">
                        <span class="text-gray-900 dark:text-white">Môn</span>
                        <span>
                            @if ($showMons)
                            <i class="fa-solid fa-chevron-up"></i>
                            @else
                            <i class="fa-solid fa-chevron-down"></i>
                            @endif
                        </span>
                    </button>
                    @if ($showMons)
                    <div x-data="{ open: @entangle('showMons') }" x-show="open"
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 scale-y-0" x-transition:enter-end="opacity-100 scale-y-100"
                        x-transition:leave="transition ease-in duration-300 transform"
                        x-transition:leave-start="opacity-100 scale-y-100" x-transition:leave-end="opacity-0 scale-y-0"
                        class="p-4 max-h-48 overflow-y-auto">
                        <ul>
                            @foreach ($mons as $mon)
                            <li class="flex items-center justify-between mb-2">
                                <label class="dark:text-white mr-2" for="mon-{{ $mon->id }}">{{ $mon->ten_mon }}</label>
                                <input type="checkbox" id="mon-{{ $mon->id }}" wire:model.live="selected_mons"
                                    value="{{ $mon->id }}" class="w-4 h-4">
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <!-- Filter: khoa -->
                <div class="mb-6 shadow-sm">
                    <button
                        class="w-full rounded-xl p-2 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 flex items-center justify-between"
                        wire:click="$toggle('showKhoas')">
                        <span class="text-gray-900 dark:text-white">Khoa</span>
                        <span>
                            @if ($showKhoas)
                            <i class="fa-solid fa-chevron-up"></i>
                            @else
                            <i class="fa-solid fa-chevron-down"></i>
                            @endif
                        </span>
                    </button>
                    @if ($showKhoas)
                    <div x-data="{ open: @entangle('showKhoas') }" x-show="open"
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 scale-y-0" x-transition:enter-end="opacity-100 scale-y-100"
                        x-transition:leave="transition ease-in duration-300 transform"
                        x-transition:leave-start="opacity-100 scale-y-100" x-transition:leave-end="opacity-0 scale-y-0"
                        class="p-4 max-h-48 overflow-y-auto">
                        <ul>
                            @foreach ($khoas as $khoa)
                            <li class="flex items-center justify-between mb-2">
                                <label class="dark:text-white mr-2" for="khoa-{{ $khoa->id }}">{{ $khoa->ten_khoa
                                    }}</label>
                                <input type="checkbox" id="khoa-{{ $khoa->id }}" wire:model.live="selected_khoas"
                                    value="{{ $khoa->id }}" class="w-4 h-4">
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <!-- Filter: Nganh -->
                <div class="mb-6 shadow-sm">
                    <button
                        class="w-full rounded-xl p-2 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 flex items-center justify-between"
                        wire:click="$toggle('showNganhs')">
                        <span class="text-gray-900 dark:text-white">Ngành</span>
                        <span>
                            @if ($showNganhs)
                            <i class="fa-solid fa-chevron-up"></i>
                            @else
                            <i class="fa-solid fa-chevron-down"></i>
                            @endif
                        </span>
                    </button>
                    @if ($showNganhs)
                    <div x-data="{ open: @entangle('showNganhs') }" x-show="open"
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 scale-y-0" x-transition:enter-end="opacity-100 scale-y-100"
                        x-transition:leave="transition ease-in duration-300 transform"
                        x-transition:leave-start="opacity-100 scale-y-100" x-transition:leave-end="opacity-0 scale-y-0"
                        class="p-4 max-h-48 overflow-y-auto">
                        <ul>
                            @foreach ($nganhs as $nganh)
                            <li class="flex items-center justify-between mb-2">
                                <label class="dark:text-white mr-2" for="nganh-{{ $nganh->id }}">{{ $nganh->ten_nganh
                                    }}</label>
                                <input type="checkbox" id="nganh-{{ $nganh->id }}" wire:model.live="selected_nganhs"
                                    value="{{ $nganh->id }}" class="w-4 h-4">
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <!-- Filter: Năm -->
                <div class="mb-6 shadow-sm">
                    <button
                        class="w-full rounded-xl p-2 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 flex items-center justify-between"
                        wire:click="$toggle('showNams')">
                        <span class="text-gray-900 dark:text-white">Năm phát hành</span>
                        <span>
                            @if ($showNams)
                            <i class="fa-solid fa-chevron-up"></i>
                            @else
                            <i class="fa-solid fa-chevron-down"></i>
                            @endif
                        </span>
                    </button>
                    @if ($showNams)
                    <div x-data="{ open: @entangle('showNams') }" x-show="open"
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 scale-y-0" x-transition:enter-end="opacity-100 scale-y-100"
                        x-transition:leave="transition ease-in duration-300 transform"
                        x-transition:leave-start="opacity-100 scale-y-100" x-transition:leave-end="opacity-0 scale-y-0"
                        class="p-4 max-h-48 overflow-y-auto">
                        <div class="flex flex-col space-y-4">
                            <div class="flex flex-col items-center justify-between space-x-4">
                                <!-- Năm bắt đầu -->
                                <div class="flex flex-col items-center">
                                    <label for="start-year" class="text-sm text-gray-700 dark:text-gray-300">Năm bắt
                                        đầu</label>
                                    <input type="range" id="start-year" wire:model.live="start_year"
                                        min="{{ min($nams) }}" max="{{ max($nams) }}" step="1"
                                        class="w-36 h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700 accent-blue-500" />
                                    <span class="text-sm text-gray-700 dark:text-gray-300">{{ $start_year }}</span>
                                </div>

                                <!-- Năm kết thúc -->
                                <div class="flex flex-col items-center">
                                    <label for="end-year" class="text-sm text-gray-700 dark:text-gray-300">Năm kết
                                        thúc</label>
                                    <input type="range" id="end-year" wire:model.live="end_year" min="{{ min($nams) }}"
                                        max="{{ max($nams) }}" step="1"
                                        class="w-36 h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700 accent-blue-500" />
                                    <span class="text-sm text-gray-700 dark:text-gray-300">{{ $end_year }}</span>
                                </div>
                            </div>

                            <div class="mt-4">
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    Phạm vi năm:
                                    <span class="font-semibold">{{ $start_year }} - {{ $end_year }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </ul>
        </div>
    </aside>
    <div class="p-4 sm:ml-64">
        <div class="p-2 border-2 border-gray-200 rounded-lg dark:border-gray-700 mt-16">
            <div class="px-2">
                <div class="items-center justify-between px-2 py-2 bg-gray-100 dark:bg-gray-900 ">
                    <div class="flex items-center justify-between">
                        <div x-data="{ sort: 'latest', open: false }" class="relative pb-1">
                            <!-- Nút hiển thị lựa chọn hiện tại -->
                            <button @click="open = !open" type="button"
                                class="block w-56 px-4 py-2 text-base bg-white border border-gray-300 rounded-lg shadow-sm appearance-none 
               focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
               dark:bg-gray-900 dark:border-gray-700 dark:focus:ring-blue-500 dark:text-gray-400 cursor-pointer text-left">
                                <span
                                    x-text="sort === 'latest' ? 'Sắp xếp theo mới nhất' : 'Sắp xếp theo cũ nhất'"></span>
                                <i
                                    class="fa-solid fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2"></i>
                            </button>

                            <!-- Danh sách lựa chọn -->
                            <div x-show="open" @click.away="open = false" x-transition
                                class="absolute z-10 mt-1 w-56 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded-lg shadow-lg">
                                <div @click="sort = 'latest'; open = false"
                                    class="px-4 py-2 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-800">
                                    Sắp xếp theo mới nhất
                                </div>
                                <div @click="sort = 'oldest'; open = false"
                                    class="px-4 py-2 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-800">
                                    Sắp xếp theo cũ nhất
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="w-full overflow-y-auto min-h-[74vh] max-h-[74vh]">
                        <div class="w-full overflow-y-auto overflow-x-hidden">
                            @foreach($tailieumos as $tailieumo)
                            <div
                                class="bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 group mb-4 mx-16">
                                <div class="p-4 flex flex-row justify-between">
                                    <div class="flex gap-4">
                                        @if($tailieumo->anh_bia)
                                        <img src="{{ asset('storage/' . $tailieumo->anh_bia) }}" alt="Ảnh bìa"
                                            width="150" class="rounded-lg object-cover">
                                        @else
                                        <img src="https://placehold.co/150x150?text={{$tailieumo->ten_tai_lieu}}"
                                            alt="{{ $tailieumo->ten_tai_lieu }}" width="150"
                                            class="rounded-lg object-cover">
                                        @endif
                                        <div>
                                            <h3 class="font-semibold mb-2 line-clamp-2 text-gray-900 dark:text-white">
                                                {{ $tailieumo->ten_tai_lieu }}
                                            </h3>
                                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Nhà xuất bản:
                                                {{ $tailieumo->NhaXuatBan->ten_nha_xuat_ban ?? 'Không rõ' }}
                                            </p>
                                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Môn:
                                                {{ $tailieumo->Mon->ten_mon ?? 'Không rõ' }}
                                            </p>
                                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Khoa:
                                                {{ $tailieumo->Khoa->ten_khoa ?? 'Không rõ' }}
                                            </p>
                                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Ngành:
                                                {{ $tailieumo->Nganh->ten_nganh ?? 'Không rõ' }}
                                            </p>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">Năm phát hành:
                                                {{ $tailieumo->nam_phat_hanh }}
                                            </p>
                                        </div>
                                    </div>
                                    <div
                                        class="flex flex-col gap-5 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        @if(Auth::guard('student')->check() || Auth::guard('web')->check())
                                        <a href="{{ $tailieumo->link_tai_ve }}" target="_blank"
                                            rel="noopener noreferrer">
                                            <button
                                                class="bg-blue-600 px-4 py-2 rounded-full text-sm text-white hover:bg-blue-700 transition-colors">
                                                Tải về
                                            </button>
                                        </a>
                                        @else
                                        <button wire:click="alert"
                                            class="bg-gray-400 px-4 py-2 rounded-full text-sm text-white cursor-not-allowed">
                                            Tải xuống
                                        </button>
                                        @endauth
                                        <div x-data="{ openModal: false, selectedTailieumo: @entangle('selectedTailieumo') }"
                                            x-init="console.log('selectedTailieumo:', selectedTailieumo)">
                                            <!-- Nút mở modal -->
                                            <button
                                                @click="openModal = true; $wire.showTaiLieuDetails({{ $tailieumo->id }})"
                                                class="bg-blue-600 px-4 py-2 rounded-full text-sm text-white hover:bg-blue-700 transition-colors"
                                                type="button">
                                                Chi tiết
                                            </button>
                                            <!-- Modal -->
                                            <div x-show="openModal" x-cloak
                                                class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center">
                                                <div @click.stop
                                                    class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-full max-w-3xl">
                                                    <!-- Modal Header -->
                                                    <div class="flex items-center justify-between mb-4">
                                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                            Chi tiết tài liệu</h3>
                                                        <button @click="openModal = false; $wire.closeModal()"
                                                            class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                            </svg>
                                                            <span class="sr-only">Đóng modal</span>
                                                        </button>
                                                    </div>

                                                    <!-- Modal Body -->
                                                    <div class="space-y-6">
                                                        <template x-if="selectedTailieumo">
                                                            <div class="border-b pb-4 mb-4">
                                                                <h2
                                                                    class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                                                    Thông tin Tài liệu</h2>
                                                                <div
                                                                    class="mt-2 text-gray-700 dark:text-gray-300 space-y-2">
                                                                    <p>
                                                                        <strong
                                                                            class="text-gray-900 dark:text-gray-100">Tên
                                                                            sách:</strong>
                                                                        <span
                                                                            x-text="selectedTailieumo.ten_tai_lieu"></span>
                                                                    </p>
                                                                    <p>
                                                                        <strong
                                                                            class="text-gray-900 dark:text-gray-100">Tác
                                                                            giả:</strong>
                                                                        <span
                                                                            x-text="selectedTailieumo.tac_gia_id ? selectedTailieumo.tacgia.ho_ten : 'Không rõ'"></span>
                                                                    </p>
                                                                    <p>
                                                                        <strong
                                                                            class="text-gray-900 dark:text-gray-100">Môn:</strong>
                                                                        <span
                                                                            x-text="selectedTailieumo.mon_hoc_id ? selectedTailieumo.mon.ten_mon : 'Không rõ'"></span>
                                                                    </p>
                                                                    <p>
                                                                        <strong
                                                                            class="text-gray-900 dark:text-gray-100">Ngành:</strong>
                                                                        <span
                                                                            x-text="selectedTailieumo.nganh_id ? selectedTailieumo.nganh.ten_nganh : 'Không rõ'"></span>
                                                                    </p>
                                                                    <p>
                                                                        <strong
                                                                            class="text-gray-900 dark:text-gray-100">Khoa:</strong>
                                                                        <span
                                                                            x-text="selectedTailieumo.khoa ? selectedTailieumo.khoa.ten_khoa : 'Không rõ'"></span>
                                                                    </p>
                                                                    <p>
                                                                        <strong
                                                                            class="text-gray-900 dark:text-gray-100">Nhà
                                                                            xuất bản:</strong>
                                                                        <span
                                                                            x-text="selectedTailieumo.nha_xuat_ban_id ? selectedTailieumo.nhaxuatban.ten_nha_xuat_ban : 'Không rõ'"></span>
                                                                    </p>
                                                                    <p>
                                                                        <strong
                                                                            class="text-gray-900 dark:text-gray-100">Năm
                                                                            phát hành:</strong>
                                                                        <span
                                                                            x-text="selectedTailieumo.nam_phat_hanh"></span>
                                                                    </p>
                                                                    <p>
                                                                        <strong
                                                                            class="text-gray-900 dark:text-gray-100">ISBN:</strong>
                                                                        <span x-text="selectedTailieumo.isbn"></span>
                                                                    </p>
                                                                    <p>
                                                                        <strong
                                                                            class="text-gray-900 dark:text-gray-100">Thể
                                                                            loại:</strong>
                                                                        <span
                                                                            x-text="selectedTailieumo.theloai ? selectedTailieumo.theloai.ten_the_loai : 'Không rõ'"></span>
                                                                    </p>
                                                                    <p>
                                                                        <strong
                                                                            class="text-gray-900 dark:text-gray-100">Số
                                                                            trang:</strong>
                                                                        <span
                                                                            x-text="selectedTailieumo.so_trang"></span>
                                                                    </p>
                                                                    <p>
                                                                        <strong
                                                                            class="text-gray-900 dark:text-gray-100">Link
                                                                            tải về:</strong>
                                                                        <a :href="selectedTailieumo.link_tai_ve"
                                                                            x-text="selectedTailieumo.link_tai_ve"
                                                                            target="_blank"
                                                                            class="text-blue-600 hover:underline"></a>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </template>
                                                        <template x-if="!selectedTailieumo">
                                                            <div class="text-center text-gray-500 dark:text-gray-400">
                                                                Không có dữ liệu.</div>
                                                        </template>
                                                    </div>

                                                    <!-- Modal Footer -->
                                                    <div class="mt-4 text-right">
                                                        <button @click="openModal = false; $wire.closeModal()"
                                                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                                            Đóng
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-2">
            <div class="inline-flex items-center space-x-2">
                <!-- Previous Page Button -->
                @if($tailieumos->onFirstPage())
                <span
                    class="px-4 py-2 text-gray-400 bg-gray-200 dark:bg-gray-700 dark:text-gray-500 rounded-md cursor-not-allowed">Previous</span>
                @else
                <a href="{{ $tailieumos->previousPageUrl() }}"
                    class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">Previous</a>
                @endif

                <!-- Page Numbers -->
                @foreach ($tailieumos->getUrlRange(1, $tailieumos->lastPage()) as $page => $url)
                @if ($page == $tailieumos->currentPage())
                <span class="px-4 py-2 text-white bg-blue-600 dark:bg-blue-500 rounded-md">{{ $page }}</span>
                @else
                <a href="{{ $url }}"
                    class="px-4 py-2 text-blue-600 border border-gray-300 rounded-md hover:bg-gray-100 dark:text-blue-400 dark:border-gray-600 dark:hover:bg-gray-700">{{
                    $page }}</a>
                @endif
                @endforeach

                <!-- Next Page Button -->
                @if($tailieumos->hasMorePages())
                <a href="{{ $tailieumos->nextPageUrl() }}"
                    class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">Next</a>
                @else
                <span
                    class="px-4 py-2 text-gray-400 bg-gray-200 dark:bg-gray-700 dark:text-gray-500 rounded-md cursor-not-allowed">Next</span>
                @endif
            </div>
        </div>
    </div>

</div>