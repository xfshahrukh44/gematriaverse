<table id="GemTable">
    <tbody>
        @foreach (array_chunk($ciphers, 5) as $cipherChunk)
            <tr>
                @foreach ($cipherChunk as $index => $cipher)
                    @php
                        $rgb = json_decode($cipher['rgb_values'], true);
                        $red = $rgb['red'] ?? 0;
                        $green = $rgb['green'] ?? 0;
                        $blue = $rgb['blue'] ?? 0;
                    @endphp
                    <td class="GemTableHeader">
                        <div class="GemTableHeader change-cipher" data-id="{{ $cipher['id'] }}" onclick="MoveCipherClick('{{ $cipher['id'] }}', event)">
                            <font style="color: rgb({{ $red }}, {{ $green }}, {{ $blue }})">{{ $cipher['name'] }}</font>
                        </div>
                    </td>
                @endforeach

                @for ($i = count($cipherChunk); $i < 5; $i++)
                    <td class="GemTableHeader" style="display: none;"></td>
                @endfor
            </tr>

            <tr>
                @foreach ($cipherChunk as $index => $cipher)
                    @php
                        $rgb = json_decode($cipher['rgb_values'], true);
                        $red = $rgb['red'] ?? 0;
                        $green = $rgb['green'] ?? 0;
                        $blue = $rgb['blue'] ?? 0;
                    @endphp
                    <td class="GemTableValue" id="TableValue_{{ $cipher['name'] }}">
                        <font style="color: rgb({{ $red }}, {{ $green }}, {{ $blue }})">
                            <div class="NumberClass">
                                @if ($cipher['id'] == 'D0')
                                    <b id="ordinal" class="justnumber" onclick="Open_Properties(0)">0</b>
                                @elseif($cipher['id'] == 'D1')
                                    <b id="reduction" class="justnumber" onclick="Open_Properties(1)">0</b>
                                @elseif($cipher['id'] == 'D2')
                                    <b id="reverse" class="justnumber" onclick="Open_Properties(2)">0</b>
                                @elseif($cipher['id'] == 'D3')
                                    <b id="reverse_reduction" class="justnumber" onclick="Open_Properties(3)">0</b>
                                @else
                                    <b id="cipher_{{ $cipher['id'] }}" class="justnumber target_number" onclick="Open_Properties({{ $cipher['id'] }})">0</b>
                                @endif
                            </div>
                        </font>
                    </td>
                @endforeach

                @for ($i = count($cipherChunk); $i < 5; $i++)
                    <td class="GemTableValue" style="display: none;"></td>
                @endfor
            </tr>
        @endforeach
    </tbody>
</table>
