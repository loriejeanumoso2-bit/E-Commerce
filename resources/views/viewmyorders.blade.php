<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">

                <h2 style="color:white; margin-bottom:20px;">Orders List</h2>

                <div style="overflow-x:auto;">
                    <table style="width:100%; border-collapse: collapse; background:#1f2733; color:white;">

                        <thead>
                            <tr style="background:#2d3748;">
                                <th style="padding:12px;">Customer Name</th>
                                <th style="padding:12px;">Address</th>
                                <th style="padding:12px;">Phone</th>
                                <th style="padding:12px;">Product</th>
                                <th style="padding:12px;">Price</th>
                                <th style="padding:12px;">Product Image</th>
                                <th style="padding:12px;">Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($orders as $order)
                                <tr style="text-align:center; border-bottom:1px solid #444;">

                                    <td>{{ $order->user->name}}</td>

                                    <td>{{ $order->Receiver_address }}</td>

                                    <td>{{ $order->Receiver_phone }}</td>

                                    <td>{{ optional($order->product)->product_title }}</td>

                                    <td>{{ optional($order->product)->product_prices }}</td>

                                    <td>
                                        @if($order->product)
                                            <img style="width:100px;"
                                                 src="{{ asset('product/'.$order->product->product_image) }}">
                                        @endif
                                    </td>

                                    <td>{{ $order->status }}</td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>