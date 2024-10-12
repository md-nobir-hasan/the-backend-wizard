@if (count($menu->child_bar)>0)
    <li class="relative"
        x-data="{ open: {{$open}} }" @keydown.escape.stop="open = {{$open}}" @click.outside="open = false"
      >
        <a :class="{ 'text-indigo-500': open }" @click="open = !open" aria-haspopup="true" x-bind:aria-expanded="open"
            id="mobiledrop-92" class="[&.active]:text-indigo-500 block py-2.5 px-6 hover:text-indigo-500"
            href="javascript:;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="inline-block w-4 h-4 me-2 bi bi-list-nested" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.5 11.5A.5.5 0 0 1 5 11h10a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 1 3h10a.5.5 0 0 1 0 1H1a.5.5 0 0 1-.5-.5z"/>
              </svg>
            {{str($menu->title)->headline()}}
            <!-- caret -->
            <span class="inline-block float-right rtl:float-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    class="transform transition duration-300 mt-1.5 bi bi-chevron-down"
                    :class="{ 'rotate-0': open, 'ltr:-rotate-90 rtl:rotate-90': !open }" width=".8rem" height=".8rem"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                </svg>
                <!-- <i class="transition duration-300 transform fas fa-chevron-down" :class="{ 'rotate-0': open, 'ltr:-rotate-90 rtl:rotate-90': !open }"></i> -->
            </span>
        </a>
        <ul class="block rounded rounded-t-none top-full z-50 ps-7  py-0.5 text-start mb-1 font-normal" x-show="open"
            x-transition:enter="transition-all duration-200 ease-out" x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100" role="menu" aria-orientation="vertical"
            aria-labelledby="mobiledrop-92">
                @foreach ($menu->child_bar as $child_menu)
                    <x-sidebar-list :menu="$child_menu" :ml="$loop->iteration"/>
                @endforeach

        </ul>
    </li>
@else
@php($create = 'index')
<li class="relative">
    <a class="{{$active}} block w-full py-2 px-6 clear-both whitespace-nowrap [&.active]:text-indigo-500 hover:text-indigo-500"
        href='{{route("$menu->route$create")}}'>
        {{str($menu->title)->headline()}}
    </a>
</li>
@endif
