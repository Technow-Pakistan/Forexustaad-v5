
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Country State City Demo</title>

    <!-- Vendor CSS -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <link href="{{URL::to('public/assets/app.css')}}" rel="stylesheet" />
</head>

<body class="bg-grey-light font-sans leading-normal tracking-normal">
    <!-- Navigation -->
    <nav class="bg-indigo-600 p-2 mt-0 fixed w-full z-10 top-0">
        <div class="container mx-auto flex flex-wrap items-center">
            <div class="flex w-full md:w-1/2 justify-center md:justify-start text-white font-bold">
                <div class="text-white no-underline hover:text-white hover:no-underline">
                    <span class="text-2xl pl-2">🌍 Country State City DB Demo</span>
                </div>
            </div>
            <div class="flex w-full content-center justify-between md:w-1/2 md:justify-end">
                <a href="https://github.com/dr5hn/countries-states-cities-database" class="github" target="_blank" rel="noopener noreferrer"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M12 .5C5.37.5 0 5.78 0 12.292c0 5.211 3.438 9.63 8.205 11.188.6.111.82-.254.82-.567 0-.28-.01-1.022-.015-2.005-3.338.711-4.042-1.582-4.042-1.582-.546-1.361-1.335-1.725-1.335-1.725-1.087-.731.084-.716.084-.716 1.205.082 1.838 1.215 1.838 1.215 1.07 1.803 2.809 1.282 3.495.981.108-.763.417-1.282.76-1.577-2.665-.295-5.466-1.309-5.466-5.827 0-1.287.465-2.339 1.235-3.164-.135-.298-.54-1.497.105-3.121 0 0 1.005-.316 3.3 1.209.96-.262 1.98-.392 3-.398 1.02.006 2.04.136 3 .398 2.28-1.525 3.285-1.209 3.285-1.209.645 1.624.24 2.823.12 3.121.765.825 1.23 1.877 1.23 3.164 0 4.53-2.805 5.527-5.475 5.817.42.354.81 1.077.81 2.182 0 1.578-.015 2.846-.015 3.229 0 .309.21.678.825.56C20.565 21.917 24 17.495 24 12.292 24 5.78 18.627.5 12 .5z"></path></svg>GitHub</a>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container mx-auto flex flex-wrap py-6 overflow-hidden">
        <section class="w-full md:w-1/3 flex flex-col px-3">
            <table id="countries" class="table-auto">
                <thead>
                    <tr>
                        <th class="border px-4 py-2 items-left">
                            Countries
                        </th>
                    </tr>
                    <tr>
                        <th class="border px-4 py-2">
                            <input id="search-countries" type="search"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                onkeyup="filter('countries')" placeholder="Search Countries..">
                        </th>
                    </tr>
                </thead>
                <tbody class="countries-tb overflow-y-scroll">
                    <!-- Filled via JS -->
                </tbody>
            </table>
        </section>
        <section class="w-full md:w-1/3 flex flex-col px-3">
            <table id="states" class="table-auto">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">
                            States
                        </th>
                    </tr>
                    <tr>
                        <th class="border px-4 py-2">
                            <input id="search-states" type="search"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                onkeyup="filter('states')" placeholder="Search States..">
                        </th>
                    </tr>
                </thead>
                <tbody class="states-tb">
                    <tr>
                        <td class="border px-4 py-2">
                            Select a country
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
        <section class="w-full md:w-1/3 flex flex-col px-3">
            <table id="cities" class="table-auto">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">
                            Cities
                        </th>
                    </tr>
                    <tr>
                        <th class="border px-4 py-2">
                            <input id="search-cities" type="search"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                onkeyup="filter('cities')" placeholder="Search Cities..">
                        </th>
                    </tr>
                </thead>
                <tbody class="cities-tb">
                    <tr>
                        <td class="border px-4 py-2">
                            Select a state
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>
    <!-- /.container -->

    <!--Modal-->
    <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div
                class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                    viewBox="0 0 18 18">
                    <path
                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                    </path>
                </svg>
                <span class="text-sm">(Esc)</span>
            </div>

            <!-- Add margin if you want to see some of the overlay behind the modal-->
            <div class="modal-content py-4 text-left px-6">
                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold modal-title"></p>

                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>

                <!--Body-->
                <pre id="modal-code"></pre>

                <!--Footer-->
                <div class="flex justify-end pt-2">
                    <button
                        class="bg-indigo-500 hover:bg-indigo-700 text-sm text-white p-3 px-4 rounded-lg copy-to-clipboard"
                        onclick="copyMeOnClipboard()">Copy 📋</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor JS -->
    <script src="https://unpkg.com/lokijs@^1.5/build/lokijs.min.js"></script>

    <!-- Custom Script -->
    <script src="{{URL::to('public/assets/app.js')}}"></script>
</body>

</html>
