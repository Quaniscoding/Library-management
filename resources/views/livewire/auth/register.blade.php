<div class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Đăng Ký Tài Khoản</h2>

        <form class="space-y-4" wire:submit.prevent="register">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Họ Tên</label>
                <input type="text" wire:model="name"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                    placeholder="Nhập name của bạn" />
                @error('name')
                <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" wire:model="email"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                    placeholder="Nhập email của bạn" />
                @error('email')
                <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div x-data="{ showPassword: false }">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Mật khẩu:
                </label>
                <div class="relative">
                    <input :type="showPassword ? 'text' : 'password'" wire:model="password" placeholder="Nhập mật khẩu"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all">
                    <button type="button" @click="showPassword = !showPassword"
                        class="absolute inset-y-0 right-3 flex items-center">
                        <i x-show="!showPassword" class="fa-regular fa-eye-slash text-gray-500"></i>
                        <i x-show="showPassword" class="fa-regular fa-eye text-gray-500"></i>
                    </button>
                </div>
                @error('password')
                <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div x-data="{ showPasswordConfirmation: false }">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Xác nhận mật khẩu:
                </label>
                <div class="relative">
                    <input :type="showPasswordConfirmation ? 'text' : 'password'" wire:model="passwordConfirmation"
                        placeholder="Nhập lại mật khẩu"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all">
                    <button type="button" @click="showPasswordConfirmation = !showPasswordConfirmation"
                        class="absolute inset-y-0 right-3 flex items-center">
                        <i x-show="!showPasswordConfirmation" class="fa-regular fa-eye-slash text-gray-500"></i>
                        <i x-show="showPasswordConfirmation" class="fa-regular fa-eye text-gray-500"></i>
                    </button>
                </div>
                @error('passwordConfirmation')
                <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <a href="/forgot" class="text-sm text-indigo-600 hover:text-indigo-500">Quên mật khẩu?</a>
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 rounded-lg transition-colors">
                Đăng ký
            </button>
        </form>

        <div class="mt-6 text-center text-sm text-gray-600">
            Đã có tài khoản?
            <a href="/admin/login" class="text-indigo-600 hover:text-indigo-500 font-medium">Đăng Nhập</a>
        </div>
    </div>
</div>