<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                
                <!-- /** * Requires curl enabled in php.ini
                    **/ -->

                    <?php
                    // $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/info';
                    // $parameters = [
                    // 'id' => 1
                    
                    // ];

                    // $headers = [
                    // 'Accepts: application/json',
                    // 'X-CMC_PRO_API_KEY: 082605a1-c449-4636-b389-c66606e85630'
                    // ];
                    // $qs = http_build_query($parameters); // query string encode the parameters
                    // $request = "{$url}?{$qs}"; // create the request URL


                    // $curl = curl_init(); // Get cURL resource
                    // // Set cURL options
                    // curl_setopt_array($curl, array(
                    // CURLOPT_URL => $request,            // set the request URL
                    // CURLOPT_HTTPHEADER => $headers,     // set the headers 
                    // CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
                    // ));

                    // $response = curl_exec($curl); // Send the request, save the response
                    // $resp = json_decode($response,true); // print json decoded response
                   
                    // print_r($resp);
                    
                    // curl_close($curl); // Close request
                    
                    
                    ?>
                    <!-- "> -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
