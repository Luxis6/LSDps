@section('title', __('page.Application') .': '. $business_post->title)
@extends('layouts.app_business')
@section('content')
    <section>
        <form class="lg:w-1/4 lg:mx-auto" method="post" action="{{ route('applications.store', $business_post->slug) }}" enctype="multipart/form-data">
            @csrf
            <div>
                <div class="shadow flex flex-col rounded-lg shadow-md m-6 w-auto">
                    <div class="flex justify-center py-4 border-b">
                        <h1 class="text-3xl leading-6 font-medium text-gray-900 py-4">{{__('page.Application')}}</h1>
                    </div>
                    <div>
                        <label class="w-20 text-right mr-8 font-bold">{{__('page.Phone')}}</label>
                        <div>
                            <input class="form-control w-full rounded" type="text" name="phone"
                                   placeholder="{{__('page.Phone')}}" minlength="5" maxlength="100" required/>
                        </div>
                    </div>
                    <div>
                        <label class="w-20 text-right mr-8 font-bold">CV</label>
                        <div>
                            <input class="form-control" type="file" name="cv" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" required/>
                        </div>
                    </div>
                    @if (!isset($application))
                        <div class="payment-box py-4 flex justify-center">
                            <button type="submit"
                                    class="flex justify-center w-2/3 block rounded bg-transparent bg-blue-300 hover:bg-blue-500 py-2 font-bold shadow">
                                {{__('page.buttons.Apply')}}
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </form>
    </section>
@endsection
