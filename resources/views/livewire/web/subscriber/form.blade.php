<div>
    <div class="grid grid-cols-2 gap-4 items-center justify-center px-8 py-12 bg-gray-900 text-white rounded-lg">
        <div class="col-span-2 md:col-span-1">
            <h2 class="text-3xl font-bold">{{ __("Sign up for our newsletter") }}</h2>
            <p class="mt-2">{{ __("We will send you weekly emails with the latest articles, directly to your inbox.") }}</p>
        </div>
        <div class="col-span-2 md:col-span-1">
            <form>
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">{{__("Subscribe")}}</label>
                <div class="relative">
                    <input type="search" id="default-search" class="block w-full p-3 text-sm text-gray-900 border border-gray-300 rounded-full bg-gray-50 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" placeholder="your@email.com" required>
                    <button type="submit" class="text-white absolute right-1 bottom-1 top-1 bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm px-4 py-2 dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">{{ __("Subscribe") }}</button>
                </div>
            </form>
            <p class="mt-2 text-sm">{{ __("We care about the protection of your data. Read our") }} <a href="" class="underline">Privacy Policy</a> </p>
        </div>
    </div>
</div>
