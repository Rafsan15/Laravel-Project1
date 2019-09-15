@extends('layouts.landingMaster')
@section('content')
    {{--Home Section--}}
    <div id="home">
        <div class="row">
            <div class="panel col-md-offset-6"  >
                <div class="panel-body">
                    <img src="{{ asset('img/kabab.jpg') }}" style="height: 400px;width: 100% ">
                    <h3 class="text-center">Kabab</h3>
                    <blockquote class="blockquote-reverse">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type.
                        </p>
                        <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                    </blockquote>
                </div>
            </div>

        </div>
        <div  class="row">
            <div class="col-md-3"></div>
            <div class="panel  col-md-6">
                <div class="panel-body">
                    <img src="{{ asset('img/biriyani.jpg') }}" style="height: 300px;width: 100% ">
                    <h3 class="text-center">Biriyani</h3>
                    <blockquote class="blockquote-reverse">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type.
                        </p>
                        <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                    </blockquote>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div  class="row">
            <div class="panel col-md-6">
                <div class="panel-body">
                    <img src="{{ asset('img/desert.jpg') }}" style="height: 300px;width: 100% ">
                    <h3 class="text-center">Desert</h3>
                    <blockquote class="blockquote-reverse">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type.
                        </p>
                        <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                    </blockquote>
                </div>
            </div>
            <div class="col-md-6"></div>

        </div>
    </div>



    {{--End Of Home Section--}}

    {{--Blog Section--}}
    <div id="blog">
        <div  class="row">
            <div class="panel  col-md-4"  >

                <div class="panel-body">
                    <img src="{{ asset('img/chef1.jpg') }}" style="height: 300px;width: 90% ">
                    <h3 class="text-center">Chef 1</h3>
                    <p>The following snippet of text is Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type
                        <strong><em>rendered as italicized text</em></strong>
                        .</p>


                </div>
            </div>
            <div class="panel col-md-4"  >

                <div class="panel-body">
                    <img src="{{ asset('img/chef2.jpg') }}" style="height: 300px;width: 90% ">
                    <h3 class="text-center">Chef 2</h3>
                    <p>The following snippet of text is Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type
                        <strong><em>rendered as italicized text</em></strong>
                        .</p>
                </div>
            </div>
            <div class="panel  col-md-4"  >

                <div class="panel-body">
                    <img src="{{ asset('img/chef3.jpg') }}" style="height: 300px;width: 90% ">
                    <h3 class="text-center">Chef 3</h3>
                    <p>The following snippet of text is Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type
                        <strong><em>rendered as italicized text</em></strong>
                        .</p>
                </div>
            </div>
        </div>

    </div>
    {{--End Of Blog Section--}}

    {{--Support Section--}}
    <div id="support">

    </div>
    {{--End Of Support Section--}}

    {{--Contact Section--}}
    <div id="contact">

    </div>
    {{--End Of Contact Section--}}
    @endsection
