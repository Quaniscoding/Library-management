<!-- Main Section -->
<main class="flex-1 overflow-y-auto p-6" wire:poll.1s>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        @livewire('user-count')
        @livewire('sinh-vien-count')
        @livewire('sach-count')
        @livewire('tai-lieu-count')
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @livewire('table.new-books')
        @livewire('table.bi-phat')
        @livewire('table.new-dat-sach')
        @livewire('table.new-de-xuat')
        @livewire('table.new-phan-hoi')
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @livewire('charts.sach-chart')
        @livewire('charts.muon-tra-sach-chart')
    </div>
</main>