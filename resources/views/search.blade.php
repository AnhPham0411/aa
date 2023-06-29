@extends('index')

@section('main')
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,800" rel="stylesheet" />
    <link href="{{ url('/') }}/colorlib-search-4/css/main.css" rel="stylesheet" />
    <div class="s004">
        <form action="{{ route('post_search') }}" method="GET">
            @csrf
            <fieldset>
                <legend>WHAT ARE YOU LOOKING FOR?</legend>
                <div class="inner-form">
                    <div class="input-field">
                        <input class="form-control" name="keyword" id="choices-text-preset-values" type="text"
                            placeholder="Type to search..." />
                        <button class="btn-search" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path
                                    d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <script src="{{ url('/') }}/colorlib-search-4/js/extention/choices.js"></script>
    <script>
        var textPresetVal = new Choices('#choices-text-preset-values', {
            removeItemButton: true,
        });
    </script>
@stop
