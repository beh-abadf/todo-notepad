{{-- This page has its own css files. --}}
<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <title>
        Todo Notepad
    </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="icons/pencil-square.svg" type="image/x-icon">
    
    <link rel="stylesheet" href="..\css\ui.css">
    <link rel="stylesheet" href="..\css\common_styles.css">
    <link rel="stylesheet" href="..\css\main_styles.css">

    <!-- Jquery -->
    <script src="../js/jquery.js"></script>
</head>

<body>
    <div class="global_div flex">

        <div id="left_div">
            @include('side_nav')
        </div>

        <div id="right_div">

            <div id="head" class="flex" style="font-size: 20px;">
                @include('head_nav')
            </div>

            <div class="center">

                <form id="advanced_textarea" method="POST" action="../update-the-note/{{ $the_note }}">
                    @csrf
                    <div id="txt_ar_options" class="flex">
                        <button id="left-to-right" class="form-control" style="margin-left: 4px;">
                        </button>
                        <button id="right-to-left" class="form-control">
                        </button>
                        <select name="" id="font_family_selector" class="form-control">
                            <option disabled selected>
                                {{ __('stuffs.font_type') }}
                            </option>
                            <option value="Vazir">
                                Vazir
                            </option>
                            <option value="ARIAL">
                                Arial
                            </option>
                            <option value="CALIBRI">
                                Calibri
                            </option>
                            <option value="COMIC">
                                Comic
                            </option>
                            <option value="ITCBLKAD">
                                Itcblkad
                            </option>
                            <option value="NPIMOVAZI">
                                Npimovazi
                            </option>
                        </select>
                        <select name="" id="font_size_selector" class="form-control">
                            <option disabled selected>
                                {{ __('stuffs.font_size') }}
                            </option>

                            {{ __('stuffs.12') }}
                            </option>
                            <option style="color: black;" value="14px">
                                {{ __('stuffs.14') }}
                            </option>
                            <option value="16px">
                                {{ __('stuffs.16') }}
                            </option>
                            <option value="18px">
                                {{ __('stuffs.18') }}
                            </option>
                            <option value="20px">
                                {{ __('stuffs.20') }}
                            </option>
                            <option value="22px">
                                {{ __('stuffs.22') }}
                            </option>
                            <option value="24px">
                                {{ __('stuffs.24') }}
                            </option>
                            <option value="26px">
                                {{ __('stuffs.26') }}
                            </option>
                            <option value="28px">
                                {{ __('stuffs.28') }}
                            </option>
                            <option value="30px">
                                {{ __('stuffs.30') }}
                            </option>
                            <option value="32px">
                                {{ __('stuffs.32') }}
                            </option>
                        </select>
                    </div>
                    <div id="txt_ar_main">
                        <textarea name="note_text" id="note_text" placeholder="{{ __('stuffs.write_here') }}" cols="30" rows="10"
                            autofocus class="form-control">{{ $edit_text }}</textarea>
                        <button type="submit" class="btn btn-warning" style="margin-top: 15px;">
                            {{ __('stuffs.update') }}
                        </button>
                    </div>
                </form>

            </div>

            @auth

                <!-- Row of notes cards -->
                <div class="note-content">

                    {{-- User authenticated but doesn't have any notes --}}
                    @if ($notes->isEmpty())
                        <div class="alert alert-danger" style="text-align: center;">
                            {{ __('warnings.empty') }}
                        </div>
                    @endif

                    <div id="child_wrapper" class="card grid-center note-content">

                        @foreach ($notes as $note)
                            <div id="card-div" class="card-div">


                                <!-- Notes cards -->
                                <div>
                                    <textarea name="" id="card-textarea" readonly>{{ $note->note_text }}</textarea>
                                </div>
                                <div>
                                    <input id="check_id" class="from-control" type="checkbox"
                                        onclick="thick({{ $user->id }}, {{ $note->id }})"
                                        {{ $note->checkbox_status ? 'checked' : '' }}>
                                    <p id="check_text" style="margin-left:auto;">
                                        <b> انجام شد </b>
                                    </p>
                                    <button class="btn btn-warning"
                                        onclick="window.location.href='../edit-the-note/{{ $note->id }}'"
                                        style="margin-left:10px;">
                                        <img src="../icons/pencil-square.svg">
                                    </button>
                                    <button class="btn btn-danger"
                                        onclick="window.location.href='../destroy-the-note/{{ $note->id }}' ">
                                        <img src="../icons/trash.svg">
                                    </button>

                                </div>

                            </div>
                        @endforeach

                    </div>
                </div>

                <!-- Page links -->

                <div class="center_col pagination">
                    @php
                        $counter = 0;
                    @endphp
                    <ul class="flex" id="links">
                        @foreach ($notes->links()->elements[0] as $element)
                            @php
                                $counter++;
                            @endphp
                            <li>
                                <button class="center" onclick="window.location.href='{{ $element }}'">
                                    <b>{{ convert_nums_persian($counter) }}</b>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @else
                <div class="center alert alert-primary mt-3 m-3">
                    {{ __('warnings.auth') }}
                </div>
            @endauth

            <p
                style="
        color: red;
        margin-right:10px;
        margin-top:80px;
        text-align:left;
        margin-left:15px;
        ">
                <b>
                    {{ __('mark.my_name') }}
                </b>
        </div>

        <script src="../js/txt_edt_opt.js"></script>
        <script src="../js/thick_check_handler.js"></script>
        <script src="../js/remove_result_alert.js"></script>
</body>

</html>
