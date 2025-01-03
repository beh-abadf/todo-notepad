{{-- This page has its own css files. --}}
<!doctype html>
<html lang="en">

<head>
    <title>
        ToDo Notepad
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="..\css\ui.css">
    <link rel="stylesheet" href="..\css\common_styles.css">
    <link rel="stylesheet" href="..\css\main_styles.css">

    <!-- Jquery -->
    <script src="../js/jquery.js"></script>
</head>

<body>
    <div class="flex flex-row absolute w-screen h-screen">

        <div id="left_div">
            @include('left_nav')
        </div>

        <div id="right_div">

            <div id="head" class="flex" style="font-size: 20px;">
                @include('head_nav')
            </div>

            {{-- Result alert --}}
            @if (session()->has('saved'))
                <div id="result_alert" class="alert alert-success m-3">
                    {{ session('saved') }}
                </div>
            @elseif(session()->has('updated'))
                <div id="result_alert" class="alert alert-success m-3">
                    {{ session('updated') }}
                </div>
            @elseif(session()->has('deleted'))
                <div id="result_alert" class="alert alert-success m-3">
                    {{ session('deleted') }}
                </div>
            @endif


            {{-- Error alert --}}
            @if ($errors->any())
                <div id="result_alert" class="alert alert-danger m-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div class="center">

                <form id="advanced_textarea" method="POST" action="../store-a-note">
                    @csrf
                    <div id="txt_ar_options" class="flex">

                        <select name="" id="font_family_selector" class="form-control">
                            <option disabled selected>
                                font type
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
                                font size
                            </option>
                            <option value="12px">
                                12
                            </option>
                            <option value="14px">
                                14
                            </option>
                            <option value="16px">
                                16
                            </option>
                            <option value="18px">
                                18
                            </option>
                            <option value="20px">
                                20
                            </option>
                            <option value="22px">
                                22
                            </option>
                            <option value="24px">
                                24
                            </option>
                            <option value="26px">
                                26
                            </option>
                            <option value="28px">
                                28
                            </option>
                            <option value="30px">
                                30
                            </option>
                            <option value="32px">
                                32
                            </option>
                        </select>
                    </div>
                    <div id="txt_ar_main">
                        <textarea name="note_text" id="note_text" placeholder="Write your note here..." cols="30" rows="10" autofocus
                            class="form-control">{{ old('note_text') }}</textarea>
                        <button type="submit" class="btn btn-success" style="margin-top: 15px;">
                            Save
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
                            You don't have any notes!
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
                                    <button class="btn btn-warning"
                                        onclick="window.location.href='../edit-the-note/{{ $note->id }}'">
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
                    {{ $notes->links() }}
                </div>
            @else
                <div class="center alert alert-primary mt-3 m-3">
                    You need to be athenticated to see your notes!
                </div>
            @endauth

        </div>

        <script src="../js/txt_edt_opt.js"></script>
        <script src="../js/remove_result_alert.js"></script>
</body>

</html>
