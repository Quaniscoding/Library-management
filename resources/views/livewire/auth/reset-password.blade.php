<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto bg-gray-100 dark:bg-gray-900">
    <div class="flex h-full items-center">
        <main class="w-full max-w-md mx-auto p-6">
            <div
                class="mt-7 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm">
                <div class="p-4 sm:p-7">
                    <div class="text-center">
                        <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Khôi phục mật khẩu</h1>
                    </div>

                    <div class="mt-5">
                        <!-- Form -->
                        <form wire:submit.prevent="save">
                            <div class="grid gap-y-4">
                                <!-- Form Group: Mật khẩu mới -->
                                <div x-data="{ showPasswordConfirmation: false }">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Mật khẩu mới
                                    </label>
                                    <div class="relative">
                                        <input :type="showPasswordConfirmation ? 'text' : 'password'"
                                            wire:model="password" placeholder="Nhập mật khẩu"
                                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all">
                                        <button type="button"
                                            @click="showPasswordConfirmation = !showPasswordConfirmation"
                                            class="absolute inset-y-0 right-3 flex items-center">
                                            <!-- Icon: Hiển thị nếu đang ẩn -->
                                            <i x-show="!showPasswordConfirmation"
                                                class="fa-regular fa-eye-slash text-gray-500"></i>
                                            <!-- Icon: Hiển thị nếu đang hiện -->
                                            <i x-show="showPasswordConfirmation"
                                                class="fa-regular fa-eye text-gray-500"></i>
                                        </button>
                                    </div>
                                    @error('password')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group: Xác nhận mật khẩu mới -->
                                <div x-data="{ showPasswordConfirmation: false }">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Xác nhận mật khẩu mới
                                    </label>
                                    <div class="relative">
                                        <input :type="showPasswordConfirmation ? 'text' : 'password'"
                                            wire:model="password_confirmation" placeholder="Nhập mật khẩu"
                                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all">
                                        <button type="button"
                                            @click="showPasswordConfirmation = !showPasswordConfirmation"
                                            class="absolute inset-y-0 right-3 flex items-center">
                                            <!-- Icon: Hiển thị nếu đang ẩn -->
                                            <i x-show="!showPasswordConfirmation"
                                                class="fa-regular fa-eye-slash text-gray-500"></i>
                                            <!-- Icon: Hiển thị nếu đang hiện -->
                                            <i x-show="showPasswordConfirmation"
                                                class="fa-regular fa-eye text-gray-500"></i>
                                        </button>
                                    </div>
                                    @error('password')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- End Form Group -->

                                <button type="submit"
                                    class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 disabled:opacity-50 disabled:pointer-events-none transition-colors">
                                    Lưu mật khẩu mới
                                </button>
                            </div>
                        </form>
                        <!-- End Form -->
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>