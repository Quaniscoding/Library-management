    <div
        class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-gray-900 dark:to-gray-800 flex flex-col md:flex-row">
        <!-- Theme Switcher -->
        <div class="absolute right-4 top-4 z-10">
            @livewire('theme-switcher')
        </div>

        <!-- Left Section - Library Image & Welcome Text -->
        <div class="md:w-1/2 p-8 sm:flex items-center justify-center relative overflow-hidden hidden">
            <div class="absolute inset-0 bg-cover bg-center filter blur-[2px]"
                style="background-image: url('/images/login-img.jpg');">
            </div>
            <div class="absolute inset-0 bg-black/40"></div>
            <div class="relative z-10 text-white text-center max-w-lg">
                <a href="/">
                    <img src="/images/logo-white.png" alt="LibITC Logo" class="mx-auto mb-6 rounded-2xl shadow-lg" />
                    <h1 class="text-4xl font-bold mb-4">Thư Viện LibITC
                    </h1>
                </a>
                <p class="text-lg text-gray-200 mb-4">Khám phá kho tàng tri thức không giới hạn</p>
                <div class="flex justify-center space-x-8 text-gray-200">
                    <div class="text-center">
                        <i class="fas fa-book text-2xl mb-2"></i>
                        <p>1000+ Sách</p>
                    </div>
                    <div class="text-center">
                        <i class="fas fa-users text-2xl mb-2"></i>
                        <p> 5000+ Sinh viên</p>
                    </div>
                    <div class="text-center">
                        <i class="fas fa-clock text-2xl mb-2"></i>
                        <p>24/7 Truy cập</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Section - Login Form -->
        <div class="md:w-1/2 flex items-center justify-center p-8 sm:mt-0 mt-28">
            <div class="w-full max-w-md">
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 border border-gray-200 dark:border-gray-700">
                    <div class="text-center mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Chào mừng trở lại!</h2>
                        <p class="text-gray-600 dark:text-gray-400 mt-2">Đăng nhập để truy cập tài khoản của bạn</p>
                    </div>

                    <form class="space-y-6" wire:submit.prevent="login">
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
                                <input type="email" wire:model="email" placeholder="Email ITC của bạn"
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
                                    placeholder="Nhập mật khẩu của bạn"
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

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <label class="flex items-center">
                                <input type="checkbox"
                                    class="w-4 h-4 rounded border-gray-300 dark:border-gray-600 text-blue-600 focus:ring-blue-500 dark:focus:ring-blue-400" />
                                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Ghi nhớ đăng nhập</span>
                            </label>
                            <a href="/forgot"
                                class="text-sm text-blue-600 dark:text-blue-400 hover:underline font-medium">
                                Quên mật khẩu?
                            </a>
                        </div>

                        <!-- Login Button -->
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-medium py-2.5 rounded-lg transition-all duration-300 transform hover:scale-[1.02] focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-gray-800">
                            <span class="flex items-center justify-center">
                                <i class="fas fa-sign-in-alt mr-2"></i>
                                Đăng Nhập
                            </span>
                        </button>

                        <!-- Register Link -->
                        <div class="text-center text-sm text-gray-600 dark:text-gray-400">
                            Chưa có tài khoản?
                            <a href="register" class="text-blue-600 dark:text-blue-400 hover:underline font-medium">
                                Đăng ký ngay
                            </a>
                        </div>
                    </form>
                </div>

                <!-- Additional Links -->
                <div class="mt-8 text-center space-y-4">
                    <div class="flex justify-center space-x-6">
                        <a href="#"
                            class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400">
                            <i class="fas fa-book-reader mr-1"></i> Hướng dẫn
                        </a>
                        <a href="#"
                            class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400">
                            <i class="fas fa-question-circle mr-1"></i> Trợ giúp
                        </a>
                        <a href="/lien-he"
                            class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400">
                            <i class="fas fa-phone-alt mr-1"></i> Liên hệ
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>