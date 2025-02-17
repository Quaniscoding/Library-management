<div class="min-h-screen overflow-auto">
    <!-- Header -->
    @livewire('client.components.header')

    <!-- Nội dung chính -->
    <main class="mx-auto mt-0 pt-24 p-6 bg-blue-200 shadow-lg rounded-lg dark:bg-blue-900 dark:shadow-2xl">
        <aside>
            <h1 class="text-4xl font-semibold text-center text-gray-800 mb-4 dark:text-white" data-aos="fade-up"
                data-aos-duration="1000" wire:ignore>
                Chào mừng đến <span class="wave-effect">ITCLib</span> - Thư viện số của bạn
            </h1>
            <p class="text-gray-600 text-center dark:text-gray-300" data-aos="fade-up" data-aos-delay="300"
                data-aos-duration="1200" wire:ignore>
                Khám phá hiển thị các tài nguyên kỹ thuật số được thiết kế riêng cho sinh viên và giảng viên. Tìm sách,
                nghiên cứu
                tài liệu để
                nâng cao trải nghiệm học tập của bạn.
            </p>
            <div class="mt-6 flex flex-col sm:flex-row justify-center items-center sm:space-x-6 text-center">
                <!-- Card 1 -->
                <div class="bg-gray-100 p-4 rounded-lg shadow w-full sm:w-1/3 dark:bg-gray-800 mb-4 sm:mb-0"
                    data-aos="zoom-in" data-aos-delay="400" wire:ignore>
                    <p class="text-2xl font-semibold text-blue-600 dark:text-blue-400">📚 250+</p>
                    <p class="text-gray-700 dark:text-gray-300">Sách học thuật</p>
                </div>
                <!-- Card 2 -->
                <div class="bg-gray-100 p-4 rounded-lg shadow w-full sm:w-1/3 dark:bg-gray-800 mb-4 sm:mb-0"
                    data-aos="zoom-in" data-aos-delay="500" wire:ignore>
                    <p class="text-2xl font-semibold text-green-600 dark:text-green-400">🎓 1000+</p>
                    <p class="text-gray-700 dark:text-gray-300">Tài liệu tham khảo</p>
                </div>
                <!-- Card 3 -->
                <div class="bg-gray-100 p-4 rounded-lg shadow w-full sm:w-1/3 dark:bg-gray-800" data-aos="zoom-in"
                    data-aos-delay="600" wire:ignore>
                    <p class="text-2xl font-semibold text-orange-600 dark:text-orange-400">👨‍🎓 5000+</p>
                    <p class="text-gray-700 dark:text-gray-300">Sinh viên sử dụng</p>
                </div>
            </div>
            <div x-data="{ open: false }" class="relative flex flex-col items-center mt-6">
                <input type="text" name="text" placeholder="Tìm kiếm sách, tài liệu" class="input w-full max-w-md"
                    wire:model.live="search" @focus="open = true" @click.away="open = false" autocomplete="off" />
                <ul x-show="open && $wire.search.length > 0" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-95"
                    class="autocomplete-list absolute bg-white dark:bg-gray-800 border dark:border-gray-700 mt-2 rounded-lg shadow-lg z-10 overflow-auto max-h-[400px]"
                    style="width: 400px;">

                    @if($sachs->isEmpty() && $tailieus->isEmpty())
                    <li class="p-3 text-left text-gray-500 dark:text-gray-300">
                        Không tìm thấy sách hoặc tài liệu nào.
                    </li>
                    @else
                    @foreach($sachs as $sach)
                    <li
                        class="autocomplete-item book-item p-3 text-left cursor-pointer hover:bg-blue-100 dark:hover:bg-blue-900 m-2">
                        <span class="item-label dark:text-white" wire:click="showSachDetails({{ $sach->id }})">
                            📚 Sách: {{ $sach->ten_sach }}
                        </span>
                    </li>
                    @endforeach

                    @foreach($tailieus as $tailieu)
                    <li
                        class="autocomplete-item document-item p-3 text-left cursor-pointer hover:bg-green-100 dark:hover:bg-green-900 m-2">
                        <span class="item-label dark:text-white">
                            📄 Tài liệu: {{ $tailieu->ten_tai_lieu }}
                        </span>
                    </li>
                    @endforeach
                    @endif

                </ul>
            </div>
        </aside>
    </main>

    <div class="max-w-6xl mx-auto mt-6 p-6 bg-white shadow-lg rounded-lg dark:bg-gray-800 dark:shadow-xl" wire:ignore>
        <h2 class="text-3xl text-center font-bold text-gray-800 mb-4 dark:text-white" data-aos="fade-up"
            data-aos-delay="200">
            Giới Thiệu
        </h2>

        <div class="flex flex-col md:flex-row gap-6" data-aos="fade-up" data-aos-delay="300">
            <!-- Swiper Container (Chiếm 50% trên md trở lên) -->
            <div class="md:w-1/2">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="/images/lib5.jpg" alt="Library Image 1"
                                class="rounded-lg w-full min-h-[340px] h-[340px] object-cover">
                        </div>
                        <div class="swiper-slide">
                            <img src="/images/lib6.jpg" alt="Library Image 2"
                                class="rounded-lg w-full min-h-[340px] h-[340px] object-cover">
                        </div>
                        <div class="swiper-slide">
                            <img src="/images/lib7.jpg" alt="Library Image 3"
                                class="rounded-lg w-full min-h-[340px] h-[340px] object-cover">
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>

                    <!-- Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>

            <!-- Phần Nội dung chữ (Chiếm 50% trên md trở lên) -->
            <div class="md:w-1/2 flex flex-col items-center justify-center bg-gray-50 p-6 rounded-lg shadow dark:bg-gray-700"
                data-aos="fade-up" data-aos-delay="400">
                <h3 class="self-center mt-auto mb-auto text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white"
                    style="font-family: 'Pacifico', cursive;">
                    Khám Phá Kho Sách ITC
                </h3>

                <div class="mt-4 flex flex-col sm:flex-row gap-4 w-full">
                    <!-- Khung Sách -->
                    <div class="w-full sm:w-1/2 bg-white p-4 shadow rounded-lg text-center dark:bg-gray-800">
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-white">📚 Sách</h4>
                        <p class="text-gray-600 mt-2 text-left dark:text-gray-300">
                            Kho tàng sách học thuật và kỹ năng. Bao gồm hơn 250 quyển sách với nhiều thể loại khác nhau.
                        </p>
                        <button wire:navigate href="/sach"
                            class="mt-10 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-800">
                            Xem ngay
                        </button>
                    </div>

                    <!-- Khung Tài Liệu -->
                    <div class="w-full sm:w-1/2 bg-white p-4 shadow rounded-lg text-center dark:bg-gray-800">
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-white">📄 Tài Liệu</h4>
                        <p class="text-gray-600 mt-2 text-left dark:text-gray-300">
                            Kho tài liệu học tập chất lượng, giúp bạn nâng cao kiến thức mỗi ngày! Rất nhiều tài liệu
                            hay ho đang chờ đợi bạn.
                        </p>
                        <button wire:navigate href="/tai-lieu"
                            class="mt-4 bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 dark:bg-green-600 dark:hover:bg-green-700">
                            Khám phá
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-6" wire:ignore>
            <!-- Card 1 -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden flex flex-col h-full dark:bg-gray-800"
                data-aos="fade-up" data-aos-delay="100" wire:ignore>
                <img src="/images/classroom.jpg" alt="ClassRoom" class="w-full h-48 object-cover">
                <div class="p-4 flex flex-col flex-grow">
                    <h4 class="text-lg text-center font-semibold text-gray-800 dark:text-white">Phòng Máy Tính</h4>
                    <p class="text-gray-600 mt-2 flex-grow dark:text-gray-300">
                        Không gian được trang bị đầy đủ các thiết bị như máy tính, mạng internet phục vụ cho việc học
                        tập, nghiên cứu và tìm hiểu tài liệu.
                    </p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden flex flex-col h-full dark:bg-gray-800"
                data-aos="fade-up" data-aos-delay="300" wire:ignore>
                <img src="/images/classroom2.jpg" alt="ClassRoom2" class="w-full h-48 object-cover">
                <div class="p-4 flex flex-col flex-grow">
                    <h4 class="text-lg text-center font-semibold text-gray-800 dark:text-white">Phòng Học</h4>
                    <p class="text-gray-600 mt-2 flex-grow dark:text-gray-300">
                        Không gian sạch sẽ, thoáng mát, cùng với đội ngũ giảng viên xì-tin sẽ thích hợp để bạn dễ dàng
                        học tập, trau dồi kiến thức từ sách và tài liệu.
                    </p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden flex flex-col h-full dark:bg-gray-800"
                data-aos="fade-up" data-aos-delay="500" wire:ignore>
                <img src="/images/lib8.jpg" alt="Library" class="w-full h-48 object-cover">
                <div class="p-4 flex flex-col flex-grow">
                    <h4 class="text-lg text-center font-semibold text-gray-800 dark:text-white">Thư Viện</h4>
                    <p class="text-gray-600 mt-2 flex-grow dark:text-gray-300">
                        Lưu trữ và cung cấp tài liệu, sách, và các nguồn thông tin phục vụ học tập, nghiên cứu. Đây cũng
                        là nơi giúp sinh viên tiếp cận tri thức, nâng cao hiểu biết và phát triển kỹ năng.
                    </p>
                </div>
            </div>
        </div>
    </div>

    @livewire('client.components.footer')

    <!-- Custom -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            spaceBetween: 10,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    });

    Animation
    document.addEventListener("DOMContentLoaded", function() {
        AOS.init({
            duration: 1200, // Thời gian hiệu ứng
            easing: "ease-in-out", // Hiệu ứng mượt
            once: true, // Chạy 1 lần khi xuất hiện
        });
    });
    </script>

    <style>
    .wave-effect {
        display: inline-block;
        animation: wave 2s infinite ease-in-out;
        text-shadow: 2px 2px 5px rgba(255, 140, 0, 0.6);
    }

    @keyframes wave {

        0%,
        100% {
            transform: translateY(0);
            text-shadow: 2px 2px 5px rgba(255, 140, 0, 0.6);
        }

        50% {
            transform: translateY(-5px);
            text-shadow: 3px 3px 10px rgba(255, 140, 0, 1);
        }
    }

    /* Sử dụng width: 100% và max-width cho input để tự động co giãn */
    .input[type="text"] {
        display: block;
        color: rgb(34, 34, 34);
        background: linear-gradient(142.99deg, rgba(217, 217, 217, 0.63) 15.53%, rgba(243, 243, 243, 0.63) 88.19%);
        box-shadow: 0px 12px 24px -1px rgba(0, 0, 0, 0.18);
        border-color: rgba(7, 4, 14, 0);
        border-radius: 50px;
        margin: 20px 0;
        padding: 18px 15px;
        outline: none;
        text-align: center;
        width: 100%;
        max-width: 400px;
        transition: 0.5s;
        height: 50px;
    }

    /* Trên màn hình lớn, input mở rộng khi hover/focus */
    .input[type="text"]:hover {
        max-width: 440px;
    }

    .input[type="text"]:focus {
        max-width: 480px;
    }

    /* Đối với màn hình nhỏ, giữ kích thước input ổn định */
    @media (max-width: 640px) {
        .input[type="text"] {
            max-width: 90%;
        }

        .input[type="text"]:hover,
        .input[type="text"]:focus {
            max-width: 90%;
        }
    }

    /* Autocomplete list tự động co giãn */
    .autocomplete-list {
        border: 1px solid #e2e8f0;
        border-radius: 15px;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
        background: #fff;
        margin-top: 80px;
        overflow: hidden;
        width: 100%;
        max-width: 400px;
    }

    @media (max-width: 640px) {
        .autocomplete-list {
            max-width: 90%;
            margin-top: 60px;
        }
    }

    .autocomplete-item {
        transition: background-color 0.3s;
    }

    .autocomplete-item:hover {
        background: linear-gradient(142.99deg, rgba(217, 217, 217, 0.63) 15.53%, rgba(243, 243, 243, 0.63) 88.19%);
    }

    .book-item {
        border-left: 4px solid #3182ce;
    }

    .document-item {
        border-left: 4px solid #38a169;
    }

    .item-label {
        font-weight: bold;
        margin-right: 4px;
    }
    </style>

</div>