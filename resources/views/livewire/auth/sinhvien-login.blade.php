<div class="min-h-screen flex flex-col md:flex-row">
    <div class="absolute right-0 top-0">
        @livewire('theme-switcher')
    </div>
    <div class="hidden md:flex md:w-1/2 items-center justify-center bg-cover bg-center lazy-bg"
        data-bg="/images/login-img.jpg">
    </div>

    <div class="md:w-1/2 flex items-center justify-center p-8 bg-gray-50 dark:bg-gray-900">
        <div
            class="w-full max-w-md bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl shadow-xl p-8 transition-all">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 text-center">
                Đăng nhập Sinh Viên
            </h2>
            <form class="space-y-4" wire:submit.prevent="login">
                <!-- Email Input -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                    <input type="email" wire:model="email" placeholder="Nhập email của bạn"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all" />
                    @error('email')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Password Input -->
                <div x-data="{ showPassword: false }">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Mật khẩu:
                    </label>
                    <div class="relative">
                        <input :type="showPassword ? 'text' : 'password'" wire:model="password"
                            placeholder="Nhập mật khẩu"
                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all">
                        <button type="button" @click="showPassword = !showPassword"
                            class="absolute inset-y-0 right-3 flex items-center">
                            <!-- Icon: Hiển thị nếu đang ẩn -->
                            <i x-show="!showPassword" class="fa-regular fa-eye-slash text-gray-500"></i>
                            <!-- Icon: Hiển thị nếu đang hiện -->
                            <i x-show="showPassword" class="fa-regular fa-eye text-gray-500"></i>
                        </button>
                    </div>
                    @error('password')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Options -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox"
                            class="rounded border-gray-300 dark:border-gray-600 text-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-400" />
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-300">Ghi Nhớ</span>
                    </label>
                    <a href="/forgot" class="text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-500">Quên
                        mật khẩu?</a>
                </div>
                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 dark:from-blue-500 dark:to-indigo-500 hover:opacity-90 text-white font-medium py-2.5 rounded-lg transition-colors shadow-md">
                    Đăng Nhập
                </button>
            </form>
            <div class="mt-6 text-center text-sm text-gray-600 dark:text-gray-300">
                Chưa có tài khoản?
                <a href="register" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 font-medium">
                    Đăng ký
                </a>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const lazyBgElements = document.querySelectorAll(".lazy-bg");

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    let el = entry.target;
                    el.style.backgroundImage = `url('${el.dataset.bg}')`;
                    observer.unobserve(el);
                }
            });
        }, {
            rootMargin: "100px"
        });

        lazyBgElements.forEach(el => observer.observe(el));
    });
    </script>
</div>
</div>