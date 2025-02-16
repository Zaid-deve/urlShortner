<?php

if (isset($_GET['code'])) {
    header('Location:/urlShortner/api/index.php?code=' . $_GET['code']);
    die();
}

?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Url Shortner</title>
    <script src='https://cdn.tailwindcss.com'></script>
    <link rel='stylesheet' href='./public/styles/style.css'>
</head>

<body>

    <!-- URL SHORTNER BODY -->
    <div class='container mx-auto'>
        <div class='isolate bg-white px-6 py-24 sm:py-32 lg:px-8'>
            <div class='absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]'
                aria-hidden='true'>
                <div class='relative left-1/2 -z-10 aspect-1155/678 w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]'
                    style='clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)'>
                </div>
            </div>
            <div class='mx-auto max-w-2xl text-center'>
                <h2 class='text-4xl font-semibold tracking-tight text-balance text-gray-900 sm:text-5xl'>Welcome to
                    URL.Shortner
                </h2>
                <p class='mt-2 text-lg/8 text-gray-600'>Make you url look simple and easy to navigate.
                </p>
            </div>
            <form class='mx-auto mt-6 max-w-xl sm:mt-10 form'>
                <div class='flex flex-col gap-x-8 gap-y-6'>
                    <div>
                        <label for='url' class='block text-sm/6 font-semibold text-gray-900'>Enter Url</label>
                        <div class='mt-2.5 relative'>
                            <div class='absolute top-4 left-5'>🔗</div>
                            <input type='text' name='url' id='url' placeholder='Enter Url to Short'

                                class='block w-full rounded-lg bg-gray-50 p-4 ps-12 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600'>
                            <p class='text-gray-400 mt-2'>We respect your privacy and do not share you public urls to
                                third party !</p>
                        </div>
                    </div>
                    <div id='shortened-url-container' class='mt-2 hidden'>
                        <label for='shortened-url' class='block text-sm/6 font-semibold text-gray-900'>Shortened URL</label>
                        <div class='mt-2.5 flex relative w-full'>
                            <div class='absolute top-3 left-4'>🖇️</div>
                            <input type='text' id='shortened-url' readonly

                                class='block w-full rounded-md bg-gray-50 px-3.5 py-3 ps-12 text-base text-gray-900 outline-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600'>
                            <button id='copy-url' type='button'

                                class='ml-2 px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-md hover:bg-indigo-500'>
                                <span class='btn-text'>Copy</span>
                                <span class='loader hidden'></span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class='mt-10'>
                    <button type='submit'

                        class='block w-full rounded-md bg-indigo-600 px-3.5 py-3 text-center text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'>
                        <span class='btn-text'>Get Shortened URL</span>
                        <span class='loader hidden'></span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js'
        integrity='sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=='
        crossorigin='anonymous' referrerpolicy='no-referrer'></script>
    <script src='./public/scripts/index.js'></script>

</body>

</html>