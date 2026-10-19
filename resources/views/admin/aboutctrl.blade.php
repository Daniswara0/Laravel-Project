<x-admin.layout>
    <div class="ab-6">
        <h1 class="text-2xl font-bold text-white">
            {{$title}}
        </h1>
        <h2 class="text-gray-500 font-weight-bold">{{$content}}</h2>
        <p class="text-gray-500 font-weight-bold">
            Nama: <span style="font-weight: normal; font-size: 16px;">{{$nama}}</span><br>
            Umur: <span style="font-weight: normal; font-size: 16px;">{{$umur}} tahun</span><br>
            Hobby: <span style="font-weight: normal; font-size: 16px;">{{$hobby}}</span><br>
            Link Profile Github: <a href="{{$github}}" target="_blank" class="text-blue-500 hover:underline">Click here!</a>
        </p>
        <p>
            {{$emote}}
        </p>
    </div>
</x-admin.layout>
