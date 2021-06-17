@extends('layouts.app')

@section('content')
    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                    So exciting, a title... yeee!
                </h1>
                <a href="/blog" class="text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase">Read Less</a>
            </div>
        </div>
    </div>

    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div>
            <img src="https://www.nme.com/wp-content/uploads/2021/05/Twenty-One-Pilots-Pub-3-Mason-Castillo-LO.jpg" widht="700" alt="">
        </div>

        <div class="m-auto sm:m-auto text-left w-4/5 block">
            <h2 class="text-4xl font-extrabold text-gray-600">
                Scaled and Icy is out... I mean yea... That's pretty much it...
            </h2>

            <p class="py-8 text-gray-500 text-l">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam repellendus aut consequatur veniam
            </p>

            <p class="font-extrabold text-gray-600 text-l pb-9">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus quam quae eveniet nobis assumenda beatae iusto incidunt, a sequi debitis fugit at ullam illum in dicta natus neque? Facilis, qui?
            </p>

            <a href="/blog" class="uppercase bg-blue-500 text-gray-100 text-s font-extrabold py-3 px-8 rounded-3xl">Find Out More</a>
        </div>
    </div>

    <div class="text-center p-15 bg-black text-white">
        <h2 class="text-2xl pb-5 text-l">
            G.O.A.T
        </h2>

        <span class="font-extrabold block text-4xl py-1">
            Dababy
        </span>
        <span class="font-extrabold block text-4xl py-1">
            DaPlan
        </span>
        <span class="font-extrabold block text-4xl py-1">
            DababyCar
        </span>
        <span class="font-extrabold block text-4xl py-1">
            DababyBoat
        </span>
    </div>

    <div class="text-center py-15">
        <span class="uppercase text-s text-gray-400">
            Blog
        </span>

        <h2 class="text-4xl font-bold py-10">
            Recent Posts
        </h2>

        <p class="m-auto w-4/5 text-gray-500">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat rem, mollitia aperiam animi asperiores unde corrupti quibusdam ducimus excepturi, quaerat, sunt at accusantium. Suscipit optio numquam ullam animi, vero natus!
        </p>

    </div>

    <div class="sm:grid grid-cols-2 w-4/5 m-auto">
        <div class="flex bg-yellow-700 text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block">
                <span class="uppercase text-xs">
                    Love
                </span>

                <h3 class="text-xl font-bold py-10">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sapiente, deserunt numquam eos ex repellat ab aperiam sint enim quasi nobis consectetur aliquid? Dignissimos sed quaerat consectetur, illum perferendis quibusdam porro!
                </h3>

                <a href="" class="uppercase bg-transparent border-2 border-gray-100 text-gray-100 text-zs font-extrabold py-3 px-5 rounded-3xl">Find Out More</a>
            </div>
        </div>
        <div>
            <img src="https://www.nme.com/wp-content/uploads/2021/05/Twenty-One-Pilots-Pub-3-Mason-Castillo-LO.jpg" widht="700" alt="">
        </div>
    </div>
    
@endsection