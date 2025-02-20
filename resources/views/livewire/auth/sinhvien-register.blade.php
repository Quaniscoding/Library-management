<div
    class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-gray-900 dark:to-gray-800 flex flex-col md:flex-row">
    <!-- Theme Switcher -->
    <div class="absolute right-4 top-4 z-10">
        @livewire('theme-switcher')
    </div>

    <!-- Left Section - Library Image & Info -->
    <div class="md:w-1/2 p-8 sm:flex items-center justify-center relative overflow-hidden hidden">
        <div class="absolute inset-0 bg-cover bg-center filter blur-[2px]"
            style="background-image: url('/images/login-img.jpg');">
        </div>
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="relative z-10 text-white text-center max-w-lg">
            <img src="/images/logo-white.png" alt="LibITC Logo" class="mx-auto mb-6 rounded-2xl shadow-lg" />
            <h1 class="text-4xl font-bold mb-4">Tham Gia LibITC</h1>
            <p class="text-lg text-gray-200 mb-6">Đăng ký tài khoản để trải nghiệm thư viện số hiện đại</p>
            <div class="grid grid-cols-2 gap-6 text-center">
                <div class="p-4 bg-white/10 rounded-lg backdrop-blur-sm">
                    <i class="fas fa-book-reader text-2xl mb-2"></i>
                    <h3 class="font-semibold">Truy cập không giới hạn</h3>
                    <p class="text-sm text-gray-300">Kho sách điện tử đa dạng</p>
                </div>
                <div class="p-4 bg-white/10 rounded-lg backdrop-blur-sm">
                    <i class="fas fa-laptop text-2xl mb-2"></i>
                    <h3 class="font-semibold">Học tập online</h3>
                    <p class="text-sm text-gray-300">Tài liệu học tập số hóa</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Section - Registration Form -->
    <div class="md:w-1/2 flex items-center justify-center p-8 sm:mt-0 mt-28">
        <div class="w-full max-w-md">
            <div
                class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 border border-gray-200 dark:border-gray-700">
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Đăng Ký Tài Khoản</h2>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">Tạo tài khoản sinh viên mới</p>
                </div>

                <form class="space-y-6" wire:submit.prevent="register">
                    <!-- Họ Tên Input -->
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700 dark:text-gray-300">
                            Họ và Tên
                        </label>
                        <div class="relative">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500 dark:text-gray-400">
                                <i class="far fa-user"></i>
                            </span>
                            <input type="text" wire:model="ho_ten" placeholder="Nhập họ tên đầy đủ"
                                class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all" />
                        </div>
                        @error('ho_ten')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Input -->
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700 dark:text-gray-300">
                            Email Sinh Viên
                        </label>
                        <div class="relative">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500 dark:text-gray-400">
                                <i class="far fa-envelope"></i>
                            </span>
                            <input type="email" wire:model="email" placeholder="example@itc.edu.vn"
                                class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all" />
                        </div>
                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div x-data="{ showPassword: false }" class="space-y-2">
                        <label class="text-sm font-medium text-gray-700 dark:text-gray-300">
                            Mật khẩu
                        </label>
                        <div class="relative">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500 dark:text-gray-400">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input :type="showPassword ? 'text' : 'password'" wire:model="password"
                                placeholder="Tối thiểu 8 ký tự"
                                class="w-full pl-10 pr-12 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all" />
                            <button type="button" @click="showPassword = !showPassword"
                                class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 transition-colors">
                                <i class="fas" :class="showPassword ? 'fa-eye-slash' : 'fa-eye'"></i>
                            </button>
                        </div>
                        @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Confirmation -->
                    <div x-data="{ showPasswordConfirmation: false }" class="space-y-2">
                        <label class="text-sm font-medium text-gray-700 dark:text-gray-300">
                            Xác nhận mật khẩu
                        </label>
                        <div class="relative">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500 dark:text-gray-400">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input :type="showPasswordConfirmation ? 'text' : 'password'"
                                wire:model="password_confirmation" placeholder="Nhập lại mật khẩu"
                                class="w-full pl-10 pr-12 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all" />
                            <button type="button" @click="showPasswordConfirmation = !showPasswordConfirmation"
                                class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 transition-colors">
                                <i class="fas" :class="showPasswordConfirmation ? 'fa-eye-slash' : 'fa-eye'"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input type="checkbox" wire:model="terms"
                                class="w-4 h-4 rounded border-gray-300 dark:border-gray-600 text-blue-600 focus:ring-blue-500" />
                        </div>
                        <div class="ml-3">
                            <label wire:model="terms" class="text-sm text-gray-600 dark:text-gray-400">
                                Tôi đồng ý với <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">Điều
                                    khoản sử dụng</a>
                                và <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">Chính sách
                                    bảo mật</a>
                            </label>
                        </div>
                        @error('terms')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Register Button -->
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-medium py-2.5 rounded-lg transition-all duration-300 transform hover:scale-[1.02] focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-gray-800">
                        <span class="flex items-center justify-center">
                            <i class="fas fa-user-plus mr-2"></i>
                            Đăng Ký Tài Khoản
                        </span>
                    </button>

                    <!-- Login Link -->
                    <div class="text-center text-sm text-gray-600 dark:text-gray-400">
                        Đã có tài khoản?
                        <a href="/login" class="text-blue-600 dark:text-blue-400 hover:underline font-medium">
                            Đăng nhập ngay
                        </a>
                    </div>
                </form>
            </div>

            <!-- Support Section -->
            <div class="mt-8 text-center">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Cần hỗ trợ?
                    <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">
                        Liên hệ bộ phận CTSV
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>