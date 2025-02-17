<div class="main min-h-screen bg-gray-100 dark:bg-gray-900 sm:py-10" wire:poll.1s>
    @livewire('client.components.header')
    <div class="mx-6 sm:mx-0 p-5 sm:p-0">
        <div class="max-w-4xl mx-auto p-8 sm:p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg mt-32">
            <!-- Left: Cập nhật thông tin cá nhân -->
            <div>
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-6">Trang cá nhân</h2>
                <form wire:submit.prevent="updateProfile" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 mb-2">Họ tên:</label>
                            <input type="text" wire:model="ho_ten" placeholder="Nhập họ tên"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                        </div>
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 mb-2">Ngày sinh:</label>
                            <input type="text" id="ngay_sinh" placeholder="Chọn ngày sinh" readonly
                                wire:model="ngay_sinh"
                                class="date-picker w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 mb-2">Giới tính:</label>
                            <select wire:model="gioi_tinh"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                                <option value="Nam">Nam</option>
                                <option value="Nu">Nữ</option>
                                <option value="Khac">Khác</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 mb-2">Lớp:</label>
                            <input type="text" wire:model="lop" placeholder="Nhập lớp"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 mb-2">Email:</label>
                            <input type="email" wire:model="email" placeholder="Nhập email"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                        </div>
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 mb-2">Số điện thoại:</label>
                            <input type="text" wire:model="sdt" placeholder="Nhập số điện thoại"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 mb-2">Địa chỉ:</label>
                        <input type="text" wire:model="dia_chi" placeholder="Nhập địa chỉ"
                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-600 dark:bg-blue-500 dark:hover:bg-blue-600 text-white font-medium py-2 rounded-lg transition-colors">
                        Cập nhật thông tin
                    </button>
                </form>
                <!-- Nút bấm hiển thị Modal -->
                <div x-data="{ open: false }"
                    x-init="window.addEventListener('password-updated', () => { open = false; })">
                    <script>
                    window.addEventListener('password-updated', () => {
                        Alpine.store('modal', {
                            open: false
                        });
                    });
                    </script>

                    <!-- Nút mở modal -->
                    <button @click="open = true" type="button"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 transition-colors mt-3">
                        Đổi mật khẩu
                    </button>

                    <template x-if="open">
                        <div class="fixed inset-0 z-50 flex items-center justify-center">
                            <!-- Backdrop -->
                            <div class="absolute inset-0 bg-black opacity-50" @click="open = false"></div>

                            <div class="relative z-10 bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-md p-6"
                                @click.stop>
                                <!-- Modal Header -->
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">Đổi mật khẩu</h3>
                                    <button @click="open = false" type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>

                                <!-- Modal Body -->
                                <div class="mb-4">
                                    <form wire:submit.prevent="updatePassword" class="space-y-4">
                                        <!-- Mật khẩu hiện tại -->
                                        <div x-data="{ showCurrent: false }" class="relative">
                                            <label
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                Mật khẩu hiện tại:
                                            </label>
                                            <div class="relative">
                                                <input :type="showCurrent ? 'text' : 'password'"
                                                    wire:model="current_password" placeholder="Nhập mật khẩu hiện tại"
                                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all">
                                                <button type="button" @click="showCurrent = !showCurrent"
                                                    class="absolute inset-y-0 right-3 flex items-center">
                                                    <!-- Icon: Hiển thị nếu đang ẩn -->
                                                    <i x-show="!showCurrent"
                                                        class="fa-regular fa-eye-slash text-gray-500"></i>
                                                    <!-- Icon: Hiển thị nếu đang hiện -->
                                                    <i x-show="showCurrent" class="fa-regular fa-eye text-gray-500"></i>
                                                </button>
                                            </div>
                                            <div class="h-5">
                                                <!-- Giữ chỗ cố định cho lỗi -->
                                                @error('current_password')
                                                <span class="text-red-500 text-xs">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                        <!-- Button Tạo mật khẩu -->
                                        <div class="flex justify-end">
                                            <button type="button" wire:click="generatePassword"
                                                class="bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded-lg transition-colors">
                                                Tạo mật khẩu
                                            </button>
                                        </div>

                                        <!-- Mật khẩu mới -->
                                        <!-- Mật khẩu mới -->
                                        <div x-data="{ showNew: false }" class="relative">
                                            <label
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                Mật khẩu mới:
                                            </label>
                                            <div class="relative">
                                                <input :type="showNew ? 'text' : 'password'" wire:model="new_password"
                                                    placeholder="Nhập mật khẩu mới"
                                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all">
                                                <button type="button" @click="showNew = !showNew"
                                                    class="absolute inset-y-0 right-3 flex items-center">
                                                    <i x-show="!showNew"
                                                        class="fa-regular fa-eye-slash text-gray-500"></i>
                                                    <i x-show="showNew" class="fa-regular fa-eye text-gray-500"></i>
                                                </button>
                                            </div>
                                            <div class="h-5">
                                                @error('new_password')
                                                <span class="text-red-500 text-xs">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Xác nhận mật khẩu mới -->
                                        <div x-data="{ showConfirm: false }" class="relative">
                                            <label
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                Xác nhận mật khẩu:
                                            </label>
                                            <div class="relative">
                                                <input :type="showConfirm ? 'text' : 'password'"
                                                    wire:model="confirm_password" placeholder="Xác nhận mật khẩu mới"
                                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all">
                                                <button type="button" @click="showConfirm = !showConfirm"
                                                    class="absolute inset-y-0 right-3 flex items-center">
                                                    <i x-show="!showConfirm"
                                                        class="fa-regular fa-eye-slash text-gray-500"></i>
                                                    <i x-show="showConfirm" class="fa-regular fa-eye text-gray-500"></i>
                                                </button>
                                            </div>
                                            <div class="h-5">
                                                @error('confirm_password')
                                                <span class="text-red-500 text-xs">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                        <!-- Nút submit -->
                                        <button type="submit"
                                            class="w-full bg-red-500 hover:bg-red-600 dark:bg-red-500 dark:hover:bg-red-600 text-white font-medium py-2 rounded-lg transition-colors">
                                            Đổi mật khẩu
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>



        </div>
    </div>
</div>