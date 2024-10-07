
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-4xl font-bold dark:text-black mb-4">Data Table</h2>

                    <hr class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight mb-4">

{{--
                    <table id="pagination-table" class="">
                        <thead>
                            <tr>
                                <th>
                                    <span class="flex items-center">
                                        Model Name
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Developer
                                    </span>
                                </th>
                                <th data-type="date" data-format="Month YYYY">
                                    <span class="flex items-center">
                                        Release Date
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Parameters
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Primary Application
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-black">GPT-4</td>
                                <td>OpenAI</td>
                                <td>March 2023</td>
                                <td>1 trillion</td>
                                <td>Natural Language Processing</td>
                            </tr>
                            <tr>
                                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-black">BERT</td>
                                <td>Google</td>
                                <td>October 2018</td>
                                <td>340 million</td>
                                <td>Natural Language Understanding</td>
                            </tr>
                            <tr>
                                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-black">DALL-E 2</td>
                                <td>OpenAI</td>
                                <td>April 2022</td>
                                <td>3.5 billion</td>
                                <td>Image Generation</td>
                            </tr>
                            <tr>
                                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-black">T5</td>
                                <td>Google</td>
                                <td>October 2019</td>
                                <td>11 billion</td>
                                <td>Text-to-Text Transfer</td>
                            </tr>
                            <tr>
                                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-black">GPT-3.5</td>
                                <td>OpenAI</td>
                                <td>November 2022</td>
                                <td>175 billion</td>
                                <td>Natural Language Processing</td>
                            </tr>
                            <tr>
                                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-black">Codex</td>
                                <td>OpenAI</td>
                                <td>August 2021</td>
                                <td>12 billion</td>
                                <td>Code Generation</td>
                            </tr>
                            <tr>
                                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-black">PaLM 2</td>
                                <td>Google</td>
                                <td>May 2023</td>
                                <td>540 billion</td>
                                <td>Multilingual Understanding</td>
                            </tr>
                            <tr>
                                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-black">LaMDA</td>
                                <td>Google</td>
                                <td>May 2021</td>
                                <td>137 billion</td>
                                <td>Conversational AI</td>
                            </tr>
                            <tr>
                                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-black">CLIP</td>
                                <td>OpenAI</td>
                                <td>January 2021</td>
                                <td>400 million</td>
                                <td>Image and Text Understanding</td>
                            </tr>
                            <tr>
                                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-black">XLNet</td>
                                <td>Google</td>
                                <td>June 2019</td>
                                <td>340 million</td>
                                <td>Natural Language Processing</td>
                            </tr>
                            <tr>
                                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-black">Meena</td>
                                <td>Google</td>
                                <td>January 2020</td>
                                <td>2.6 billion</td>
                                <td>Conversational AI</td>
                            </tr>
                            <tr>
                                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-black">BigGAN</td>
                                <td>Google</td>
                                <td>September 2018</td>
                                <td>Unlimited</td>
                                <td>Image Generation</td>
                            </tr>
                            <tr>
                                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-black">Electra</td>
                                <td>Google</td>
                                <td>March 2020</td>
                                <td>14 million</td>
                                <td>Natural Language Understanding</td>
                            </tr>
                            <tr>
                                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-black">Swin Transformer
                                </td>
                                <td>Microsoft</td>
                                <td>April 2021</td>
                                <td>88 million</td>
                                <td>Vision Processing</td>
                            </tr>
                            <tr>
                                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-black">GPT-NeoX-20B
                                </td>
                                <td>EleutherAI</td>
                                <td>April 2022</td>
                                <td>20 billion</td>
                                <td>Natural Language Processing</td>
                            </tr>
                            <tr>
                                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-black">Ernie 3.0</td>
                                <td>Baidu</td>
                                <td>July 2021</td>
                                <td>10 billion</td>
                                <td>Natural Language Processing</td>
                            </tr>
                            <tr>
                                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-black">Turing-NLG</td>
                                <td>Microsoft</td>
                                <td>February 2020</td>
                                <td>17 billion</td>
                                <td>Natural Language Processing</td>
                            </tr>
                            <tr>
                                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-black">Wu Dao 2.0</td>
                                <td>Beijing Academy of AI</td>
                                <td>June 2021</td>
                                <td>1.75 trillion</td>
                                <td>Multimodal Processing</td>
                            </tr>
                            <tr>
                                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-black">Jukebox</td>
                                <td>OpenAI</td>
                                <td>April 2020</td>
                                <td>1.2 billion</td>
                                <td>Music Generation</td>
                            </tr>

                        </tbody>
                    </table> --}}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
<script src="https://cdn.datatables.net/2.1.7/js/dataTables.tailwindcss.js"></script>

<script>
    if (document.getElementById("pagination-table") && typeof simpleDatatables.DataTable !== 'undefined') {
    const dataTable = new simpleDatatables.DataTable("#pagination-table", {
        paging: true,
        perPage: 10,
        perPageSelect: [5, 10, 15, 20, 25],
        sortable: true
    });
}
</script>

