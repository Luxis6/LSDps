@section('title', __('page.Order') .': '. $post->title)
@extends('layouts.app')
@section('content')
    <section class="checkout-area">
            <form method="post" action="{{ route('orders.store', $post->slug) }}">
                @csrf
                <div class="lg:grid lg:grid-cols-2 lg:grid-rows-1 lg:justify-items-center md:justify-items-center sm:justify-items-center grid grid-rows-2">
                    <div class="shadow flex flex-col rounded-lg shadow-md m-6 lg:w-3/5 md:w-3/5 sm:w-3/5 w-auto">
                        <div class="flex justify-center py-4 border-b">
                        <h1 class="text-3xl leading-6 font-medium text-gray-900 py-4">{{__('page.Requirements')}}</h1>
                        </div>
                        <div class="py-4">
                                <div class="form-group">
                                        <textarea @if(isset($order)) disabled @endif name="requirements" id="notes"
                                                  cols="30" rows="5" placeholder="{{__('page.Requirements')}}"
                                                  class="form-control w-full" required>@if(isset($order)) {{$order->requirement}} @endif</textarea>
                                </div>
                        </div>
                    </div>
                    <div class="shadow flex flex-col rounded-lg shadow-md m-6 lg:w-3/5 md:w-3/5 sm:w-3/5 w-auto">
                        <div class="order-details">
                            <div class="flex justify-center py-4 border-b">
                            <h1 class="text-3xl leading-6 font-medium text-gray-900 py-4">{{__('page.Details')}}</h1>
                            </div>
                            <div class="order-table">
                                <table class="min-w-full sm:w-1/2 lg:w-1/3">
                                    <thead class="border-b">
                                    <tr>
                                        <th scope="col" class="border-r py-4">{{__('page.Post Title')}}</th>
                                        <th scope="col">{{__('page.Total')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="border-b">
                                        <td class="product-name border-r py-4 px-2">
                                            <a href="{{ route('posts.show', [$post->slug]) }}">{{$post->title}}</a>
                                        </td>
                                        <td class="product-total px-2">
                                            <span class="subtotal-amount">{{$post->price}} &euro;</span>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            @if (!isset($order))
                                <div class="payment-box py-4 flex justify-center">
                                    <button type="submit"
                                            class="flex justify-center w-2/3 block rounded bg-transparent bg-green-300 hover:bg-green-500 py-2 font-bold shadow">
                                        {{__('page.buttons.Order')}}
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
    </section>
@endsection
