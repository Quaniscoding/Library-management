<div>
    <!-- Header -->
    @livewire('client.components.header')

    <!-- Nội dung chính -->
    <main class="max-w-6xl mx-auto mt-0 pt-24 p-6 bg-blue-200 shadow-lg rounded-lg ">
        <aside>
            <h1 class="text-4xl font-semibold text-center text-gray-800 mb-4" data-aos="fade-up"
                data-aos-duration="1000">Welcome to <span class="wave-effect">ITCLib</span> - Your Digital Library
            </h1>
            <p class="text-gray-600 text-center" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1200">
                Discover a display of digital resources tailored for students and
                faculty. Explore books, research papers to enhance your learning experience.</p>
            <!-- <div class="mt-6 flex space-x-4">
                <input type="text" placeholder="Tìm kiếm sách, tài liệu..." class="w-full p-2 border rounded-lg">
                <button
                    class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-200">Tìm
                    kiếm</button>
            </div> -->
            <div class="mt-6 flex justify-center space-x-6 text-center">
                <div class="bg-gray-100 p-4 rounded-lg shadow w-1/4" data-aos="zoom-in" data-aos-delay="400">
                    <p class="text-2xl font-semibold text-blue-600">📚 250+</p>
                    <p class="text-gray-700">Sách học thuật</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg shadow w-1/4" data-aos="zoom-in" data-aos-delay="500">
                    <p class="text-2xl font-semibold text-green-600">🎓 1000+</p>
                    <p class="text-gray-700">Tài liệu tham khảo</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg shadow w-1/4" data-aos="zoom-in" data-aos-delay="600">
                    <p class="text-2xl font-semibold text-orange-600">👨‍🎓 5000+</p>
                    <p class="text-gray-700">Sinh viên sử dụng</p>
                </div>
            </div>

        </aside>
    </main>

    <div class="max-w-6xl mx-auto mt-6 p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-3xl text-center font-bold text-gray-800 mb-4">Tổng Quan</h2>

        <div class="flex gap-6">
            <!-- Swiper Container (Chiếm 50%) -->
            <div class="w-1/2">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="/images/lib5.jpg"
                                class="rounded-lg w-full h-60 object-cover">
                        </div>
                        <div class="swiper-slide"><img src="/images/lib6.jpg"
                                class="rounded-lg w-full h-60 object-cover">
                        </div>
                        <div class="swiper-slide"><img src="/images/lib7.jpg"
                                class="rounded-lg w-full h-60 object-cover">
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
            <div class="w-1/2 flex flex-col items-center justify-center bg-gray-50 p-6 rounded-lg shadow">
                <h3 class="self-center mt-auto mb-auto text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white"
                    style="font-family: 'Pacifico', cursive;">Khám Phá Kho Sách ITC
                </h3>

                <div class="mt-4 flex gap-4">
                    <!-- Khung Sách -->
                    <div class="w-1/2 bg-white p-4 shadow rounded-lg text-center ">
                        <h4 class="text-lg font-semibold text-gray-800 ">📚 Sách</h4>
                        <p class="text-gray-600 mt-2 text-left">Kho tàng sách học thuật và kỹ năng. Bao gồm hơn 250
                            quyển sách với nhiều thể loại khác nhau.</p>
                        <button wire:navigate href="/sach"
                            class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Xem ngay</button>
                    </div>

                    <!-- Khung Tài Liệu -->
                    <div class="w-1/2 bg-white p-4 shadow rounded-lg text-center">
                        <h4 class="text-lg font-semibold text-gray-800">📄 Tài Liệu</h4>
                        <p class="text-gray-600 mt-2 text-left">Kho tài liệu học tập chất lượng, giúp bạn nâng cao kiến
                            thức mỗi ngày! Rất nhiều tài liệu hay ho đang chờ đợi bạn.</p>
                        <button wire:navigate href="/tai-lieu"
                            class="mt-4 bg-green-500 text-white px-4 py-2 rounded-lg">Khám phá</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden flex flex-col h-full">
                <img src="/images/classroom.jpg" alt="ClassRoom" class="w-full h-48 object-cover">
                <div class="p-4 flex flex-col flex-grow">
                    <h4 class="text-lg text-center font-semibold text-gray-800">Phòng Máy Tính</h4>
                    <p class="text-gray-600 mt-2 flex-grow">Không gian được trang bị đầy đủ các thiết bị như máy tính,
                        mạng internet phục vụ cho việc học tập, nghiên cứu và tìm hiểu tài liệu.</p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden flex flex-col h-full">
                <img src="/images/classroom2.jpg" alt="ClassRoom2" class="w-full h-48 object-cover">
                <div class="p-4 flex flex-col flex-grow">
                    <h4 class="text-lg text-center font-semibold text-gray-800">Phòng Học</h4>
                    <p class="text-gray-600 mt-2 flex-grow">Không gian sạch sẽ, thoáng mát, cùng với đội ngũ giảng viên
                        xì-tin sẽ thích hợp để bạn dễ dàng học tập, trau dồi kiến thức từ sách và tài liệu.</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden flex flex-col h-full">
                <img src="/images/lib8.jpg" alt="Library" class="w-full h-48 object-cover">
                <div class="p-4 flex flex-col flex-grow">
                    <h4 class="text-lg text-center font-semibold text-gray-800">Thư Viện</h4>
                    <p class="text-gray-600 mt-2 flex-grow">Lưu trữ và cung cấp tài liệu, sách, và các nguồn thông tin
                        phục vụ học tập, nghiên cứu. Đây cũng là nơi giúp sinh viên
                        tiếp cận tri thức, nâng cao hiểu biết và phát triển kỹ năng.</p>
                </div>
            </div>
        </div>


    </div>

    <footer class="text-center p-4 mt-10 bg-gray-200 text-gray-700">
        &copy; 2025 Thư viện ITC. All rights reserved.
    </footer>

    <!-- Custom -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
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
        document.addEventListener("DOMContentLoaded", function () {
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
<!-- <ul class="space-y-1">
                    <button
                        class="bg-gray-100 p-2 rounded-lg w-full text-center hover:bg-gray-200 transition duration-200">📚
                        Tổng số
                        sách</button>
                    <button
                        class="bg-gray-100 p-2 rounded-lg w-full text-center hover:bg-gray-200 transition duration-200">🎓
                        Tổng số
                        lượt ghé trang</button>
                    <button
                        class="bg-gray-100 p-2 rounded-lg w-full text-center hover:bg-gray-200 transition duration-200">💻
                        Lớp học
                        thực hành</button>
                </ul> -->

<!-- <button
                    class="mt-6 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                    Tìm hiểu thêm
                </button> -->