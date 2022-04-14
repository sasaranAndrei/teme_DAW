<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Real Estates') }}
        </h2>
    </x-slot>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- ====== Table Section Start -->
          <div>
            <a href="{{ route('real_estates.create')}}" class="bg-green-500 hover:bg-green-700"> Insert Real Estate
          </div>
          <section class="bg-primary py-20 lg:py-[120px]">
            <div class="container">
                <div class="flex flex-wrap -mx-4">
                  <div class="w-full px-4">
                      <div class="max-w-full overflow-x-auto">
                        <table class="table-auto w-full">
                            <thead>
                              <tr class="bg-primary text-center">
                                  <th
                                    class="
                                    w-1/6
                                    min-w-[160px]
                                    text-lg
                                    font-semibold
                                    text-white
                                    py-4
                                    lg:py-7
                                    px-3
                                    lg:px-4
                                    border-l border-transparent
                                    "
                                    >
                                    Property Type
                                  </th>
                                  <th
                                    class="
                                    w-1/6
                                    min-w-[160px]
                                    text-lg
                                    font-semibold
                                    text-white
                                    py-4
                                    lg:py-7
                                    px-3
                                    lg:px-4
                                    "
                                    >
                                    Address
                                  </th>
                                  <th
                                    class="
                                    w-1/6
                                    min-w-[160px]
                                    text-lg
                                    font-semibold
                                    text-white
                                    py-4
                                    lg:py-7
                                    px-3
                                    lg:px-4
                                    "
                                    >
                                    Area
                                  </th>
                                  <th
                                    class="
                                    w-1/6
                                    min-w-[160px]
                                    text-lg
                                    font-semibold
                                    text-white
                                    py-4
                                    lg:py-7
                                    px-3
                                    lg:px-4
                                    "
                                    >
                                    Floor
                                  </th>
                                  <th
                                    class="
                                    w-1/6
                                    min-w-[160px]
                                    text-lg
                                    font-semibold
                                    text-white
                                    py-4
                                    lg:py-7
                                    px-3
                                    lg:px-4
                                    "
                                    >
                                    Show
                                  </th>
                                  <th
                                    class="
                                    w-1/6
                                    min-w-[160px]
                                    text-lg
                                    font-semibold
                                    text-white
                                    py-4
                                    lg:py-7
                                    px-3
                                    lg:px-4
                                    border-r border-transparent
                                    "
                                    >
                                    Edit & Delete
                                  </th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($real_estates as $real_estate)
                              <tr>
                                  <td
                                    class="
                                    text-center text-dark
                                    font-medium
                                    text-base
                                    py-5
                                    px-2
                                    bg-[#F3F6FF]
                                    border-b border-l border-[#E8E8E8]
                                    "
                                    >
                                    {{ $real_estate->property_type }}
                                  </td>
                                  <td
                                    class="
                                    text-center text-dark
                                    font-medium
                                    text-base
                                    py-5
                                    px-2
                                    bg-white
                                    border-b border-[#E8E8E8]
                                    "
                                    >
                                    {{ $real_estate->address }}
                                  </td>
                                  <td
                                    class="
                                    text-center text-dark
                                    font-medium
                                    text-base
                                    py-5
                                    px-2
                                    bg-[#F3F6FF]
                                    border-b border-[#E8E8E8]
                                    "
                                    >
                                    {{ $real_estate->area }}
                                  </td>
                                  <td
                                    class="
                                    text-center text-dark
                                    font-medium
                                    text-base
                                    py-5
                                    px-2
                                    bg-white
                                    border-b border-[#E8E8E8]
                                    "
                                    >
                                    {{ $real_estate->floor }}
                                  </td>
                                  <td
                                    class="
                                    text-center text-dark
                                    font-medium
                                    text-base
                                    py-5
                                    px-2
                                    bg-[#F3F6FF]
                                    border-b border-[#E8E8E8]
                                    "
                                    >
                                    <a
                                      href="{{ route('real_estates.show', $real_estate->id) }}"
                                      class="text-center text-dark
                                      font-medium
                                      text-base
                                      py-5
                                      px-2
                                      bg-white
                                      border-b border-r border-[#E8E8E8]
                                      "
                                    >
                                    Show
                                  </td>
                                  <td
                                    class="
                                    text-center text-dark
                                    font-medium
                                    text-base
                                    py-5
                                    px-2
                                    bg-white
                                    border-b border-r border-[#E8E8E8]
                                    "
                                    >
                                    <a
                                        href="{{ route('real_estates.edit', $real_estate->id) }}"
                                        class="
                                        border border-primary
                                        py-2
                                        px-6
                                        text-primary
                                        inline-block
                                        rounded
                                        hover:bg-primary hover:text-white
                                        "
                                        >
                                      Edit
                                    </a>
                                    <form class="" action="{{ route('real_estates.destroy', $real_estate->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                  </td>
                              </tr>
                            @endforeach
                            </tbody>
                        </table>
                      </div>
                  </div>
                </div>
            </div>
          </section>
          <!-- ====== Table Section End -->
        </div>
    </div>
</x-app-layout>
