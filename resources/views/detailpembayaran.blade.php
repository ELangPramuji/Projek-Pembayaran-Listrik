@extends('guest_layout.guest_navbar')


@section('isi')
    <div class="flex space-x-4 items-center justify-center py-5">
        <div class="bg-white overflow-hidden shadow rounded-lg border mx-4 box">
            <div class="px-4 py-5 sm:px-6">
                <div class="flex justify-between items-center">
                    <h3 class="font-bold dark:text-gray-400 text-2xl text-center cursor-default">
                        Data Pelanggan
                    </h3>
                </div>
            </div>
            <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                <dl class="sm:divide-y sm:divide-gray-200">
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Nama Lengkap
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $detailpembayaran->name }}
                        </dd>
                    </div>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Email
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $detailpembayaran->email }}
                        </dd>
                    </div>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Nomer Meteran
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $detailpembayaran->no_meteran }}
                        </dd>
                    </div>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Nomer Telepon
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $detailpembayaran->telepon }}
                        </dd>
                    </div>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Alamat
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $detailpembayaran->alamat }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow rounded-lg border box grid">
            <div class="px-4 py-5 sm:px-6">
                <div class="flex justify-between items-center">
                    <h3 class="font-bold dark:text-gray-400 text-2xl text-center cursor-default">
                        Data Tagihan
                    </h3>
                </div>
            </div>
            <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                <dl class="sm:divide-y sm:divide-gray-200">
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Jumlah Pemakaian
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $pembayaran->jumlah_meteran }}
                        </dd>
                    </div>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Tanggal
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $pembayaran->created_at }}
                        </dd>
                    </div>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Total Harga
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $pembayaran->price }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
        <div class="flex justify-around w-36 col-end">
            <a class="py-2 px-5 rounded-lg text-sm font-medium bg-teal-200 text-teal-800" href="/">Kembali</a>
            <div id="snap-container">
                <button class="py-2 px-4 rounded-lg text-sm font-medium text-white bg-teal-600"
                    id="pay-button">Submit</button>
            </div>
        </div>
    </div>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?= config('midtrans.client_key') ?>">
    </script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            // SnapToken acquired from previous step
            snap.pay('<?= $snapToken ?>', {
                // Optional
                onSuccess: function(result) {
                    // Redirect to success route
                    window.location.href = "<?= route('payment.success') ?>";
                },
                // Optional
                // onPending: function(result) {
                //     / You may add your own js here, this is just example /
                //     document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                // },
                // // Optional
                // onError: function(result) {
                //     / You may add your own js here, this is just example */
                //     document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                // }
            });
        };
    </script>
@endsection
