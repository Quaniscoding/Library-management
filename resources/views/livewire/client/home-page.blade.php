<div>
    <!-- Header -->
    @livewire('client.components.header')

    <!-- Nội dung chính -->
    <main class="mx-auto mt-0 pt-24 p-6 bg-blue-200 shadow-lg rounded-lg dark:bg-blue-900 dark:shadow-2xl">
        <aside>
            <h1 class="text-4xl font-semibold text-center text-gray-800 mb-4 dark:text-white" data-aos="fade-up"
                data-aos-duration="1000">
                Chào mừng đến <span class="wave-effect">ITCLib</span> - Thư viện số của bạn
            </h1>
            <p class="text-gray-600 text-center dark:text-gray-300" data-aos="fade-up" data-aos-delay="300"
                data-aos-duration="1200">
                Discover a display of digital resources tailored for students and faculty. Explore books, research
                papers to
                enhance your learning experience.
            </p>
            <div class="mt-6 flex justify-center space-x-6 text-center">
                <!-- Card 1 -->
                <div class="bg-gray-100 p-4 rounded-lg shadow w-1/4 dark:bg-gray-800" data-aos="zoom-in"
                    data-aos-delay="400">
                    <p class="text-2xl font-semibold text-blue-600 dark:text-blue-400">📚 250+</p>
                    <p class="text-gray-700 dark:text-gray-300">Sách học thuật</p>
                </div>
                <!-- Card 2 -->
                <div class="bg-gray-100 p-4 rounded-lg shadow w-1/4 dark:bg-gray-800" data-aos="zoom-in"
                    data-aos-delay="500">
                    <p class="text-2xl font-semibold text-green-600 dark:text-green-400">🎓 1000+</p>
                    <p class="text-gray-700 dark:text-gray-300">Tài liệu tham khảo</p>
                </div>
                <!-- Card 3 -->
                <div class="bg-gray-100 p-4 rounded-lg shadow w-1/4 dark:bg-gray-800" data-aos="zoom-in"
                    data-aos-delay="600">
                    <p class="text-2xl font-semibold text-orange-600 dark:text-orange-400">👨‍🎓 5000+</p>
                    <p class="text-gray-700 dark:text-gray-300">Sinh viên sử dụng</p>
                </div>
            </div>
        </aside>
    </main>

    <div class="max-w-6xl mx-auto mt-6 p-6 bg-white shadow-lg rounded-lg dark:bg-gray-800 dark:shadow-xl">
        <h2 class="text-3xl text-center font-bold text-gray-800 mb-4 dark:text-white" data-aos="fade-up"
            data-aos-delay="200">
            Giới Thiệu
        </h2>

        <div class="flex gap-6" data-aos="fade-up" data-aos-delay="300">
            <!-- Swiper Container (Chiếm 50%) -->
            <div class="w-1/2">
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

            <!-- Phần Nội dung chữ (Chiếm 50%) -->
            <div class="w-1/2 flex flex-col items-center justify-center bg-gray-50 p-6 rounded-lg shadow dark:bg-gray-700"
                data-aos="fade-up" data-aos-delay="400">
                <h3 class="self-center mt-auto mb-auto text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white"
                    style="font-family: 'Pacifico', cursive;">
                    Khám Phá Kho Sách ITC
                </h3>

                <div class="mt-4 flex gap-4">
                    <!-- Khung Sách -->
                    <div class="w-1/2 bg-white p-4 shadow rounded-lg text-center dark:bg-gray-800">
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-white">📚 Sách</h4>
                        <p class="text-gray-600 mt-2 text-left dark:text-gray-300">
                            Kho tàng sách học thuật và kỹ năng. Bao gồm hơn 250 quyển sách với nhiều thể loại khác nhau.
                        </p>
                        <button wire:navigate href="/sach"
                            class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-800">
                            Xem ngay
                        </button>
                    </div>

                    <!-- Khung Tài Liệu -->
                    <div class="w-1/2 bg-white p-4 shadow rounded-lg text-center dark:bg-gray-800">
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

        <div class="mt-8 max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden flex flex-col h-full dark:bg-gray-800"
                data-aos="fade-up" data-aos-delay="100">
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
                data-aos="fade-up" data-aos-delay="300">
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
                data-aos="fade-up" data-aos-delay="500">
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

    <footer class="text-center p-4 mt-10 bg-gray-200 text-gray-700 dark:bg-gray-900 dark:text-gray-300">
        &copy; 2025 ITCLibrights reserved.
    </footer>

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

        // Animation
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
            /* Màu cam nhạt */
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
    </style>
</div>