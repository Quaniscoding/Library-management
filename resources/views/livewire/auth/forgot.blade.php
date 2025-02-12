<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto bg-gray-100 dark:bg-gray-900">
    <div class="flex h-full items-center">
        <main class="w-full max-w-md mx-auto p-6">
            <div
                class="mt-7 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm">
                <div class="p-4 sm:p-7">
                    <div class="text-center">
                        <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Quên mật khẩu?</h1>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                            Nhớ mật khẩu của bạn?
                            <a wire:navigate href="/login"
                                class="text-blue-600 hover:underline decoration-2 font-medium">
                                Đăng nhập ở đây
                            </a>
                        </p>
                    </div>
                    <div class="mt-5">
                        <!-- Form -->
                        <form wire:submit.prevent="save">
                            <div class="grid gap-y-4">
                                <!-- Form Group -->
                                <div>
                                    <label for="email"
                                        class="block text-sm mb-2 text-gray-700 dark:text-gray-300">Email</label>
                                    <div class="relative">
                                        <input type="email" id="email" wire:model="email"
                                            placeholder="Nhập email của bạn" aria-describedby="email-error"
                                            class="py-3 px-4 block w-full border border-gray-200 dark:border-gray-700 rounded-lg text-sm dark:bg-gray-700 dark:text-white focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                        @error('email')
                                        <div
                                            class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
                                            <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor"
                                                viewBox="0 0 16 16" aria-hidden="true">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                            </svg>
                                        </div>
                                        @enderror
                                    </div>
                                    @error('email')
                                    <p class="text-xs text-red-600 dark:text-red-500 mt-2" id="email-error">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <!-- End Form Group -->

                                <button type="submit"
                                    class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 disabled:opacity-50 disabled:pointer-events-none transition-colors">
                                    <span wire:loading.remove wire:target="save">Khôi phục mật khẩu</span>
                                    <span wire:loading wire:target="save">Đang xử lý...</span>
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