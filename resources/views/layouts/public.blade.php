<!DOCTYPE html>
<html>
    <head>
        <title>{{$config['title_site']}} - {{$page->title}}</title>
    </head>
    <body>
        {{-- Block per fer menu --}}
        @foreach ($menus as $menu) 
            @if ($menu->position->name == 'ncx_header')
                {{$menu->name}}
                @foreach ($menu->pages as $link)
                    <a href="{{$link->identifier}}">{{$link->title}}</a>
                @endforeach
            @endif
        @endforeach


            {{$page->title}}
    </body>
</html>